<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-4xl font-serif font-bold mb-12 text-black tracking-tight">Manage Users</h1>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="px-8 py-6 text-xs font-bold text-gray-400 uppercase tracking-widest bg-gray-50/50">Name</th>
                        <th class="px-8 py-6 text-xs font-bold text-gray-400 uppercase tracking-widest bg-gray-50/50">Email</th>
                        <th class="px-8 py-6 text-xs font-bold text-gray-400 uppercase tracking-widest bg-gray-50/50">Role</th>
                        <th class="px-8 py-6 text-xs font-bold text-gray-400 uppercase tracking-widest bg-gray-50/50">Joined</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($users as $user)
                        <tr class="group hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-8 py-5">
                                <span class="block text-sm font-bold text-gray-900 group-hover:text-black">{{ $user->name }}</span>
                            </td>
                            <td class="px-8 py-5">
                                <span class="text-sm text-gray-500 group-hover:text-gray-700">{{ $user->email }}</span>
                            </td>
                            <td class="px-8 py-5">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->role === 'admin' ? 'bg-black text-white' : 'bg-gray-100 text-gray-600' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <span class="text-sm text-gray-400 font-mono">{{ $user->created_at->format('M d, Y') }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-6 border-t border-gray-50">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
