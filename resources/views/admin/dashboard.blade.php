<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Admin Dashboard</h1>
            <div class="flex gap-4">
                <a href="{{ route('admin.artworks.index') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition shadow-sm">Manage Artworks</a>
                <a href="{{ route('admin.users') }}" class="bg-white text-gray-900 border border-gray-300 dark:bg-ash-800 dark:text-white dark:border-ash-600 px-4 py-2 rounded hover:bg-gray-50 dark:hover:bg-ash-700 transition shadow-sm">Manage Users</a>
                <a href="{{ route('admin.orders') }}" class="bg-white text-gray-900 border border-gray-300 dark:bg-ash-800 dark:text-white dark:border-ash-600 px-4 py-2 rounded hover:bg-gray-50 dark:hover:bg-ash-700 transition shadow-sm">View Orders</a>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="bg-white dark:bg-ash-900 p-6 rounded-lg shadow border-l-4 border-blue-500 box-border">
                <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-1">Total Artworks</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['total_artworks'] }}</p>
            </div>
            <div class="bg-white dark:bg-ash-900 p-6 rounded-lg shadow border-l-4 border-green-500 box-border">
                <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-1">Total Revenue</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">${{ number_format($stats['total_revenue'], 2) }}</p>
            </div>
            <div class="bg-white dark:bg-ash-900 p-6 rounded-lg shadow border-l-4 border-purple-500 box-border">
                <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-1">Total Orders</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['total_orders'] }}</p>
            </div>
            <div class="bg-white dark:bg-ash-900 p-6 rounded-lg shadow border-l-4 border-yellow-500 box-border">
                <p class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-1">Total Users</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['total_users'] }}</p>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="bg-white dark:bg-ash-900 rounded-lg shadow border border-gray-100 dark:border-ash-800 overflow-hidden">
            <div class="p-4 border-b border-gray-100 dark:border-ash-800 bg-gray-50 dark:bg-ash-800">
                <h2 class="font-bold text-gray-900 dark:text-white">Recent Orders</h2>
            </div>
            <table class="w-full text-left">
                <thead class="bg-gray-50 dark:bg-ash-800 text-xs uppercase text-gray-500 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Customer</th>
                        <th class="px-6 py-3">Total</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-ash-800 text-gray-900 dark:text-gray-300">
                    @foreach($recentOrders as $order)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">#{{ $order->id }}</td>
                            <td class="px-6 py-4 text-sm">{{ $order->user->name }}</td>
                            <td class="px-6 py-4 text-sm font-bold text-gray-900 dark:text-white">${{ number_format($order->total, 2) }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-bold rounded-full {{ $order->status === 'paid' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $order->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
