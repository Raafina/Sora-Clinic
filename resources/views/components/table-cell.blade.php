@props(['isHeader' => false])

@if ($isHeader)
    <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">
        {{ $slot }}
    </th>
@else
    <td class="px-6 py-3">
        {{ $slot }}
    </td>
@endif
