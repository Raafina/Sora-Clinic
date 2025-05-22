@props([
    'type' => 'button',
    'variant' => 'primary',
    'label',
    'modalTarget' => '',
    'modalToggle' => '',
    'class' => '',
    'halfWidth' => false,
])

@php
    $baseClasses = 'font-medium rounded-xl text-sm font-medium py-3 px-4 text-center';
    $baseClasses .= $halfWidth ? ' w-1/2' : '';
    $variantClasses = [
        'primary' => 'text-white bg-primary hover:bg-opacity-90',
        'secondary' => 'text-gray-500 bg-gray-200 hover:bg-opacity-70',
        'danger' => 'text-red-500 bg-red-200 hover:bg-opacity-70',
    ];
    $classes = $baseClasses . ' ' . ($variantClasses[$variant] ?? $variantClasses['primary']) . ' ' . $class;
@endphp

<button type="{{ $type }}" @if ($modalTarget) data-modal-target="{{ $modalTarget }}" @endif
    @if ($modalToggle) data-modal-toggle="{{ $modalToggle }}" @endif
    {{ $attributes->merge(['class' => $classes]) }}>
    {{ $label ?? $slot }}
</button>
