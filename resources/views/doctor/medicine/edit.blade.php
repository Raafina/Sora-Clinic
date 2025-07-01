<x-doctor-layout>
    <div class="flex items-center gap-3 mb-6">
        <x-button class="!px-3" href="{{ route('doctor.medicine.index') }}">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
        </x-button>
        <h1 class="text-3xl font-semibold text-gray-800">{{ __('Ubah Obat') }}</h1>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <form action="{{ route('doctor.medicine.update', $medicine->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4 max-w-xl ">
                <x-text-input label='Nama Obat' id="medicine_name" placeholder="Masukkan nama obat"
                    value="{{ $medicine->medicine_name }}" />
                <x-text-input label='Kemasan' id="packaging" placeholder="Masukkan kemasan"
                    value="{{ $medicine->packaging }}" />
                <x-text-input label='Harga' id="price" placeholder="Masukkan harga"
                    value="{{ $medicine->price }}" />
                <div class="mt-6 flex justify-start gap-2">
                    <x-button label="Batal" variant="danger" type="button" data-modal-hide="addModal"
                        href="{{ route('doctor.medicine.index') }}" />
                    <x-button label="Simpan" variant="primary" type="submit" />
                </div>
            </div>
        </form>
    </div>
</x-doctor-layout>
