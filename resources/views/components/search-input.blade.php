@props(['route', 'placeholder' => 'Search...'])

<form class="flex items-center w-1/2" method="GET" action="{{ $route }}">
    <label for="simple-search" class="sr-only">Search</label>
    <div class="relative w-full">
        <input type="text" id="simple-search"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 placeholder:text-secondary"
            placeholder="{{ $placeholder }}" type="search" id="search" name="search"
            value="{{ request('search') }}" />
    </div>
    <button type="submit"
        class="p-2.5 ms-2 text-sm font-medium text-white bg-primary rounded-lg borderlue-300 hover:bg-opacity-90 focus:ring-4 focus:outline-none focus:ring-blue-300">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
        <span class="sr-only">Search</span>
    </button>
</form>
