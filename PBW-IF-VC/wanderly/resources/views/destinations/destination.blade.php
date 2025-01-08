<x-layout>
    <x-slot:title>{{ $destination->name }}</x-slot:title>

    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">{{ $destination->name }}</h2>

                <!-- Display Destination Image -->
                <div class="my-8 xl:mb-16 xl:mt-12">
                    <img class="w-full" src="{{ asset('uploads/' . $destination->image) }}" alt="{{ $destination->name }}" />
                </div>

                <div class="mx-auto max-w-2xl space-y-6">
                    <!-- Location -->
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-300">
                        Location: <span class="text-gray-900 dark:text-white">{{ $destination->location }}</span>
                    </p>

                    <!-- Category -->
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-300">
                        Category: <span class="text-gray-900 dark:text-white">{{ $destination->category }}</span>
                    </p>

                    <!-- Price -->
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-300">
                        Price: <span class="text-gray-900 dark:text-white">${{ number_format($destination->price, 2) }}</span>
                    </p>

                    <!-- Description -->
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                        {{ $destination->description }}
                    </p>

                    <!-- Additional Features -->
                    <p class="text-base font-semibold text-gray-900 dark:text-white">Key Features:</p>
                    <ul class="list-outside list-disc space-y-4 pl-4 text-base font-normal text-gray-500 dark:text-gray-400">
                        <li>
                            <span class="font-semibold text-gray-900 dark:text-white"> Amazing Views: </span>
                            Enjoy breathtaking scenery and relaxing atmospheres.
                        </li>
                        <li>
                            <span class="font-semibold text-gray-900 dark:text-white"> Cultural Heritage: </span>
                            Explore the rich history and traditions of this location.
                        </li>
                        <li>
                            <span class="font-semibold text-gray-900 dark:text-white"> Family-Friendly: </span>
                            Perfect for vacations with kids and loved ones.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</x-layout>
