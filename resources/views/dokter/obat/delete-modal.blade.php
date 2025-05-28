@props(['id'])

<x-modal :id="'deleteModal-' . $id" title="Hapus Obat">
    <p class="text-base leading-relaxed ">
        Apakah anda yakin menghapus data obat ini? Data yang telah dihapus tidak dapat dikembalikan.
    </p>
    <form action={{ route('dokter.obat.destroy', $id) }} method="POST">
        @csrf
        @method('DELETE')
        <div class="flex items-center justify-center w-full gap-2 pt-2 space-y-2">
            <x-button label="Batal" variant="danger" type="button" halfWidth
                data-modal-hide="editModal-{{ $id }}" />
            <x-button label="Ya, Hapus" variant="primary" type="submit" halfWidth />
        </div>
        </div>
    </form>
</x-modal>
