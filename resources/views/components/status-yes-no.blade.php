@props([
    'status' => 'false',
    'labelTrue' => 'هذا الكتاب مميزه يظهر في الصفحه الرئيسيه',
    'labelFalse' => 'هذا الكتاب لا يظهر في الصفحه الرئيسيه',
])

<div class="w-fit">
    @if ($status)
        <span title="{{ $labelTrue }}"
            class="text-xs text-green-700 border-2 border-green-700 p-1 rounded-full flex justify-center items-center">
            <i class="fa-solid fa-check"></i>
        </span>
    @else
        <span title="{{ $labelFalse }}"
            class="text-xs text-red-700 border-2 border-red-700 p-1 rounded-full flex justify-center items-center">
            <i class="fa-solid fa-x"></i>
        </span>
    @endif
</div>
