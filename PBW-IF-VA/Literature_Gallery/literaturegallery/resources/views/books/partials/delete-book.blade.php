<section class="space-y-6">
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-delete-book')"
    >{{ __('Delete Book') }}</x-danger-button>

    <x-modal name="confirm-delete-book" focusable>
        <form method="post" action="{{ route('books.destroy', $book) }}" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure want to delete this book?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your book is deleted, all its resources and data will be permanently removed.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Book') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
