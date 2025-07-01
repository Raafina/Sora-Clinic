<x-doctor-layout>
    <x-toast />
    <h1 class="text-3xl font-medium ">Periksa Pasien</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="/dokter/memeriksa" placeholder="Cari berdasarkan nama pasien" />
    </div>

    <x-table :headers="['No', 'Nama Pasien', 'No Antrian', 'Keluhan', 'Aksi']">
        @forelse ($checkupAppointments as $checkupAppointment)
            <x-table-row>
                <x-table-cell>{{ $checkupAppointments->firstItem() + $loop->index }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $checkupAppointment->patient->nama }}</x-table-cell>
                <x-table-cell>
                    <p class="bg-primary px-2 py-1 w-fit text-white rounded-lg">{{ $checkupAppointment->no_antrian }}</p>
                </x-table-cell>
                <x-table-cell>{{ $checkupAppointment->keluhan }}</x-table-cell>
                <x-table-cell>
                    @if (is_null($checkupAppointment->checkup))
                        <a href="{{ route('doctor.chekingup.periksa', $checkupAppointment->id) }}"
                            class="bg-green-500 text-white font-medium w-1/2 text-center py-2 px-4 rounded-lg">Periksa</a>
                    @else
                        <a href="{{ route('doctor.chekingup.edit', $checkupAppointment->id) }}"
                            class="bg-yellow-500 text-white font-medium w-1/2 text-center py-2 px-4 rounded-lg">Edit</a>
                    @endif
                </x-table-cell>
            </x-table-row>
        @empty
        @endforelse
    </x-table>

    {{ $checkupAppointments->links() }}
</x-doctor-layout>
