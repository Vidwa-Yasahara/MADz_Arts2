<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Manage Orders</h1>
        <div class="bg-white dark:bg-ash-900 rounded-lg shadow border border-gray-100 dark:border-ash-800 overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 dark:bg-ash-800 text-xs uppercase text-gray-500 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Customer</th>
                        <th class="px-6 py-3">Total</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Date</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-ash-800">
                    @foreach($orders as $order)
                        <tr class="text-gray-700 dark:text-gray-300">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">#{{ $order->id }}</td>
                            <td class="px-6 py-4 text-sm">{{ $order->user->name }}</td>
                            <td class="px-6 py-4 text-sm font-bold text-gray-900 dark:text-white">${{ number_format($order->total, 2) }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span class="px-2 py-1 rounded text-xs font-bold {{ $order->status === 'paid' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('orders.show', $order) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 font-bold">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4 bg-white dark:bg-ash-900 border-t border-gray-100 dark:border-ash-800">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
