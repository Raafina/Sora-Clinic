<x-dokter-layout>
    <x-toast />
    <h1 class="text-3xl font-medium">Daftar Obat Terhapus</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="/dokter/obat" placeholder="Cari berdasarkan nama obat" />
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
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13.5 8H4m4 6h8m0 0-2-2m2 2-2 2M4 6v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5.032a1 1 0 0 1-.768-.36l-1.9-2.28a1 1 0 0 0-.768-.36H5a1 1 0 0 0-1 1Z" />
                            </svg>
                            <span>Restore</span>
                        </button>
                    </form>
                </x-table-cell>
            </x-table-row>
        @empty
        @endforelse
    </x-table>
    {{ $obats->links() }}
</x-dokter-layout>
