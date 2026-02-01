<x-app-layout>
    <div class="pt-32 pb-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <a href="{{ route('profile.show') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-black dark:text-gray-400 dark:hover:text-white transition-colors mb-6">
                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Profile
            </a>
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-2">Order Details</h1>
                    <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                        <span>Order #{{ $order->id }}</span>
                        <span>•</span>
                        <span>Placed on {{ $order->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
                
                <div>
                    <span class="inline-block px-4 py-2 text-xs font-bold uppercase tracking-wider rounded-lg border
                        {{ $order->status === 'paid' ? 'bg-green-100 text-green-700 border-green-200 dark:bg-green-900/30 dark:text-green-400 dark:border-green-800' : 'bg-gray-100 text-gray-600 border-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-700' }}">
                        {{ $order->status }}
                    </span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Order Items -->
            <div class="lg:col-span-8 space-y-12">
                <div class="bg-white dark:bg-ash-800 rounded-2xl shadow-sm border border-gray-100 dark:border-ash-700 overflow-hidden">
                    <div class="p-6 md:p-8 space-y-8">
                         <h2 class="text-lg font-bold text-gray-900 dark:text-white border-b border-gray-100 dark:border-ash-700 pb-4">Order Items</h2>
                         <div class="divide-y divide-gray-100 dark:divide-ash-700">
                            @foreach($order->orderItems as $item)
                                <div class="py-6 flex gap-6">
                                    <div class="w-20 h-24 bg-gray-100 dark:bg-ash-900 rounded-lg overflow-hidden flex-shrink-0">
                                        <img src="{{ asset('images/' . $item->artwork->image) }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-bold text-gray-900 dark:text-white truncate">{{ $item->artwork->title }}</h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">{{ $item->artwork->artist }}</p>
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                                            ${{ number_format($item->price) }} <span class="text-gray-400 text-xs">x {{ $item->quantity }}</span>
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-lg font-bold text-gray-900 dark:text-white">${{ number_format($item->quantity * $item->price) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-ash-800 rounded-2xl shadow-sm border border-gray-100 dark:border-ash-700 overflow-hidden">
                     <div class="p-6 md:p-8">
                         <h2 class="text-lg font-bold text-gray-900 dark:text-white border-b border-gray-100 dark:border-ash-700 pb-4 mb-6">Delivery Information</h2>
                         <div class="flex flex-col md:flex-row gap-8">
                             <div class="flex-1">
                                <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-2">Shipping Address</h3>
                                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ $order->address }}</p>
                             </div>
                             <div class="flex-1">
                                <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-2">Contact Details</h3>
                                <p class="text-gray-600 dark:text-gray-400">{{ $order->phone }}</p>
                             </div>
                         </div>
                     </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-4">
                <div class="bg-white dark:bg-ash-800 rounded-2xl shadow-lg border border-gray-100 dark:border-ash-700 p-6 md:p-8 sticky top-24">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Order Summary</h2>
                    
                    <div class="space-y-4 mb-6 pb-6 border-b border-gray-100 dark:border-ash-700">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Subtotal</span>
                            <span class="font-medium text-gray-900 dark:text-white">${{ number_format($order->total) }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Shipping</span>
                            <span class="font-medium text-gray-900 dark:text-white">Free</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-end mb-8">
                        <span class="text-base font-bold text-gray-900 dark:text-white">Total</span>
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">${{ number_format($order->total) }}</span>
                    </div>

                    <div class="bg-gray-50 dark:bg-ash-900 rounded-xl p-4 flex items-center gap-3">
                         <div class="w-8 h-8 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center text-green-600 dark:text-green-400">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                         </div>
                         <div>
                             <p class="text-sm font-bold text-gray-900 dark:text-white">Payment Secure</p>
                             <p class="text-xs text-gray-500 dark:text-gray-400">Processed securely via Stripe</p>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
