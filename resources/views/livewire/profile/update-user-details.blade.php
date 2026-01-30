<div>
    @if($isEditing)
        <form wire:submit="updateUserDetails">
            <div class="grid grid-cols-6 gap-6">
                <!-- Phone Base -->
                <div class="col-span-6 sm:col-span-6">
                    <x-label for="phone" value="{{ __('Phone Number') }}" class="dark:text-ash-400" />
                    <x-input id="phone" type="text" class="mt-1 block w-full dark:bg-black dark:border-ash-700 dark:text-white dark:focus:border-white" wire:model="phone" autocomplete="tel" />
                    <x-input-error for="phone" class="mt-2" />
                </div>

                <!-- Address -->
                <div class="col-span-6">
                    <x-label for="address" value="{{ __('Street Address') }}" class="dark:text-ash-400" />
                    <x-input id="address" type="text" class="mt-1 block w-full dark:bg-black dark:border-ash-700 dark:text-white dark:focus:border-white" wire:model="address" autocomplete="street-address" />
                    <x-input-error for="address" class="mt-2" />
                </div>

                <!-- City -->
                <div class="col-span-6 sm:col-span-3">
                    <x-label for="city" value="{{ __('City') }}" class="dark:text-ash-400" />
                    <x-input id="city" type="text" class="mt-1 block w-full dark:bg-black dark:border-ash-700 dark:text-white dark:focus:border-white" wire:model="city" autocomplete="address-level2" />
                    <x-input-error for="city" class="mt-2" />
                </div>

                <!-- Country -->
                <div class="col-span-6 sm:col-span-3">
                    <x-label for="country" value="{{ __('Country') }}" class="dark:text-ash-400" />
                    <x-input id="country" type="text" class="mt-1 block w-full dark:bg-black dark:border-ash-700 dark:text-white dark:focus:border-white" wire:model="country" autocomplete="country-name" />
                    <x-input-error for="country" class="mt-2" />
                </div>

                <!-- Postal Code -->
                <div class="col-span-6 sm:col-span-3">
                    <x-label for="postal_code" value="{{ __('Postal Code') }}" class="dark:text-ash-400" />
                    <x-input id="postal_code" type="text" class="mt-1 block w-full dark:bg-black dark:border-ash-700 dark:text-white dark:focus:border-white" wire:model="postal_code" autocomplete="postal-code" />
                    <x-input-error for="postal_code" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-6 gap-4">
                 <button type="button" wire:click="toggleEdit" class="inline-flex items-center px-4 py-2 bg-white dark:bg-transparent border border-gray-300 dark:border-ash-700 rounded-full font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-50 dark:hover:bg-ash-800 transition">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" wire:loading.attr="disabled" class="inline-flex items-center px-4 py-2 bg-black dark:bg-white border border-transparent rounded-full font-semibold text-xs text-white dark:text-black uppercase tracking-widest hover:bg-gray-800 dark:hover:bg-gray-200 transition">
                    {{ __('Save Details') }}
                </button>
            </div>
        </form>
    @else
        <div class="space-y-4">
            <!-- View Mode -->
             <div class="flex items-center justify-between">
                <div>
                     <span class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-1">Phone</span>
                     <span class="text-gray-900 dark:text-white">{{ $phone ?? 'Not set' }}</span>
                </div>
                <div>
                    <button wire:click="toggleEdit" class="text-xs text-indigo-600 dark:text-indigo-400 font-bold hover:underline">Edit</button>
                </div>
             </div>
             
             <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                 <div>
                     <span class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-1">Address</span>
                     <span class="text-gray-900 dark:text-white">{{ $address ?? 'Not set' }}</span>
                 </div>
                 
                 <div>
                     <span class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-1">City</span>
                     <span class="text-gray-900 dark:text-white">{{ $city ?? 'Not set' }}</span>
                 </div>

                 <div>
                     <span class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-1">Country</span>
                     <span class="text-gray-900 dark:text-white">{{ $country ?? 'Not set' }}</span>
                 </div>

                 <div>
                     <span class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-1">Postal Code</span>
                     <span class="text-gray-900 dark:text-white">{{ $postal_code ?? 'Not set' }}</span>
                 </div>
             </div>
             
             <div class="pt-4 mt-4 border-t border-gray-100 dark:border-ash-800">
                <button wire:click="toggleEdit" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-gray-500 hover:text-black dark:text-ash-400 dark:hover:text-white transition">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Edit Details
                </button>
             </div>
        </div>
    @endif
</div>
