@props(['errorKey'])

@if (session($errorKey))
    <div id="toast-interactive" class="w-full py-2 px-3 text-gray-500 rounded-lg border border-red-500 bg-red-50"
        role="alert">
        <div class="flex">
            <div class="text-sm font-normal text-red-700">
                {{ session($errorKey) }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 items-center justify-center shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 p-1.5 inline-flex h-8 w-8"
                data-dismiss-target="#toast-interactive" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>
@endif
