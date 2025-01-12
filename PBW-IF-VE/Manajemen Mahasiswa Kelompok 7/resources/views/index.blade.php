<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Manajemen Mahasiswa</title>

        <!-- Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <div class="relative w-screen h-screen overflow-x-hidden">
            <header class="flex w-full justify-center">
                <h1 class="mt-8 text-2xl">Manajemen Mahasiswa</h1>
            </header>

            <div class="w-full flex justify-end items-center px-6 mt-12">
                <a href="/add-mahasiswa">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Mahasiswa</button>
                </a>
            </div>
            

<div class="w-[95%] mx-auto relative overflow-x-auto border-[1px] border-slate-300 sm:rounded-lg mt-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 text-center">
            <tr>
                <th scope="col" class="px-6 py-3">
                    nim
                </th>
                <th scope="col" class="px-6 py-3">
                    nama
                </th>
                <th scope="col" class="px-6 py-3">
                    program studi
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                <th scope="col" class="px-6 py-3">
                    jenis kelamin
                </th>
                <th scope="col" class="px-6 py-3">
                    tanggal lahir
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            
            
            <tr class="odd:bg-slate-100 even:bg-gray-50 text-center">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{$d->nim}}
                </th>
                <td class="px-6 py-4">
                    {{$d->nama}}
                </td>
                <td class="px-6 py-4">
                    {{$d->program_studi}}
                </td>
                <td class="px-6 py-4">
                    {{$d->email}}
                </td>
                <td class="px-6 py-4">
                    {{$d->jenis_kelamin}}
                </td>
                <td class="px-6 py-4">
                    {{$d->tanggal_lahir}}
                </td>
                <td class="flex justify-center gap-1 px-2 py-4">
                <a href={{"/update/" . $d->id}}>
                <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update</button>
                </a>
                <a href={{"/delete/" . $d->id}}>
                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                </a>
                
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

        </div>
    </body>

</html>
