<x-doctor-layout>
    <x-toast />
    <h1 class="text-3xl font-medium">Daftar Konsultasi Pasien</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="{{ route('doctor.consultation.index') }}" placeholder="Cari berdasarkan subjek" />
    </div>

    <x-table :headers="['No', 'Pasien', 'Subjek', 'Pertanyaan', 'Jawaban', 'Aksi']">
        @forelse ($consultations as $consultation)
            <x-table-row>
                <x-table-cell>{{ $consultations->firstItem() + $loop->index }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $consultation->patient->name }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $consultation->subjek }}</x-table-cell>
                <x-table-cell>{{ $consultation->pertanyaan }}</x-table-cell>
                <x-table-cell>{{ $consultation->jawaban ? $consultation->jawaban : '-' }}</x-table-cell>
                <x-table-cell>
                    <div class="flex gap-2">
                        <a href="{{ route('doctor.consultation.edit', $consultation->id) }}">
                            <x-icons.pen />
                        </a>
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
        @include('doctor.consultation.delete-modal', ['id' => $consultation->id])
    @endforeach
</x-doctor-layout>
