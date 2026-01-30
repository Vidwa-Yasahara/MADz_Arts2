<div class="space-y-6">
    @forelse ($orders as $order)
        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-black rounded-lg border border-gray-100 dark:border-ash-800">
            <div>
                <div class="flex items-center gap-3">
                    <span class="font-bold text-gray-900 dark:text-white">Order #{{ $order->id }}</span>
                    <span class="px-2 py-1 text-xs font-bold uppercase tracking-widest rounded-full 
                        @if($order->status === 'completed') bg-green-100 text-green-700 
                        @elseif($order->status === 'pending') bg-yellow-100 text-yellow-700
                        @else bg-gray-100 text-gray-700 @endif">
                        {{ $order->status }}
                    </span>
                </div>
                <div class="text-sm text-gray-500 dark:text-ash-400 mt-1">
                    Placed on {{ $order->created_at->format('M d, Y') }}
                </div>
            </div>
            <div class="text-right">
                <div class="font-serif font-bold text-lg text-gray-900 dark:text-white">
                    ${{ number_format($order->total_amount) }}
                </div>
                <div class="text-xs text-gray-400">
                    {{ $order->items->count() }} items
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-8 text-gray-500 dark:text-ash-400">
            No orders found.
        </div>
    @endforelse
</div>
