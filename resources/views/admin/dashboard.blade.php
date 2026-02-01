<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Admin Dashboard</h1>
            <div class="flex gap-4">
                <a href="{{ route('admin.artworks.index') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">Manage Artworks</a>
                <a href="{{ route('admin.orders') }}" class="bg-white text-gray-900 border border-gray-300 px-4 py-2 rounded hover:bg-gray-50">View Orders</a>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Total Artworks</p>
                <p class="text-2xl font-bold text-gray-900">{{ $stats['total_artworks'] }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-green-500">
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Total Revenue</p>
                <p class="text-2xl font-bold text-gray-900">${{ number_format($stats['total_revenue'], 2) }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-purple-500">
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Total Orders</p>
                <p class="text-2xl font-bold text-gray-900">{{ $stats['total_orders'] }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-yellow-500">
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-1">Total Users</p>
                <p class="text-2xl font-bold text-gray-900">{{ $stats['total_users'] }}</p>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="bg-white rounded-lg shadow border overflow-hidden">
            <div class="p-4 border-b bg-gray-50">
                <h2 class="font-bold text-gray-900">Recent Orders</h2>
            </div>
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Customer</th>
                        <th class="px-6 py-3">Total</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-gray-900">
                    @foreach($recentOrders as $order)
                        <tr>
                            <td class="px-6 py-4 text-sm">#{{ $order->id }}</td>
                            <td class="px-6 py-4 text-sm">{{ $order->user->name }}</td>
                            <td class="px-6 py-4 text-sm font-bold">${{ number_format($order->total, 2) }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-bold rounded-full {{ $order->status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $order->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
