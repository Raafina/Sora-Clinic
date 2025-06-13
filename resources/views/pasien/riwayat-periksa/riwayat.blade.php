<x-pasien-layout>
    <div class="flex items-center gap-3 mb-6">
        <x-button class="!px-3" href="{{ route('pasien.riwayat-periksa.index') }}">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
        </x-button>
        <h1 class="text-3xl font-semibold text-gray-800">{{ __('Riwayat Pemeriksaan') }}</h1>
    </div>

    <div class="flex flex-col gap-4 p-4 sm:p-6 bg-white shadow sm:rounded-lg ">
        <p class="text-sm text-gray-600">
            Silahkan menuju ke administarsi untuk pembayaran biaya pemeriksaan yang telah dilakukan.
        </p>

        <div class="border-2 rounded-md">
            <h5 class="mb-0 font-semibold text-gray-800 p-4 border-b">Detail Pemeriksaan</h5>
            <div class="w-full flex p-4 flex-col md:flex-row">
                <div class="w-full sm:w-1/2 mb-2 sm:mb-0">
                    <p class="font-semibold text-gray-700 ">Tanggal
                        Periksa</p>
                    <p>
                        10 Juni 2025 14.30
                    </p>
                </div>

                <div class="w-full sm:w-1/2">
                    <p class="font-semibold text-gray-700">Catatan</p>
                    <p>
                        Pasien disarankan istirahat penuh.
                    </p>
                </div>
            </div>
        </div>

        <div class="border-2 rounded-md">
            <h5 class="mb-0 font-semibold text-gray-800 p-4 border-b">Daftar Obat Diresepkan</h5>
            <ul class="p-4">
                <li class="px-0 list-group-item d-flex justify-content-between align-items-center border-bottom">
                    <span>Paracetamol</span>
                    <span class="badge bg-slate-100 text-dark">10 tablet</span>
                </li>
                <li class="px-0 list-group-item d-flex justify-content-between align-items-center border-bottom">
                    <span>Amoxicillin</span>
                    <span class="badge bg-slate-100 text-dark">5 tablet</span>
                </li>
            </ul>
        </div>

        <div class="border-2 rounded-md bg-slate-100">
            <div class="">
                <div class="p-4 flex justify-between items-center">
                    <span class="font-semibold text-gray-800">Biaya Periksa</span>
                    <span class="text-primary font-bold">
                        Rp150.000
                    </span>
                </div>
            </div>
        </div>
    </div>

</x-pasien-layout>
