<x-doctor-layout>
    <x-toast />
    <div class="flex items-center gap-3 mb-6">
        <x-button class="!px-3" href="{{ route('doctor.checkup_schedule.index') }}">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
        </x-button>
        <h1 class="text-3xl font-semibold text-gray-800">{{ __('Tambah Jadwal Periksa') }}</h1>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <form action="{{ route('doctor.checkup_schedule.store') }}" method="POST">
            @csrf
            <div class="space-y-4 max-w-xl ">
                <x-select-input label='Hari' id="day" placeholder="Masukkan hari" :options="[
                    'Senin' => 'Senin',
                    'Selasa' => 'Selasa',
                    'Rabu' => 'Rabu',
                    'Kamis' => 'Kamis',
                    'Jumat' => 'Jumat',
                    'Sabtu' => 'Sabtu',
                    'Minggu' => 'Minggu',
                ]" />
                <x-text-input label='Jam Mulai' id="start_time" type="time" />
                <x-text-input label='Jam Selesai' id="end_time" type="time" />
                <div class="mt-6 flex justify-start gap-2">
                    <x-button label="Batal" variant="danger" type="button" data-modal-hide="addModal"
                        href="{{ route('doctor.checkup_schedule.index') }}" />
                    <x-button label="Tambah" variant="primary" type="submit" />
                </div>
            </div>
        </form>
    </div>
</x-doctor-layout>
