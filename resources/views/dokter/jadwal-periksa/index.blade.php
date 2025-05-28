<x-dokter-layout>
    <h1 class="text-3xl font-medium">Jadwal Periksa</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="/dokter/jadwal-periksa" placeholder="Cari berdasarkan hari" />
        <x-button label="Tambah Jadwal" modal-target="addModal" modal-toggle="addModal" variant="primary" />
    </div>

    <x-table :headers="['Hari', 'Jam Mulai', 'Jam, Selesai', 'Aksi']">
        @forelse ($jadwalPeriksas as $jadwalPeriksa)
            <x-table-row>
                <x-table-cell isHeader="true">{{ $jadwalPeriksa->hari }}</x-table-cell>
                <x-table-cell>{{ $jadwalPeriksa->jam_mulai }}</x-table-cell>
                <x-table-cell>{{ $jadwalPeriksa->jam_selesai }}</x-table-cell>
            </x-table-row>
        @empty
        @endforelse
    </x-table>

    {{ $jadwalPeriksas->links() }}
</x-dokter-layout>
