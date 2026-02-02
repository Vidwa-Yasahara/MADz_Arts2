<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:pt-24 pb-24">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Checkout</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm">Complete your shipping details below.</p>
        </div>

        @php 
            $subtotal = 0;
            foreach($cartItems as $item) {
                $subtotal += $item->artwork->price * $item->quantity;
            }
            
            if ($subtotal >= 3000) {
                $deliveryFee = 0;
            } elseif ($subtotal >= 2000) {
                $deliveryFee = 75;
            } elseif ($subtotal >= 1000) {
                $deliveryFee = 150;
            } elseif ($subtotal >= 500) {
                $deliveryFee = 200;
            } else {
                $deliveryFee = 250;
            }
            
            $total = $subtotal + $deliveryFee;
        @endphp

        <form action="{{ route('order.place') }}" method="POST">
            @csrf
            
            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mb-6 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 rounded-lg p-4">
                    <ul class="list-disc list-inside text-sm text-red-600 dark:text-red-400 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left: Form -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Delivery Address -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
                        <h2 class="text-base font-bold text-gray-900 mb-4">📦 Delivery Address</h2>
                        <div class="space-y-4">
                            <div>
                                <label class="text-xs font-semibold text-gray-600 mb-1 block">Street Address</label>
                                <input type="text" name="street" required 
                                       class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-gray-300 outline-none text-gray-900"
                                       placeholder="123 Main Street, Apt 4B">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="text-xs font-semibold text-gray-600 mb-1 block">City</label>
                                    <input type="text" name="city" required 
                                           class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-gray-300 outline-none text-gray-900"
                                           placeholder="New York">
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Postal Code</label>
                                    <input type="text" name="postal_code" required 
                                           class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-gray-300 outline-none text-gray-900"
                                           placeholder="10001">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Country</label>
                                    <input type="text" name="country" required 
                                           class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-gray-300 outline-none text-gray-900"
                                           placeholder="United States">
                                </div>
                                <div>
                                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Phone Number</label>
                                    <input type="text" name="phone" required 
                                           class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-gray-300 outline-none text-gray-900"
                                           placeholder="+1 234 567 8900">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
                        <h2 class="text-base font-bold text-gray-900 mb-4">🚚 Shipping</h2>
                        <div class="p-4 {{ $deliveryFee == 0 ? 'bg-green-50 border-green-200' : 'bg-gray-50 border-gray-200' }} rounded-lg border flex items-center justify-between">
                            <div>
                                <span class="text-sm font-bold text-gray-900">Insured Art Logistics</span>
                                @if($deliveryFee > 0)
                                    <p class="text-xs text-green-600">Spend ${{ number_format(3000 - $subtotal) }} more for FREE delivery!</p>
                                @endif
                            </div>
                            @if($deliveryFee == 0)
                                <span class="text-sm font-bold text-green-600">FREE</span>
                            @else
                                <span class="text-sm font-bold text-gray-900">${{ number_format($deliveryFee) }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Items -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
                        <h2 class="text-base font-bold text-gray-900 mb-4">🛒 Items ({{ $cartItems->count() }})</h2>
                        <div class="space-y-3">
                            @foreach($cartItems as $item)
                                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-12 h-12 bg-white rounded flex-shrink-0 overflow-hidden border">
                                        <img src="{{ asset('images/' . $item->artwork->image) }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-bold text-gray-900 text-sm truncate">{{ $item->artwork->title }}</h4>
                                        <p class="text-xs text-gray-500">Qty: {{ $item->quantity }}</p>
                                    </div>
                                    <p class="text-sm font-bold text-gray-900">${{ number_format($item->artwork->price * $item->quantity) }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right: Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 sticky top-24">
                        <h3 class="text-base font-bold text-gray-900 mb-4">Order Summary</h3>
                        
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span class="font-bold text-gray-900">${{ number_format($subtotal) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Shipping</span>
                                @if($deliveryFee == 0)
                                    <span class="font-bold text-green-600">FREE</span>
                                @else
                                    <span class="font-bold text-gray-900">${{ number_format($deliveryFee) }}</span>
                                @endif
                            </div>
                            <hr class="border-gray-200">
                            <div class="flex justify-between items-end pt-2">
                                <span class="font-bold text-gray-900">Total</span>
                                <span class="text-2xl font-bold text-gray-900">${{ number_format($total) }}</span>
                            </div>
                        </div>

                        <input type="hidden" name="delivery_fee" value="{{ $deliveryFee }}">
                        <button type="submit" class="w-full mt-6 bg-black text-white py-4 rounded-lg font-bold text-sm hover:bg-gray-800 transition">
                            Complete Purchase
                        </button>
                        
                        <p class="text-xs text-gray-400 text-center mt-4">🔒 Secure & Insured</p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
