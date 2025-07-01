<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1 text-gray-600">
            {{ __('Setelah akun dihapus, semua data akan dihapus secara permanen. Sebelum menghapus akun, silakan simpan data dan informasi yang diperlukan.') }}
        </p>
    </header>
    <x-button variant="danger" data-modal-target="confirm-user-deletion"
        data-modal-toggle="confirm-user-deletion">{{ __('Hapus Akun') }}</x-button>

    <x-modal id="confirm-user-deletion" title="Apakah Anda yakin ingin menghapus akun Anda?">
        <p class="text-base leading-relaxed ">
            {{ __('Setelah akun dihapus, semua data akan dihapus secara permanen. Sebelum menghapus akun, silakan simpan data dan informasi yang diperlukan.') }}
        </p>
        <form action={{ route('profile.destroy') }} method="POST">
            @csrf
            @method('DELETE')

            <div class="mt-6">
                <x-text-input label='Kata Sandi' id="password" placeholder="*********" type="password" />
            </div>

            <div class="flex items-center justify-center w-full gap-2 pt-2 space-y-2">
                <x-button label="Batal" variant="danger" type="button" halfWidth
                    data-modal-hide="confirm-user-deletion" />
                <x-button label="Ya, Hapus" variant="primary" type="submit" halfWidth />
            </div>
        </form>
    </x-modal>
</section>
