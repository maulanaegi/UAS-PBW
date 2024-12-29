<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="py-24 relative xl:mr-0 lg:mr-5 mr-0">
        <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
            <div class="w-full justify-start items-center xl:gap-12 gap-10 grid lg:grid-cols-2 grid-cols-1">
                <div class="w-full flex-col justify-center lg:items-start items-center gap-10 inline-flex">
                    <div class="w-full flex-col justify-center items-start gap-8 flex">
                        <div class="flex-col justify-start lg:items-start items-center gap-4 flex">
                            <div class="w-full flex-col justify-start lg:items-start items-center gap-3 flex">
                                <h2
                                    class="text-indigo-700 text-4xl font-bold font-manrope leading-normal lg:text-start text-center">
                                    Wanderly</h2>
                                <p
                                    class="text-gray-500 text-base font-normal leading-relaxed lg:text-start text-center">
                                    Wanderly adalah perusahaan travel yang baru berdiri dengan semangat memberikan pengalaman perjalanan yang tak terlupakan. Kami hadir untuk memenuhi kebutuhan perjalanan Anda, baik untuk liburan santai, petualangan seru, maupun perjalanan bisnis. Dengan fokus pada pelayanan berkualitas dan destinasi menarik, kami berkomitmen menjadi mitra perjalanan terbaik Anda.</p>
                            </div>
                        </div>
                        <div class="w-full flex-col justify-center items-start gap-6 flex">
                            <div class="w-full justify-start items-center gap-8 grid md:grid-cols-2 grid-cols-1">
                                <div
                                    class="w-full h-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                    <h4 class="text-gray-900 text-2xl font-bold font-manrope leading-9">Layanan Kami</h4>
                                    <p class="text-gray-500 text-base font-normal leading-relaxed">Paket wisata domestik dan internasional dengan harga terjangkau</p>
                                </div>
                                <div
                                    class="w-full h-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                    <h4 class="text-gray-900 text-2xl font-bold font-manrope leading-9">Visi Kami 
                                    </h4>
                                    <p class="text-gray-500 text-base font-normal leading-relaxed">Menghadirkan berbagai pilihan destinasi menarik yang sesuai dengan kebutuhan dan anggaran pelanggan</p>
                                </div>
                            </div>
                            <div class="w-full h-full justify-start items-center gap-8 grid md:grid-cols-2 grid-cols-1">
                                <div
                                    class="w-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                    <h4 class="text-gray-900 text-2xl font-bold font-manrope leading-9">Misi Kami</h4>
                                    <p class="text-gray-500 text-base font-normal leading-relaxed">Menghadirkan berbagai pilihan destinasi menarik yang sesuai dengan kebutuhan dan anggaran pelanggan</p>
                                </div>
                                <div
                                    class="w-full h-full p-3.5 rounded-xl border border-gray-200 hover:border-gray-400 transition-all duration-700 ease-in-out flex-col justify-start items-start gap-2.5 inline-flex">
                                    <h4 class="text-gray-900 text-2xl font-bold font-manrope leading-9">Tagline
                                </h4>
                                    <p class="text-gray-500 text-base font-normal leading-relaxed">"Your Journey, Our Priority".</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:justify-start justify-center items-start flex">
                    <div
                        class="sm:w-[564px] w-full sm:h-[646px] h-full sm:bg-gray-100 rounded-3xl sm:border border-gray-200 relative">
                        <img class="sm:mt-5 sm:ml-5 w-full h-full rounded-3xl object-cover"
                            src="https://pagedone.io/asset/uploads/1717742431.png" alt="about Us image" />
                    </div>
                </div>
            </div>
        </div>
    </section>
             
    {{-- Contact Us Section --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contact Us</h2>
            <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Got a technical issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know.</p>
            <form action="#" class="space-y-8">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                    <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>
                </div>
                <div>
                    <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                    <input type="text" id="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Let us know how we can help you" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                    <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."></textarea>
                </div>
                <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Send message</button>
            </form>
        </div>
      </section>
</x-layout>