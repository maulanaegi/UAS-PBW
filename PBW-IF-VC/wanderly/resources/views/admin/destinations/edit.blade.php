<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a New Destination</h2>
            <form action="{{ route('destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Menggunakan metode PUT untuk pembaruan -->
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <!-- Name -->
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destination Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $destination->name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Type destination name" required>
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
            
                    <!-- Location -->
                    <div>
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                        <input type="text" name="location" id="location" value="{{ old('location', $destination->location) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Location" required>
                        @error('location')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
            
                    <!-- Price -->
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" name="price" id="price" value="{{ old('price', $destination->price) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="200000" required>
                        @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
            
                    <!-- Category -->
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="" disabled>Select category</option>
                            <option value="Hiking" {{ old('category', $destination->category) == 'Hiking' ? 'selected' : '' }}>Hiking</option>
                            <option value="Beach" {{ old('category', $destination->category) == 'Beach' ? 'selected' : '' }}>Beach</option>
                            <option value="Party" {{ old('category', $destination->category) == 'Party' ? 'selected' : '' }}>Party</option>
                            <option value="Tour" {{ old('category', $destination->category) == 'Tour' ? 'selected' : '' }}>Tour</option>
                        </select>
                        @error('category')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
            
                    <!-- Image -->
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                        <input type="file" name="image" id="image" class="border-gray-300 rounded-md shadow-sm w-full" accept="image/*" onchange="previewImage(event)">
                        @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
            
                    <!-- Image Preview -->
                    <div>
                        <label class="block text-gray-700">Image Preview</label>
                        <img id="imagePreview" class="w-48 h-48 object-cover border rounded-md {{ $destination->image ? '' : 'hidden' }}" src="{{ asset('uploads/' . $destination->image) }}" alt="Preview">
                    </div>
            
                    <!-- Description -->
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" name="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Your description here">{{ old('description', $destination->description) }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            
                <!-- Submit Button -->
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Update Destination
                </button>
            </form>
            
        </div>
    </section>

    <script>
        function previewImage(event) {
        const file = event.target.files[0];  // Ambil file pertama yang dipilih
        const reader = new FileReader();  // Membaca file yang dipilih

        reader.onload = function(e) {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = e.target.result;  // Set src image preview dengan data base64
            imagePreview.classList.remove('hidden');  // Menampilkan preview yang disembunyikan
        };

        if (file) {
            reader.readAsDataURL(file);  // Membaca file sebagai URL base64
        }
    }

    </script>
</x-layout>
