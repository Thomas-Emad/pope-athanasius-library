<div>
    <div class="flex justify-between items-center gap-2 mb-8">
        <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
            <i class="fa-solid fa-book-bible me-2"></i>
            <span>الاحصائيات</span>
        </h1>
    </div>
    <div class="flex flex-col justify-center md:flex-row gap-4 flex-wrap text-gray-700">
        <div class="flex flex-col justify-center md:flex-row gap-4 flex-wrap text-gray-700">
            <?php if (isset($component)) { $__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card-index-dashboard','data' => ['label' => 'المستخدمين','value' => ''.e($statistics->count_users).'','icon' => 'fa-solid fa-users']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card-index-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'المستخدمين','value' => ''.e($statistics->count_users).'','icon' => 'fa-solid fa-users']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9)): ?>
<?php $attributes = $__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9; ?>
<?php unset($__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9)): ?>
<?php $component = $__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9; ?>
<?php unset($__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card-index-dashboard','data' => ['label' => 'الكتب','value' => ''.e($statistics->count_books).'','icon' => 'fa-solid fa-book']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card-index-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'الكتب','value' => ''.e($statistics->count_books).'','icon' => 'fa-solid fa-book']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9)): ?>
<?php $attributes = $__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9; ?>
<?php unset($__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9)): ?>
<?php $component = $__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9; ?>
<?php unset($__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card-index-dashboard','data' => ['label' => 'مشاهدات الكتب','value' => ''.e($statistics->views_book).'','icon' => 'fa-solid fa-book']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card-index-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'مشاهدات الكتب','value' => ''.e($statistics->views_book).'','icon' => 'fa-solid fa-book']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9)): ?>
<?php $attributes = $__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9; ?>
<?php unset($__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9)): ?>
<?php $component = $__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9; ?>
<?php unset($__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card-index-dashboard','data' => ['label' => 'المنشورات','value' => ''.e($statistics->count_posts).'','icon' => 'fa-solid fa-edit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card-index-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'المنشورات','value' => ''.e($statistics->count_posts).'','icon' => 'fa-solid fa-edit']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9)): ?>
<?php $attributes = $__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9; ?>
<?php unset($__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9)): ?>
<?php $component = $__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9; ?>
<?php unset($__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card-index-dashboard','data' => ['label' => 'الناشرين','value' => ''.e($statistics->count_publishers).'','icon' => 'fa-solid fa-edit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card-index-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'الناشرين','value' => ''.e($statistics->count_publishers).'','icon' => 'fa-solid fa-edit']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9)): ?>
<?php $attributes = $__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9; ?>
<?php unset($__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9)): ?>
<?php $component = $__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9; ?>
<?php unset($__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card-index-dashboard','data' => ['label' => 'المؤلفين','value' => ''.e($statistics->count_authors).'','icon' => 'fa-solid fa-edit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('card-index-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'المؤلفين','value' => ''.e($statistics->count_authors).'','icon' => 'fa-solid fa-edit']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9)): ?>
<?php $attributes = $__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9; ?>
<?php unset($__attributesOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9)): ?>
<?php $component = $__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9; ?>
<?php unset($__componentOriginal1b7c1e23425f45b5fbb0f4b5c5a744a9); ?>
<?php endif; ?>
        </div>
    </div>
    <hr class="block w-[95%] mx-auto my-4">
    <div class="flex justify-between items-center gap-2 mb-8">
        <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
            <i class="fa-solid fa-book-bible me-2"></i>
            <span>اكثر الكتب اطلاعا</span>
        </h1>
    </div>
    <div class="mt-5">
        <div class="grid gap-4" style="grid-template-columns: repeat(auto-fill, minmax(250px, 1fr))">
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('book.show', $book->code)); ?>" wire:navigate wire:key='book-<?php echo e($book->id); ?>'
                    class="p-2 bg-white shadow rounded-md overflow-hidden hover:-translate-y-2 duration-200 flex flex-row items-center gap-2">
                    <img src="<?php echo e($book->photo ? Storage::url($book->photo) : asset('assets/images/mockup.jpg')); ?>"
                        class="h-14 w-14 border border-gray-200 rounded-xl" alt="mockup book"
                        onerror="this.onerror=null; this.src='<?php echo e(asset('assets/images/mockup.jpg')); ?>';">
                    <div class="text-center px-2 text-xs">
                        <h3 class="font-bold"><?php echo e(str($book->title)->limit(20)); ?></h3>
                        <p>
                            <span>المؤلف:</span>
                            <?php echo e(str($book->author->name)->limit(20)); ?>

                        </p>
                        <p>
                            <span>عدد المشاهدات:</span>
                            <?php echo e($book->views); ?>

                        </p>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if(sizeOf($books) == 0): ?>
            <p class="text-center text-gray-600 italic">ليس لدينا اي كتاب هنا..</p>
        <?php endif; ?>
    </div>

</div><?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/livewire/dashboard/index.blade.php ENDPATH**/ ?>