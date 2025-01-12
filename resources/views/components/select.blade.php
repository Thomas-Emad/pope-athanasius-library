@props(['id'])
<select id="{{ $id }}"
    {{ $attributes->merge(['class' => ' border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-border-brown-max focus:border-brown-max block w-full p-2.5 ']) }}>

    {{ $slot }}
</select>
