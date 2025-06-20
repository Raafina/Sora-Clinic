<x-pasien-layout id="add-pasien-layout" title="Tambah Konsultasi Dokter" maxWidth="md">
    <div class="flex items-center gap-3 mb-6">
        <x-button class="!px-3" href="{{ route('pasien.konsultasi.index') }}">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
        </x-button>
        <h1 class="text-3xl font-semibold text-gray-800">{{ __('Konsultasi Dokter ') }}</h1>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <form action="{{ route('pasien.konsultasi.store') }}" method="POST">
            @csrf
            <div class="space-y-4 max-w-xl ">
                {{-- Select dokter --}}
                <label for="dokterSelect" class="block mb-2 text-sm font-medium text-gray-900">Dokter</label>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 placeholder:text-gray-400 rounded-lg
                    focus:ring-primary-600 focus:border-primary-600 block w-full !my-2 p-2.5
                    {{ $errors->has('id_user_dokter') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
                    name="id_user_dokter" id="dokterSelect" required>
                    <option value="" hidden>Pilih Dokter</option>
                    @foreach ($dokters as $dokter)
                        <option value="{{ $dokter->id }}">
                            {{ $dokter->nama }}
                        </option>
                    @endforeach
                </select>
                <x-text-input label='Subjek' id="subjek" placeholder="Masukkan subjek" />
                <x-text-input label='Pertanyaan' id="pertanyaan" placeholder="Masukkan pertanyaan" />
                <div class="mt-6 flex justify-start gap-2">
                    <x-button label="Batal" variant="danger" type="button" data-modal-hide="addModal"
                        href="{{ route('pasien.konsultasi.index') }}" />
                    <x-button label="Tambah" variant="primary" type="submit" />
                </div>
            </div>
        </form>
    </div>
</x-pasien-layout>
