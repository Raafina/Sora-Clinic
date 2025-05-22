<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="svg" href="{{ asset('/images/logo/favicon.svg') }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <title>Sora Clinic</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <main>
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                type="button"
                class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>

            <aside id="logo-sidebar"
                class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 "
                aria-label="Sidebar">
                <div
                    class="h-full px-3 py-4 overflow-y-auto bg-white flex flex-col justify-between border-r border-gray-200 shadow-md">
                    <div>
                        <a href="/" class="flex items-center ps-2.5 mb-5 justify-center">
                            <img src="{{ asset('/images/logo/primary.svg') }}" class="h-6 me-3 sm:h-14"
                                alt="Sora Clinic" />
                        </a>
                        <ul class="space-y-2 font-medium">
                            <li>
                                <a href="#"
                                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                                    <svg width="24" height="24" viewBox="0 0 42 36" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M35.5644 8.00108H29.0014V0.299072H13.0884V8.00108H6.68143C3.22943 8.00108 0.274414 10.7861 0.274414 14.3941V29.1431C0.274414 32.7521 3.22943 35.7071 6.68143 35.7071H35.5654C39.0174 35.7071 41.9724 32.7521 41.9724 29.1431V14.3941C41.9724 10.7861 39.0174 8.00108 35.5644 8.00108ZM16.0434 3.25407H26.0594V8.00108H16.0434V3.25407ZM36.0614 23.7441H31.3024V28.4911H27.5234V23.7441H22.7634V19.9651H27.5234V15.2191H31.3024V19.9651H36.0614V23.7441Z"
                                            fill="#595959" />
                                    </svg>
                                    <span class="ms-3">Daftar Poliklinik</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <form action="/logout" method="POST" class="">
                        @csrf
                        <button type="submit"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 w-full font-medium">
                            <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                            </svg>
                            <span class="ms-3 text-red-500">Logout</span>
                        </button>
                    </form>
                </div>
            </aside>

            <div class="p-4 sm:ml-64">
                {{ $slot }}
            </div>

        </main>
    </div>
</body>

</html>
