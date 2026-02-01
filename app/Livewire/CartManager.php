<?php

namespace App\Livewire;

use Livewire\Component;

class CartManager extends Component
{
    public $artwork;
    public $artworkId;
    public $quantity = 1;
    public $showFull = false;
    public $maxStock;

    public function mount($artwork)
    {
        $this->artwork = $artwork;
        $this->artworkId = $artwork->id;
        $this->maxStock = $artwork->stock ?? 1;
    }

    public function increment()
    {
        // Only allow increment if quantity is less than available stock
        if ($this->quantity < $this->maxStock) {
            $this->quantity++;
        }
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->details && auth()->user()->details->role === 'admin') {
            return; // Admin cannot add to cart
        }

        // Validate quantity doesn't exceed stock
        if ($this->quantity > $this->maxStock) {
            session()->flash('error', 'Not enough stock available.');
            return;
        }

        $cartItem = \App\Models\CartItem::where('user_id', auth()->id())
            ->where('artwork_id', $this->artworkId)
            ->first();

        if ($cartItem) {
            // Check if adding more would exceed stock
            $newQuantity = $cartItem->quantity + $this->quantity;
            if ($newQuantity > $this->maxStock) {
                session()->flash('error', 'Cannot add more. Stock limit reached.');
                return;
            }
            $cartItem->increment('quantity', $this->quantity);
        } else {
            \App\Models\CartItem::create([
                'user_id' => auth()->id(),
                'artwork_id' => $this->artworkId,
                'quantity' => $this->quantity,
            ]);
        }

        session()->flash('success', 'Item added to cart!');
        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.cart-manager');
    }
}
