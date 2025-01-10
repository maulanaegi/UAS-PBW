<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 py-8 bg-gray-900 mt-12">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500 to-green-500 text-white px-6 py-4 rounded-lg shadow-lg flex justify-between items-center">
            <h2 class="font-semibold text-2xl flex items-center gap-2">
                <span>📚</span> Add Book
            </h2>
        </div>

        <!-- Main Content -->
        <div class="mt-8 flex flex-col lg:flex-row gap-8" x-data="{ imageUrl: '/storage/noimage.png' }">
            <!-- Form Section -->
            <div class="w-full lg:w-1/2">
                <form enctype="multipart/form-data" method="POST" action="{{ route('books.store') }}" class="bg-gray-800 p-6 rounded-md shadow-md">
                    @csrf

                    <!-- Input Photo -->
                    <div class="mb-4">
                        <x-input-label for="foto" :value="__('Photo')" />
                        <x-text-input accept="image/*" id="foto" 
                                      class="block mt-1 w-full border border-blue-500 p-2 rounded-md bg-gray-700 text-white focus:ring focus:ring-blue-400 focus:outline-none transition ease-in-out" 
                                      type="file" name="foto" 
                                      :value="old('foto')" 
                                      @change="imageUrl = URL.createObjectURL($event.target.files[0])" 
                                      placeholder="Upload book cover" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>

                    <!-- Input Book Name -->
                    <div class="mb-4">
                        <x-input-label for="nama_buku" :value="__('Book Name')" />
                        <x-text-input id="nama_buku" 
                                      class="block mt-1 w-full border border-blue-500 p-2 rounded-md bg-gray-700 text-white focus:ring focus:ring-blue-400 focus:outline-none transition ease-in-out" 
                                      type="text" name="nama_buku" 
                                      :value="old('nama_buku')" 
                                      placeholder="Enter book name" 
                                      required />
                        <x-input-error :messages="$errors->get('nama_buku')" class="mt-2" />
                    </div>

                    <!-- Input Author -->
                    <div class="mb-4">
                        <x-input-label for="nama_penulis" :value="__('Author')" />
                        <x-text-input id="nama_penulis" 
                                      class="block mt-1 w-full border border-blue-500 p-2 rounded-md bg-gray-700 text-white focus:ring focus:ring-blue-400 focus:outline-none transition ease-in-out" 
                                      type="text" name="nama_penulis" 
                                      :value="old('nama_penulis')" 
                                      placeholder="Enter author's name" 
                                      required />
                        <x-input-error :messages="$errors->get('nama_penulis')" class="mt-2" />
                    </div>

                    <!-- Input Publication Year -->
                    <div class="mb-4">
                        <x-input-label for="tahun_terbit" :value="__('Publication Year')" />
                        <x-text-input id="tahun_terbit" 
                                      class="block mt-1 w-full border border-blue-500 p-2 rounded-md bg-gray-700 text-white focus:ring focus:ring-blue-400 focus:outline-none transition ease-in-out" 
                                      type="text" name="tahun_terbit" 
                                      :value="old('tahun_terbit')" 
                                      placeholder="Enter year of publication" 
                                      required />
                        <x-input-error :messages="$errors->get('tahun_terbit')" class="mt-2" />
                    </div>

                    <!-- Input Synopsis -->
                    <div class="mb-4">
                        <x-input-label for="sinopsis" :value="__('Synopsis')" />
                        <textarea id="sinopsis" 
                                  class="block mt-1 w-full border border-blue-500 p-2 rounded-md bg-gray-700 text-white focus:ring focus:ring-blue-400 focus:outline-none transition ease-in-out" 
                                  name="sinopsis" rows="5" 
                                  placeholder="Write a short synopsis">{{ old('sinopsis') }}</textarea>
                        <x-input-error :messages="$errors->get('sinopsis')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end mt-6">
                        <x-primary-button class="w-full justify-center bg-blue-500 hover:bg-blue-700 transition ease-in-out duration-300 shadow-lg">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>

            <!-- Image Preview Section -->
            <div class="w-full lg:w-1/2 flex justify-center items-start">
                <div class="bg-gray-800 p-4 rounded-md shadow-lg">
                    <img :src="imageUrl" 
                         class="rounded-md max-w-full object-cover border border-gray-700 shadow-md" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
