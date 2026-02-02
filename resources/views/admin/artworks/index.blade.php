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

        <div class="bg-white dark:bg-ash-900 rounded-lg shadow border border-gray-100 dark:border-ash-800 overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 dark:bg-ash-800 text-xs uppercase text-gray-500 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Image</th>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Artist</th>
                        <th class="px-6 py-3">Price</th>
                        <th class="px-6 py-3">Stock</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-ash-800 text-gray-900 dark:text-gray-300">
                    @foreach($artworks as $artwork)
                        <tr class="hover:bg-gray-50 dark:hover:bg-ash-800 transition">
                            <td class="px-6 py-4">
                                <img src="{{ asset('images/' . $artwork->image) }}" class="w-12 h-12 object-cover rounded border border-gray-200 dark:border-ash-700">
                            </td>
                            <td class="px-6 py-4 text-sm font-bold text-gray-900 dark:text-white">{{ $artwork->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">{{ $artwork->artist }}</td>
                            <td class="px-6 py-4 text-sm font-bold text-gray-900 dark:text-white">${{ number_format($artwork->price, 2) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-300">{{ $artwork->stock }}</td>
                            <td class="px-6 py-4 text-sm flex gap-3">
                                <a href="{{ route('admin.artworks.edit', $artwork) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 font-medium">Edit</a>
                                <form action="{{ route('admin.artworks.destroy', $artwork) }}" method="POST" onsubmit="return confirm('Delete this artwork?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4 bg-white dark:bg-ash-900 border-t border-gray-100 dark:border-ash-800">
                {{ $artworks->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
