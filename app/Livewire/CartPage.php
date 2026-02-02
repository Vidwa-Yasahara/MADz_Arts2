<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class CartPage extends Component
{
    public $cartItems;
    public $pendingOrders;
    public $total = 0;
    public $deliveryFee = 0;
    public $finalTotal = 0;

    protected $listeners = ['cart-updated' => 'loadCart'];

    public function mount()
    {
        $this->loadCart();
        $this->loadPendingOrders();
    }

    public function loadCart()
    {
        $this->cartItems = \App\Models\CartItem::where('user_id', auth()->id())
            ->with('artwork')
            ->get();
        $this->calculateTotal();
    }

    public function loadPendingOrders()
    {
        // Get all pending orders
        $pendingOrders = Order::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->with('orderItems.artwork')
            ->orderBy('created_at', 'asc') // Oldest first
            ->get();

        if ($pendingOrders->count() > 1) {
            // Logic to merge orders
            $masterOrder = $pendingOrders->first();
            $ordersToMerge = $pendingOrders->slice(1);

            foreach ($ordersToMerge as $order) {
                // Merge items
                foreach ($order->orderItems as $item) {
                    $existingItem = $masterOrder->orderItems->where('artwork_id', $item->artwork_id)->first();
                    
                    if ($existingItem) {
                        $existingItem->increment('quantity', $item->quantity);
                    } else {
                        $item->update(['order_id' => $masterOrder->id]);
                    }
                }
                
                // Add totals (excluding delivery fee logic for simplicity, just summing totals for now)
                // Ideally we recalculate total based on items + one delivery fee
                // But for now, let's just create a simple unified total logic
                
                // Delete the merged order
                $order->delete();
            }
            
            // Recalculate master order total properly
            $subtotal = $masterOrder->orderItems()->get()->sum(function($item) {
                return $item->price * $item->quantity;
            });
            
            // Re-apply delivery fee logic
            $deliveryFee = 0;
            if ($subtotal < 3000) {
                if ($subtotal >= 2000) $deliveryFee = 75;
                elseif ($subtotal >= 1000) $deliveryFee = 150;
                elseif ($subtotal >= 500) $deliveryFee = 200;
                else $deliveryFee = 250;
            }
            
            $masterOrder->update([
                'total' => $subtotal + $deliveryFee
            ]);

            // Refresh the list to only show the master order
            $this->pendingOrders = collect([$masterOrder->fresh(['orderItems.artwork'])]);
        } else {
            $this->pendingOrders = $pendingOrders;
        }
    }

    public function calculateTotal()
    {
        $this->total = $this->cartItems->sum(function($item) {
            return $item->artwork->price * $item->quantity;
        });
        
        // Tiered delivery fee based on order value
        // FREE for $3000+, premium rates for lower amounts
        if ($this->total >= 3000) {
            $this->deliveryFee = 0;
        } elseif ($this->total >= 2000) {
            $this->deliveryFee = 75;   // $75 for $2000-2999
        } elseif ($this->total >= 1000) {
            $this->deliveryFee = 150;  // $150 for $1000-1999
        } elseif ($this->total >= 500) {
            $this->deliveryFee = 200;  // $200 for $500-999
        } else {
            $this->deliveryFee = 250;  // $250 for under $500
        }
        
        $this->finalTotal = $this->total + $this->deliveryFee;
    }

    public function increment($id)
    {
        $item = \App\Models\CartItem::find($id);
        // Check stock limit
        if ($item && $item->quantity < $item->artwork->stock) {
            $item->increment('quantity');
        }
        $this->loadCart();
    }

    public function decrement($id)
    {
        $item = \App\Models\CartItem::find($id);
        if ($item->quantity > 1) {
            $item->decrement('quantity');
        } else {
            $item->delete();
        }
        $this->loadCart();
    }

    public function removeItem($id)
    {
        \App\Models\CartItem::destroy($id);
        $this->loadCart();
    }

    public function cancelOrder($orderId)
    {
        $order = Order::where('id', $orderId)
            ->where('user_id', auth()->id())
            ->where('status', 'pending')
            ->first();
        
        if ($order) {
            // Restore stock for each item
            foreach ($order->orderItems as $item) {
                $item->artwork->increment('stock', $item->quantity);
            }
            // Delete order items and order
            $order->orderItems()->delete();
            $order->delete();
        }
        
        $this->loadPendingOrders();
    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}

