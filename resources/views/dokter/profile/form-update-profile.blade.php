<section>
    <x-toast />
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
        {{-- Select polyclinic --}}
        <label for="polyclinicSelect" class="block mb-2 text-sm font-medium text-gray-900">Poliklinik</label>
        <select
            class="bg-gray-50 border border-gray-300 text-gray-900 placeholder:text-gray-400 rounded-lg
                    focus:ring-primary-600 focus:border-primary-600 block w-full !my-2 p-2.5
                    {{ $errors->has('id_poli') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
            name="id_poli" id="poliklinikSelect" required>
            @foreach ($polyclinics as $polyclinic)
                <option value="{{ $polyclinic->id }}" @if ($polyclinic->id == $user->id_poli) selected @endif>
                    {{ $polyclinic->name }}
                </option>
            @endforeach
        </select>
        <x-text-area label='Alamat' id="alamat" placeholder="Masukkan alamat" value="{{ $user->alamat }}" />
        <div class="flex items-center gap-4">
            <x-button type="submit">{{ __('Simpan') }}</x-button>
        </div>
    </form>
</section>
