<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class OrderHistory extends Component
{
    public function render()
    {
        $orders = auth()->user()->orders()
            ->with('items.artwork')
            ->latest()
            ->get();

        return view('livewire.profile.order-history', [
            'orders' => $orders
        ]);
    }
}
