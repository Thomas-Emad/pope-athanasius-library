<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['id' => '', 'label' => '', 'currentStatus' => false]));

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

foreach (array_filter((['id' => '', 'label' => '', 'currentStatus' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<label for="<?php echo e($id); ?>" class="inline-flex justify-between items-center cursor-pointer">
    <?php if(!is_null($label)): ?>
        <span class="me-3 text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e($label); ?></span>
    <?php endif; ?>
    <input id="<?php echo e($id); ?>" type="checkbox" <?php echo e($attributes); ?> <?php if($currentStatus): echo 'checked'; endif; ?> class="sr-only peer">
    <div
        class="relative w-10 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brown-lite dark:peer-focus:ring-brown-max rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-brown-max">
    </div>
</label>
<?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/components/toggle.blade.php ENDPATH**/ ?>