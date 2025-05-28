<x-dokter-layout>
    <x-toast-success />
    <h1 class="text-3xl font-medium">Daftar Obat</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="/dokter/obat" placeholder="Cari berdasarkan nama obat" />
        <x-button label="Tambah Obat" modal-target="addModal" modal-toggle="addModal" variant="primary"
            href="{{ route('dokter.obat.create') }}" />
    </div>

    <x-table :headers="['Nama Obat', 'Kemasan', 'Harga', 'Aksi']">
        @forelse ($obats as $obat)
            <x-table-row>
                <x-table-cell isHeader="true">{{ $obat->nama_obat }}</x-table-cell>
                <x-table-cell>{{ $obat->kemasan }}</x-table-cell>
                <x-table-cell>{{ $obat->harga }}</x-table-cell>
                <x-table-action id="{{ $obat->id }}" deleteModalId="deleteModal-{{ $obat->id }}" />
            </x-table-row>
        @empty
        @endforelse
    </x-table>
    {{ $obats->links() }}

    @foreach ($obats as $obat)
        @include('dokter.obat.delete-modal', ['id' => $obat->id])
    @endforeach
</x-dokter-layout>
