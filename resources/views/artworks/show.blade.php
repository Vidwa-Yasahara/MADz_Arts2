<x-app-layout>
  <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:pt-24 dark:bg-black transition-colors duration-300">
    <div class="mb-12">
      <a href="{{ route('artworks.index') }}" class="group inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-gray-500 dark:text-ash-400 hover:text-black dark:hover:text-white transition">
        <span class="transform group-hover:-translate-x-1 transition-transform duration-300">←</span>
        Back to collection
      </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-24 items-start">
      <!-- Art image container -->
      <div class="lg:col-span-8">
        <div class="bg-white dark:bg-ash-900 rounded-[3rem] p-8 md:p-12 flex items-center justify-center min-h-[600px] shadow-sm hover:shadow-2xl transition-all duration-700 ease-out border border-ash-200 dark:border-ash-800 group relative overflow-hidden">
            <div class="absolute inset-0 bg-ash-50/50 dark:bg-ash-800/50 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
            <img src="{{ asset('images/' . $artwork->image) }}" alt="{{ $artwork->title }}" 
                 class="relative z-10 max-w-full max-h-[800px] object-contain shadow-2xl transform group-hover:scale-[1.02] transition-transform duration-700">
        </div>
      </div>

      <!-- Detail info card -->
      <div class="lg:col-span-4 flex flex-col h-full">
        <div class="sticky top-24 space-y-8">
            <div class="pb-8 border-b border-ash-200 dark:border-ash-700 border-dashed">
                <span class="inline-block px-3 py-1 mb-4 text-[10px] font-bold uppercase tracking-[0.2em] bg-ash-100 dark:bg-ash-800 text-gray-500 dark:text-ash-300 rounded-full">
                    {{ $artwork->category->name ?? 'Art' }}
                </span>
                <h1 class="text-5xl lg:text-6xl font-serif font-bold text-black dark:text-white mb-4 leading-none tracking-tight">{{ $artwork->title }}</h1>
                <p class="text-xl text-gray-400 font-light italic">by <span class="text-gray-900 dark:text-ash-200 border-b border-black/20 dark:border-white/20">{{ $artwork->artist }}</span></p>
            </div>

            <!-- Price & Action -->
            <div class="flex items-end justify-between">
                <div>
                     <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Price</p>
                     <p class="text-4xl font-serif font-black text-gray-900 dark:text-white">${{ number_format($artwork->price) }}</p>
                </div>
                <div class="mb-2">
                    @if(!auth()->check() || !auth()->user()->isAdmin())
                        <livewire:favorites-manager :artworkId="$artwork->id" />
                    @else
                        <a href="{{ route('admin.artworks.edit', $artwork) }}" 
                           class="inline-flex items-center px-4 py-2 bg-black dark:bg-white text-white dark:text-black text-xs font-bold uppercase tracking-widest rounded-full hover:bg-gray-800 dark:hover:bg-gray-200 transition shadow-sm">
                            Edit Item
                        </a>
                    @endif
                </div>
            </div>

            <div class="py-2">
                @if(!$artwork->is_sold)
                    @if(!auth()->check() || !auth()->user()->isAdmin())
                        <livewire:cart-manager :artwork="$artwork" />
                    @endif
                @else
                    <div class="w-full py-4 bg-ash-100 dark:bg-ash-800 text-gray-400 rounded-full text-center font-bold uppercase tracking-widest text-xs cursor-not-allowed">
                        Piece Sold
                    </div>
                @endif
            </div>

            <!-- Specs -->
            <div class="space-y-4 pt-4">
                 <div class="flex justify-between items-center py-3 border-b border-ash-100 dark:border-ash-800">
                    <span class="text-xs font-bold uppercase tracking-widest text-gray-400">Medium</span>
                    <span class="font-serif text-lg text-gray-900 dark:text-ash-200 italic">{{ $artwork->medium ?? 'Painting' }}</span>
                 </div>
                 <div class="flex justify-between items-center py-3 border-b border-ash-100 dark:border-ash-800">
                    <span class="text-xs font-bold uppercase tracking-widest text-gray-400">Dimensions</span>
                    <span class="font-serif text-lg text-gray-900 dark:text-ash-200 italic">{{ $artwork->dimensions ?? 'Varies' }}</span>
                 </div>
            </div>

            <!-- Description -->
            <div class="pt-8">
               <h3 class="font-bold text-black dark:text-white mb-4 flex items-center gap-2">
                    <span class="w-8 h-px bg-black dark:bg-white"></span>
                    About this piece
               </h3>
               <p class="text-gray-500 dark:text-ash-400 text-base leading-loose font-light whitespace-pre-line">
                  {{ $artwork->description }}
               </p>
            </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
