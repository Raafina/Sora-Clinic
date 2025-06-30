<x-admin-layout>
    <x-toast />
    <h1 class="text-3xl font-medium">Daftar Poliklinik</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="{{ route('admin.polyclinic.index') }}" placeholder="Cari berdasarkan nama poliklinik" />
        <x-button label="Tambah Poliklinik" variant="primary" href="{{ route('admin.polyclinic.create') }}" />
    </div>

    <x-table :headers="['No', 'Nama', 'Deskripsi', 'Aksi']">
        @forelse ($polyclinics as $polyclinic)
            <x-table-row>
                <x-table-cell>{{ $polyclinics->firstItem() + $loop->index }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $polyclinic->name }}</x-table-cell>
                <x-table-cell>{{ $polyclinic->description }}</x-table-cell>
                <x-table-cell>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.polyclinic.edit', $polyclinic->id) }}">
                            <x-icons.pen />
                        </a>
                        <button type="button" data-modal-target="deleteModal-{{ $polyclinic->id }}"
                            data-modal-toggle="deleteModal-{{ $polyclinic->id }}">
                            <x-icons.trash />
                        </button>
                    </div>
                </x-table-cell>
            </x-table-row>
        @empty
        @endforelse
    </x-table>
    {{ $polyclinics->links() }}

    @foreach ($polyclinics as $polyclinic)
        @include('admin.polyclinic.delete-modal', ['id' => $polyclinic->id])
    @endforeach
</x-admin-layout>
