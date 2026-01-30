<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Active Carts</h1>
        <div class="bg-white rounded-lg shadow border overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-xs uppercase text-gray-400">
                    <tr>
                        <th class="px-6 py-3">User</th>
                        <th class="px-6 py-3">Artwork</th>
                        <th class="px-6 py-3">Quantity</th>
                        <th class="px-6 py-3">Subtotal</th>
                        <th class="px-6 py-3">Added</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach($carts as $cart)
                        <tr>
                            <td class="px-6 py-4 text-sm font-bold">{{ $cart->user->name }}</td>
                            <td class="px-6 py-4 text-sm">{{ $cart->artwork->title }}</td>
                            <td class="px-6 py-4 text-sm">{{ $cart->quantity }}</td>
                            <td class="px-6 py-4 text-sm">${{ number_format($cart->artwork->price * $cart->quantity, 2) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $cart->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4">
                {{ $carts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
