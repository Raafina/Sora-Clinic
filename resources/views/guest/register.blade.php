<x-auth-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="flex items-center justify-center pb-3 sm:pb-5">
        <a href="/">
            <img src="{{ asset('/images/logo/primary.svg') }}" class="h-9 me-3 sm:h-16" alt="Sora Clinic" />
        </a>
    </div>
    <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-2xl xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                Daftar Akun Pasien
            </h1>
            <form action="/pasien/register/store" method="post">
                @csrf
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <x-text-input label='Nama lengkap' id="nama" placeholder="Masukkan nama lengkap" />
                        <x-text-input label='No HP' id="no_hp" placeholder="Masukkan nomor HP" />
                        <x-text-input label='No KTP' id="no_ktp" placeholder="Masukkan nomor KTP" />
                        <x-text-area label='Alamat' id="alamat" placeholder="Masukkan alamat" />
                    </div>

                    <div class="space-y-4">
                        <x-text-input label='Username' id="username" placeholder="Masukkan username" />
                        <x-text-input label='Email' id="email" placeholder="Masukkan email" type="email" />
                        <x-text-input label='Kata Sandi' id="password" placeholder="*********" type="password" />
                        <x-text-input label='Konfirmasi Kata Sandi' id="password_confirmation" placeholder="*********"
                            type="password" />
                    </div>

                    <div class="flex flex-col space-y-4">
                        <x-button type="submit" class="w-full" label="Daftar" />
                        <p class="text-sm font-light text-gray-500 ">
                            Sudah memiliki akun? <a href="{{ route('login') }}"
                                class="font-medium text-primary hover:underline">Masuk</a>
                        </p>
                    </div>
            </form>
        </div>
    </div>
</x-auth-layout>
