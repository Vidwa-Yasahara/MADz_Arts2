<x-app-layout>
    <!-- Hero Section -->
    <section class="relative h-[60vh] sm:h-[70vh] md:h-[80vh] flex items-center justify-center text-center px-4 sm:px-6">
      <!-- Background image -->
       <div class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('https://images.unsplash.com/photo-1547891654-e66ed7ebb968?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');"></div>

      <!-- Dark overlay -->
      <div class="absolute inset-0 bg-black/60"></div>

      <!-- Content -->
      <div class="relative z-10 mx-auto text-white max-w-2xl sm:max-w-4xl">
        <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold font-serif leading-[1.1] mb-6 sm:mb-8 tracking-tight drop-shadow-lg">
          Discover Exceptional Art from<br class="hidden sm:block">Talented Artists
        </h1>
        <p class="text-lg sm:text-xl text-gray-100 mb-4 sm:mb-6 font-light max-w-2xl mx-auto drop-shadow-md">
          Transform your space with our carefully curated collection of original
          artworks and paintings from emerging and established artists worldwide.
        </p>
        <p class="text-gray-200 mb-8 sm:mb-10 font-light max-w-xl mx-auto drop-shadow-sm">
          Each piece tells a unique story and brings character to your home or office.
        </p>
        <p class="text-xs font-bold tracking-[0.2em] uppercase text-white/80 mb-8 sm:mb-12">
          Free shipping on orders over $3000 • Authentication guaranteed
        </p>
        <a href="{{ route('artworks.index') }}"
           class="inline-flex items-center gap-3 px-8 py-4 bg-white text-black font-bold uppercase tracking-widest text-sm hover:bg-black hover:text-white transition-all duration-300 rounded-full shadow-2xl hover:shadow-xl hover:scale-105">
          Explore Collection
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
          </svg>
        </a>
      </div>
    </section>

    <!-- Featured Collections -->
    <section class="px-4 sm:px-6 py-12 sm:py-16 dark:bg-ash-900 transition-colors duration-300">
      <div class="mb-16 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-black dark:text-ash-100 tracking-tight mb-4 font-serif">Featured Collections</h2>
        <p class="text-gray-400 font-light tracking-widest uppercase text-xs italic">
          Handpicked masterpieces from our most talented artists
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12 max-w-7xl mx-auto">
                @foreach($featuredArtworks as $artwork)
                    <div class="h-full">
                        <x-artwork-card :artwork="$artwork" />
                    </div>
                @endforeach
      </div>

      <div class="text-center mt-8 sm:mt-10">
        <a href="{{ route('artworks.index') }}"
           class="inline-block border px-5 py-2 rounded hover:bg-gray-100 dark:border-ash-700 dark:hover:bg-ash-800 dark:text-ash-100 transition">
          Explore All Artworks
        </a>
      </div>
    </section>

    <!-- Why Choose Us -->
    <section class="bg-ash-100 dark:bg-ash-800 py-12 sm:py-16 transition-colors duration-300">
      <h2 class="text-3xl sm:text-4xl font-bold font-serif text-center mb-3 sm:mb-4 text-black dark:text-ash-50">
        Why Art Collectors Choose Us?
      </h2>
      <p class="text-center text-gray-500 dark:text-ash-300 mb-8 sm:mb-10">
        We're committed to providing the finest art collecting experience
      </p>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto px-4 sm:px-6 text-center md:text-left">
        <div>
          <h3 class="font-semibold dark:text-ash-100">Authenticity Guaranteed</h3>
          <p class="text-sm text-gray-500 dark:text-ash-400">
            Every artwork comes with a certificate of authenticity and detailed provenance.
          </p>
        </div>
        <div>
          <h3 class="font-semibold dark:text-ash-100">Expert Curation</h3>
          <p class="text-sm text-gray-500 dark:text-ash-400">
            Our team of art experts carefully selects each piece for quality and artistic merit.
          </p>
        </div>
        <div>
          <h3 class="font-semibold dark:text-ash-100">Secure Packaging</h3>
          <p class="text-sm text-gray-500 dark:text-ash-400">
            Professional packaging and insured shipping ensure your artwork arrives safely.
          </p>
        </div>
        <div>
          <h3 class="font-semibold dark:text-ash-100">Customer Support</h3>
          <p class="text-sm text-gray-500 dark:text-ash-400">
            Our knowledgeable team is here to help you find the perfect piece for your space.
          </p>
        </div>
      </div>
    </section>
</x-app-layout>
