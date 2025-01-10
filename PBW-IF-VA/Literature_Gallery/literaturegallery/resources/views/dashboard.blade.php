<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-center mb-8 text-gray-800 dark:text-gray-100">Meet Our Team</h2>
                    
                    <!-- Members List -->
                    <div class="space-y-6">
                        <!-- Agung Febrian -->
                        <div class="flex items-center p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                            <img src="{{ url('agung.jpg') }}" 
                                 class="w-16 h-16 rounded-full ring-2 ring-gray-300 dark:ring-gray-600 shadow transform transition-transform duration-300 hover:scale-105" 
                                 alt="Agung Febrian">
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">Agung Febrian</p>
                                <p class="text-sm text-gray-600 dark:text-gray-300">220660121086</p>
                                <p class="text-sm mt-1">
                                    <a href="https://instagram.com/agngfebrian" target="_blank" 
                                       class="text-indigo-500 hover:text-indigo-700 transition-colors duration-200">Instagram</a> | 
                                    <a href="https://github.com/agungfbrrn" target="_blank" 
                                       class="text-indigo-500 hover:text-indigo-700 transition-colors duration-200">GitHub</a>
                                </p>
                            </div>
                        </div>

                        <!-- Kemal Hapidz Prastiawan -->
                        <div class="flex items-center p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                            <img src="{{ url('kemal.jpg') }}" 
                                 class="w-16 h-16 rounded-full ring-2 ring-gray-300 dark:ring-gray-600 shadow transform transition-transform duration-300 hover:scale-105" 
                                 alt="Kemal Hapidz Prastiawan">
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">Kemal Hapidz Prastiawan</p>
                                <p class="text-sm text-gray-600 dark:text-gray-300">220660121115</p>
                                <p class="text-sm mt-1">
                                    <a href="https://instagram.com/sir_malll" target="_blank" 
                                       class="text-indigo-500 hover:text-indigo-700 transition-colors duration-200">Instagram</a> | 
                                    <a href="https://github.com/kemalhapidzprastiawan" target="_blank" 
                                       class="text-indigo-500 hover:text-indigo-700 transition-colors duration-200">GitHub</a>
                                </p>
                            </div>
                        </div>

                        <!-- Dede Yayan Suciyana -->
                        <div class="flex items-center p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                            <img src="{{ url('dedey.jpg') }}" 
                                 class="w-16 h-16 rounded-full ring-2 ring-gray-300 dark:ring-gray-600 shadow transform transition-transform duration-300 hover:scale-105" 
                                 alt="Dede Yayan Suciyana">
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">Dede Yayan Suciyana</p>
                                <p class="text-sm text-gray-600 dark:text-gray-300">220660121179</p>
                                <p class="text-sm mt-1">
                                    <a href="https://instagram.com/deyanscyn_" target="_blank" 
                                       class="text-indigo-500 hover:text-indigo-700 transition-colors duration-200">Instagram</a> | 
                                    <a href="https://github.com/220660121179" target="_blank" 
                                       class="text-indigo-500 hover:text-indigo-700 transition-colors duration-200">GitHub</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Description -->
                    <div class="mt-12 text-center">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                        "Website ini dibuat dengan semangat kreativitas dan kerja sama tim untuk proyek UAS mata kuliah Pemrograman Berbasis Web. Proyek ini tidak hanya menjadi bukti pembelajaran kami selama satu semester, tetapi juga cerminan dari kerja sama tim dan kreativitas.
                        Cek detailnya di repository kelas."
                            <a href="https://github.com/Pemrograman-Berbasis-Web/PBW-IF-VA" target="_blank" 
                               class="text-indigo-500 hover:text-indigo-700 transition-colors duration-200">Lihat Repo Kelas</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
