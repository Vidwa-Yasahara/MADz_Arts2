<div class="bg-gray-100 p-8 rounded-lg shadow-inner">
    <div class="flex flex-col gap-6">
        <div class="text-center">
            <span class="text-xs text-gray-400 font-bold uppercase tracking-widest">Current Value</span>
            <p class="text-4xl font-bold text-gray-900 mt-1">${{ number_format($artwork->price) }}</p>
        </div>

        @auth
            <div class="flex flex-col gap-4">
                <div class="flex items-center justify-center gap-4 border border-gray-200 bg-white rounded p-2">
                    <button wire:click="decrement" class="px-4 py-1 text-gray-400 hover:text-black font-bold outline-none text-xl transition">-</button>
                    <span class="text-lg font-bold w-3 text-center">{{ $quantity }}</span>
                    <button wire:click="increment" class="px-4 py-1 text-gray-400 hover:text-black font-bold outline-none text-xl transition">+</button>
                </div>

                <div>
                    @if(auth()->check() && auth()->user()->details && auth()->user()->details->role === 'admin')
                        <!-- Admin cannot add to cart -->
                    @else
                        <button wire:click="addToCart"
                                class="w-full bg-black text-white px-8 py-4 rounded-full font-bold uppercase tracking-widest hover:bg-gray-800 transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                            Add to Cart
                        </button>
                    @endif
                </div>
            </div>

            @if (session()->has('message'))
                <div class="bg-green-100 text-green-700 p-4 rounded text-sm text-center font-bold">
                    {{ session('message') }}
                </div>
            @endif
        @else
            <a href="{{ route('login') }}" class="w-full bg-black text-white py-4 rounded text-center font-bold hover:bg-gray-800 transition">
                Login to Purchase
            </a>
        @endauth
    </div>
</div>
