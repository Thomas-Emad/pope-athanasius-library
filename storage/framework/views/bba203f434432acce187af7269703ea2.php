<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['label' => '', 'value' => '', 'icon' => '']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['label' => '', 'value' => '', 'icon' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div
    class="opacity-75 hover:opacity-100 duration-200 cursor-pointer w-full md:w-[calc(50%-1rem)] xl:w-[calc(33.33%-1rem)] p-6 px-10 rounded-xl border border-gray-200 shadow">
    <div class="flex items-center justify-center gap-2">
        <i class="<?php echo e($icon); ?>"></i>
        <p class="text-2xl font-bold"><?php echo e($label); ?></p>
    </div>
    <p class="text-center text-green-800 text-lg"><?php echo e($value); ?></p>
</div>
<?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/components/card-index-dashboard.blade.php ENDPATH**/ ?>