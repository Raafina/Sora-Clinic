<x-guest-layout>
    <div class="p-2 space-y-4 md:space-y-6 ">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
            Atur Ulang Kata Sandi
        </h1>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="space-y-4">
                <x-text-input label='Email' id="email" placeholder="Masukkan email" type="email" />
                <x-text-input label='Kata Sandi' id="password" placeholder="*********" type="password" />
                <x-text-input label='Konfirmasi Kata Sandi' id="password_confirmation" placeholder="*********"
                    type="password" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button type="submit" class="w-full">
                    {{ __('Atur Ulang Kata Sandi') }}
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>
