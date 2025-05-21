@props(['dokter'])

<x-modal :id="'deleteModal-' . $dokter->id" title="Hapus Dokter">
    <p class="text-base leading-relaxed ">
        Apakah anda yakin menghapus data dokter ini? Data yang telah dihapus tidak dapat dikembalikan.
    </p>
    <form action="/admin/dokter/{{ $dokter->id }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="flex items-center justify-center w-full gap-2 pt-2 space-y-2">
            <x-button label="Batal" variant="danger" type="button" halfWidth
                data-modal-hide="editModal-{{ $dokter->id }}" />
            <x-button label="Ya, Hapus" variant="primary" type="submit" halfWidth />
        </div>
        </div>
    </form>
</x-modal>
