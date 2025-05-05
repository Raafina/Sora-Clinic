@props(['dokter'])

<x-modal :id="'editModal-' . $dokter->id" title="Edit Dokter" maxWidth="md">
    <form class="space-y-4" action="/admin/dokter/{{ $dokter->id }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">
                Nama Dokter
            </label>
            <input type="text" name="nama" id="nama"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Nama lengkap dokter" value="{{ $dokter->nama }}" required />
        </div>
        <div>
            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">
                Alamat
            </label>
            <textarea name="alamat" id="alamat" rows="3"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Alamat lengkap" required>{{ $dokter->alamat }}</textarea>
        </div>
        <div>
            <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900">
                No Telepon
            </label>
            <input type="text" name="no_telp" id="no_telp"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Nomor telepon" value="{{ $dokter->no_telp }}" required />
        </div>
        <div>
            <label for="id_poli" class="block mb-2 text-sm font-medium text-gray-900">
                Poli
            </label>
            <select name="id_poli" id="id_poli"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                required>
                <option value="" disabled>Pilih Poli</option>
                @foreach ($polis ?? [] as $poli)
                    <option value="{{ $poli->id }}" {{ $dokter->id_poli == $poli->id ? 'selected' : '' }}>
                        {{ $poli->nama_poli }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-center w-full gap-2 pt-4">
            <button type="submit"
                class="w-1/2 text-white bg-primary hover:bg-opacity-90 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Simpan
            </button>
            <button type="button" data-modal-hide="editModal-{{ $dokter->id }}"
                class="w-1/2 text-red-500 border-2 border-red-500 hover:bg-red-100 rounded-lg text-sm font-medium px-5 py-2.5">
                Batal
            </button>
        </div>
    </form>
</x-modal>
