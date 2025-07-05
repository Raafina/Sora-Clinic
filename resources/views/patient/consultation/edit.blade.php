<x-patient-layout>
    <div class="flex items-center gap-3 mb-6">
        <x-button class="!px-3" href="{{ route('patient.consultation.index') }}">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
        </x-button>
        <h1 class="text-3xl font-semibold text-gray-800">{{ __('Ubah Konsultasi') }}</h1>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <form action="{{ route('patient.consultation.update', $consultation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4 max-w-xl ">
                {{-- Select dokter --}}
                <label for="doctorSelect" class="block mb-2 text-sm font-medium text-gray-900">Dokter</label>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 placeholder:text-gray-400 rounded-lg
                    focus:ring-primary-600 focus:border-primary-600 block w-full !my-2 p-2.5
                    {{ $errors->has('id_user_doctor') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
                    name="id_user_doctor" id="doctorSelect" required>
                    <option value="" hidden>Pilih Dokter</option>
                    @foreach ($doctors as $doctor)
                        <option value={{ $doctor->id }}
                            {{ $doctor->id == $consultation->id_user_doctor ? 'selected' : '' }}>
                            {{ $doctor->name }}
                        </option>
                    @endforeach
                </select>
                <x-text-input label='Subjek' id="subjek" placeholder="Masukkan subjek"
                    value="{{ $consultation->subjek }}" />
                <x-text-area label='Pertanyaan' id="pertanyaan" placeholder="Masukkan pertanyaan" height="h-64"
                    value="{{ $consultation->pertanyaan }}" />
                <div class="mt-6 flex justify-start gap-2">
                    <x-button label="Batal" variant="danger" type="button" data-modal-hide="addModal"
                        href="{{ route('patient.consultation.index') }}" />
                    <x-button label="Simpan" variant="primary" type="submit" />
                </div>
            </div>
        </form>
    </div>
    </x-layout>
