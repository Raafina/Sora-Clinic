<x-guest-layout>
    <div class="mb-4 text-gray-900">
        {{ __('Harap konfirmasi kata sandi Anda sebelum melanjutkan.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <x-text-input label='Kata Sandi' id="password" placeholder="*********" type="password" />

        <div class="flex justify-end mt-4">
            <x-button type="submit" class="w-full">
                {{ __('Simpan') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>
