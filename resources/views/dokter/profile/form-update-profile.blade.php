<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Akun') }}
        </h2>
        <p class="mt-1 text-gray-600">
            {{ __('Perbarui informasi profil dan alamat email akun Anda.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-4">
        @csrf
        @method('patch')
        <x-text-input label='Nama lengkap' id="nama" placeholder="Masukkan nama lengkap"
            value="{{ $user->nama }}" />
        <div>
            <x-text-input label='Email' id="email" placeholder="Masukkan email" type="email"
                value="{{ $user->email }}" />
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Alamat email tidak terverifikasi.') }}

                        <button form="send-verification"
                            class="underline text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-green-600">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <x-text-input label='No HP' id="no_hp" placeholder="Masukkan nomor HP" value="{{ $user->no_hp }}" />
        <x-text-area label='Alamat' id="alamat" placeholder="Masukkan alamat" value="{{ $user->alamat }}" />
        <div class="flex items-center gap-4">
            <x-button type="submit">{{ __('Simpan') }}</x-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
