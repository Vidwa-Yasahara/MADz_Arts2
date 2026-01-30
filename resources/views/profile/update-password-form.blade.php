<div x-data="{ showSuccess: false }" 
     x-on:saved.window="showSuccess = true; setTimeout(() => showSuccess = false, 5000)">
    
    <!-- Success Banner -->
    <div x-show="showSuccess" 
         x-transition 
         class="mb-6 p-4 rounded-lg bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 flex items-center gap-3">
        <div class="flex-shrink-0 text-green-500 dark:text-green-400">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div>
            <p class="font-bold text-sm text-green-700 dark:text-green-300">
                Success
            </p>
            <p class="text-sm text-green-600 dark:text-green-400">
                Your password has been successfully changed.
            </p>
        </div>
        <button @click="showSuccess = false" class="ml-auto text-green-500 hover:text-green-700 dark:hover:text-green-300">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <form wire:submit="updatePassword">
        <div class="space-y-6">
            <div>
                <x-label for="current_password" value="{{ __('Current Password') }}" class="dark:text-ash-400" />
                <x-input id="current_password" type="password" class="mt-1 block w-full dark:bg-black dark:border-ash-700 dark:text-white dark:focus:border-white" wire:model="state.current_password" autocomplete="current-password" />
                <x-input-error for="current_password" class="mt-2" bag="updatePassword" />
            </div>

            <div>
                <x-label for="password" value="{{ __('New Password') }}" class="dark:text-ash-400" />
                <x-input id="password" type="password" class="mt-1 block w-full dark:bg-black dark:border-ash-700 dark:text-white dark:focus:border-white" wire:model="state.password" autocomplete="new-password" />
                <x-input-error for="password" class="mt-2" bag="updatePassword" />
            </div>

            <div>
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="dark:text-ash-400" />
                <x-input id="password_confirmation" type="password" class="mt-1 block w-full dark:bg-black dark:border-ash-700 dark:text-white dark:focus:border-white" wire:model="state.password_confirmation" autocomplete="new-password" />
                <x-input-error for="password_confirmation" class="mt-2" bag="updatePassword" />
            </div>
        </div>

        <div class="flex items-center justify-end mt-6 gap-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-black dark:bg-white border border-transparent rounded-full font-semibold text-xs text-white dark:text-black uppercase tracking-widest hover:bg-gray-800 dark:hover:bg-gray-200 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                {{ __('Save Password') }}
            </button>
        </div>
    </form>
</div>
