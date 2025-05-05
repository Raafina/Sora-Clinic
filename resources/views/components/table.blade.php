@props(['headers' => [], 'emptyMessage' => 'Tidak ada data'])

<div class="relative overflow-x-auto shadow-md border border-gray-300 rounded-xl bg-white p-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
            <tr>
                @foreach ($headers as $header)
                    <th scope="col"
                        class="px-6 py-3 {{ $loop->first ? 'rounded-l-lg' : '' }} {{ $loop->last ? 'rounded-r-lg' : '' }}">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        @if ($slot->isNotEmpty())
            <tbody>
                {{ $slot }}
            </tbody>
        @else
            <tr>
                <td colspan="{{ count($headers) }}" class="px-6 py-40 text-center">{{ $emptyMessage }}</td>
            </tr>
        @endif
    </table>
</div>
