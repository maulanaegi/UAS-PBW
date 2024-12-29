<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Destination') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block">Name</label>
                <input type="text" id="name" name="name" class="w-full border rounded px-4 py-2" required>
            </div>
            <div class="mb-4">
                <label for="location" class="block">Location</label>
                <input type="text" id="location" name="location" class="w-full border rounded px-4 py-2" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block">Description</label>
                <textarea id="description" name="description" class="w-full border rounded px-4 py-2"></textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block">Price</label>
                <input type="text" id="price" name="price" class="w-full border rounded px-4 py-2">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="border-gray-300 rounded-md shadow-sm w-full" accept="image/*" onchange="previewImage(event)">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Image Preview</label>
                <img id="imagePreview" class="w-48 h-48 object-cover border rounded-md" src="#" alt="Preview" style="display: none;">
            </div>
            <div class="mb-4">
                <label for="category" class="block">Category</label>
                <input type="text" id="category" name="category" class="w-full border rounded px-4 py-2">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</x-app-layout>

