<x-pasien-layout>
    <x-toast />
    <h1 class="text-3xl font-medium">Daftar Konsultasi Dokter</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="/pasien/konsultasi" placeholder="Cari berdasarkan subjek" />
        <x-button label="Tambah Konsultasi" modal-target="addModal" modal-toggle="addModal" variant="primary"
            href="{{ route('pasien.konsultasi.create') }}" />
    </div>

    <x-table :headers="['No', 'Dokter', 'Subjek', 'Pertanyaan', 'Jawaban', 'Aksi']">
        @forelse ($consultations as $consultation)
            <x-table-row>
                <x-table-cell>{{ $consultations->firstItem() + $loop->index }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $consultation->dokter->nama }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $consultation->subjek }}</x-table-cell>
                <x-table-cell>{{ $consultation->pertanyaan }}</x-table-cell>
                <x-table-cell>{{ $consultation->jawaban ? $consultation->jawaban : '-' }}</x-table-cell>
                <x-table-cell>
                    <div class="flex gap-2">
                        @if (is_null($consultation->jawaban))
                            <a href="{{ route('pasien.konsultasi.edit', $consultation->id) }}">
                                <x-icons.pen />
                            </a>
                        @endif
                        <button type="button" data-modal-target="deleteModal-{{ $consultation->id }}"
                            data-modal-toggle="deleteModal-{{ $consultation->id }}">
                            <x-icons.trash />
                        </button>
                    </div>
                </x-table-cell>
            </x-table-row>
        @empty
        @endforelse
    </x-table>
    {{ $consultations->links() }}

    @foreach ($consultations as $consultation)
        @include('pasien.konsultasi.delete-modal', ['id' => $consultation->id])
    @endforeach
</x-pasien-layout>
