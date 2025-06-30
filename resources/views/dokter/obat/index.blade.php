<x-dokter-layout>
    <x-toast />
    <h1 class="text-3xl font-medium">Daftar Obat</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="/dokter/obat" placeholder="Cari berdasarkan nama obat" />
        <x-button label="Tambah Obat" modal-target="addModal" modal-toggle="addModal" variant="primary"
            href="{{ route('dokter.obat.create') }}" />
    </div>

    <x-table :headers="['No', 'Nama Obat', 'Kemasan', 'Harga', 'Aksi']">
        @forelse ($obats as $obat)
            <x-table-row>
                <x-table-cell>{{ $obats->firstItem() + $loop->index }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $obat->nama_obat }}</x-table-cell>
                <x-table-cell>{{ $obat->kemasan }}</x-table-cell>
                <x-table-cell> {{ 'Rp' . number_format($obat->harga, 0, ',', '.') }}</x-table-cell>
                <x-table-cell>
                    <div class="flex gap-2">
                        <a href="{{ route('dokter.obat.edit', $obat->id) }}">
                            <x-icons.pen />
                        </a>
                        <button type="button" data-modal-target="deleteModal-{{ $obat->id }}"
                            data-modal-toggle="deleteModal-{{ $obat->id }}">
                            <x-icons.trash />
                        </button>
                    </div>
                </x-table-cell>
            </x-table-row>
        @empty
        @endforelse
    </x-table>
    {{ $obats->links() }}

    @foreach ($obats as $obat)
        @include('dokter.obat.delete-modal', ['id' => $obat->id])
    @endforeach
</x-dokter-layout>
