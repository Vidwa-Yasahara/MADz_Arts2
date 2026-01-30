<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $orders = auth()->user()->orders()->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);
        $order->load('orderItems.artwork');
        return view('orders.show', compact('order'));
    }

    public function checkout()
    {
        $cartItems = auth()->user()->cartItems()->with('artwork')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index');
        }
        $total = $cartItems->sum(fn($i) => $i->artwork->price * $i->quantity);
        return view('checkout', compact('cartItems', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        $cartItems = auth()->user()->cartItems()->with('artwork')->get();
        $total = $cartItems->sum(fn($i) => $i->artwork->price * $i->quantity);

        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => 'pending',
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'artwork_id' => $item->artwork_id,
                'quantity' => $item->quantity,
                'price' => $item->artwork->price,
            ]);
        }

        auth()->user()->cartItems()->delete();

        return redirect()->route('payment', ['order' => $order->id]);
    }

    public function payment(Request $request)
    {
        $order = Order::findOrFail($request->order);
        $this->authorize('view', $order);

        // Generate Stripe Checkout session
        $checkoutSession = $request->user()->checkout([
            $order->total => 'Order #' . $order->id
        ], [
            'success_url' => route('payment.success', ['order' => $order->id]),
            'cancel_url' => route('payment', ['order' => $order->id]),
            'metadata' => [
                'order_id' => $order->id,
            ],
        ]);

        return view('payment', [
            'order' => $order,
            'checkoutSession' => $checkoutSession,
        ]);
    }

    public function processPayment(Request $request)
    {
        // This is now handled by Stripe Checkout redirect, but keeping for reference or alternative flows
        return redirect()->route('payment', ['order' => $request->order]);
    }

    public function paymentSuccess(Request $request)
    {
        $order = Order::findOrFail($request->order);
        $this->authorize('view', $order);

        // In a real app, you'd use webhooks to confirm payment. 
        // For simplicity, we'll mark it as paid on return if it's not already.
        if ($order->status === 'pending') {
            $order->update(['status' => 'paid']);
        }

        return view('payment-success', compact('order'));
    }
}
