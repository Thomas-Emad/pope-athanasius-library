<di x-data="{ type: '' }">
    <div>
        <div class="flex justify-between items-center gap-2 mb-8">
            <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
                <i class="fa-solid fa-book-bible me-2"></i>
                <span>المؤلفين</span>
            </h1>
            <div>
                <button x-on:click="type = 'add'" x-on:click.prevent="$dispatch('open-modal', 'author')"
                    class="text-white font-bold bg-brown-max py-2 px-4 rounded-lg hover:bg-brown-lite duration-200">
                    <i class="fa-solid fa-plus"></i>
                </button>

            </div>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <?php if (isset($component)) { $__componentOriginal8ac2915b2fdd8f1531597e30ada0003c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8ac2915b2fdd8f1531597e30ada0003c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-dashboard','data' => ['wire:model.blur' => 'search','placeholder' => 'ابحث عن اسم المؤلف..']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('search-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.blur' => 'search','placeholder' => 'ابحث عن اسم المؤلف..']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8ac2915b2fdd8f1531597e30ada0003c)): ?>
<?php $attributes = $__attributesOriginal8ac2915b2fdd8f1531597e30ada0003c; ?>
<?php unset($__attributesOriginal8ac2915b2fdd8f1531597e30ada0003c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8ac2915b2fdd8f1531597e30ada0003c)): ?>
<?php $component = $__componentOriginal8ac2915b2fdd8f1531597e30ada0003c; ?>
<?php unset($__componentOriginal8ac2915b2fdd8f1531597e30ada0003c); ?>
<?php endif; ?>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            اسم المؤلف
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            عدد الكتاب
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            الاعدادت
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo e(str($item->name)->limit(20)); ?>

                            </th>
                            <td class="px-6 py-4">
                                <?php echo e($item->books_count); ?>

                            </td>

                            <td class="px-6 py-4">
                                <button wire:key="<?php echo e($item->id); ?>" x-on:click="type = 'edit'"
                                    wire:click='editAuthor(<?php echo e($item->id); ?>)'
                                    class="me-2 text-xl hover:text-amber-600 duration-150">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="py-2 text-center  italic text-gray-600">
                                يبدوا انه ليس لدينا هنا اي مؤلف!!
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="mt-4">
                <?php echo e($authors->links()); ?>

            </div>
        </div>

    </div>
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
    </div>
</di><?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/livewire/dashboard/authors.blade.php ENDPATH**/ ?>