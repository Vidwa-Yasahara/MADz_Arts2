<x-guest-layout>
    <div class="text-center mb-8">
        <a href="{{ route('home') }}" class="inline-block transform transition hover:scale-105 duration-300">
            <img src="{{ asset('images/logo1.png') }}" alt="MADz Arts" class="h-16 w-auto mx-auto mb-4">
        </a>
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Create Account</h2>
        <p class="text-gray-500 mt-2 text-sm font-medium">Join our exclusive community of art lovers</p>
    </div>

    <x-validation-errors class="mb-4 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-r-lg shadow-sm" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="space-y-5">
            <div>
                <label for="name" class="block font-semibold text-sm text-gray-700 mb-1">{{ __('Name') }}</label>
                <input id="name" class="block w-full bg-gray-50 border border-gray-300 focus:border-black focus:ring-black focus:ring-2 focus:ring-offset-1 rounded-lg shadow-sm text-gray-900 placeholder-gray-400 py-2.5 px-4 transition duration-200" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
            </div>

            <div>
                <label for="email" class="block font-semibold text-sm text-gray-700 mb-1">{{ __('Email') }}</label>
                <input id="email" class="block w-full bg-gray-50 border border-gray-300 focus:border-black focus:ring-black focus:ring-2 focus:ring-offset-1 rounded-lg shadow-sm text-gray-900 placeholder-gray-400 py-2.5 px-4 transition duration-200" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@example.com" />
            </div>

            <div>
                <label for="password" class="block font-semibold text-sm text-gray-700 mb-1">{{ __('Password') }}</label>
                <div class="relative">
                    <input id="password" type="password" class="block w-full bg-gray-50 border border-gray-300 focus:border-black focus:ring-black focus:ring-2 focus:ring-offset-1 rounded-lg shadow-sm text-gray-900 placeholder-gray-400 py-2.5 px-4 pr-10 transition duration-200" name="password" required autocomplete="new-password" placeholder="Create a password" />
                    <button type="button" onclick="toggleRegisterPassword('password', this)" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg class="w-5 h-5 eye-open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg class="w-5 h-5 eye-closed hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
            </div>

            <div>
                <label for="password_confirmation" class="block font-semibold text-sm text-gray-700 mb-1">{{ __('Confirm Password') }}</label>
                <div class="relative">
                    <input id="password_confirmation" type="password" class="block w-full bg-gray-50 border border-gray-300 focus:border-black focus:ring-black focus:ring-2 focus:ring-offset-1 rounded-lg shadow-sm text-gray-900 placeholder-gray-400 py-2.5 px-4 pr-10 transition duration-200" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
                    <button type="button" onclick="toggleRegisterPassword('password_confirmation', this)" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg class="w-5 h-5 eye-open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg class="w-5 h-5 eye-closed hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
            </div>

            <script>
                function toggleRegisterPassword(inputId, button) {
                    const input = document.getElementById(inputId);
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    
                    const eyeOpen = button.querySelector('.eye-open');
                    const eyeClosed = button.querySelector('.eye-closed');
                    
                    if (type === 'text') {
                        eyeOpen.classList.add('hidden');
                        eyeClosed.classList.remove('hidden');
                    } else {
                        eyeOpen.classList.remove('hidden');
                        eyeClosed.classList.add('hidden');
                    }
                }
            </script>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <label for="terms" class="flex items-center group cursor-pointer">
                        <input id="terms" type="checkbox" name="terms" id="terms" class="rounded border-gray-300 text-black shadow-sm focus:ring-black transition ease-in-out duration-150" required />

                        <div class="ms-2 text-sm text-gray-500 group-hover:text-gray-800 transition">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="font-medium text-black hover:underline">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="font-medium text-black hover:underline">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </label>
                </div>
            @endif

            <button class="w-full bg-black hover:bg-gray-800 text-white font-bold py-3.5 px-4 rounded-lg shadow-md hover:shadow-lg transform transition hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900" type="submit">
                {{ __('Register') }}
            </button>

            <div class="text-center pt-2">
                <p class="text-sm text-gray-600">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="font-bold text-black hover:underline transition ml-1">
                        Log in
                    </a>
                </p>
            </div>
        </div>
    </form>
</x-guest-layout>
