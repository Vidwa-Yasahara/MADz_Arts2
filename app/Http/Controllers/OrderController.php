<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced;

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
        // Validate form inputs
        $request->validate([
            'street' => 'required|string|min:5|max:200',
            'city' => 'required|string|min:2|max:100',
            'postal_code' => 'required|string|min:3|max:20',
            'country' => 'required|string|min:2|max:100',
            'phone' => ['required', 'string', 'regex:/^[0-9]{10}$/'],
            'delivery_fee' => 'nullable|numeric|min:0',
        ], [
            'street.required' => 'Please enter your street address.',
            'street.min' => 'Street address must be at least 5 characters.',
            'city.required' => 'Please enter your city.',
            'postal_code.required' => 'Please enter your postal code.',
            'country.required' => 'Please enter your country.',
            'phone.required' => 'Please enter your contact number.',
            'phone.regex' => 'Invalid phone number.',
        ]);

        // Check cart is not empty
        $cartItems = auth()->user()->cartItems()->with('artwork')->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Validate stock availability
        foreach ($cartItems as $item) {
            if ($item->quantity > $item->artwork->stock) {
                return back()->withErrors([
                    'stock' => "Not enough stock for {$item->artwork->title}. Only {$item->artwork->stock} available."
                ])->withInput();
            }
        }

        // Combine address fields
        $fullAddress = $request->street . ', ' . $request->city . ' ' . $request->postal_code . ', ' . $request->country;

        $subtotal = $cartItems->sum(fn($i) => $i->artwork->price * $i->quantity);
        $deliveryFee = $request->input('delivery_fee', 0);
        $total = $subtotal + $deliveryFee;

        // Check if user already has a pending order
        $order = Order::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->first();

        if ($order) {
            // Update existing pending order
            $order->update([
                'total' => $order->total + $total,
                'address' => $fullAddress,
                'phone' => $request->phone,
            ]);
        } else {
            // Create new order
            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $total,
                'address' => $fullAddress,
                'phone' => $request->phone,
                'status' => 'pending',
            ]);
        }

        foreach ($cartItems as $item) {
            // Decrease stock
            $item->artwork->decrement('stock', $item->quantity);
            
            // Check if this artwork already exists in the order
            $existingOrderItem = OrderItem::where('order_id', $order->id)
                ->where('artwork_id', $item->artwork_id)
                ->first();
            
            if ($existingOrderItem) {
                // Update quantity of existing item
                $existingOrderItem->increment('quantity', $item->quantity);
            } else {
                // Create new order item
                OrderItem::create([
                    'order_id' => $order->id,
                    'artwork_id' => $item->artwork_id,
                    'quantity' => $item->quantity,
                    'price' => $item->artwork->price,
                ]);
            }
        }

        auth()->user()->cartItems()->delete();

        return redirect()->route('payment', ['order' => $order->id]);
    }

    public function payment(Request $request)
    {
        $order = Order::findOrFail($request->order);
        $this->authorize('view', $order);

        // Load order items for display
        $order->load('orderItems.artwork');

        // Convert total to cents for Stripe
        $amountInCents = (int)($order->total * 100);

        // Generate Stripe Checkout session with proper format
        $checkoutSession = $request->user()->checkout([
            [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'MADz Arts Order #' . $order->id,
                        'description' => 'Art collection order with ' . $order->orderItems->count() . ' item(s)',
                    ],
                    'unit_amount' => $amountInCents,
                ],
                'quantity' => 1,
            ]
        ], [
            'success_url' => route('payment.success', ['order' => $order->id]),
            'cancel_url' => route('orders.show', ['order' => $order->id]),
            'metadata' => [
                'order_id' => $order->id,
            ],
        ]);

        return $checkoutSession;
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

            // Send order confirmation email
            Mail::to($request->user())->send(new OrderPlaced($order));
        }

        return view('payment-success', compact('order'));
    }
}
