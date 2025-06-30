<x-pasien-layout>
    <x-toast />
    <h1 class="text-3xl font-medium">Daftar Konsultasi Dokter</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="/pasien/konsultasi" placeholder="Cari berdasarkan subjek" />
        <x-button label="Tambah Konsultasi" modal-target="addModal" modal-toggle="addModal" variant="primary"
            href="{{ route('pasien.konsultasi.create') }}" />
    </div>

    <x-table :headers="['No', 'Dokter', 'Subjek', 'Pertanyaan', 'Jawaban', 'Aksi']">
        @forelse ($konsultasis as $konsultasi)
            <x-table-row>
                <x-table-cell>{{ $konsultasis->firstItem() + $loop->index }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $konsultasi->dokter->nama }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $konsultasi->subjek }}</x-table-cell>
                <x-table-cell>{{ $konsultasi->pertanyaan }}</x-table-cell>
                <x-table-cell>{{ $konsultasi->jawaban ? $konsultasi->jawaban : '-' }}</x-table-cell>
                <x-table-cell>
                    <div class="flex gap-2">
                        @if (is_null($konsultasi->jawaban))
                            <a href="{{ route('pasien.konsultasi.edit', $konsultasi->id) }}">
                                <x-icons.pen />
                            </a>
                        @endif
                        <button type="button" data-modal-target="deleteModal-{{ $konsultasi->id }}"
                            data-modal-toggle="deleteModal-{{ $konsultasi->id }}">
                            <x-icons.trash />
                        </button>
                    </div>
                </x-table-cell>
            </x-table-row>
        @empty
        @endforelse
    </x-table>
    {{ $konsultasis->links() }}

    @foreach ($konsultasis as $konsultasi)
        @include('pasien.konsultasi.delete-modal', ['id' => $konsultasi->id])
    @endforeach
</x-pasien-layout>
