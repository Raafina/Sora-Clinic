<x-layout-auth>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="py-4 md:py-0">
        <div class="flex flex-col items-center justify-center md:px-6 md:py-8 mx-auto md:h-screen lg:py-10">
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-xl xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Daftar Akun Pasien
                    </h1>
                    <form class="space-y-4 " action="/pasien/register" method="post">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="space-y-4">
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                                        Nama lengkap</label>
                                    <input type="name" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300  text-gray-900 placeholder:text-gray-400 rounded-lg
                                 focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 
                                 {{ $errors->has('name') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
                                        placeholder="Masukkan nama lengkap" required value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-sm text-red-600 mt-1"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                                        No HP</label>
                                    <input type="name" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300  text-gray-900 placeholder:text-gray-400 rounded-lg
                                 focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 
                                 {{ $errors->has('name') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
                                        placeholder="Masukkan no hp" required value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-sm text-red-600 mt-1"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                                        No KTP</label>
                                    <input type="name" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300  text-gray-900 placeholder:text-gray-400 rounded-lg
                                 focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 
                                 {{ $errors->has('name') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
                                        placeholder="Masukkan no KTP" required value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-sm text-red-600 mt-1"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                                        Alamat</label>
                                    <textarea type="name" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300  text-gray-900 placeholder:text-gray-400 rounded-lg
                                 focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 
                                 {{ $errors->has('name') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
                                        placeholder="Masukkan alamat" required value="{{ old('name') }}"></textarea>
                                    @error('name')
                                        <p class="text-sm text-red-600 mt-1"> {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900  placeholder:text-gray-400 rounded-lg 
                                focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                                 {{ $errors->has('email') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
                                        placeholder="user@example.com" required value="{{ old('email') }}">
                                    @error('email')
                                        <p class="text-sm text-red-600 mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="username"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                                    <input type="username" name="username" id="username"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 placeholder:text-gray-400 rounded-lg 
                                focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 
                                {{ $errors->has('username') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
                                        placeholder="user_name" required value="{{ old('username') }}">
                                    @error('username')
                                        <p class="text-sm text-red-600 mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900  placeholder:text-gray-400 rounded-lg
                                 focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 
                                 {{ $errors->has('password') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
                                        placeholder="*****" required>
                                    @error('password')
                                        <p class="text-sm
                                text-red-600 mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Ketik
                                        Ulang Password</label>
                                    <input type="password" name="password" id="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900  placeholder:text-gray-400 rounded-lg
                                 focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 
                                 {{ $errors->has('password') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
                                        placeholder="*****" required>
                                    @error('password')
                                        <p class="text-sm
                                text-red-600 mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col space-y-4">
                            <button type="submit"
                                class="w-full md:w-1/2 bg-primary text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar</button>
                            <p class="text-sm font-light text-gray-500 ">
                                Sudah memiliki akun? <a href="/pasien/login"
                                    class="font-medium text-primary hover:underline">Masuk</a>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout-auth>
