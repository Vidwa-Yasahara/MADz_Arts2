<x-app-layout>
    <div class="pt-32 pb-24 min-h-screen flex items-center justify-center bg-[#FDFDFD] px-4">
        <div class="max-w-2xl w-full">
            <div class="relative p-12 md:p-24 bg-white border border-black/5 shadow-2xl rounded-3xl overflow-hidden text-center space-y-12 animate-fade-in-up">
                <!-- Success Icon -->
                <div class="mx-auto w-24 h-24 bg-black text-white rounded-full flex items-center justify-center shadow-2xl animate-bounce-short">
                    <svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <div class="space-y-6">
                    <div class="space-y-2">
                        <span class="text-[10px] font-bold text-gray-300 uppercase tracking-[0.6em] block">Payment Successful</span>
                        <h1 class="text-4xl md:text-5xl font-bold text-black uppercase tracking-tighter">Order Confirmed</h1>
                    </div>
                    <div class="w-16 h-px bg-black mx-auto opacity-10"></div>
                    <p class="text-gray-400 font-light text-lg leading-relaxed max-w-md mx-auto">
                        Thank you for your purchase! Your order has been placed successfully. A confirmation email has been sent to you.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-8 pt-8">
                    <a href="{{ route('orders.index') }}" class="px-10 py-5 bg-black text-white text-[11px] font-bold uppercase tracking-[0.3em] hover:bg-gray-900 transition-all w-full sm:w-auto">
                        View Orders
                    </a>
                    <a href="{{ route('artworks.index') }}" class="px-10 py-5 border border-black/10 text-black text-[11px] font-bold uppercase tracking-[0.3em] hover:bg-gray-50 transition-all w-full sm:w-auto">
                        Continue Shopping
                    </a>
                </div>

                <p class="text-[9px] text-gray-300 uppercase tracking-widest">Mastering the transition from canvas to sanctuary.</p>
            </div>
        </div>
    </div>

    <style>
        @keyframes bounceShort {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-bounce-short {
            animation: bounceShort 3s ease-in-out infinite;
        }
    </style>
</x-app-layout>
