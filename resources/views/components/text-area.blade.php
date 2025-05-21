@props(['disabled' => false, 'label', 'id', 'placeholder', 'message'])

<div>
    <label class="block mb-2 text-sm font-medium text-gray-900" for="{{ $id }}">
        {{ $label }}
    </label>
    <textarea @disabled($disabled) type="text" name="{{ $id }}" id="{{ $id }}"
        placeholder="{{ $placeholder }}" required value="{{ old($id) }}"
        class="bg-gray-50 border border-gray-300  text-gray-900 placeholder:text-gray-400 rounded-lg
        focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
        {{ $errors->has($id) ? 'bg-red-100 border-red-500' : 'bg-gray-50 border-gray-300' }}"></textarea>
    @error($id)
        <p class="text-sm text-red-600 mt-1"> {{ $message }}</p>
    @enderror
</div>
