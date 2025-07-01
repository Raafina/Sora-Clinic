<x-admin-layout maxWidth="md">
    <div class="flex items-center gap-3 mb-6">
        <x-button class="!px-3" href="{{ route('admin.doctor.index') }}">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
        </x-button>
        <h1 class="text-3xl font-semibold text-gray-800">{{ __('Ubah Dokter') }}</h1>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <form action="{{ route('admin.doctor.update', $doctor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4 max-w-xl ">
                <x-text-input label='Nama lengkap' id="name" placeholder="Masukkan nama lengkap"
                    value="{{ $doctor->name }}" />
                <x-text-input label='Username' id="username" placeholder="Masukkan username"
                    value="{{ $doctor->username }}" />
                <x-text-input label='Email' id="email" placeholder="Masukkan email" type="email"
                    value="{{ $doctor->email }}" />
                {{-- Select polyclinics --}}
                <label for="polyclinicsSelect" class="block mb-2 text-sm font-medium text-gray-900">Poliklinik</label>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 placeholder:text-gray-400 rounded-lg
                    focus:ring-primary-600 focus:border-primary-600 block w-full !my-2 p-2.5
                    {{ $errors->has('id_polyclinic') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
                    name="id_polyclinic" id="polyclinicsSelect" required>
                    <option value="" hidden>Pilih Poliklinik</option>
                    @foreach ($polyclinics as $polyclinic)
                        <option value="{{ $polyclinic->id }}"
                            {{ $doctor->id_polyclinic == $polyclinic->id ? 'selected' : '' }}>
                            {{ $polyclinic->name }}
                        </option>
                    @endforeach
                </select>
                <x-text-input label='Kata Sandi' id="password" placeholder="*********" type="password" />
                <x-text-input label='Konfirmasi Kata Sandi' id="password_confirmation" placeholder="*********"
                    type="password" />
                <div class="mt-6 flex justify-start gap-2">
                    <x-button label="Batal" variant="danger" type="button" data-modal-hide="addModal"
                        href="{{ route('admin.doctor.index') }}" />
                    <x-button label="Simpan" variant="primary" type="submit" />
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
