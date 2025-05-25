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
    <nav class="fixed top-0 w-full bg-white border-b border-gray-200">
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
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white ">
            <ul class="space-y-2 font-medium">
                <div class="flex flex-row w-full justify-center pt-5 pb-3  items-center">
                    <a href="/" class="">
                        <img src="{{ asset('/images/logo/primary.svg') }}" class="h-9 me-3 sm:h-12" alt="Sora Clinic" />
                    </a>
                </div>
                <li>
                    <a href="/dokter/jadwal-periksa"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 {{ Request()->is('dokter/jadwal-periksa') ? 'bg-primary text-white hover:bg-primary' : '' }}">
                        <svg width="25" height="25" viewBox="0 0 24 24"
                            class="{{ Request()->is('dokter/jadwal-periksa') ? 'text-white' : '' }}"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.7" d=" M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1
                            1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4
                            0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                        </svg>


                        {{-- <svg width="24" height="24" viewBox="0 0 38 42" fill="none"
                            class="{{ Request()->is('admin/dokter') ? 'text-white' : '' }}"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M37.3034 19.5219C37.3034 16.4099 34.6604 13.7819 31.5494 13.7819C28.2544 13.7819 25.6394 16.4099 25.6394 19.5219C25.6394 22.4629 27.7574 24.7649 30.5554 25.2479V31.3279C30.5554 36.0739 26.6334 39.8409 21.8734 39.8409C17.2694 39.8409 13.3214 36.0739 13.3214 31.3279V24.4369C15.6234 24.1109 17.7675 22.8019 19.7285 20.5019C20.0685 20.1749 20.2244 19.8479 20.0684 19.3519C22.6834 16.0819 24.1484 11.4929 24.1484 7.88391C24.1484 2.47091 21.6895 1.98692 17.7675 0.99292C17.4275 0.50992 16.9294 0.180908 16.4584 0.180908C15.4654 0.180908 14.8124 0.834912 14.8124 1.65991C14.8124 2.47091 15.4654 3.29492 16.4584 3.29492C16.7724 3.29492 17.0864 3.12491 17.2684 2.79691C21.1924 3.79091 22.3424 3.94791 22.3424 7.88391C22.3424 10.9959 20.8774 15.0879 18.5764 18.2129C18.2624 18.2129 17.9224 18.3709 17.5824 18.6969C16.4574 20.0169 14.6274 21.4819 12.5094 21.4819C10.3654 21.4819 8.40344 20.0169 7.25244 18.6969C7.09644 18.3709 6.5994 18.2129 6.2594 18.2129C3.9574 15.2579 2.65143 10.9959 2.65143 7.88391C2.65143 3.94791 3.64444 3.79091 7.56744 2.79691C7.90744 3.12491 8.0634 3.29492 8.5614 3.29492C9.3714 3.29492 10.0515 2.47091 10.0515 1.65991C10.0515 0.835912 9.3714 0.180908 8.5614 0.180908C7.9074 0.180908 7.41044 0.50892 7.09644 0.99292C3.14744 1.98592 0.689453 2.47091 0.689453 7.88391C0.689453 11.4919 2.15341 16.0819 4.79541 19.3519C4.79541 19.8479 4.79541 20.1749 5.13641 20.5019C7.09741 22.8029 9.21546 24.1109 11.5175 24.4369V31.3279C11.5175 37.0559 16.1194 41.8139 22.0294 41.8139C27.7564 41.8139 32.3594 37.0549 32.3594 31.3279V25.2479C35.1584 24.7649 37.3034 22.4629 37.3034 19.5219ZM31.5494 23.4569C29.4054 23.4569 27.6004 21.6519 27.6004 19.5219C27.6004 17.5599 29.4054 15.7559 31.5494 15.7559C33.5104 15.7559 35.3154 17.5599 35.3154 19.5219C35.3154 21.6519 33.5104 23.4569 31.5494 23.4569ZM31.5494 16.7359C33.0144 16.7359 34.3214 18.0429 34.3214 19.5209C34.3214 21.1559 33.0144 22.4619 31.5494 22.4619C29.9024 22.4619 28.5944 21.1549 28.5944 19.5209C28.5944 18.0429 29.9014 16.7359 31.5494 16.7359Z"
                                fill="currentColor" />
                        </svg> --}}
                        <span class="ms-3">Jadwal Periksa</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 ">
                        <svg width="25" height="25" viewBox="0 0 24 24" class="text-gray-900 "
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M12 8v4l3 3M3.22302 14C4.13247 18.008 7.71683 21 12 21c4.9706 0 9-4.0294 9-9 0-4.97056-4.0294-9-9-9-3.72916 0-6.92858 2.26806-8.29409 5.5M7 9H3V5" />
                        </svg>

                        <span class="ms-3">Riwayat Periksa</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <svg width="25" height="25" viewBox="0 0 24 24" class="text-gray-900 "
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.7" d="M9 17h6l3 3v-3h2V9h-2M4 4h11v8H9l-3 3v-3H4V4Z" />
                        </svg>

                        <span class="ms-3">Telemedicine</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <svg width="24" height="24" viewBox="0 0 42 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.503365 24.2C0.817365 26.488 2.15137 28.619 4.11237 29.927C5.57637 30.907 7.38137 31.405 9.02937 31.405C11.9844 31.405 14.7824 29.927 16.4034 27.469L25.4514 14.198C26.7594 12.223 27.2564 9.93496 26.7594 7.47696C26.2624 5.18796 24.9284 3.21398 22.9674 1.90698C21.6594 0.912982 19.8554 0.428955 18.2084 0.428955C15.2534 0.428955 12.4814 1.90696 10.8344 4.36496L1.81137 17.637C0.503368 19.61 0.00736549 21.898 0.503365 24.2ZM7.87837 26.161C8.03537 26.161 9.99636 26.488 11.6444 24.2L13.9454 20.591C14.2854 20.094 14.7824 19.937 15.0954 19.937C15.4354 19.937 15.7494 20.094 16.0894 20.25C16.7434 20.59 16.9004 21.571 16.4024 22.225L13.9444 25.834C11.1724 29.927 7.22337 28.946 7.06637 28.946C6.22937 28.619 5.91637 27.796 6.07237 27.142C6.23037 26.331 7.06737 25.834 7.87837 26.161ZM13.2914 5.99896C14.2854 4.36396 16.2464 3.38397 18.2084 3.38397C19.3584 3.38397 20.5094 3.69798 21.3204 4.36398C22.6544 5.18798 23.6484 6.65197 23.9614 8.12997C24.1184 9.60797 23.9614 11.242 22.9674 12.563L19.3584 17.807C18.8874 18.618 17.7114 18.787 16.9004 18.291L10.1794 13.701C9.68237 13.374 9.52537 13.047 9.36837 12.563C9.36837 12.066 9.36837 11.569 9.68237 11.243L13.2914 5.99896ZM23.8044 22.395C23.8044 27.312 27.7274 31.404 32.8264 31.574C37.7424 31.574 41.8484 27.638 42.0054 22.552C42.0054 17.636 38.0834 13.543 32.9834 13.543C28.0674 13.373 23.9614 17.309 23.8044 22.395ZM27.9104 20.918L38.0834 21.075C38.8944 21.245 39.3904 21.899 39.3904 22.553C39.3904 23.534 38.7374 24.031 37.9264 24.031L27.7274 23.861C26.9164 23.704 26.4194 23.05 26.4194 22.227C26.4194 21.571 27.0734 20.918 27.9104 20.918Z"
                                fill="#595959" />
                        </svg>
                        <span class="ms-3">Obat</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-12">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
