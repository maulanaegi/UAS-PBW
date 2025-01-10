<x-guest-layout>
    <div class="max-w-md mx-auto mt-12 p-6 bg-gray-900 text-white rounded-lg shadow-lg">
        <!-- Form Header -->
        <h2 class="text-2xl font-semibold text-center mb-6">Welcome Back</h2>
        <p class="text-gray-400 text-sm text-center mb-6">
            Please login to continue. Don't have an account yet? 
            <a href="{{ route('register') }}" class="text-indigo-400 hover:underline">Sign up here</a>.
        </p>

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-sm text-gray-300" />
                <x-text-input id="email" class="block mt-1 w-full bg-gray-800 border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 text-gray-200"
                              type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="text-sm text-gray-300" />
                <x-text-input id="password" class="block mt-1 w-full bg-gray-800 border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 text-gray-200"
                              type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Remember Me -->
            <div class="block mb-4">
                <label for="remember_me" class="inline-flex items-center text-sm text-gray-300">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-800 border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Login Button -->
            <div class="mt-6 flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-400 hover:underline">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow-md">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
