<x-layout-admin-dashboard>
    <h1 class="text-3xl font-medium">Pengelolaan Dokter</h1>
    <div class="flex justify-between py-4">
        <form class="flex items-center w-1/2" method="GET" action="/admin/dokter">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <input type="text" id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder:text-secondary"
                    placeholder="Cari nama dokter" type="search" id="search" name='search'
                    value="{{ request('search') }}" />
            </div>
            <button type="submit"
                class="p-2.5 ms-2 text-sm font-medium text-white bg-primary rounded-lg border border-blue-300 hover:bg-opacity-80 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form>
        <button class="bg-primary hover:bg-opacity-80 text-white font-medium py-2 px-4 rounded-xl">Tambah
            Dokter
        </button>
    </div>
    <div class="relative overflow-x-auto shadow-md border border-gray-300 rounded-xl bg-white p-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-l-lg">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No Telp
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Poli
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                        Aksi
                    </th>
                </tr>
            </thead>
            @forelse ($dokters as $dokter)
                <tbody>
                    <tr class="bg-white  hover:bg-gray-50 ">
                        <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $dokter->nama }}
                        </th>
                        <td class="px-6 py-3">
                            {{ $dokter->alamat }}
                        </td>
                        <td class="px-6 py-3">
                            {{ $dokter->no_telp }}
                        </td>
                        <td class="px-6 py-3">
                            {{ $dokter->id_poli }}
                        </td>
                        <td class="px-6 py-3 flex flex-row gap-2">
                            <div class="bg-yellow-500 p-1 rounded-md hover:opacity-75">
                                <a href="">
                                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                    </svg>
                                </a>
                            </div>

                            <div class="bg-red-500 p-1 rounded-md hover:opacity-75">
                                <form action="" method="POST" class="flex justify-center">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you sure to delete this post?')">
                                        <svg class="w-6 h-6 text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-40 text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </table>
    </div>
    {{ $dokters->links() }}

</x-layout-admin-dashboard>
