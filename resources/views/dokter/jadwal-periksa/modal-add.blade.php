<x-modal2 id="addModal" title="Tambah Jadwal Periksa" maxWidth="md">
    <form action="" method="POST">
        @csrf
        <div class="space-y-4"> <x-text-input label='Hari' id="hari" placeholder="Masukkan hari" />
            <x-text-input label='Jam Mulai' id="jam_mulai" placeholder="Masukkan jam mulai" />
            <x-text-input label='Jam Selesai' id="jam_selesai" placeholder="Masukkan jam selesai" />
            <div class="flex items-center justify-center w-full gap-2 pt-2">
                <x-button label="Batal" variant="danger" type="button" halfWidth data-modal-hide="addModal" />
                <x-button label="Tambah" variant="primary" type="submit" halfWidth />
            </div>
        </div>
    </form>
</x-modal2>
