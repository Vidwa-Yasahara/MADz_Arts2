<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Add New Artwork</h1>

        <div class="bg-white dark:bg-ash-900 p-8 rounded-lg shadow border border-gray-100 dark:border-ash-800">
            <form action="{{ route('admin.artworks.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-label for="title" value="Title" />
                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" required />
                    </div>
                    <div>
                        <x-label for="artist" value="Artist" />
                        <x-input id="artist" class="block mt-1 w-full" type="text" name="artist" required />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <x-label for="price" value="Price ($)" />
                        <x-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" required />
                    </div>
                    <div>
                        <x-label for="size" value="Size (e.g. 24x36 in)" />
                        <x-input id="size" class="block mt-1 w-full" type="text" name="size" required />
                    </div>
                    <div>
                        <x-label for="year" value="Year" />
                        <x-input id="year" class="block mt-1 w-full" type="number" name="year" required />
                    </div>
                </div>

                <div>
                    <x-label for="image" value="Artwork Image" />
                    <input id="image" type="file" name="image" accept="image/*" required class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-black file:text-white hover:file:bg-gray-800 dark:file:bg-white dark:file:text-black dark:hover:file:bg-gray-200 transition" />
                </div>

                <div>
                    <x-label for="stock" value="Stock Quantity" />
                    <x-input id="stock" class="block mt-1 w-full" type="number" name="stock" required />
                </div>

                <div>
                    <x-label for="description" value="Description" />
                    <textarea id="description" name="description" rows="5" class="border-gray-300 dark:border-ash-700 focus:border-black dark:focus:border-white focus:ring-black dark:focus:ring-white rounded-md shadow-sm block mt-1 w-full bg-white dark:bg-black text-gray-900 dark:text-white" required></textarea>
                </div>

                <div class="flex items-center justify-end mt-8">
                    <a href="{{ route('admin.artworks.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mr-4 transition-colors">Cancel</a>
                    <x-button>Save Artwork</x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
