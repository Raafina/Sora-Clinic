<x-admin-layout>
    <x-toast />
    <h1 class="text-3xl font-medium">Daftar Dokter</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="{{ route('admin.doctor.index') }}" placeholder="Cari berdasarkan nama dokter" />
        <x-button label="Tambah Dokter" variant="primary" href="{{ route('admin.doctor.create') }}" />
    </div>

    <x-table :headers="['No', 'Nama', 'Username', 'Email', 'Poliklinik', 'Aksi']">
        @forelse ($doctors as $doctor)
            <x-table-row>
                <x-table-cell>{{ $doctors->firstItem() + $loop->index }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $doctor->name }}</x-table-cell>
                <x-table-cell>{{ $doctor->username }}</x-table-cell>
                <x-table-cell>{{ $doctor->email }}</x-table-cell>
                <x-table-cell>{{ $doctor->polyclinic->name }}</x-table-cell>
                <x-table-cell>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.doctor.edit', $doctor->id) }}">
                            <x-icons.pen />
                        </a>
                        <button type="button" data-modal-target="deleteModal-{{ $doctor->id }}"
                            data-modal-toggle="deleteModal-{{ $doctor->id }}">
                            <x-icons.trash />
                        </button>
                    </div>
                </x-table-cell>
            </x-table-row>
        @empty
        @endforelse
    </x-table>
    {{ $doctors->links() }}

    @foreach ($doctors as $doctor)
        @include('admin.doctor.delete-modal', ['id' => $doctor->id])
    @endforeach
</x-admin-layout>
