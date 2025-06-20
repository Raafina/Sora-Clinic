<x-dokter-layout id="add-dokter-layout" title="Jawab Konsultasi" maxWidth="md">
    <div class="flex items-center gap-3 mb-6">
        <x-button class="!px-3" href="{{ route('pasien.konsultasi.index') }}">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
        </x-button>
        <h1 class="text-3xl font-semibold text-gray-800">{{ __('Jawab Konsultasi') }}</h1>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <form action="{{ route('dokter.konsultasi.update', $konsultasi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4 max-w-xl ">
                <input type="hidden" id="id_user_dokter" name="id_user_dokter"
                    value="{{ $konsultasi->id_user_dokter }}">
                <input type="hidden" id="id_user_pasien" name="id_user_pasien"
                    value="{{ $konsultasi->id_user_pasien }}">
                <x-text-input label='Dokter' id="show_dokter" placeholder="Masukkan dokter"
                    value="{{ $konsultasi->dokter->nama }}" readonly />
                <x-text-input label='Subjek' id="subjek" placeholder="Masukkan subjek"
                    value="{{ $konsultasi->subjek }}" readonly />
                <x-text-area label='Pertanyaan' id="pertanyaan" placeholder="Masukkan pertanyaan"
                    value="{{ $konsultasi->pertanyaan }}" readonly />
                <x-text-area label='Jawaban' id="jawaban" placeholder="Masukkan jawaban"
                    value="{{ $konsultasi->jawaban }}" />
                <div class="mt-6 flex justify-start gap-2">
                    <x-button label="Batal" variant="danger" type="button" data-modal-hide="addModal"
                        href="{{ route('pasien.konsultasi.index') }}" />
                    <x-button label="Simpan" variant="primary" type="submit" />
                </div>
            </div>
        </form>
    </div>
    </x-layout>
