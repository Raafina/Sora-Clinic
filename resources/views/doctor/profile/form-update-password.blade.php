<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Ubah Kata Sandi') }}
        </h2>

        <p class="mt-1  text-gray-600">
            {{ __('Gunakan kata sandi yang kuat dan unik untuk melindungi akun Anda.') }}
        </p>
    </header>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-4">
        @csrf
        @method('put')
        <x-text-input label='Kata Sandi Saat Ini' id="current_password" placeholder="*********" type="password" />
        <x-text-input label='Kata Sandi Baru' id="password" placeholder="*********" type="password" />
        <x-text-input label='Konfirmasi Kata Sandi Baru' id="password_confirmation" placeholder="*********"
            type="password" />
        <div class="flex items-center gap-4">
            <x-button type="submit">{{ __('Simpan') }}</x-button>
            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class=" text-gray-600">
                    {{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
