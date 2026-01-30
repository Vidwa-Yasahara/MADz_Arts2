<x-app-layout>
  <!-- Main content -->
  <main class="flex-1 bg-white">
    <!-- Hero Section -->
    <section class="relative px-6 py-24 sm:py-32 lg:py-40 text-center bg-gradient-to-b from-ash-50 to-white dark:from-ash-900 dark:to-black transition-colors duration-300">
      <div class="max-w-4xl mx-auto">
        <p class="text-xs font-bold tracking-[0.3em] uppercase mb-8 text-gray-400 dark:text-ash-400">Since 2025</p>
        <h1 class="font-serif text-5xl sm:text-7xl lg:text-8xl font-black text-black dark:text-white leading-[0.9] mb-12 tracking-tighter">
          Curating the<br>Exceptional.
        </h1>
        <p class="text-xl text-gray-500 dark:text-ash-300 font-light max-w-2xl mx-auto leading-relaxed">
          We bridge the gap between visionary artists and passionate collectors, believing that every space deserves a masterpiece.
        </p>
      </div>
    </section>

    <!-- Core Values - Minimalist Grid -->
    <section class="px-6 pb-24 sm:pb-32 dark:bg-black transition-colors duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-px bg-ash-200 dark:bg-ash-800 border border-ash-200 dark:border-ash-800">
                <!-- Authenticity -->
                <div class="bg-white dark:bg-ash-900 p-12 hover:bg-gray-50 dark:hover:bg-ash-800 transition duration-500 group">
                    <span class="block text-4xl mb-6 text-gray-300 dark:text-ash-600 group-hover:text-black dark:group-hover:text-white transition duration-500">01</span>
                    <h3 class="font-serif text-2xl font-bold mb-4 dark:text-white">Authenticity</h3>
                    <p class="text-sm text-gray-500 dark:text-ash-400 leading-relaxed">Verified quality and provenance for every single piece in our collection.</p>
                </div>
                
                <!-- Community -->
                <div class="bg-white dark:bg-ash-900 p-12 hover:bg-gray-50 dark:hover:bg-ash-800 transition duration-500 group">
                    <span class="block text-4xl mb-6 text-gray-300 dark:text-ash-600 group-hover:text-black dark:group-hover:text-white transition duration-500">02</span>
                    <h3 class="font-serif text-2xl font-bold mb-4 dark:text-white">Community</h3>
                    <p class="text-sm text-gray-500 dark:text-ash-400 leading-relaxed">Fostering connections between creators and art enthusiasts worldwide.</p>
                </div>

                <!-- Excellence -->
                <div class="bg-white dark:bg-ash-900 p-12 hover:bg-gray-50 dark:hover:bg-ash-800 transition duration-500 group">
                    <span class="block text-4xl mb-6 text-gray-300 dark:text-ash-600 group-hover:text-black dark:group-hover:text-white transition duration-500">03</span>
                    <h3 class="font-serif text-2xl font-bold mb-4 dark:text-white">Excellence</h3>
                    <p class="text-sm text-gray-500 dark:text-ash-400 leading-relaxed">Uncompromising standards in curation, presentation, and service.</p>
                </div>

                <!-- Passion -->
                <div class="bg-white dark:bg-ash-900 p-12 hover:bg-gray-50 dark:hover:bg-ash-800 transition duration-500 group">
                    <span class="block text-4xl mb-6 text-gray-300 dark:text-ash-600 group-hover:text-black dark:group-hover:text-white transition duration-500">04</span>
                    <h3 class="font-serif text-2xl font-bold mb-4 dark:text-white">Passion</h3>
                    <p class="text-sm text-gray-500 dark:text-ash-400 leading-relaxed">Driven by an endless love for exceptional creative expression.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Story Section -->
    <section class="bg-black text-white px-6 py-24 sm:py-32">
      <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-16 md:gap-24">
        <div class="w-full md:w-1/2">
            <div class="relative aspect-square overflow-hidden rounded-full border border-white/20">
                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Founder" class="w-full h-full object-cover grayscale hover:grayscale-0 transition duration-700">
            </div>
        </div>
        
        <div class="w-full md:w-1/2">
            <h2 class="font-serif text-4xl md:text-5xl font-bold mb-8 leading-tight">From a Vision directly to Your Wall.</h2>
            <div class="space-y-6 text-gray-400 font-light text-lg">
                <p>
                    Founded in 2025, MADz Arts began as a passion project to disrupt the traditional gallery model. We wanted to create a space that felt accessible yet undeniably premium.
                </p>
                <p>
                    What started as a small personal vision by our founder, <span class="text-white font-serif italic">Mr. Ben Dover</span>, has evolved into a global destination for contemporary art.
                </p>
            </div>
            
            <div class="mt-12">
                <a href="{{ route('artworks.index') }}" class="inline-block border border-white px-8 py-4 text-sm font-bold uppercase tracking-widest hover:bg-white hover:text-black transition duration-300">
                    View Collection
                </a>
            </div>
        </div>
      </div>
    </section>
  </main>
</x-app-layout>
