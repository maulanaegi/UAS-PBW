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
                <h1 class="mt-5 text-2xl">Manajemen Mahasiswa</h1>
            </header>


<div class="w-full mb-8 mt-5">
     <form method="post" action="/add-mahasiswa" class="max-w-sm mx-auto">
        @csrf
  <div class="mb-5">
    <label for="nim" class="block mb-2 text-sm font-medium text-gray-900">nim</label>
    <input type="text" name="nim" id="nim" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "  required />
  </div>
  <div class="mb-5">
    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">nama</label>
    <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
  </div>
  <div class="mb-5">
    <label for="program_studi" class="block mb-2 text-sm font-medium text-gray-900">program studi</label>
    <input type="text" id="program_studi" name="program_studi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
  </div>
  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">email</label>
    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
  </div>
  <div class="mb-5">
    <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900">tanggal lahir</label>
    <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
  </div>
  
  <div className="flex gap-3 ">
    <div class="flex items-center mb-4">
        <input id="country-option-1" type="radio" name="jenis_kelamin" value="laki - laki" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" checked>
        <label for="country-option-1" class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
        Laki Laki
        </label>
    </div>
    <div class="flex items-center mb-4">
        <input id="perempuan" type="radio" name="jenis_kelamin" value="perempuan" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" checked>
        <label for="perempuan" class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
        Perempuan
        </label>
    </div>
    <div class="mb-5">
    <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Your message</label>
    <textarea name="alamat" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
    </div>
    <div class="mb-5">
    <label for="nomor_telepon" class="block mb-2 text-sm font-medium text-gray-900">nomor telepon</label>
    <input type="text" id="nomor_telepon" name="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
  </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
</div>


        </div>
    </body>

</html>
