<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Edit Artwork</h1>

        <div class="bg-white p-8 rounded-lg shadow border">
            <form action="{{ route('admin.artworks.update', $artwork) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-label for="title" value="Title" />
                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $artwork->title }}" required />
                    </div>
                    <div>
                        <x-label for="artist" value="Artist" />
                        <x-input id="artist" class="block mt-1 w-full" type="text" name="artist" value="{{ $artwork->artist }}" required />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <x-label for="price" value="Price ($)" />
                        <x-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" value="{{ $artwork->price }}" required />
                    </div>
                    <div>
                        <x-label for="size" value="Size" />
                        <x-input id="size" class="block mt-1 w-full" type="text" name="size" value="{{ $artwork->size }}" required />
                    </div>
                    <div>
                        <x-label for="year" value="Year" />
                        <x-input id="year" class="block mt-1 w-full" type="number" name="year" value="{{ $artwork->year }}" required />
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <img src="{{ asset('images/' . $artwork->image) }}" class="w-24 h-24 object-cover rounded border">
                    <div class="flex-1">
                        <x-label for="image" value="Replace Image (Keep empty to preserve current)" />
                        <input id="image" type="file" name="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                    </div>
                </div>

                <div>
                    <x-label for="stock" value="Stock Quantity" />
                    <x-input id="stock" class="block mt-1 w-full" type="number" name="stock" value="{{ $artwork->stock }}" required />
                </div>

                <div>
                    <x-label for="description" value="Description" />
                    <textarea id="description" name="description" rows="5" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>{{ $artwork->description }}</textarea>
                </div>

                <div class="flex items-center justify-end mt-8">
                    <a href="{{ route('admin.artworks.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">Cancel</a>
                    <x-button>Update Artwork</x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
