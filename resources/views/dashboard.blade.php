<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-ash-900 overflow-hidden shadow-xl sm:rounded-lg border border-gray-200 dark:border-ash-800">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
