<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Manage Orders</h1>
        <div class="bg-white rounded-lg shadow border overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Customer</th>
                        <th class="px-6 py-3">Total</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Date</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($orders as $order)
                        <tr>
                            <td class="px-6 py-4 text-sm">#{{ $order->id }}</td>
                            <td class="px-6 py-4 text-sm">{{ $order->user->name }}</td>
                            <td class="px-6 py-4 text-sm font-bold">${{ number_format($order->total, 2) }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span class="px-2 py-1 rounded text-xs font-bold {{ $order->status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('orders.show', $order) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
