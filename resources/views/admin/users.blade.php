<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-serif font-bold mb-8 text-black dark:text-white tracking-tight">Manage Users</h1>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white dark:bg-ash-900 rounded-2xl shadow-sm border border-gray-100 dark:border-ash-800 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-100 dark:border-ash-800">
                        <th class="px-8 py-6 text-xs font-bold text-gray-400 dark:text-gray-400 uppercase tracking-widest bg-gray-50/50 dark:bg-ash-800">Name</th>
                        <th class="px-8 py-6 text-xs font-bold text-gray-400 dark:text-gray-400 uppercase tracking-widest bg-gray-50/50 dark:bg-ash-800">Email</th>
                        <th class="px-8 py-6 text-xs font-bold text-gray-400 dark:text-gray-400 uppercase tracking-widest bg-gray-50/50 dark:bg-ash-800">Role</th>
                        <th class="px-8 py-6 text-xs font-bold text-gray-400 dark:text-gray-400 uppercase tracking-widest bg-gray-50/50 dark:bg-ash-800">Joined</th>
                        <th class="px-8 py-6 text-xs font-bold text-gray-400 dark:text-gray-400 uppercase tracking-widest bg-gray-50/50 dark:bg-ash-800">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-ash-800">
                    @foreach($users as $user)
                        <tr class="group hover:bg-gray-50 dark:hover:bg-ash-800 transition-colors duration-200">
                            <td class="px-8 py-5">
                                <span class="block text-sm font-bold text-gray-900 dark:text-white group-hover:text-black dark:group-hover:text-white">{{ $user->name }}</span>
                            </td>
                            <td class="px-8 py-5">
                                <span class="text-sm text-gray-500 dark:text-gray-300 group-hover:text-gray-700 dark:group-hover:text-white">{{ $user->email }}</span>
                            </td>
                            <td class="px-8 py-5">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->role === 'admin' ? 'bg-black text-white dark:bg-white dark:text-black' : 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-100' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <span class="text-sm text-gray-400 dark:text-gray-300 font-mono">{{ $user->created_at->format('M d, Y') }}</span>
                            </td>
                            <td class="px-8 py-5">
                                @if(auth()->id() !== $user->id)
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 font-bold text-xs uppercase tracking-wide">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-6 border-t border-gray-50 dark:border-ash-800 bg-white dark:bg-ash-900">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
