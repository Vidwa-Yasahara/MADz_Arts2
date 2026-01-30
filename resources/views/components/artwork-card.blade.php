@props(['artwork'])

<div class="group relative flex flex-col h-full bg-white dark:bg-ash-900 rounded-[2rem] p-3 transition-all duration-500 hover:shadow-[0_20px_40px_rgba(0,0,0,0.08)] hover:-translate-y-2 border border-ash-100/50 dark:border-ash-800">
    <!-- Image Section -->
    <div class="relative aspect-[3/4] overflow-hidden rounded-[1.5rem] bg-ash-50 dark:bg-ash-800">
        @if($artwork->image)
            <img src="{{ asset('images/' . $artwork->image) }}" 
                 alt="{{ $artwork->title }}" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                 loading="lazy">
        @else
            <div class="w-full h-full flex items-center justify-center text-gray-300 dark:text-ash-600">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        @endif

        <!-- Floating Action Button (Appears on Hover) -->
        <div class="absolute bottom-4 right-4 translate-y-full opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out z-10">
            <a href="{{ route('artworks.show', $artwork) }}" 
               class="flex items-center justify-center w-12 h-12 bg-white text-black dark:bg-ash-800 dark:text-white rounded-full shadow-lg hover:bg-black hover:text-white dark:hover:bg-ash-700 transition-colors duration-300">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>

        <!-- Sold Badge -->
        @if($artwork->is_sold)
            <div class="absolute top-4 left-4">
                <span class="inline-flex px-3 py-1 bg-white/90 dark:bg-black/90 backdrop-blur-md text-black dark:text-white text-[10px] font-bold uppercase tracking-widest rounded-full shadow-sm">
                    Sold
                </span>
            </div>
        @endif
    </div>

    <!-- Content Section -->
    <div class="pt-5 px-2 pb-2 flex-grow flex flex-col text-center">
        <!-- Collection/Medium Tag -->
        <p class="text-[10px] font-bold tracking-[0.2em] text-gray-400 dark:text-ash-500 uppercase mb-3">
            {{ $artwork->medium ?? 'Collection' }}
        </p>

        <!-- Title -->
        <h3 class="font-serif text-2xl text-gray-900 dark:text-white group-hover:text-black dark:group-hover:text-ash-200 transition-colors duration-300 mb-1 leading-tight">
            {{ $artwork->title }}
        </h3>
        
        <!-- Artist -->
        <p class="text-xs text-gray-500 dark:text-ash-400 font-light italic mb-4">
            by {{ $artwork->artist }}
        </p>

        <!-- Price -->
        <div class="mt-auto pt-4 border-t border-gray-100 dark:border-ash-800 border-dashed w-full max-w-[50%] mx-auto">
            <p class="font-medium text-lg text-gray-900 dark:text-ash-100">
                ${{ number_format($artwork->price) }}
            </p>
        </div>
    </div>
</div>
