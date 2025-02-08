<?php if (isset($component)) { $__componentOriginal01b8212b2ba666e523b5573a48fcf4f1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal01b8212b2ba666e523b5573a48fcf4f1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modals.section-shelf-modal','data' => ['sections' => $sections]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modals.section-shelf-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sections' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sections)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal01b8212b2ba666e523b5573a48fcf4f1)): ?>
<?php $attributes = $__attributesOriginal01b8212b2ba666e523b5573a48fcf4f1; ?>
<?php unset($__attributesOriginal01b8212b2ba666e523b5573a48fcf4f1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal01b8212b2ba666e523b5573a48fcf4f1)): ?>
<?php $component = $__componentOriginal01b8212b2ba666e523b5573a48fcf4f1; ?>
<?php unset($__componentOriginal01b8212b2ba666e523b5573a48fcf4f1); ?>
<?php endif; ?><?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/livewire/dashboard/modals/section-shelf.blade.php ENDPATH**/ ?>