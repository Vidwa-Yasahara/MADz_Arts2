<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Manage Artworks</h1>
            <a href="{{ route('admin.artworks.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Add New Artwork</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow border overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-6 py-3">Image</th>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Artist</th>
                        <th class="px-6 py-3">Price</th>
                        <th class="px-6 py-3">Stock</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-gray-900">
                    @foreach($artworks as $artwork)
                        <tr>
                            <td class="px-6 py-4">
                                <img src="{{ asset('images/' . $artwork->image) }}" class="w-12 h-12 object-cover rounded">
                            </td>
                            <td class="px-6 py-4 text-sm font-bold text-gray-900">{{ $artwork->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $artwork->artist }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">${{ number_format($artwork->price, 2) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $artwork->stock }}</td>
                            <td class="px-6 py-4 text-sm flex gap-3">
                                <a href="{{ route('admin.artworks.edit', $artwork) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('admin.artworks.destroy', $artwork) }}" method="POST" onsubmit="return confirm('Delete this artwork?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4">
                {{ $artworks->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
