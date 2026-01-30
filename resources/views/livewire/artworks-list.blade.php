<div class="space-y-12">
    <!-- Search/Filter Bar -->
    <!-- Search & Filter Bar -->
    <div class="mb-12">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 bg-white dark:bg-ash-900 p-4 rounded-2xl shadow-sm border border-ash-200 dark:border-ash-800 transition-colors duration-300">
            <!-- Search -->
            <div class="w-full md:w-96 relative">
                 <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 dark:text-ash-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                 </div>
                 <input type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Search artworks..."
                        class="pl-10 w-full border-gray-200 dark:border-ash-700 rounded-xl focus:border-black dark:focus:border-white focus:ring-black dark:focus:ring-white bg-ash-50 dark:bg-ash-800 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-ash-500 transition-colors">
            </div>

            <!-- Category Filter -->
            <div class="w-full md:w-64">
                <select wire:model.live="category"
                        class="w-full border-gray-200 dark:border-ash-700 rounded-xl focus:border-black dark:focus:border-white focus:ring-black dark:focus:ring-white bg-ash-50 dark:bg-ash-800 text-gray-900 dark:text-white transition-colors">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="text-xs text-gray-400 dark:text-ash-400 uppercase tracking-widest font-light hidden lg:block">
                Showing {{ $artworks->total() }} masterpieces
            </div>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
            @forelse($artworks as $artwork)
                <div class="h-full" wire:key="artwork-{{ $artwork->id }}">
                    <x-artwork-card :artwork="$artwork" />
                </div>
            @empty
                <div class="col-span-full py-32 text-center">
                    <div class="mx-auto w-16 h-16 text-gray-200 mb-6 italic">
                        <svg class="w-full h-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-serif text-gray-900 mb-2">No masterpieces found</h3>
                    <p class="text-gray-400 font-light italic">Try adjusting your search to find what you're looking for.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-16 pb-12">
            {{ $artworks->links() }}
        </div>
    </div>
</div>
