<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('user_id', $request->user()->id)
            ->with(['orderItems.artwork'])
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.artwork_id' => 'required|exists:artworks,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
        ]);

        // Create the order
        $order = Order::create([
            'user_id' => $request->user()->id,
            'total' => $request->total,
            'status' => 'pending',
        ]);

        // Create order items
        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'artwork_id' => $item['artwork_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Load relationships
        $order->load(['orderItems.artwork']);

        return response()->json($order, 201);
    }

    public function show(Request $request, Order $order)
    {
        // Ensure user can only view their own orders
        if ($order->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $order->load(['orderItems.artwork']);
        return response()->json($order);
    }
}
