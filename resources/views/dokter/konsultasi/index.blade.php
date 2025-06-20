<x-dokter-layout>
    <x-toast />
    <h1 class="text-3xl font-medium">Daftar Konsultasi Pasien</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="/dokter/konsultasi" placeholder="Cari berdasarkan subjek" />
        <x-button label="Tambah Konsultasi" modal-target="addModal" modal-toggle="addModal" variant="primary"
            href="{{ route('dokter.konsultasi.create') }}" />
    </div>

    <x-table :headers="['No', 'Dokter', 'Subjek', 'Pertanyaan', 'Jawaban', 'Aksi']">
        @forelse ($konsultasis as $konsultasi)
            <x-table-row>
                <x-table-cell>{{ $konsultasis->firstItem() + $loop->index }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $konsultasi->dokter->nama }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $konsultasi->subjek }}</x-table-cell>
                <x-table-cell>{{ $konsultasi->pertanyaan }}</x-table-cell>
                <x-table-cell>{{ $konsultasi->jawaban ? $konsultasi->jawaban : '-' }}</x-table-cell>
                <x-table-action id="{{ $konsultasi->id }}" deleteModalId="deleteModal-{{ $konsultasi->id }}"
                    editRoute="dokter.konsultasi.edit" />
            </x-table-row>
        @empty
        @endforelse
    </x-table>
    {{ $konsultasis->links() }}

    @foreach ($konsultasis as $konsultasi)
        @include('dokter.konsultasi.delete-modal', ['id' => $konsultasi->id])
    @endforeach
</x-dokter-layout>
