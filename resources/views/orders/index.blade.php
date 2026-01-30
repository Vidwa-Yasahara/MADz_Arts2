<x-app-layout>
    <div class="pt-32 pb-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-24">
            <h1 class="text-4xl md:text-6xl font-bold text-black tracking-tighter uppercase mb-4">Acquisition Archive</h1>
            <p class="text-gray-400 font-light tracking-widest uppercase text-[10px] italic">A formal record of your curated collection and investment history</p>
        </div>

        @if($orders->count() > 0)
            <div class="space-y-8">
                @foreach($orders as $order)
                    <a href="{{ route('orders.show', $order) }}" class="group block bg-white border border-black/5 p-10 transition-all duration-700 hover:shadow-2xl">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-12">
                            <div class="flex items-center gap-10">
                                <div class="w-12 h-12 bg-black text-white flex items-center justify-center rounded-full text-xs font-bold uppercase tracking-widest shadow-xl group-hover:scale-110 transition-transform">
                                     #{{ $order->id }}
                                </div>
                                <div class="space-y-2">
                                    <p class="text-[11px] font-bold text-black uppercase tracking-[0.3em]">Acquisition Handshake</p>
                                    <p class="text-[10px] text-gray-300 uppercase tracking-widest font-medium">{{ $order->created_at->format('M d, Y') }} • {{ $order->orderItems->count() }} Piece(s)</p>
                                </div>
                            </div>

                            <div class="flex items-center justify-between md:justify-end gap-16 border-t md:border-t-0 pt-8 md:pt-0 border-black/5">
                                <div class="text-right">
                                    <p class="text-2xl font-serif italic text-black font-light leading-none">${{ number_format($order->total) }}</p>
                                    <p class="text-[9px] text-gray-300 uppercase tracking-widest mt-2">Valuation</p>
                                </div>
                                <div class="min-w-[120px] text-center">
                                    <span class="inline-block px-6 py-2 text-[9px] font-bold uppercase tracking-[0.3em] rounded-full border 
                                        {{ $order->status === 'paid' ? 'bg-black text-white border-black' : 'bg-white text-gray-300 border-black/5' }}">
                                        {{ $order->status }}
                                    </span>
                                </div>
                                <svg class="hidden md:block h-5 w-5 text-gray-200 group-hover:text-black group-hover:translate-x-2 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="py-48 text-center border border-dashed border-black/5 rounded-3xl space-y-8">
                <p class="text-gray-300 uppercase tracking-[0.4em] text-xs italic">No records found in the archive.</p>
                <a href="{{ route('artworks.index') }}" class="inline-block px-12 py-5 bg-black text-white text-[11px] font-bold uppercase tracking-[0.4em] hover:bg-gray-900 transition-all">
                    Initiate your collection
                </a>
            </div>
        @endif
    </div>
</x-app-layout>
