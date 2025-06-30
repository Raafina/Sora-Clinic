<x-dokter-layout>
    <x-toast />
    <h1 class="text-3xl font-medium">Daftar Konsultasi Pasien</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="/dokter/konsultasi" placeholder="Cari berdasarkan subjek" />
    </div>

    <x-table :headers="['No', 'Pasien', 'Subjek', 'Pertanyaan', 'Jawaban', 'Aksi']">
        @forelse ($konsultasis as $konsultasi)
            <x-table-row>
                <x-table-cell>{{ $konsultasis->firstItem() + $loop->index }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $konsultasi->pasien->nama }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $konsultasi->subjek }}</x-table-cell>
                <x-table-cell>{{ $konsultasi->pertanyaan }}</x-table-cell>
                <x-table-cell>{{ $konsultasi->jawaban ? $konsultasi->jawaban : '-' }}</x-table-cell>
                <x-table-cell>
                    <div class="flex gap-2">
                        <a href="{{ route('dokter.konsultasi.edit', $konsultasi->id) }}">
                            <x-icons.pen />
                        </a>
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
        @include('dokter.konsultasi.delete-modal', ['id' => $konsultasi->id])
    @endforeach
</x-dokter-layout>
