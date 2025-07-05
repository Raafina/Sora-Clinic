<x-patient-layout>
    <x-toast />
    <h1 class="text-3xl font-medium pb-7">Daftar Poliklinik</h1>

    <div class="p-4 sm:p-5 shadow border border-gray-300 rounded-xl bg-white">
        <form action="{{ route('patient.checkup_register.store') }}" method="POST">
            @csrf
            <div class="space-y-4 max-w-xl ">
                <x-text-input label='Nomor Rekam Medis' id="no_rm" type="text" value="{{ $no_rm }}"
                    disabled />
                {{-- select doctor --}}
                <label for="doctorSelect" class="block mb-2 text-sm font-medium text-gray-900">Pilih Dokter</label>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 placeholder:text-gray-400 rounded-lg
                            focus:ring-primary-600 focus:border-primary-600 block w-full !my-2 p-2.5
                            {{ $errors->has('id_doctor') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
                    name="id_doctor" id="doctorSelect" required>
                    <option value="" hidden>Pilih Dokter</option>
                    @foreach ($doctors as $doctor)
                        @foreach ($doctor->checkupSchedules as $checkupSchedule)
                            <option value="{{ $doctor->id }}">
                                {{ $doctor->name }} - {{ $doctor->polyclinic->name }} |
                                {{ $checkupSchedule->day }},
                                {{ \Carbon\Carbon::parse($checkupSchedule->start_time)->format('H.i') }} -
                                {{ \Carbon\Carbon::parse($checkupSchedule->end_time)->format('H.i') }}
                            </option>
                        @endforeach
                    @endforeach
                </select>
                <x-text-area label='Keluhan' id="complaint" placeholder="Masukkan keluhan" height="h-56" />
                <div class="mt-6 flex justify-start gap-2">
                    <x-button label="Daftar" variant="primary" type="submit" />
                </div>
        </form>
    </div>
</x-patient-layout>
