<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <section class="bg-white dark:bg-gray-800 font-poppins">
      <div class="max-w-6xl px-4 py-8 mx-auto">
          <div class="flex flex-wrap -mx-4">
              <!-- Product Image Section -->
              <div class="w-full md:w-1/2 px-4" x-data="{ mainImage: '{{url('storage', $product->images[0])}}' }">
                  <div class="sticky top-4">
                      <!-- Main Image - Fixed scaling issues -->
                      <div class="relative mb-6 rounded-2xl overflow-hidden shadow-lg">
                          <img x-bind:src="mainImage" alt="{{$product->name}}" 
                               class="object-contain w-full h-[500px]">
                      </div>
                      
                      <!-- Thumbnail Images - Fixed scaling issues -->
                      <div class="hidden md:grid grid-cols-4 gap-4">
                          @foreach ($product->images as $image)
                          <div class="relative rounded-lg overflow-hidden"
                               x-on:click="mainImage='{{url('storage', $image)}}'">
                              <img src="{{url('storage', $image)}}" 
                                   alt="{{$product->name}}" 
                                   class="object-contain w-full h-24 cursor-pointer">
                              <div class="absolute inset-0 border-2 border-transparent hover:border-blue-500 rounded-lg transition-colors duration-300"></div>
                          </div>
                          @endforeach
                      </div>

                      <!-- Shipping Info -->
                      <div class="mt-8 p-6 bg-gray-50 dark:bg-gray-700 rounded-xl">
                          <div class="flex items-center space-x-3">
                              <span class="p-2 bg-blue-100 dark:bg-blue-900 rounded-full">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" 
                                       class="w-5 h-5 text-blue-600 dark:text-blue-400" viewBox="0 0 16 16">
                                      <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                  </svg>
                              </span>
                              <div>
                                  <h3 class="font-semibold text-gray-800 dark:text-gray-200">Free Shipping</h3>
                                  <p class="text-sm text-gray-600 dark:text-gray-400">Orders over Rp. 0</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Product Info Section -->
              <div class="w-full md:w-1/2 px-4">
                  <div class="lg:pl-8">
                      <div class="mb-8">
                          <h1 class="mb-4 text-3xl font-bold text-gray-800 dark:text-gray-200 md:text-4xl">
                              {{$product->name}}
                          </h1>
                          <div class="mb-6">
                              <span class="text-4xl font-bold text-blue-600 dark:text-blue-400">
                                  {{Number::currency($product->price, 'IDR')}}
                              </span>
                          </div>
                          <p class="mb-8 text-gray-600 dark:text-gray-400 leading-relaxed">
                              {{$product->description}}
                          </p>
                      </div>

                      <!-- Quantity Selector -->
                      <div class="mb-8">
                          <label class="block mb-3 text-lg font-semibold text-gray-800 dark:text-gray-200">
                              Quantity
                          </label>
                          <div class="flex items-center space-x-4">
                              <button wire:click='decreaseQty' 
                                      class="p-2 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                  <svg class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                  </svg>
                              </button>
                              <input type="number" 
                                     wire:model='quantity' 
                                     readonly 
                                     class="w-20 px-3 py-2 text-center border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200">
                              <button wire:click='increaseQty' 
                                      class="p-2 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                  <svg class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                  </svg>
                              </button>
                          </div>
                      </div>

                      <!-- Add to Cart Button -->
                      <button wire:click='addToCart({{$product->id}})' 
                              class="w-full px-8 py-4 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 transition-all">
                          <span wire:loading.remove wire:target='addToCart({{$product->id}})'>
                              Add to Cart
                          </span>
                          <span wire:loading wire:target='addToCart({{$product->id}})' class="flex items-center justify-center">
                              <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                              </svg>
                              Adding to Cart...
                          </span>
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>