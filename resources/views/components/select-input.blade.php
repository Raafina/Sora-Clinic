@props([
    'disabled' => false,
    'label' => '',
    'id' => '',
    'placeholder' => '',
    'message' => '',
    'options' => [],
    'value' => '',
])

<div>
    <label class="block mb-2 text-sm font-medium text-gray-900" for="{{ $id }}">
        {{ $label }}
    </label>
    <select @disabled($disabled) name="{{ $id }}" id="{{ $id }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 placeholder:text-gray-400 rounded-lg
        focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
        {{ $errors->has($id) ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}">

        @if ($placeholder)
            <option value="" disabled {{ old($id, $value) === '' ? 'selected' : '' }}>
                {{ $placeholder }}
            </option>
        @endif

        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ old($id, $value) == $optionValue ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>

    @error($id)
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>
