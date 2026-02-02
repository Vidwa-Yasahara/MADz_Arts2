<x-guest-layout>
    <div class="text-center mb-10">
        <a href="{{ route('home') }}" class="inline-block transform transition hover:scale-105 duration-300">
            <img src="{{ asset('images/logo1.png') }}" alt="MADz Arts" class="h-16 w-auto mx-auto mb-4">
        </a>
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Set New Password</h2>
        <p class="text-gray-500 mt-2 text-sm font-medium">Create a secure password for your account</p>
    </div>

    <x-validation-errors class="mb-4 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-r-lg shadow-sm" />

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="space-y-6">
            <!-- Hidden Email Field (Required by Backend) -->
            <input type="hidden" name="email" value="{{ $request->email }}">

            <div>
                <label for="password" class="block font-semibold text-sm text-gray-700 mb-1">{{ __('New Password') }}</label>
                <input id="password" class="block w-full bg-gray-50 border border-gray-300 focus:border-black focus:ring-black focus:ring-2 focus:ring-offset-1 rounded-lg shadow-sm text-gray-900 placeholder-gray-400 py-2.5 px-4 transition duration-200" type="password" name="password" required autocomplete="new-password" placeholder="New password" />
            </div>

            <div>
                <label for="password_confirmation" class="block font-semibold text-sm text-gray-700 mb-1">{{ __('Confirm New Password') }}</label>
                <input id="password_confirmation" class="block w-full bg-gray-50 border border-gray-300 focus:border-black focus:ring-black focus:ring-2 focus:ring-offset-1 rounded-lg shadow-sm text-gray-900 placeholder-gray-400 py-2.5 px-4 transition duration-200" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password" />
            </div>

            <button class="w-full bg-black hover:bg-gray-800 text-white font-bold py-3.5 px-4 rounded-lg shadow-md hover:shadow-lg transform transition hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900" type="submit">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
</x-guest-layout>
