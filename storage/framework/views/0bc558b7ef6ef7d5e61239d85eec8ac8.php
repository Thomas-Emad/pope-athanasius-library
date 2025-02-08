<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['id']));

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

foreach (array_filter((['id']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<select id="<?php echo e($id); ?>"
    <?php echo e($attributes->merge(['class' => ' border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-border-brown-max focus:border-brown-max block w-full p-2.5 '])); ?>>

    <?php echo e($slot); ?>

</select>
<?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/components/select.blade.php ENDPATH**/ ?>