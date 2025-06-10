<x-dokter-layout>
    <x-toast />
    <h1 class="text-3xl font-medium">Periksa Pasien</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="/dokter/memeriksa" placeholder="Cari berdasarkan hari" />
    </div>

    <x-table :headers="['No Antrian', 'Nama Pasien', 'Keluhan', 'Aksi']">
        @forelse ($janjiPeriksas as $janjiPeriksa)
            <x-table-row>
                <x-table-cell isHeader="true">{{ $janjiPeriksa->no_antrian }}</x-table-cell>
                <x-table-cell>{{ $janjiPeriksa->pasien->nama }}</x-table-cell>
                <x-table-cell>{{ $janjiPeriksa->keluhan }}</x-table-cell>
                <x-table-cell>
                    @if (is_null($janjiPeriksa->periksas))
                        <a href="{{ route('dokter.memeriksa.periksa', $janjiPeriksa->id) }}"
                            class="bg-primary text-white font-medium w-1/2 text-center py-2 px-4 rounded-lg">Periksa</a>
                    @else
                        <a href="{{ route('') }}"
                            class="bg-yellow-500 text-white font-medium w-1/2 text-center py-2 px-4 rounded-lg">Edit</a>
                    @endif
                </x-table-cell>
            </x-table-row>
        @empty
        @endforelse
    </x-table>

    {{ $janjiPeriksas->links() }}
</x-dokter-layout>
