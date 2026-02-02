<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_artworks' => \App\Models\Artwork::count(),
            'total_users' => \App\Models\User::count(),
            'total_orders' => \App\Models\Order::count(),
            'total_revenue' => \App\Models\Order::where('status', 'paid')->sum('total'),
        ];
        $recentOrders = \App\Models\Order::latest()->limit(5)->get();
        return view('admin.dashboard', compact('stats', 'recentOrders'));
    }

    public function users()
    {
        $users = \App\Models\User::paginate(10);
        return view('admin.users', compact('users'));
    }

    public function orders()
    {
        $orders = \App\Models\Order::with('user')->latest()->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    public function carts()
    {
        $carts = \App\Models\CartItem::with(['user', 'artwork'])->latest()->paginate(20);
        return view('admin.carts', compact('carts'));
    }
    public function destroy(\App\Models\User $user)
    {
        if (auth()->id() === $user->id) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return back()->with('success', 'User deleted successfully.');
    }
}

