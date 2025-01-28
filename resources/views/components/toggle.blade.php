@props(['id' => '', 'label' => '', 'currentStatus' => false])
<label for="{{ $id }}" class="inline-flex justify-between items-center cursor-pointer">
    @if (!is_null($label))
        <span class="me-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $label }}</span>
    @endif
    <input id="{{ $id }}" type="checkbox" {{ $attributes }} @checked($currentStatus) class="sr-only peer">
    <div
        class="relative w-10 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brown-lite dark:peer-focus:ring-brown-max rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-brown-max">
    </div>
</label>
