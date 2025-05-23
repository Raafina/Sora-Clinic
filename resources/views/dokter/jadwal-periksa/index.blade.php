<x-dokter-layout>
    <h1 class="text-3xl font-medium">Jadwal Periksa</h1>

    {{-- <div class="flex justify-between py-4">
        <x-search-input route="/admin/dokter" placeholder="Cari nama dokter" />
        <x-button label="Tambah Dokter" modal-target="addModal" modal-toggle="addModal" variant="primary" />
        @include('admin.dokter.add-modal')
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
            </x-table-row>
        @empty
        @endforelse
    </x-table>

    @foreach ($dokters as $dokter)
        @include('admin.dokter.delete-modal', ['dokter' => $dokter])
        @include('admin.dokter.edit-modal', ['dokter' => $dokter])
    @endforeach

    {{ $dokters->links() }} --}}
</x-dokter-layout>
