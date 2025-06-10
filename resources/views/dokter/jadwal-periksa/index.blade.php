<x-dokter-layout>
    <x-toast />
    <h1 class="text-3xl font-medium">Jadwal Periksa</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="/dokter/jadwal-periksa" placeholder="Cari berdasarkan hari" />
        <x-button label="Tambah Jadwal" modal-target="addModal" modal-toggle="addModal" variant="primary"
            href="{{ route('dokter.jadwal-periksa.create') }}" />
    </div>

    <x-table :headers="['Hari', 'Jam Mulai', 'Jam Selesai', 'Status', 'Aksi']">
        @forelse ($jadwalPeriksas as $jadwalPeriksa)
            <x-table-row>
                <x-table-cell isHeader="true">{{ $jadwalPeriksa->hari }}</x-table-cell>
                <x-table-cell>{{ $jadwalPeriksa->jam_mulai }}</x-table-cell>
                <x-table-cell>{{ $jadwalPeriksa->jam_selesai }}</x-table-cell>
                <x-table-cell>
                    @if ($jadwalPeriksa->status)
                        <p class="bg-green-500 text-white font-medium w-1/2 text-center py-1 rounded-lg"> Aktif</p>
                    @else
                        <p class="bg-red-500 text-white font-medium w-1/2 text-center py-1 rounded-lg"> Tidak Aktif</p>
                    @endif
                </x-table-cell>
                <x-table-cell>
                    <form action="{{ route('dokter.jadwal-periksa.update', $jadwalPeriksa->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @if ($jadwalPeriksa->status)
                            <button type="submit"
                                class="bg-red-500 text-white font-medium w-1/2 text-center py-1 rounded-lg">
                                Non Aktifkan
                            </button>
                        @else
                            <button type="submit"
                                class="bg-green-500 text-white font-medium w-1/2 text-center py-1 rounded-lg">
                                Aktifkan</button>
                        @endif
                    </form>
                </x-table-cell>
            </x-table-row>
        @empty
        @endforelse
    </x-table>

    {{ $jadwalPeriksas->links() }}
</x-dokter-layout>
