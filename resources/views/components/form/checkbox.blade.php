@props([
    'texto',
    'name',
    'value'
])
<label class="flex mt-2 items-center dark:text-gray-400">
    <input
        type="checkbox"
        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
        name="{{ $name }}"
        value="{{ $value }}"
        {{ $attributes->merge() }}
        >
    <span class="ml-2">
        {{ $texto }}
    </span>
</label>