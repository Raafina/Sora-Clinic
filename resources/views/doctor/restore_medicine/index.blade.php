<x-doctor-layout>
    <x-toast />
    <h1 class="text-3xl font-medium">Daftar Obat Terhapus</h1>

    <div class="flex justify-between py-4">
        <x-search-input route="{{ route('doctor.restore_medicine.index') }}" placeholder="Cari berdasarkan nama obat" />
    </div>

    <x-table :headers="['No', 'Nama Obat', 'Kemasan', 'Harga', 'Penghapusan', 'Aksi']">
        @forelse ($medicines as $medicine)
            <x-table-row>
                <x-table-cell>{{ $medicines->firstItem() + $loop->index }}</x-table-cell>
                <x-table-cell isHeader="true">{{ $medicine->medicine_name }}</x-table-cell>
                <x-table-cell>{{ $medicine->packaging }}</x-table-cell>
                <x-table-cell> {{ 'Rp' . number_format($medicine->price, 0, ',', '.') }}</x-table-cell>
                <x-table-cell>
                    {{ \Carbon\Carbon::parse($medicine->deleted_at)->locale('id')->translatedFormat('d F Y H.i') }}</x-table-cell>
                <x-table-cell>
                    <form method="POST" action="{{ route('doctor.restore_medicine.restore', $medicine->id) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="flex items-center gap-1 text-white font-medium px-3 text-center py-1 rounded-lg bg-green-500 w-fit">
                            Restore
                        </button>
                    </form>
                </x-table-cell>
            </x-table-row>
        @empty
        @endforelse
    </x-table>
    {{ $medicines->links() }}
</x-doctor-layout>
