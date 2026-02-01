<div class="space-y-6">
    @forelse ($orders as $order)
        <a href="{{ route('orders.show', $order) }}" class="group block bg-white dark:bg-ash-800 border-l-4 border-l-black dark:border-l-white border-y border-r border-gray-100 dark:border-ash-700 p-6 hover:shadow-lg transition-all">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex items-center gap-6">
                    <div class="space-y-1">
                        <div class="flex items-center gap-3">
                            <p class="text-lg font-bold text-gray-900 dark:text-white">Order #{{ $order->id }}</p>
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $order->created_at->format('M d, Y') }}</span>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $order->orderItems->count() }} item(s)</p>
                    </div>
                </div>

                <div class="flex items-center justify-between md:justify-end gap-8 pt-4 md:pt-0 border-t md:border-t-0 border-gray-100 dark:border-ash-700">
                    <div>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">${{ number_format($order->total) }}</p>
                        <p class="text-[10px] text-gray-400 uppercase tracking-wider">Total</p>
                    </div>
                    <div>
                        <span class="inline-block px-3 py-1 text-[10px] font-bold uppercase tracking-wider rounded-sm
                            {{ $order->status === 'paid' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300' }}">
                            {{ $order->status }}
                        </span>
                    </div>
                    <svg class="hidden md:block h-5 w-5 text-gray-400 group-hover:text-black dark:group-hover:text-white group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </div>
        </a>
    @empty
        <div class="text-center py-12 rounded-2xl border-2 border-dashed border-gray-200 dark:border-ash-700">
            <p class="text-gray-500 dark:text-gray-400 italic mb-6">No past orders found.</p>
            <a href="{{ route('artworks.index') }}" class="inline-block px-6 py-2 bg-black text-white text-xs font-bold uppercase tracking-widest hover:bg-gray-800 transition rounded">
                Start Shopping
            </a>
        </div>
    @endforelse
</div>
