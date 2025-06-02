@props([
    'disabled' => false,
    'label' => '',
    'id' => '',
    'placeholder' => '',
    'message' => '',
    'type' => 'text',
    'value' => '',
])

<div>
    <label class="block mb-2 text-sm font-medium text-gray-900" for="{{ $id }}">
        {{ $label }}
    </label>
    <input @disabled($disabled) type="{{ $type }}" name="{{ $id }}" id="{{ $id }}"
        placeholder="{{ $placeholder }}" required value="{{ old($id, $value) }}"
        class="{{ $disabled ? 'bg-gray-300 text-gray-900' : 'bg-gray-50 text-gray-900' }} border border-gray-300  placeholder:text-gray-400 rounded-lg focus:ring-primary-600 focus:border-primary-600 
    block w-full p-2.5 {{ $errors->has($id) ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}">

    @error($id)
        <p class="text-sm text-red-600 mt-1"> {{ $message }}</p>
    @enderror
</div>
