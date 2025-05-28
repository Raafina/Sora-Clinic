<x-dokter-layout id="addx-dokter-layout" title="Tambah Jadwal Periksa" maxWidth="md">
    <div class="flex items-center gap-3 mb-6">
        <x-button class="!px-3" href="{{ route('dokter.obat.index') }}">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
        </x-button>
        <h1 class="text-3xl font-semibold text-gray-800">{{ __('Tambah Obat') }}</h1>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <form action="{{ route('dokter.obat.store') }}" method="POST">
            @csrf
            <div class="space-y-4 max-w-xl ">
                <x-text-input label='Nama Obat' id="nama_obat" placeholder="Masukkan nama obat" />
                <x-text-input label='Kemasan' id="kemasan" placeholder="Masukkan kemasan" />
                <x-text-input label='Harga' id="harga" placeholder="Masukkan harga" />
                <div class="mt-6 flex justify-start gap-2">
                    <x-button label="Batal" variant="danger" type="button" data-modal-hide="addModal"
                        href="{{ route('dokter.obat.index') }}" />
                    <x-button label="Tambah" variant="primary" type="submit" />
                </div>
        </form>
    </div>
    </form>
    </div>
</x-dokter-layout>
