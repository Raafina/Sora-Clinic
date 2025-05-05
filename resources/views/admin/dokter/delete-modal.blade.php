@props(['dokter'])

<x-modal :id="'deleteModal-' . $dokter->id" title="Hapus Dokter">
    <p class="text-base leading-relaxed ">
        Apakah anda yakin menghapus data dokter ini?
    </p>
    <div class="flex items-center justify-center w-full pt-4">
        <form action="/admin/dokter/{{ $dokter->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="w-full text-white bg-primary hover:bg-opacity-90 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
                Ya, Hapus
            </button>
            <button type="button" data-modal-hide="deleteModal-{{ $dokter->id }}"
                class="w-full text-red-500 border-2 border-red-500 hover:bg-red-100 rounded-lg text-sm font-medium px-5 py-2.5">
                Batal
            </button>
        </form>
    </div>
</x-modal>
