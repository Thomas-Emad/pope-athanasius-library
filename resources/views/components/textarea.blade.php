@props(['disabled' => false])

<textarea @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-brown-max focus:ring-brown-max rounded-md shadow-sm']) }}></textarea>
