<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Art Gallery') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:200,300,400,500,600,700|playfair-display:400,500,600,700,800,900&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script>
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
    </head>
    <body class="min-h-screen flex flex-col bg-ash-50 text-gray-900 font-sans antialiased">
        <x-banner />

        @include('partials.header')

        <!-- Page Content -->
        <main class="flex-1">
            {{ $slot }}
        </main>

        @include('partials.footer')

        @stack('modals')
        @livewireScripts
    </body>
</html>
