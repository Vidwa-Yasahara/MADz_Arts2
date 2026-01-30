<?php

namespace App\Livewire;

use Livewire\Component;

class CartPage extends Component
{
    public $cartItems;
    public $total = 0;

    protected $listeners = ['cart-updated' => 'loadCart'];

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cartItems = \App\Models\CartItem::where('user_id', auth()->id())
            ->with('artwork')
            ->get();
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = $this->cartItems->sum(function($item) {
            return $item->artwork->price * $item->quantity;
        });
    }

    public function increment($id)
    {
        $item = \App\Models\CartItem::find($id);
        $item->increment('quantity');
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

    public function render()
    {
        return view('livewire.cart-page');
    }
}
