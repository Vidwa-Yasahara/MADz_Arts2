<x-app-layout>
    <div class="pt-32 pb-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-20 flex flex-col md:flex-row md:items-end justify-between gap-8">
            <div class="space-y-4">
                <a href="{{ route('orders.index') }}" class="group inline-flex items-center text-[10px] font-bold text-gray-400 hover:text-black uppercase tracking-[0.4em] transition-all mb-4">
                    <svg class="w-3 h-3 mr-2 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Archive
                </a>
                <h1 class="text-4xl md:text-5xl font-bold text-black tracking-tighter uppercase leading-tight">Acquisition Overview</h1>
                <p class="text-[10px] text-gray-300 uppercase tracking-[0.3em] font-medium">Record ID: #{{ $order->id }} • Logged on {{ $order->created_at->format('M d, Y') }}</p>
            </div>
            
            <div class="flex items-center gap-6">
                <span class="px-8 py-3 text-[10px] font-bold uppercase tracking-[0.5em] rounded-full border
                    {{ $order->status === 'paid' ? 'bg-black text-white border-black' : 'bg-white text-gray-300 border-black/5 shadow-inner' }}">
                    {{ $order->status }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-32">
            <!-- Items Collection -->
            <div class="lg:col-span-7 space-y-24">
                <div class="space-y-12">
                     <h2 class="text-[11px] font-bold text-black uppercase tracking-[0.4em] border-b border-black pb-4">Acquired Pieces</h2>
                     <div class="divide-y divide-black/5">
                        @foreach($order->orderItems as $item)
                            <div class="py-12 flex flex-col sm:flex-row items-center gap-12 group">
                                <div class="relative w-32 aspect-[4/5] bg-gray-50 border border-black/5 overflow-hidden transition-all duration-700 group-hover:-translate-y-1">
                                    <img src="{{ asset('images/' . $item->artwork->image) }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 space-y-2 text-center sm:text-left">
                                    <h3 class="font-bold text-lg text-black uppercase tracking-tight">{{ $item->artwork->title }}</h3>
                                    <p class="text-[10px] text-gray-400 font-medium uppercase tracking-[0.3em]">{{ $item->artwork->artist }}</p>
                                </div>
                                <div class="text-right space-y-2">
                                    <p class="text-[9px] font-medium text-gray-300 uppercase tracking-widest">{{ $item->quantity }} Piece(s) @ ${{ number_format($item->price) }}</p>
                                    <p class="text-2xl font-serif italic text-black font-light leading-none">${{ number_format($item->quantity * $item->price) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="space-y-12">
                     <h2 class="text-[11px] font-bold text-black uppercase tracking-[0.4em] border-b border-black pb-4">Logistics Sanctuary</h2>
                     <div class="p-12 bg-[#F9F9F9] space-y-8">
                         <div class="space-y-4">
                            <p class="text-gray-500 font-light text-lg leading-relaxed lowercase first-letter:uppercase italic whitespace-pre-line">{{ $order->address }}</p>
                            <div class="h-px bg-black/5 w-12"></div>
                            <div class="flex items-center gap-4 text-[11px] text-gray-400 font-bold uppercase tracking-widest">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" /></svg>
                                <span>Encoded Contact: {{ $order->phone }}</span>
                            </div>
                         </div>
                     </div>
                </div>
            </div>

            <!-- Portfolio Valuation -->
            <div class="lg:col-span-5">
                <div class="p-12 md:p-20 bg-white border border-black/5 shadow-2xl rounded-3xl sticky top-32 space-y-12">
                    <h2 class="text-[10px] font-bold text-black uppercase tracking-[0.5em] text-center">Portfolio Valuation</h2>
                    <div class="w-12 h-px bg-black mx-auto opacity-10"></div>
                    
                    <div class="space-y-8">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-gray-400 uppercase tracking-widest">Cumulative Subtotal</span>
                            <span class="text-black font-bold">${{ number_format($order->total) }}</span>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-gray-400 uppercase tracking-widest font-medium">Logistics (Insured)</span>
                            <span class="text-black/20 font-bold uppercase text-[9px] tracking-widest italic">Included</span>
                        </div>
                        <div class="pt-12 border-t border-black/5 flex justify-between items-end">
                            <span class="text-[11px] font-bold text-black uppercase tracking-[0.3em]">Total Value</span>
                            <span class="text-5xl font-light font-serif italic text-black tracking-tighter leading-none">${{ number_format($order->total) }}</span>
                        </div>
                    </div>

                    <div class="pt-12 text-center border-t border-black/5">
                        <p class="text-[9px] text-gray-300 uppercase tracking-widest mb-6">Financial record secured via</p>
                         <svg class="h-5 text-gray-200 mx-auto" viewBox="0 0 40 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M34.9 14.9C34.9 10.5 31.3 6.9 26.9 6.9H13.1C8.7 6.9 5.1 10.5 5.1 14.9V25.1C5.1 29.5 8.7 33.1 13.1 33.1H26.9C31.3 33.1 34.9 29.5 34.9 25.1V14.9Z"/>
                         </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
