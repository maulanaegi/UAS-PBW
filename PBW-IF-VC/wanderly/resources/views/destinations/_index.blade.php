<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Desti') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <div>Destinations CRUD</div>
            <div class="text-end mb-5">
                <a href="{{ route('admin.destinations.create') }}" class="hover:underline">Add New Destination</a>
            </div>
        </div>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Location</th>
                    <th class="border px-4 py-2">Description</th>
                    <th class="border px-4 py-2">Price</th>
                    <th class="border px-4 py-2">Image</th>
                    <th class="border px-4 py-2">Category</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($destinations as $index => $row)
                    <tr>
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $row->name }}</td>
                        <td class="border px-4 py-2">{{ $row->location }}</td>
                        <td class="border px-4 py-2">{{ Str::limit($row->description, 50) }}</td>
                        <td class="border px-4 py-2">{{ number_format($row->price, 0, ',', '.') }} IDR</td>
                        <td class="border px-4 py-2">
                            @if ($row->image)
                                <img src="{{ asset('uploads/' . $row->image) }}" alt="Image" class="w-20 h-20 object-cover rounded">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="border px-4 py-2">{{ $row->category }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('admin.destinations.edit', $row->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('admin.destinations.destroy', $row->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center border px-4 py-2">No Destinations Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
