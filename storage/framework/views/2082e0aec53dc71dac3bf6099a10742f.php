<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['link' => '', 'isActive' => '', 'label' => '', 'icon' => '']));

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

foreach (array_filter((['link' => '', 'isActive' => '', 'label' => '', 'icon' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<a href="<?php echo e($link); ?>" wire:navigate
    class="block w-full py-2 px-4 rounded-lg bg-gray-50/50 border-b border-gray-200 hover:bg-gray-100 duration-200  <?php if($isActive): ?> text-white bg-brown-max <?php endif; ?>">
    <i class="<?php echo e($icon); ?> me-2"></i>
    <span><?php echo e($label); ?></span>
</a>
<?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/components/link-dashboard.blade.php ENDPATH**/ ?>