@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-16']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit="{{ $submit }}">
            <div class="px-8 py-8 bg-white glass border border-white/40 shadow-2xl rounded-3xl overflow-hidden">
                <div class="grid grid-cols-6 gap-8">
                    {{ $form }}
                </div>

                @if (isset($actions))
                    <div class="flex items-center justify-end pt-8 mt-8 border-t border-black/5 text-end">
                        {{ $actions }}
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>
