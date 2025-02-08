<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'status' => 'false',
    'labelTrue' => 'هذا الكتاب مميزه يظهر في الصفحه الرئيسيه',
    'labelFalse' => 'هذا الكتاب لا يظهر في الصفحه الرئيسيه',
]));

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

foreach (array_filter(([
    'status' => 'false',
    'labelTrue' => 'هذا الكتاب مميزه يظهر في الصفحه الرئيسيه',
    'labelFalse' => 'هذا الكتاب لا يظهر في الصفحه الرئيسيه',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="w-fit">
    <?php if($status): ?>
        <span title="<?php echo e($labelTrue); ?>"
            class="text-xs text-green-700 border-2 border-green-700 p-1 rounded-full flex justify-center items-center">
            <i class="fa-solid fa-check"></i>
        </span>
    <?php else: ?>
        <span title="<?php echo e($labelFalse); ?>"
            class="text-xs text-red-700 border-2 border-red-700 p-1 rounded-full flex justify-center items-center">
            <i class="fa-solid fa-x"></i>
        </span>
    <?php endif; ?>
</div>
<?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/components/status-yes-no.blade.php ENDPATH**/ ?>