<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        @if(session()->has('success'))
        <x-alert message="{{ session('success') }}" class="mt-4"/>
        @endif

        <!-- Header Section -->
        <div class="flex items-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white mt-6 justify-between p-4 rounded-lg shadow-lg">
            <h2 class="font-semibold text-2xl flex items-center gap-2">
                <span class="animate-bounce">📚</span> Book List
            </h2>
            <a href="{{ route('books.create') }}">
                <button class="bg-purple-500 hover:bg-purple-700 text-white px-6 py-2 rounded-lg transition duration-300 ease-in-out font-semibold shadow-md hover:shadow-lg">
                    Add Book
                </button>
            </a>
        </div>

        <!-- Book Cards -->
        <div class="grid md:grid-cols-3 grid-cols-1 mt-8 gap-6">
            @foreach($books as $book)
                <div class="bg-gradient-to-b from-gray-800 to-gray-900 rounded-lg overflow-hidden shadow-lg transition transform hover:scale-105 hover:shadow-2xl border border-gray-700">
                    <!-- Image -->
                    <img src="{{ url('storage/'.$book->foto) }}" 
                         alt="Book Cover" 
                         class="w-full h-96 object-contain bg-gray-900">

                    <!-- Content -->
                    <div class="p-4">
                        <h3 class="text-xl font-bold text-white hover:text-indigo-400 transition duration-200 ease-in-out">
                            {{ $book->nama_buku }}
                        </h3>
                        <p class="text-gray-300 mt-1">{{ $book->nama_penulis }}</p>
                        <p class="text-gray-400 text-sm mt-1">Tahun {{ $book->tahun_terbit }}</p>

                        <!-- Edit Button -->
                        <a href="{{ route('books.edit', $book) }}">
                            <button class="mt-4 w-full bg-indigo-500 hover:bg-indigo-700 text-white py-2 rounded-lg font-semibold transition duration-300 ease-in-out shadow hover:shadow-lg">
                                Edit
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6 text-center">
            {{ $books->links() }}
        </div>
    </div>
</x-app-layout>
