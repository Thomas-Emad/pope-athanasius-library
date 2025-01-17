@props(['disabled' => false])

<input @disabled($disabled) autocomplete="off"
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-brown-max focus:ring-brown-max rounded-md shadow-sm']) }}>
