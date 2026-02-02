<x-mail::message>
# Order Confirmed

Hi {{ $order->user->name }},

Thank you for your purchase! We have received your order and it is now being processed.

**Order ID:** #{{ $order->id }}  
**Total Amount:** ${{ number_format($order->total) }}

<x-mail::table>
| Item | Price | Qty | Total |
| :--- | :--- | :--- | :--- |
@foreach($order->orderItems as $item)
| {{ $item->artwork->title }} | ${{ number_format($item->price) }} | {{ $item->quantity }} | ${{ number_format($item->price * $item->quantity) }} |
@endforeach
</x-mail::table>

<x-mail::button :url="route('orders.show', $order)">
View Order Details
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
