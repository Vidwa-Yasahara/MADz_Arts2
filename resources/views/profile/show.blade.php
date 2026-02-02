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
                <div class="space-y-8 {{ auth()->user()->role === 'admin' ? 'lg:col-span-3' : '' }}">
                    <!-- Basic Info & Contact Details -->
                    <div class="bg-white dark:bg-ash-900 rounded-3xl p-8 shadow-sm border border-gray-100 dark:border-ash-800">
                        <div class="flex items-center gap-4 mb-6" wire:poll.5s>
                            <img src="{{ auth()->user()->fresh()->profile_photo_url }}" 
                                 alt="{{ auth()->user()->name }}" 
                                 class="h-16 w-16 rounded-full object-cover border-2 border-gray-200 dark:border-ash-700"
                                 key="{{ auth()->user()->updated_at }}">
                            <div class="flex-1">
                                <h3 class="font-bold text-xl text-gray-900 dark:text-white">{{ auth()->user()->name }}</h3>
                                <div class="flex items-center justify-between">
                                    <p class="text-sm text-gray-500 dark:text-ash-400">{{ auth()->user()->email }}</p>
                                    @if(auth()->user()->role === 'admin')
                                        <span class="px-2 py-1 text-xs bg-black text-white dark:bg-white dark:text-black font-bold rounded-full">ADMIN</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <hr class="border-gray-100 dark:border-ash-800 my-6">

                        <h4 class="font-bold text-gray-900 dark:text-white mb-4 border-b-2 border-ash-800 pb-1 inline-block">Contact Details</h4>
                        @livewire('profile.update-user-details')
                    </div>

                    @if(auth()->user()->role === 'admin')
                        <!-- Admin Shortcut -->
                        <div class="bg-black dark:bg-ash-800 rounded-3xl p-8 shadow-lg text-center">
                            <h3 class="font-serif text-2xl font-bold text-white mb-4">Administrator Access</h3>
                            <p class="text-gray-400 mb-6">You have administrative privileges. Manage the platform from the dashboard.</p>
                            <a href="{{ route('admin.dashboard') }}" class="inline-block bg-white text-black px-8 py-3 rounded-full font-bold hover:scale-105 transition transform">
                                Go to Admin Dashboard
                            </a>
                        </div>
                    @endif

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

                <!-- Right Column: Order History (Hidden for Admins) -->
                @if(auth()->user()->role !== 'admin')
                    <div class="lg:col-span-2">
                        <div class="bg-white dark:bg-ash-900 rounded-3xl p-8 shadow-sm border border-gray-100 dark:border-ash-800 h-full">
                            <h3 class="font-serif text-2xl font-bold text-gray-900 dark:text-white mb-6">Order History</h3>
                            @livewire('profile.order-history')
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
