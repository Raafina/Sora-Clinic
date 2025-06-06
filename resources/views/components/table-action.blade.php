@props(['id', 'editModalId', 'deleteModalId'])

<td class="px-6 py-3 flex flex-row gap-2">
    <div class=" p-1 rounded-md hover:opacity-75">
        <a href="{{ route('dokter.obat.edit', $id) }}" class="flex justify-center w-full">
            <svg class="w-6 h-6 text-yellow-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
            </svg>
        </a>
    </div>
    <div class=" p-1 rounded-md hover:opacity-75">
        <button type="button" data-modal-target="{{ $deleteModalId }}" data-modal-toggle="{{ $deleteModalId }}"
            class="flex justify-center w-full">
            <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
            </svg>
        </button>
    </div>
</td>
