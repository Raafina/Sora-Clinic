<x-dokter-layout id="addx-dokter-layout" title="Tambah Jadwal Periksa" maxWidth="md">
    <x-toast />
    <div class="flex items-center gap-3 mb-6">
        <x-button class="!px-3" href="{{ route('dokter.obat.index') }}">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
        </x-button>
        <h1 class="text-3xl font-semibold text-gray-800">{{ __('Tambah Jadwal Periksa') }}</h1>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <form action="{{ route('dokter.jadwal-periksa.store') }}" method="POST">
            @csrf
            <div class="space-y-4 max-w-xl ">
                <x-select-input label='Hari' id="hari" placeholder="Masukkan hari" :options="[
                    'Senin' => 'Senin',
                    'Selasa' => 'Selasa',
                    'Rabu' => 'Rabu',
                    'Kamis' => 'Kamis',
                    'Jumat' => 'Jumat',
                    'Sabtu' => 'Sabtu',
                    'Minggu' => 'Minggu',
                ]" />
                <x-text-input label='Jam Mulai' id="jam_mulai" type="time" />
                <x-text-input label='Jam Selesai' id="jam_selesai" type="time" />
                <div class="mt-6 flex justify-start gap-2">
                    <x-button label="Batal" variant="danger" type="button" data-modal-hide="addModal"
                        href="{{ route('dokter.jadwal-periksa.index') }}" />
                    <x-button label="Tambah" variant="primary" type="submit" />
                </div>
        </form>
    </div>
    </form>
    </div>
</x-dokter-layout>
