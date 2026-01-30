<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
        <!-- User Friendly Back Button -->
        <a href="{{ route('home') }}" class="fixed top-8 left-8 z-[100] inline-flex items-center gap-2 px-5 py-2.5 bg-black border border-transparent rounded-full text-xs font-bold text-white uppercase tracking-widest hover:bg-gray-800 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7 7-7" />
            </svg>
            <span>Back to Gallery</span>
        </a>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative">

            <!-- Smart Texture Background -->
            <div class="absolute inset-0 z-0 opacity-[0.03]" style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 24px 24px;"></div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-2xl border border-gray-100 sm:rounded-2xl relative z-10 transition-all duration-300 hover:shadow-[0_20px_50px_rgba(8,_112,_184,_0.7)]">
                {{ $slot }}
            </div>
        </div>

        @livewireScripts
    </body>
</html>
