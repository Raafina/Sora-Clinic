<x-pasien-layout>
    <x-toast />
    <h1 class="text-3xl font-medium pb-7">Riwayat Periksa</h1>

    <x-table :headers="['No', 'Poliklinik', 'Dokter', 'Hari', 'Mulai', 'Selesai', 'Antrian', 'Status', 'Aksi']">
        @forelse ($checkupAppointments as $checkupAppointment)
            <x-table-row>
                <x-table-cell>{{ $checkupAppointments->firstItem() + $loop->index }}</x-table-cell>
                <x-table-cell>{{ $checkupAppointment->checkupSchedule->doctor->polyclinic->name }}</x-table-cell>
                <x-table-cell>{{ $checkupAppointment->checkupSchedule->doctor->nama }}</x-table-cell>
                <x-table-cell>{{ $checkupAppointment->checkupSchedule->hari }}</x-table-cell>
                <x-table-cell>{{ \Carbon\Carbon::parse($checkupAppointment->checkupSchedule->jam_mulai)->format('H:i') }}</x-table-cell>
                <x-table-cell>{{ \Carbon\Carbon::parse($checkupAppointment->checkupSchedule->jam_selesai)->format('H:i') }}</x-table-cell>
                <x-table-cell>
                    <p class="bg-primary px-2 py-1 w-fit text-white rounded-lg">{{ $checkupAppointment->no_antrian }}</p>
                </x-table-cell>
                <x-table-cell>
                    @if (is_null($checkupAppointment->checkup))
                        <p class="bg-slate-400 text-white font-medium text-center py-2 px-2 rounded-lg">
                            Belum
                            Periksa</p>
                    @else
                        <p class="bg-green-500  text-white font-medium text-center py-2 px-2 rounded-lg">
                            Sudah
                            Periksa</p>
                    @endif
                    <x-table-cell>
                        @if (is_null($checkupAppointment->checkup))
                            <a href="{{ route('pasien.riwayat-periksa.detail', $checkupAppointment->id) }}"
                                class="bg-yellow-500 text-white font-medium text-center py-2 px-2 rounded-lg">
                                Detail</a>
                        @else
                            <a href="{{ route('pasien.riwayat-periksa.riwayat', $checkupAppointment->id) }}"
                                class="bg-primary text-white font-medium text-center py-2 px-2 rounded-lg">
                                Riwayat</a>
                        @endif
                    </x-table-cell>
                </x-table-cell>
            </x-table-row>
        @empty
        @endforelse
    </x-table>
    {{ $checkupAppointments->links() }}
</x-pasien-layout>
