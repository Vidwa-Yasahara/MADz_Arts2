<div class="md:col-span-1 flex justify-between">
    <div class="px-4 sm:px-0">
        <h3 class="text-2xl font-serif font-bold text-black dark:text-white tracking-tight">{{ $title }}</h3>

        <p class="mt-2 text-sm text-gray-500 dark:text-ash-400 font-light leading-relaxed">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
