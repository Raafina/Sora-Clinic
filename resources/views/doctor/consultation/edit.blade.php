<x-doctor-layout id="add-dokter-layout" title="Jawab Konsultasi" maxWidth="md">
    <div class="flex items-center gap-3 mb-6">
        <x-button class="!px-3" href="{{ route('doctor.consultation.index') }}">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
        </x-button>
        <h1 class="text-3xl font-semibold text-gray-800">{{ __('Jawab Konsultasi') }}</h1>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <form action="{{ route('doctor.consultation.update', $consultation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4 max-w-xl ">
                <input type="hidden" id="id_user_doctor" name="id_user_doctor"
                    value="{{ $consultation->id_user_doctor }}">
                <input type="hidden" id="id_user_patient" name="id_user_patient"
                    value="{{ $consultation->id_user_patient }}">
                <x-text-input label='Pasien' id="show_dokter" placeholder="Masukkan dokter"
                    value="{{ $consultation->patient->name }}" readonly />
                <x-text-input label='Subjek' id="subjek" placeholder="Masukkan subjek"
                    value="{{ $consultation->subjek }}" readonly />
                <x-text-area label='Pertanyaan' id="pertanyaan" placeholder="Masukkan pertanyaan" height="h-64"
                    value="{{ $consultation->pertanyaan }}" readonly />
                <x-text-area label='Jawaban' id="jawaban" placeholder="Masukkan jawaban" height="h-64"
                    value="{{ $consultation->jawaban }}" />
                <div class="mt-6 flex justify-start gap-2">
                    <x-button label="Batal" variant="danger" type="button" data-modal-hide="addModal"
                        href="{{ route('doctor.consultation.index') }}" />
                    <x-button label="Simpan" variant="primary" type="submit" />
                </div>
            </div>
        </form>
    </div>
    </x-layout>
