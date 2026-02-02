<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:pt-24">
    <div class="mb-12">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Shopping Cart ({{ $cartItems->count() }})</h1>
    </div>

    <!-- Pending Orders Section -->
    @if($pendingOrders->count() > 0)
        <div class="mb-8">
            <h2 class="text-sm font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-2">
                <span class="w-1.5 h-1.5 bg-amber-500 rounded-full animate-pulse"></span>
                Pending Orders ({{ $pendingOrders->count() }})
            </h2>
            
            <div class="space-y-2">
                @foreach($pendingOrders as $order)
                    <div class="group bg-gradient-to-r from-gray-50 to-gray-100 dark:from-ash-800 dark:to-ash-900 rounded-lg border border-gray-200 dark:border-ash-700 hover:border-amber-400 dark:hover:border-amber-500 transition-all duration-300 overflow-hidden">
                        <div class="p-3">
                            <div class="flex flex-col md:flex-row md:items-center gap-3">
                                <!-- Artwork Preview -->
                                <div class="flex items-center gap-3 flex-1">
                                    <div class="flex -space-x-1.5">
                                        @foreach($order->orderItems->take(3) as $item)
                                            <div class="w-10 h-10 rounded-lg border-2 border-white dark:border-ash-700 shadow-md overflow-hidden bg-white flex-shrink-0">
                                                <img src="{{ asset('images/' . $item->artwork->image) }}" class="w-full h-full object-cover">
                                            </div>
                                        @endforeach
                                        @if($order->orderItems->count() > 3)
                                            <div class="w-10 h-10 rounded-lg border-2 border-white dark:border-ash-700 shadow-md bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center flex-shrink-0">
                                                <span class="text-xs text-white font-bold">+{{ $order->orderItems->count() - 3 }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="min-w-0">
                                        <div class="flex items-center gap-2 mb-0.5">
                                            <span class="text-sm font-bold text-gray-900 dark:text-white">Order #{{ $order->id }}</span>
                                            <span class="px-1.5 py-0.5 text-[9px] font-bold uppercase tracking-wider bg-amber-500 text-white rounded">Pending</span>
                                        </div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                            {{ $order->orderItems->pluck('artwork.title')->take(2)->join(', ') }}
                                            @if($order->orderItems->count() > 2) & more @endif
                                        </p>
                                        <p class="text-[10px] text-gray-400 mt-0.5">
                                            {{ $order->orderItems->count() }} item(s) • {{ $order->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                                
                                <!-- Price & Actions -->
                                <div class="flex items-center gap-4">
                                    <div class="text-right">
                                        <p class="text-lg font-bold text-gray-900 dark:text-white">${{ number_format($order->total) }}</p>
                                    </div>
                                    
                                    <div class="flex gap-2">
                                        <a href="{{ route('payment', ['order' => $order->id]) }}" 
                                           class="px-3 py-1.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-xs font-bold rounded-md hover:from-green-600 hover:to-emerald-700 transition-all shadow-sm hover:shadow-md">
                                            Pay Now
                                        </a>
                                        <button wire:click="cancelOrder({{ $order->id }})" 
                                                wire:confirm="Cancel this order? Stock will be restored."
                                                class="px-3 py-1.5 text-gray-500 dark:text-gray-400 text-xs font-medium hover:text-red-500 transition-colors">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Progress indicator -->
                        <div class="h-0.5 bg-gradient-to-r from-amber-400 via-orange-500 to-red-500 opacity-80"></div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif



    @if($cartItems->count() > 0)
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <!-- Items Area -->
            <div class="lg:col-span-8 space-y-6">
                @foreach($cartItems as $item)
                    <div class="bg-white dark:bg-ash-900 rounded-lg shadow p-6 flex flex-col md:flex-row items-center gap-8 border border-gray-100 dark:border-ash-800">
                        <div class="w-32 h-32 bg-gray-50 dark:bg-ash-800 rounded flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/' . $item->artwork->image) }}" class="max-w-full max-h-full object-contain">
                        </div>
                        
                        <div class="flex-1 space-y-2">
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ $item->artwork->title }}</h2>
                            <p class="text-gray-500 dark:text-gray-400 italic text-sm">by {{ $item->artwork->artist }}</p>
                            <p class="text-xs text-gray-400">{{ $item->artwork->stock }} in stock</p>
                            <div class="pt-4 flex items-center gap-6">
                                <div class="flex items-center gap-3 bg-gray-100 dark:bg-ash-800 px-3 py-1 rounded">
                                    <button wire:click="decrement({{ $item->id }})" class="font-bold text-gray-500 hover:text-black dark:hover:text-white">-</button>
                                    <span class="text-sm font-bold w-4 text-center text-gray-900 dark:text-white">{{ $item->quantity }}</span>
                                    <button wire:click="increment({{ $item->id }})" 
                                            class="font-bold {{ $item->quantity >= $item->artwork->stock ? 'text-gray-300 cursor-not-allowed' : 'text-gray-500 hover:text-black dark:hover:text-white' }}"
                                            {{ $item->quantity >= $item->artwork->stock ? 'disabled' : '' }}>+</button>
                                </div>
                                <button wire:click="removeItem({{ $item->id }})" class="text-xs text-red-500 hover:underline font-medium">Remove</button>
                            </div>
                        </div>

                        <div class="text-right">
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">${{ number_format($item->artwork->price * $item->quantity) }}</p>
                            <p class="text-xs text-gray-400">($ {{ number_format($item->artwork->price) }} each)</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Summary Area -->
            <div class="lg:col-span-4">
                <div class="bg-white dark:bg-ash-900 rounded-lg shadow p-8 sticky top-24 border border-gray-100 dark:border-ash-800">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Order Summary</h3>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-gray-600 dark:text-gray-400">
                            <span>Subtotal</span>
                            <span class="font-bold text-gray-900 dark:text-white">${{ number_format($total) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600 dark:text-gray-400">
                            <span>Shipping</span>
                            @if($deliveryFee == 0)
                                <span class="text-green-600 font-bold">FREE</span>
                            @else
                                <span class="font-bold text-gray-900 dark:text-white">${{ number_format($deliveryFee) }}</span>
                            @endif
                        </div>
                        
                        @if($deliveryFee > 0 && $total < 3000)
                            <div class="bg-green-50 dark:bg-green-900/20 border border-green-100 dark:border-green-800 rounded-lg p-3 text-xs text-green-700 dark:text-green-400">
                                <span class="font-bold">💡 Tip:</span> Spend ${{ number_format(3000 - $total) }} more for FREE delivery!
                            </div>
                        @endif
                        
                        <hr class="border-gray-100 dark:border-ash-700">
                        <div class="flex justify-between items-end">
                            <span class="text-lg font-bold text-gray-900 dark:text-white">Total</span>
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">${{ number_format($finalTotal) }}</span>
                        </div>
                    </div>

                    <a href="{{ route('checkout') }}" class="block w-full text-center bg-black text-white py-4 rounded-lg font-bold hover:bg-gray-800 transition">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
    @else
        @if($pendingOrders->count() == 0)
            <div class="bg-white dark:bg-ash-900 rounded-lg shadow-inner py-32 text-center border border-dashed border-gray-200 dark:border-ash-700">
                <p class="text-gray-400 italic mb-8">Your cart is currently empty.</p>
                <a href="{{ route('artworks.index') }}" class="inline-block px-8 py-3 bg-black text-white rounded font-bold hover:bg-gray-800 transition">
                    Start Shopping
                </a>
            </div>
        @endif
    @endif
</div>

