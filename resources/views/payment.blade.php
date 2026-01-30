<x-app-layout>
    <div class="pt-32 pb-24 min-h-screen flex items-center justify-center bg-[#FDFDFD] px-4">
        <div class="max-w-xl w-full">
            <div class="relative p-12 md:p-20 bg-white border border-black/5 shadow-2xl rounded-3xl overflow-hidden text-center space-y-12 animate-fade-in">
                <!-- Background Accent -->
                <div class="absolute top-0 left-0 w-full h-1 bg-black"></div>
                
                <div class="space-y-4">
                    <span class="text-[10px] font-bold text-gray-300 uppercase tracking-[0.5em] block">Secure Transfer</span>
                    <h1 class="text-3xl font-bold text-black uppercase tracking-tighter">Establishing Secure Connection</h1>
                    <div class="w-12 h-px bg-black mx-auto opacity-10"></div>
                </div>

                <div class="space-y-8">
                    <div class="p-8 bg-gray-50/50 space-y-6">
                        <div class="flex justify-between items-center text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                            <span>Reference</span>
                            <span class="text-black">#{{ $order->id }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Valuation</span>
                            <span class="text-2xl font-serif italic text-black font-light">${{ number_format($order->total) }}</span>
                        </div>
                    </div>

                    <div class="flex flex-col items-center gap-6">
                        <div class="flex items-center gap-4">
                             <svg class="h-6 text-[#635BFF]" viewBox="0 0 40 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M34.9 14.9C34.9 10.5 31.3 6.9 26.9 6.9H13.1C8.7 6.9 5.1 10.5 5.1 14.9V25.1C5.1 29.5 8.7 33.1 13.1 33.1H26.9C31.3 33.1 34.9 29.5 34.9 25.1V14.9Z"/>
                             </svg>
                             <span class="text-[11px] font-bold text-black uppercase tracking-[0.3em]">Encrypted Stripe Gateway</span>
                        </div>
                        
                        <a href="{{ $checkout_url }}" class="group relative w-full bg-black text-white py-6 text-[12px] font-bold uppercase tracking-[0.4em] transition-all hover:bg-gray-900 overflow-hidden">
                             <span class="relative z-10 transition-transform group-hover:-translate-y-1 block">Begin Payment Securely</span>
                             <div class="absolute inset-0 bg-white/5 translate-y-full transition-transform group-hover:translate-y-0"></div>
                        </a>
                    </div>
                </div>

                <p class="text-[9px] text-gray-300 uppercase tracking-widest leading-relaxed">
                    You are being transitioned to a secure environment <br> to complete the financial record of your acquisition.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
