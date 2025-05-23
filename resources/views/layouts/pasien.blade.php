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
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="/" class="flex ms-2 md:me-24">
                        <img src="{{ asset('/images/logo/primary.svg') }}" class="h-9 me-3 sm:h-11" alt="Sora Clinic" />

                    </a>
                </div>
                {{-- Profile Button --}}
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button data-dropdown-toggle="dropdown-user" type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent  leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <span class="sr-only">Open user menu</span>
                                <div>{{ Auth::user()->nama }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none rounded-xl bg-white divide-y divide-gray-100 shadow-md"
                            id="dropdown-user">
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="{{ route('profile.edit') }}"
                                        class="block px-4 py-2  text-gray-900 hover:bg-gray-100 hover:cursor-pointer"
                                        role="menuitem">{{ __('Pengaturan') }}</a>
                                </li>

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a href="route('logout')"
                                            class="block px-4 py-2  text-gray-900 hover:bg-red-500 hover:text-white hover:cursor-pointer
                                            role="menuitem"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Keluar') }}
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white ">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
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
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
