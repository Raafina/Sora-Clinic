<x-layout-admin-dashboard>
    <h1 class="text-3xl font-medium">Pengelolaan Dokter</h1>
    <div class="flex justify-between py-4">
        <form class="flex items-center w-1/2">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <input type="text" id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Cari nama dokter" required />
            </div>
            <button type="submit"
                class="p-2.5 ms-2 text-sm font-medium text-white bg-primary rounded-full border border-blue-300 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form>
        <button class="bg-primary hover:bg-primary-600 text-white font-medium py-2 px-4 rounded-xl">Tambah
            Dokter
        </button>
    </div>
    <div class="relative overflow-x-auto shadow-md border border-gray-300 rounded-xl bg-white p-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-l-lg">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Color
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white  hover:bg-gray-50 ">
                    <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap ">
                        Apple MacBook Pro 17"
                    </th>
                    <td class="px-6 py-3">
                        Silver
                    </td>
                    <td class="px-6 py-3">
                        Laptop
                    </td>
                    <td class="px-6 py-3">
                        $2999
                    </td>
                    <td class="px-6 py-3 text-right">
                        <a href="#" class="font-medium text-blue-600  hover:underline">Edit</a>
                    </td>
                </tr>
                <tr class="bg-white  hover:bg-gray-50 ">
                    <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap ">
                        Microsoft Surface Pro
                    </th>
                    <td class="px-6 py-3">
                        White
                    </td>
                    <td class="px-6 py-3">
                        Laptop PC
                    </td>
                    <td class="px-6 py-3">
                        $1999
                    </td>
                    <td class="px-6 py-3 text-right">
                        <a href="#" class="font-medium text-blue-600  hover:underline">Edit</a>
                    </td>
                </tr>
                <tr class="bg-white hover:bg-gray-50 ">
                    <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap ">
                        Magic Mouse 2
                    </th>
                    <td class="px-6 py-3">
                        Black
                    </td>
                    <td class="px-6 py-3">
                        Accessories
                    </td>
                    <td class="px-6 py-3">
                        $99
                    </td>
                    <td class="px-6 py-3 text-right">
                        <a href="#" class="font-medium text-blue-600  hover:underline">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</x-layout-admin-dashboard>
