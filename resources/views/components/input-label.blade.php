@props(['value'])

<label {{ $attributes->merge(['class' => 'block  text-sm text-gray-500']) }}>
    {{ $value ?? $slot }}
</label>
