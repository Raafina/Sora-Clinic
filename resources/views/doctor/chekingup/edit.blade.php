<x-doctor-layout>
    <div class="flex items-center gap-3 mb-6">
        <x-button class="!px-3" href="{{ route('doctor.chekingup.index') }}">
            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
        </x-button>
        <h1 class="text-3xl font-semibold text-gray-800">{{ __('Ubah Data Periksa Pasien') }}</h1>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <form action="{{ route('doctor.chekingup.update', $checkupAppointment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4 max-w-xl ">
                <x-text-input label='Nama' id="nama" placeholder="Nama pasien" readonly
                    value="{{ $checkupAppointment->patient->nama }}" />
                <x-text-input label='Tanggal Periksa' id="tgl_periksa" type="datetime-local"
                    value="{{ $checkupAppointment->checkup->tgl_periksa }}" />
                <x-text-area label='Catatan' id="catatan" placeholder="Masukkan catatan"
                    value="{{ $checkupAppointment->checkup->catatan }}" />
                {{-- select obat --}}
                <label for="obatSelect" class="block text-sm font-medium text-gray-900">Pilih Obat</label>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 placeholder:text-gray-400 rounded-lg
                            focus:ring-primary-600 focus:border-primary-600 block w-full !my-2 p-2.5
                            {{ $errors->has('obat') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
                    name="obats[]" id="obatSelect" required multiple onchange="hitungBiayaPeriksa()">
                    @foreach ($medicines as $medicine)
                        <option value="{{ $medicine->id }}" data-harga="{{ $medicine->harga }}"
                            {{ in_array($medicine->id, $checkupAppointment->checkup->checkupDetails->pluck('id_obat')->toArray()) ? 'selected' : '' }}>
                            {{ $medicine->nama_obat }} -
                            {{ $medicine->kemasan }} (Rp.{{ number_format($medicine->harga, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
                <small>
                    Tekan Ctrl (Windows) atau Command (Mac) untuk memilih lebih dari satu obat
                </small>
                {{-- Input untuk tampilan yang sudah diformat --}}
                <x-text-input label='Biaya Pemeriksaan' id="biaya_periksa_display" placeholder="Biaya Pemeriksaan"
                    readonly value="{{ number_format($checkupAppointment->checkup->biaya_periksa, 0, ',', '.') }}" />

                {{-- Input tersembunyi untuk dikirim ke server --}}
                <input type="hidden" id="biaya_periksa" name="biaya_periksa"
                    value="{{ $checkupAppointment->checkup->biaya_periksa }}">

                <div class="mt-6 flex justify-start gap-2">
                    <x-button label="Batal" variant="danger" type="button" data-modal-hide="addModal"
                        href="{{ route('doctor.chekingup.index') }}" />
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

            const formatted = new Intl.NumberFormat('id-ID', {
                minimumFractionDigits: 0
            }).format(totalBiaya);

            document.getElementById('biaya_periksa_display').value = formatted;
        }
    </script>

</x-doctor-layout>
