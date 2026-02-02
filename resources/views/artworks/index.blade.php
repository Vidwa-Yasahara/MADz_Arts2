<x-app-layout>
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16 dark:bg-black transition-colors duration-300">
        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-serif font-black text-black dark:text-white mb-6 tracking-tight">Our Collection</h1>
            <p class="text-lg text-gray-500 dark:text-ash-400 font-light max-w-2xl mx-auto">
                Explore our curated selection of fine art. Filter by category or search for specific pieces.
            </p>
        </div>

            
            <livewire:artworks-list />
        </div>
    </div>
</x-app-layout>
