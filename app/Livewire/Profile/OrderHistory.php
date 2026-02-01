<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class OrderHistory extends Component
{
    public function render()
    {
        $orders = auth()->user()->orders()
            ->where('status', '!=', 'pending')
            ->with('orderItems.artwork')
            ->latest()
            ->get();

        return view('livewire.profile.order-history', [
            'orders' => $orders
        ]);
    }
}
