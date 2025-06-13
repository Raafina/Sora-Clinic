<x-dokter-layout id="add-dokter-layout" maxWidth="md">
    <div class="flex items-center gap-3 mb-6">
        <x-button class="!px-3" href="{{ route('dokter.memeriksa.index') }}">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
        </x-button>
        <h1 class="text-3xl font-semibold text-gray-800">{{ __('Periksa Pasien') }}</h1>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <form action="{{ route('dokter.memeriksa.store', $janjiPeriksa->id) }}" method="POST">
            @csrf
            <div class="space-y-4 max-w-xl ">
                <x-text-input label='Nama' id="nama" placeholder="Nama pasien" readonly
                    value="{{ $janjiPeriksa->pasien->nama }}" />
                <x-text-input label='Tanggal Periksa' id="tgl_periksa" type="datetime-local" />
                <x-text-area label='Catatan' id="catatan" placeholder="Masukkan catatan" />
                {{-- select obat --}}
                <label for="obatSelect" class="block text-sm font-medium text-gray-900">Pilih Obat</label>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 placeholder:text-gray-400 rounded-lg
                            focus:ring-primary-600 focus:border-primary-600 block w-full !my-2 p-2.5
                            {{ $errors->has('obat') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
                    name="obats[]" id="obatSelect" required multiple onchange="hitungBiayaPeriksa()">
                    @foreach ($obats as $obat)
                        <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}">{{ $obat->nama_obat }} -
                            {{ $obat->kemasan }} (Rp.{{ number_format($obat->harga, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
                <small>
                    Tekan Ctrl (Windows) atau Command (Mac) untuk memilih lebih dari satu obat
                </small>

                <x-text-input label='Biaya Pemeriksaan' id="biaya_periksa" placeholder="Biaya Pemeriksaan" readonly
                    value="150000" />
                <div class="mt-6 flex justify-start gap-2">
                    <x-button label="Batal" variant="danger" type="button" data-modal-hide="addModal"
                        href="{{ route('dokter.memeriksa.index') }}" />
                    <x-button label="Simpan" variant="primary" type="submit" />
                </div>
        </form>
    </div>

    <script>
        function hitungBiayaPeriksa() {
            const baseBiayaPeriksa = 150000;
            let totalBiaya = baseBiayaPeriksa;
            const select = document.getElementById('obatSelect');
            const selectedOptions = Array.from(select.selectedOptions);

            selectedOptions.forEach((option) => {
                const harga = parseFloat(option.getAttribute('data-harga'));
                totalBiaya += harga;
            });

            document.getElementById('biaya_periksa').value = totalBiaya;
        }
    </script>
</x-dokter-layout>
