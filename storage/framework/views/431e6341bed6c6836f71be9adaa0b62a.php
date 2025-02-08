<div>
    <?php if (isset($component)) { $__componentOriginalfdff476d8921a7dfa52680e806bee2d9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfdff476d8921a7dfa52680e806bee2d9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modals.publisher-modal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modals.publisher-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfdff476d8921a7dfa52680e806bee2d9)): ?>
<?php $attributes = $__attributesOriginalfdff476d8921a7dfa52680e806bee2d9; ?>
<?php unset($__attributesOriginalfdff476d8921a7dfa52680e806bee2d9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfdff476d8921a7dfa52680e806bee2d9)): ?>
<?php $component = $__componentOriginalfdff476d8921a7dfa52680e806bee2d9; ?>
<?php unset($__componentOriginalfdff476d8921a7dfa52680e806bee2d9); ?>
<?php endif; ?>
</div><?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/livewire/dashboard/modals/add-publisher.blade.php ENDPATH**/ ?>