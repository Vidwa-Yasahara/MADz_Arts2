<x-guest-layout>
    <div class="text-center mb-10">
        <a href="{{ route('home') }}" class="inline-block transform transition hover:scale-105 duration-300">
            <img src="{{ asset('images/logo1.png') }}" alt="MADz Arts" class="h-16 w-auto mx-auto mb-4">
        </a>
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Reset Password</h2>
        <p class="text-gray-500 mt-2 text-sm font-medium">Recover access to your art collection</p>
    </div>

    <div class="mb-8 text-sm text-gray-600 text-center px-4">
        Enter your email to receive a password reset link.
    </div>

    @session('status')
        <div class="mb-4 font-medium text-sm text-green-700 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-sm">
            {{ $value }}
        </div>
    @endsession

    <x-validation-errors class="mb-4 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-r-lg shadow-sm" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="space-y-6">
            <div>
                <label for="email" class="block font-semibold text-sm text-gray-700 mb-1">{{ __('Email') }}</label>
                <input id="email" class="block w-full bg-gray-50 border border-gray-300 focus:border-black focus:ring-black focus:ring-2 focus:ring-offset-1 rounded-lg shadow-sm text-gray-900 placeholder-gray-400 py-2.5 px-4 transition duration-200" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@example.com" />
            </div>

            <button class="w-full bg-black hover:bg-gray-800 text-white font-bold py-3.5 px-4 rounded-lg shadow-md hover:shadow-lg transform transition hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900" type="submit">
                {{ __('Email Password Reset Link') }}
            </button>
            
            <div class="text-center pt-2">
                <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-600 hover:text-black transition flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Login
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
