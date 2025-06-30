<x-dokter-layout>
    <x-toast />
    <h1 class="text-3xl font-medium">Daftar Obat</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="/dokter/obat" placeholder="Cari berdasarkan nama obat" />
        <x-button label="Tambah Obat" modal-target="addModal" modal-toggle="addModal" variant="primary"
            href="{{ route('dokter.obat.create') }}" />
    </div>

    <x-table :headers="['No', 'Nama Obat', 'Kemasan', 'Harga', 'Aksi']">
        @forelse ($medicines as $medicine)
            <x-table-row>
                <x-table-cell>{{ $medicines->firstItem() + $loop->index }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $medicine->nama_obat }}</x-table-cell>
                <x-table-cell>{{ $medicine->kemasan }}</x-table-cell>
                <x-table-cell> {{ 'Rp' . number_format($medicine->harga, 0, ',', '.') }}</x-table-cell>
                <x-table-cell>
                    <div class="flex gap-2">
                        <a href="{{ route('dokter.obat.edit', $medicine->id) }}">
                            <x-icons.pen />
                        </a>
                        <button type="button" data-modal-target="deleteModal-{{ $medicine->id }}"
                            data-modal-toggle="deleteModal-{{ $medicine->id }}">
                            <x-icons.trash />
                        </button>
                    </div>
                </x-table-cell>
            </x-table-row>
        @empty
        @endforelse
    </x-table>
    {{ $medicines->links() }}

    @foreach ($medicines as $medicine)
        @include('dokter.obat.delete-modal', ['id' => $medicine->id])
    @endforeach
</x-dokter-layout>
