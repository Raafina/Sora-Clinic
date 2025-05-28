<x-auth-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-toast-form errorKey="loginError" />
    <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                Masuk Akun Pasien
            </h1>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-4">
                    <div class="space-y-4">
                        <x-text-input label='Email' id="email" placeholder="Masukkan email" type="email" />
                        <x-text-input label='Kata Sandi' id="password" placeholder="*********" type="password" />

                        <div class="grid grid-cols-2"> <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-primary shadow-sm" name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                            </label>
                            <p class="text-sm text-right">
                                <a href="/forgot-password"
                                    class="text-sm font-medium text-primary hover:underline ">Lupa kata sandi?</a>
                            </p>
                        </div>

                    </div>

                    <div class="flex flex-col space-y-4">
                        <x-button type="submit" class="w-full" label="Masuk" />
                        <p class="text-sm font-light text-gray-500 ">
                            Belum memiliki akun? <a href="/pasien/register"
                                class="font-medium text-primary hover:underline ">Daftar</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-auth-layout>
