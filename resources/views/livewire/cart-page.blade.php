<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:pt-24">
    <div class="mb-12">
        <h1 class="text-3xl font-bold text-gray-900">Shopping Cart ({{ $cartItems->count() }})</h1>
    </div>

    @if($cartItems->count() > 0)
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <!-- Items Area -->
            <div class="lg:col-span-8 space-y-6">
                @foreach($cartItems as $item)
                    <div class="bg-white rounded-lg shadow p-6 flex flex-col md:flex-row items-center gap-8 border border-gray-100">
                        <div class="w-32 h-32 bg-gray-50 rounded flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/' . $item->artwork->image) }}" class="max-w-full max-h-full object-contain">
                        </div>
                        
                        <div class="flex-1 space-y-2">
                            <h2 class="text-xl font-bold text-gray-900">{{ $item->artwork->title }}</h2>
                            <p class="text-gray-500 italic text-sm">by {{ $item->artwork->artist }}</p>
                            <div class="pt-4 flex items-center gap-6">
                                <div class="flex items-center gap-3 bg-gray-100 px-3 py-1 rounded">
                                    <button wire:click="decrement({{ $item->id }})" class="font-bold text-gray-500 hover:text-black">-</button>
                                    <span class="text-sm font-bold w-4 text-center">{{ $item->quantity }}</span>
                                    <button wire:click="increment({{ $item->id }})" class="font-bold text-gray-500 hover:text-black">+</button>
                                </div>
                                <button wire:click="removeItem({{ $item->id }})" class="text-xs text-red-500 hover:underline font-medium">Remove</button>
                            </div>
                        </div>

                        <div class="text-right">
                            <p class="text-2xl font-bold text-gray-900">${{ number_format($item->artwork->price * $item->quantity) }}</p>
                            <p class="text-xs text-gray-400">(${{ number_format($item->artwork->price) }} each)</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Summary Area -->
            <div class="lg:col-span-4">
                <div class="bg-white rounded-lg shadow p-8 sticky top-24 border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Order Summary</h3>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span class="font-bold">${{ number_format($total) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Shipping</span>
                            <span class="text-green-600 font-bold">FREE</span>
                        </div>
                        <hr class="border-gray-100">
                        <div class="flex justify-between items-end">
                            <span class="text-lg font-bold text-gray-900">Total</span>
                            <span class="text-3xl font-bold text-gray-900">${{ number_format($total) }}</span>
                        </div>
                    </div>

                    <a href="{{ route('checkout') }}" class="block w-full text-center bg-black text-white py-4 rounded-lg font-bold hover:bg-gray-800 transition">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="bg-white rounded-lg shadow-inner py-32 text-center border border-dashed border-gray-200">
            <p class="text-gray-400 italic mb-8">Your cart is currently empty.</p>
            <a href="{{ route('artworks.index') }}" class="inline-block px-8 py-3 bg-black text-white rounded font-bold hover:bg-gray-800 transition">
                Start Shopping
            </a>
        </div>
    @endif
</div>
