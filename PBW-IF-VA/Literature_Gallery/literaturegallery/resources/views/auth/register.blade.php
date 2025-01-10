<x-guest-layout>
    <div class="max-w-md mx-auto mt-12 p-6 bg-gray-900 text-white rounded-lg shadow-lg">
        <!-- Form Header -->
        <h2 class="text-2xl font-semibold text-center mb-6">Create Your Account</h2>
        <p class="text-gray-400 text-sm text-center mb-6">
            Join us to explore limitless possibilities. Already have an account? 
            <a href="{{ route('login') }}" class="text-indigo-400 hover:underline">Login here</a>.
        </p>

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" class="text-sm text-gray-300" />
                <x-text-input id="name" class="block mt-1 w-full bg-gray-800 border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 text-gray-200" 
                              type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-sm text-gray-300" />
                <x-text-input id="email" class="block mt-1 w-full bg-gray-800 border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 text-gray-200"
                              type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="text-sm text-gray-300" />
                <x-text-input id="password" class="block mt-1 w-full bg-gray-800 border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 text-gray-200" 
                              type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm text-gray-300" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-800 border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 text-gray-200" 
                              type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Register Button -->
            <div class="mt-6 flex items-center justify-between">
                <a href="{{ route('login') }}" class="text-sm text-indigo-400 hover:underline">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow-md">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
