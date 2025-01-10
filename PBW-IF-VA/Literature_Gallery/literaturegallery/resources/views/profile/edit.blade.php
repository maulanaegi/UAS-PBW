<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 py-8 bg-gray-900 mt-12">
        <!-- Header -->
        <div class="bg-gradient-to-r from-green-600 to-teal-600 text-white px-6 py-4 rounded-lg shadow-lg flex justify-between items-center">
            <h2 class="font-semibold text-2xl flex items-center gap-2">
                <span>🛠️</span> Profile Settings
            </h2>
        </div>

        <!-- Main Content -->
        <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Update Profile Information -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <h3 class="font-semibold text-xl text-white mb-4">Update Profile Information</h3>
                <div class="space-y-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <h3 class="font-semibold text-xl text-white mb-4">Update Password</h3>
                <div class="space-y-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow col-span-1 lg:col-span-2">
                <h3 class="font-semibold text-xl text-red-500 mb-4">Delete Account</h3>
                <div class="bg-gray-900 p-4 rounded-md border border-red-700">
                    <p class="text-sm text-gray-300 mb-4">
                        Deleting your account is a permanent action and cannot be undone. Please ensure that you have downloaded any important data before proceeding.
                    </p>
                    <form method="POST" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('DELETE')
                        <div class="flex justify-end">
                            <x-danger-button>
                                {{ __('Delete Account') }}
                            </x-danger-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
