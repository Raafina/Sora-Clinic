<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1 text-gray-600">
            {{ __('Setelah akun dihapus, semua data akan dihapus secara permanen. Sebelum menghapus akun, silakan simpan data dan informasi yang diperlukan.') }}
        </p>
    </header>

    <x-button variant="danger" x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Hapus Akun') }}</x-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Apakah Anda yakin ingin menghapus akun Anda?') }}
            </h2>

            <p class="mt-1 text-gray-600">
                {{ __('Setelah akun dihapus, semua data akan dihapus secara permanen. Sebelum menghapus akun, silakan simpan data dan informasi yang diperlukan.') }}
            </p>

            <div class="mt-6">
                <x-text-input label='Kata Sandi' id="password" placeholder="*********" type="password" />
            </div>

            <div class="mt-6 flex justify-end">

                <x-button x-on:click="$dispatch('close')" variant="secondary" class="ms-3">
                    {{ __('Batal') }}
                </x-button>

                <x-button type="submit" variant="danger" class="ms-3">
                    {{ __('Hapus Akun') }}
                </x-button>
            </div>
        </form>
    </x-modal>
</section>
