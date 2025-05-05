<x-layout-admin-dashboard>
    <h1 class="text-3xl font-medium">Pengelolaan Dokter</h1>
    <div class="flex justify-between py-4">
        <x-search-input route="/admin/dokter" placeholder="Cari nama dokter" />
        <button data-modal-target="addModal" data-modal-toggle="addModal"
            class="bg-primary hover:bg-opacity-90 text-white font-medium py-2 px-4 rounded-xl">Tambah
            Dokter
        </button>
    </div>
    <x-table :headers="['Nama', 'Alamat', 'No Telp', 'Poli', 'Aksi']">
        @forelse ($dokters as $dokter)
            <x-table-row>
                <x-table-cell isHeader="true">{{ $dokter->nama }}</x-table-cell>
                <x-table-cell>{{ $dokter->alamat }}</x-table-cell>
                <x-table-cell>{{ $dokter->no_telp }}</x-table-cell>
                <x-table-cell>{{ $dokter->id_poli }}</x-table-cell>
                <x-table-action editModalId="editModal-{{ $dokter->id }}"
                    deleteModalId="deleteModal-{{ $dokter->id }}" />
                @include('admin.dokter.add-modal')
                @include('admin.dokter.delete-modal', ['dokter' => $dokter])
                @include('admin.dokter.edit-modal', ['dokter' => $dokter])
                </td>
            </x-table-row>
        @empty
        @endforelse
    </x-table>
    {{ $dokters->links() }}
</x-layout-admin-dashboard>
