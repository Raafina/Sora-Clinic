@props([
    'readonly' => false,
    'disabled' => false,
    'label' => '',
    'id' => '',
    'placeholder' => '',
    'message' => '',
    'value' => '',
    'height' => 'h-24',
])

<div>
    <label class="block mb-2 text-sm font-medium text-gray-900" for="{{ $id }}">
        {{ $label }}
    </label>
    <textarea @disabled($disabled) @readonly($readonly) name="{{ $id }}" id="{{ $id }}"
        placeholder="{{ $placeholder }}" required
        class="{{ $disabled || $readonly ? 'bg-slate-200 text-gray-900' : 'bg-gray-50 text-gray-900' }} border border-gray-300 placeholder:text-gray-400 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 {{ $errors->has($id) ? 'bg-red-100 border-red-500' : '' }} {{ $height }}">{{ old($id, $value) }}</textarea>
    @error($id)
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>
