<x-app-layout>
    <div class="py-12 bg-gray-50 dark:bg-black min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-10">
                <h2 class="font-serif text-4xl font-bold text-gray-900 dark:text-white">
                    My Account
                </h2>
                <p class="mt-2 text-gray-500 dark:text-ash-400">
                    Manage your details and view your order history.
                </p>
            </div>

            @if (session('message'))
                <div class="mb-6 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl p-4">
                    <p class="text-green-800 dark:text-green-200 font-medium">✓ {{ session('message') }}</p>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Profile & Security -->
                <div class="space-y-8">
                    <!-- Basic Info & Contact Details -->
                <div class="bg-white dark:bg-ash-900 rounded-3xl p-8 shadow-sm border border-gray-100 dark:border-ash-800">
                        <div class="flex items-center gap-4 mb-6" wire:poll.5s>
                            <img src="{{ auth()->user()->fresh()->profile_photo_url }}" 
                                 alt="{{ auth()->user()->name }}" 
                                 class="h-16 w-16 rounded-full object-cover border-2 border-gray-200 dark:border-ash-700"
                                 key="{{ auth()->user()->updated_at }}">
                            <div>
                                <h3 class="font-bold text-xl text-gray-900 dark:text-white">{{ auth()->user()->name }}</h3>
                                <p class="text-sm text-gray-500 dark:text-ash-400">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        
                        <hr class="border-gray-100 dark:border-ash-800 my-6">

                        <h4 class="font-bold text-gray-900 dark:text-white mb-4 border-b-2 border-ash-800 pb-1 inline-block">Contact Details</h4>
                        @livewire('profile.update-user-details')
                    </div>

                     <!-- Logout -->
                    <div class="bg-white dark:bg-ash-900 rounded-3xl p-8 shadow-sm border border-gray-100 dark:border-ash-800">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full py-3 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 font-bold rounded-xl hover:bg-red-100 dark:hover:bg-red-900/30 transition">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Right Column: Order History -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-ash-900 rounded-3xl p-8 shadow-sm border border-gray-100 dark:border-ash-800 h-full">
                        <h3 class="font-serif text-2xl font-bold text-gray-900 dark:text-white mb-6">Order History</h3>
                        @livewire('profile.order-history')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
