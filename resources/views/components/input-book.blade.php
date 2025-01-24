@props(['id', 'title'])
<div class="w-full">
    <div class="relative">
        <x-input-label value='{{ $title }}' for='{{ $id }}'
            class="border border-gray-100 top-0 right-2 -translate-y-1/2 absolute inline-block shadow-lg font-bold bg-white py-1 px-2 rounded-xl" />
        {{ $slot }}
    </div>
</div>
