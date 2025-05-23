<x-guest-layout>
    <div class="p-2 space-y-4 md:space-y-4 ">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
            Lupa Kata Sandi
        </h1>
        <div class="mb-4 text-gray-600">
            {{ __('Lupa kata sandi Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan tautan pengaturan ulang kata sandi melalui email yang memungkinkan Anda memilih kata sandi baru.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="flex flex-col gap-4">
                <x-text-input label='Email' id="email" placeholder="Masukkan email" type="email" />
                <div class="flex flex-col">
                    <x-button type="submit">
                        {{ __('Kirim Email') }}
                    </x-button>
                </div>
            </div>
        </form>
        <p class="text-sm font-light text-gray-500 ">
            Ingat kata sandi? <a href="/pasien/login" class="font-medium text-primary hover:underline">Login</a>
        </p>
    </div>
</x-guest-layout>
