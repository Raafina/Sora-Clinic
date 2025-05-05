@props(['highlight' => false])

<tr class="bg-white hover:bg-gray-50 {{ $highlight ? 'bg-gray-50' : '' }}">
    {{ $slot }}
</tr>
