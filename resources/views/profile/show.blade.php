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

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Profile & Security -->
                <div class="space-y-8">
                    <!-- Basic Info & Contact Details -->
                    <div class="bg-white dark:bg-ash-900 rounded-3xl p-8 shadow-sm border border-gray-100 dark:border-ash-800">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="h-16 w-16 rounded-full bg-ash-100 dark:bg-ash-800 flex items-center justify-center text-2xl">
                                🎨
                            </div>
                            <div>
                                <h3 class="font-bold text-xl text-gray-900 dark:text-white">{{ auth()->user()->name }}</h3>
                                <p class="text-sm text-gray-500 dark:text-ash-400">{{ auth()->user()->email }}</p>
                                
                                <button onclick="document.getElementById('passwordModal').showModal()" class="mt-2 text-xs font-bold uppercase tracking-widest text-indigo-600 dark:text-indigo-400 hover:underline">
                                    Change Password
                                </button>
                            </div>
                        </div>
                        
                        <hr class="border-gray-100 dark:border-ash-800 my-6">

                        <h4 class="font-bold text-gray-900 dark:text-white mb-4">Contact Details</h4>
                        @livewire('profile.update-user-details')
                    </div>

                    <!-- Password Modal (Native Dialog) -->
                    <dialog id="passwordModal" class="p-0 rounded-3xl backdrop:bg-black/50 dark:backdrop:bg-black/80 bg-transparent shadow-2xl">
                        <div class="bg-white dark:bg-ash-900 w-full max-w-lg p-8 rounded-3xl border border-gray-100 dark:border-ash-800">
                             <div class="flex justify-between items-center mb-6">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Update Password</h3>
                                <form method="dialog">
                                    <button class="text-gray-400 hover:text-red-500 transition">
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                    </button>
                                </form>
                             </div>
                             @livewire('profile.update-password-form')
                        </div>
                    </dialog>

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
