<section class="space-y-6">

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-delete-product')"
    >{{ __('Hapus Resep') }}</x-danger-button>

    <x-modal name="confirm-delete-product" focusable>
        <form method="post" action="{{ route('products.destroy', $product) }}" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Apakah anda yakin untuk menghapus resep?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Ketika resep anda dihapus, semua sumber daya dan datanya akan terhapus secara permanen.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batalkan') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Hapus Resep') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
