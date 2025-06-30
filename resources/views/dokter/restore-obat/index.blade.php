<x-dokter-layout>
    <x-toast />
    <h1 class="text-3xl font-medium">Daftar Obat Terhapus</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="/dokter/restore-obat" placeholder="Cari berdasarkan nama obat" />
    </div>

    <x-table :headers="['No', 'Nama Obat', 'Kemasan', 'Harga', 'Penghapusan', 'Aksi']">
        @forelse ($obats as $obat)
            <x-table-row>
                <x-table-cell>{{ $obats->firstItem() + $loop->index }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $obat->nama_obat }}</x-table-cell>
                <x-table-cell>{{ $obat->kemasan }}</x-table-cell>
                <x-table-cell> {{ 'Rp' . number_format($obat->harga, 0, ',', '.') }}</x-table-cell>
                <x-table-cell>
                    {{ \Carbon\Carbon::parse($obat->deleted_at)->locale('id')->translatedFormat('d F Y H.i') }}</x-table-cell>
                <x-table-cell>
                    <form method="POST" action="{{ route('dokter.restore-obat.restore', $obat->id) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="flex items-center gap-1 text-white font-medium px-3 text-center py-1 rounded-lg bg-green-500 w-fit">
                            Restore
                        </button>
                    </form>
                </x-table-cell>
            </x-table-row>
        @empty
        @endforelse
    </x-table>
    {{ $obats->links() }}
</x-dokter-layout>
