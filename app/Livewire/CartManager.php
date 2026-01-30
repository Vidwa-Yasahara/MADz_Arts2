<?php

namespace App\Livewire;

use Livewire\Component;

class CartManager extends Component
{
    public $artwork;
    public $artworkId;
    public $quantity = 1;
    public $showFull = false;

    public function mount($artwork)
    {
        $this->artwork = $artwork;
        $this->artworkId = $artwork->id;
    }

    public function addToCart()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->details && auth()->user()->details->role === 'admin') {
            return; // Admin cannot add to cart
        }

        $cartItem = \App\Models\CartItem::where('user_id', auth()->id())
            ->where('artwork_id', $this->artworkId)
            ->first();

        if ($cartItem) {
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
