<x-pasien-layout>
    <x-toast />
    <h1 class="text-3xl font-medium pb-7">Daftar Poliklinik</h1>

    <div class="p-4 sm:p-5 shadow border border-gray-300 rounded-xl bg-white">
        <form action="{{ route('pasien.daftar-poli.store') }}" method="POST">
            @csrf
            <div class="space-y-4 max-w-xl ">
                <x-text-input label='Nomor Rekam Medis' id="no_rm" type="text" value="{{ $no_rm }}"
                    disabled />
                {{-- select dokter --}}
                <label for="dokterSelect" class="block mb-2 text-sm font-medium text-gray-900">Pilih Dokter</label>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 placeholder:text-gray-400 rounded-lg
                            focus:ring-primary-600 focus:border-primary-600 block w-full !my-2 p-2.5
                            {{ $errors->has('id_dokter') ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"
                    name="id_dokter" id="dokterSelect" required>
                    <option value="">Pilih Dokter</option>
                    @foreach ($dokters as $dokter)
                        @foreach ($dokter->jadwalPeriksas as $jadwal)
                            <option value="{{ $dokter->id }}">
                                {{ $dokter->nama }} - Spesialis {{ $dokter->poli }} |
                                {{ $jadwal->hari }},
                                {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H.i') }} -
                                {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H.i') }}
                            </option>
                        @endforeach
                    @endforeach
                </select>
                <x-text-area label='Keluhan' id="keluhan" placeholder="Masukkan keluhan" />
                <div class="mt-6 flex justify-start gap-2">
                    <x-button label="Batal" variant="danger" type="button" data-modal-hide="addModal"
                        href="{{ route('dokter.jadwal-periksa.index') }}" />
                    <x-button label="Tambah" variant="primary" type="submit" />
                </div>
        </form>
    </div>
</x-pasien-layout>
