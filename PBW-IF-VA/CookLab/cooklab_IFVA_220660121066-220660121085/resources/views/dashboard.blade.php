<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-screen p-2"><br><br>
        <div class="flex justify-center mt-10">
            <img src="{{ url('logo.png') }}" class="h-25" />
        </div>
        <div class="my-10">
            <q><i>Recipes creafted with warmth and love.</i></q>
        </div>
        <div class="mb-10">
            <a href="{{ route('products.create') }}">
            <button class="bg-[#97976a] px-10 py-2 rounded-md font-semibold text-white">Tambah Resep</button>
            </a>
        </div>
        <br><br><br><br><br>
        <p class="text-3xl my-10"><b>About Us</b></p><br><br>
        <div class="flex flex-col md:flex-row items-center gap-2">
            <!-- Gambar dengan animasi -->
            <div class="w-full md:w-1/2 flex justify-center">
                <img 
                    src="{{ url('yas.jpeg') }}" 
                    width="300px" 
                    class="animate-slow-fade-in"
                    alt="Gambar CookLab"
                />
            </div>

            <!-- Teks deskripsi -->
            <div class="w-full md:w-1/2">
                <h1 class="text-2xl text-black leading-relaxed">🎉 Yuk, eksplor website ini dan temukan yang kamu cari!</h1><br><br>
                <p class="text-xl text-gray-800 leading-relaxed pr-10 mr-10" style="text-align: justify">
                    Selamat datang di <strong>CookLab</strong>, sebuah platform di mana perjalanan memasak Anda dimulai. 
                    Kami membuat situs ini untuk membantu orang-orang menemukan, berbagi, dan mengeksplorasi resep dengan cara yang sederhana dan interaktif. 
                    Baik Anda seorang pemula maupun koki berpengalaman, CookLab hadir untuk menginspirasi petualangan kuliner Anda. 
                    Ayo memasak, berbagi, dan berkembang bersama!
                </p>
            </div>
        </div>
    </div>

    <!-- Animasi CSS -->
    <style>
        @keyframes slowFadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slow-fade-in {
            animation: slowFadeIn 2s ease-out; /* Durasi animasi diperpanjang menjadi 2 detik */
        }
    </style>
</x-app-layout>
