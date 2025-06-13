<x-pasien-layout>
    <x-toast />
    <h1 class="text-3xl font-medium">Riwayat Periksa</h1>

    {{-- <div class="flex justify-between py-4">
        <x-search-input route="/dokter/obat" placeholder="Cari berdasarkan nama obat" />
        <x-button label="Tambah Obat" modal-target="addModal" modal-toggle="addModal" variant="primary"
            href="{{ route('dokter.obat.create') }}" />
    </div> --}}

    <x-table :headers="['No', 'Poliklinik', 'Dokter', 'Hari', 'Mulai', 'Selesai', 'Antrian', 'Status', 'Aksi']">
        @forelse ($janjiPeriksas as $janjiPeriksa)
            <x-table-row>
                <x-table-cell>{{ $loop->iteration }}</x-table-cell>
                <x-table-cell>{{ $janjiPeriksa->jadwalPeriksas->dokter->poli }}</x-table-cell>
                <x-table-cell>{{ $janjiPeriksa->jadwalPeriksas->dokter->nama }}</x-table-cell>
                <x-table-cell>{{ $janjiPeriksa->jadwalPeriksas->hari }}</x-table-cell>
                <x-table-cell>{{ $janjiPeriksa->jadwalPeriksas->jam_mulai }}</x-table-cell>
                <x-table-cell>{{ $janjiPeriksa->jadwalPeriksas->jam_selesai }}</x-table-cell>
                <x-table-cell>{{ $janjiPeriksa->no_antrian }}</x-table-cell>
                <x-table-cell>
                    @if (is_null($janjiPeriksa->periksa))
                        <p class="bg-slate-400 text-white font-medium text-center py-2 px-2 rounded-lg">
                            Belum
                            Periksa</p>
                    @else
                        <p class="bg-green-500  text-white font-medium text-center py-2 px-2 rounded-lg">
                            Sudah
                            Periksa</p>
                    @endif
                    <x-table-cell>
                        @if (is_null($janjiPeriksa->periksa))
                            <a href="{{ route('pasien.riwayat-periksa.detail', $janjiPeriksa->id) }}"
                                class="bg-yellow-500 text-white font-medium text-center py-2 px-2 rounded-lg">
                                Detail</a>
                        @else
                            <a href="{{ route('pasien.riwayat-periksa.riwayat', $janjiPeriksa->id) }}"
                                class="bg-primary text-white font-medium text-center py-2 px-2 rounded-lg">
                                Riwayat</a>
                        @endif
                    </x-table-cell>
                </x-table-cell>
            </x-table-row>
        @empty
        @endforelse
    </x-table>
    {{-- {{ $janjiPeriksas->links() }} --}}
</x-pasien-layout>
