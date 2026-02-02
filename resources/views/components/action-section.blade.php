<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-16']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="px-8 py-8 bg-white glass border border-white/40 shadow-2xl rounded-3xl overflow-hidden">
            {{ $content }}
        </div>
    </div>
</div>
