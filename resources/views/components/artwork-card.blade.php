@props(['artwork'])

<div class="group relative bg-gray-100 dark:bg-ash-900 rounded-3xl p-3 border border-gray-200 dark:border-ash-800 hover:border-gray-300 dark:hover:border-ash-700 transition-all duration-300 shadow-sm">
    <a href="{{ route('artworks.show', $artwork) }}" class="block">
        <!-- Image Container -->
        <div class="relative aspect-[3/4] overflow-hidden rounded-2xl mb-4">
            @if($artwork->image)
                <img src="{{ asset('images/' . $artwork->image) }}" 
                     alt="{{ $artwork->title }}"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @else
                <div class="w-full h-full flex items-center justify-center bg-gray-200 dark:bg-ash-800">
                    <svg class="w-20 h-20 text-gray-400 dark:text-ash-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            @endif
        </div>
        
        <!-- Info Section - Text adapts to light/dark mode -->
        <div class="px-2 pb-2 text-center">
            <p class="text-[9px] tracking-[0.3em] text-gray-500 dark:text-ash-400 uppercase mb-2 font-semibold">COLLECTION</p>
            
            <h3 class="font-serif text-xl font-bold text-gray-900 dark:text-white mb-1 leading-tight">
                {{ $artwork->title }}
            </h3>
            
            @if($artwork->artist)
                <p class="text-sm text-gray-600 dark:text-ash-300 italic mb-2">
                    by {{ $artwork->artist }}
                </p>
            @endif
            
            @if($artwork->price)
                <p class="text-base font-bold text-gray-900 dark:text-white">
                    ${{ number_format($artwork->price) }}
                </p>
            @endif
        </div>
    </a>
</div>
