<x-pasien-layout>
    <div class="flex items-center gap-3 mb-6">
        <x-button class="!px-3" href="{{ route('pasien.riwayat-periksa.index') }}">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
        </x-button>
        <h1 class="text-3xl font-semibold text-gray-800">{{ __('Detail Riwayat Pemeriksaan') }}</h1>
    </div>

    <div class="p-4 sm:p-6 bg-white shadow sm:rounded-lg">
        <div class="flex flex-col sm:flex-row gap-4 h-full">
            <div class="w-full sm:w-8/12 flex flex-col gap-2">
                <div class="px-4 py-3 border-0 rounded list-group-item bg-slate-100">
                    <div class="flex justify-between">
                        <span class="text-gray-700">Poliklinik</span>
                        <span class="font-medium">Umum</span>
                    </div>
                </div>
                <div class="px-4 py-3 border-0 rounded-md list-group-item bg-slate-100">
                    <div class="flex justify-between">
                        <span class="text-gray-700">Nama Dokter</span>
                        <span class="font-medium">Dr. Ahmad</span>
                    </div>
                </div>
                <div class="px-4 py-3 border-0 rounded-md list-group-item bg-slate-100">
                    <div class="flex justify-between">
                        <span class="text-gray-700">Hari Pemeriksaan</span>
                        <span class="font-medium">Senin</span>
                    </div>
                </div>
                <div class="px-4 py-3 border-0 rounded-md list-group-item bg-slate-100">
                    <div class="flex justify-between">
                        <span class="text-gray-700">Jam Mulai</span>
                        <span class="font-medium">08.00</span>
                    </div>
                </div>
                <div class="px-4 py-3 border-0 rounded-md list-group-item bg-slate-100">
                    <div class="flex justify-between">
                        <span class="text-gray-700">Jam Selesai</span>
                        <span class="font-medium">10.00</span>
                    </div>
                </div>
            </div>

            <div class="w-full sm:w-4/12">
                <div class="p-4 rounded-md bg-slate-100 h-full flex flex-col items-center justify-center">
                    <h5 class="mb-3 text-gray-700">Nomor Antrian Anda</h5>
                    <div class="text-white rounded-lg bg-primary flex items-center justify-center"
                        style="width: 100px; height: 100px;">
                        <span class="font-bold" style="font-size: 2.5rem;">5</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-pasien-layout>
