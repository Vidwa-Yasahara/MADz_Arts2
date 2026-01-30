<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:pt-24 pb-24">
        <div class="mb-12">
            <h1 class="text-3xl font-bold text-gray-900">Secure Checkout</h1>
            <p class="text-gray-500 mt-2">Please complete your shipping and logistics details below.</p>
        </div>

        <form action="{{ route('order.place') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Logistics Form -->
                <div class="lg:col-span-12 space-y-12 mb-12">
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-8 space-y-8">
                        <div class="flex items-center gap-3 pb-4 border-b border-gray-50">
                            <span class="flex items-center justify-center w-8 h-8 rounded-full bg-black text-white text-xs font-bold">1</span>
                            <h2 class="text-lg font-bold text-gray-900">Logistics & Delivery Address</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 gap-8">
                            <div class="space-y-4">
                                <label class="text-sm font-bold text-gray-700">Full Shipping Address</label>
                                <textarea name="address" required 
                                          class="w-full bg-gray-50 border border-gray-200 rounded-lg px-6 py-4 text-sm focus:ring-2 focus:ring-gray-300 outline-none min-h-[120px]"
                                          placeholder="Street, City, Postcode, Country..."></textarea>
                            </div>
                            
                            <div class="space-y-4 max-w-md">
                                <label class="text-sm font-bold text-gray-700">Contact Number (Secure)</label>
                                <input type="text" name="phone" required 
                                       class="w-full bg-gray-50 border border-gray-200 rounded-lg px-6 py-4 text-sm focus:ring-2 focus:ring-gray-300 outline-none"
                                       placeholder="+00 (0) 000 0000">
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-8 space-y-8">
                        <div class="flex items-center gap-3 pb-4 border-b border-gray-50">
                             <span class="flex items-center justify-center w-8 h-8 rounded-full bg-black text-white text-xs font-bold">2</span>
                             <h2 class="text-lg font-bold text-gray-900">Shipment Handling</h2>
                        </div>
                        <div class="p-6 bg-blue-50/50 rounded-lg border border-blue-100 flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="p-3 bg-blue-100 rounded-full text-blue-600">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="space-y-1">
                                    <span class="text-sm font-bold text-gray-900">Insured Art Logistics</span>
                                    <p class="text-xs text-gray-500">Museum-grade handling is provided as a courtesy for this collection.</p>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-green-600 uppercase">Free</span>
                        </div>
                    </div>
                </div>

                <!-- Review Items & Total -->
                <div class="lg:col-span-12">
                    <div class="bg-gray-100 rounded-xl p-10 border border-gray-200 space-y-10">
                        <h2 class="text-2xl font-bold text-gray-900 text-center">Review Collection ({{ $cartItems->count() }} items)</h2>

                        <div class="space-y-4 max-h-[300px] overflow-y-auto pr-4">
                            @php $total = 0; @endphp
                            @foreach($cartItems as $item)
                                @php $total += $item->artwork->price * $item->quantity; @endphp
                                <div class="flex items-center gap-6 bg-white p-4 rounded shadow-sm border border-gray-100">
                                    <div class="w-20 h-20 bg-gray-50 rounded flex items-center justify-center overflow-hidden">
                                        <img src="{{ asset('images/' . $item->artwork->image) }}" class="max-w-full max-h-full object-contain">
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900">{{ $item->artwork->title }}</h4>
                                        <p class="text-xs text-gray-500 italic">Qty: {{ $item->quantity }} • ${{ number_format($item->artwork->price) }} each</p>
                                    </div>
                                    <p class="text-lg font-bold text-gray-900">${{ number_format($item->artwork->price * $item->quantity) }}</p>
                                </div>
                            @endforeach
                        </div>

                        <div class="pt-8 border-t border-gray-200 flex flex-col items-center">
                            <div class="w-full max-w-md space-y-3 mb-8">
                                <div class="flex justify-between text-gray-500 font-medium">
                                    <span>Valuation Subtotal</span>
                                    <span>${{ number_format($total) }}</span>
                                </div>
                                <div class="flex justify-between text-gray-500 font-medium">
                                    <span>Shipping & Handling</span>
                                    <span class="text-green-600">Free</span>
                                </div>
                                <div class="flex justify-between items-end pt-4 border-t border-gray-200">
                                    <span class="text-xl font-bold text-gray-900">Final Total</span>
                                    <span class="text-4xl font-bold text-gray-900">${{ number_format($total) }}</span>
                                </div>
                            </div>

                            <button type="submit" class="w-full max-w-md bg-black text-white py-6 rounded-lg font-bold text-lg hover:bg-gray-800 transition shadow-2xl">
                                Finalize Collection Purchase
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
