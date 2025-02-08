<div>
    <?php if (isset($component)) { $__componentOriginala3cf3ef9212ab08aacc81354d1e51971 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala3cf3ef9212ab08aacc81354d1e51971 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modals.author-modal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modals.author-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala3cf3ef9212ab08aacc81354d1e51971)): ?>
<?php $attributes = $__attributesOriginala3cf3ef9212ab08aacc81354d1e51971; ?>
<?php unset($__attributesOriginala3cf3ef9212ab08aacc81354d1e51971); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3cf3ef9212ab08aacc81354d1e51971)): ?>
<?php $component = $__componentOriginala3cf3ef9212ab08aacc81354d1e51971; ?>
<?php unset($__componentOriginala3cf3ef9212ab08aacc81354d1e51971); ?>
<?php endif; ?>
</div><?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/livewire/dashboard/modals/add-author.blade.php ENDPATH**/ ?>