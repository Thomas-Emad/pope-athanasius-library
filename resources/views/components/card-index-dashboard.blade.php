@props(['label' => '', 'value' => '', 'icon' => ''])

<div
    class="opacity-75 hover:opacity-100 duration-200 cursor-pointer w-full md:w-[calc(50%-1rem)] xl:w-[calc(33.33%-1rem)] p-6 px-10 rounded-xl border border-gray-200 shadow">
    <div class="flex items-center justify-center gap-2">
        <i class="{{ $icon }}"></i>
        <p class="text-2xl font-bold">{{ $label }}</p>
    </div>
    <p class="text-center text-green-800 text-lg">{{ $value }}</p>
</div>
