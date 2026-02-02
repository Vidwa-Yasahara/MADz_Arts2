<x-app-layout>
    <div class="pt-32 pb-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <h1 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">Your Orders</h1>
            <p class="text-gray-500 dark:text-gray-400">View and track your purchase history</p>
        </div>

        @if($orders->count() > 0)
            <div class="space-y-6">
                @foreach($orders as $order)
                    <a href="{{ route('orders.show', $order) }}" class="group block bg-white dark:bg-ash-800 border-l-4 border-l-black dark:border-l-white border-y border-r border-gray-100 dark:border-ash-700 p-8 hover:shadow-lg transition-all">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8">
                            <div class="flex items-center gap-6">
                                <div class="space-y-1">
                                    <div class="flex items-center gap-3">
                                        <p class="text-lg font-bold text-gray-900 dark:text-white">Order #{{ $order->id }}</p>
                                        <span class="text-xs text-gray-500 dark:text-gray-400">{{ $order->created_at->format('M d, Y') }}</span>
                                    </div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $order->orderItems->count() }} item(s)</p>
                                </div>
                            </div>

                            <div class="flex items-center justify-between md:justify-end gap-12 pt-6 md:pt-0 border-t md:border-t-0 border-gray-100 dark:border-ash-700">
                                <div>
                                    <p class="text-2xl font-bold text-gray-900 dark:text-white">${{ number_format($order->total) }}</p>
                                </div>
                                <div>
                                    <span class="inline-block px-4 py-1 text-xs font-bold uppercase tracking-wider rounded-sm
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
                @endforeach
            </div>
        @else
            <div class="py-32 text-center rounded-2xl border-2 border-dashed border-gray-200 dark:border-ash-700">
                <p class="text-gray-500 dark:text-gray-400 italic mb-8">No past orders found.</p>
                <a href="{{ route('artworks.index') }}" class="inline-block px-8 py-3 bg-black text-white hover:bg-gray-800 transition rounded font-bold">
                    Start Shopping
                </a>
            </div>
        @endif
    </div>
</x-app-layout>
