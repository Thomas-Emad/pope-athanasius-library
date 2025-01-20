@props(['link' => '', 'isActive' => '', 'label' => '', 'icon' => ''])
<a href="{{ $link }}" wire:navigate
    class="block w-full py-2 px-4 rounded-lg bg-gray-50/50 border-b border-gray-200 hover:bg-gray-100 duration-200  @if ($isActive) text-white bg-brown-max @endif">
    <i class="{{ $icon }} me-2"></i>
    <span>{{ $label }}</span>
</a>
