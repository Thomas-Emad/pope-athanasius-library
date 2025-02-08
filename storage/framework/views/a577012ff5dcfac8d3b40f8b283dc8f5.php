<div x-data="{ type: 'add' }">
    <div class="container max-w-full px-6 py-4">
        <div class="flex justify-between items-center">
            <span></span>
            <h1 class="text-gray-800 font-bold text-center text-2xl">
                <?php echo e($type === 'store' ? 'أضافه كتاب جديد' : 'التعديل علي كتاب'); ?>

            </h1>

            <div x-data="{
                book: <?php if ((object) ('book') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('book'->value()); ?>')<?php echo e('book'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('book'); ?>')<?php endif; ?>,
                code: $wire.book.code
            }"
                x-effect="code = `${book.current_unit_number ??''}${book.row ??''}${book.position_book ??''}`">
                <p class="font-bold">كود الكتاب: (
                    <span x-text="code"></span>
                    )
                </p>
                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.code'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.code')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
            </div>
        </div>
        <form wire:submit.prevent="<?php echo e($type === 'store' ? 'save' : 'update'); ?>"
            class="flex flex-col-reverse md:flex-row gap-10 justify-between mt-6">
            <div class="w-full md:w-3/4 flex gap-5 flex-col">
                <?php if (isset($component)) { $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-book','data' => ['id' => 'title','title' => 'الاسم']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-book'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'title','title' => 'الاسم']); ?>
                    <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'title','class' => 'w-full  pt-4','wire:model' => 'book.title','placeholder' => 'أكتب هنا اسم الكتاب..']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'title','class' => 'w-full  pt-4','wire:model' => 'book.title','placeholder' => 'أكتب هنا اسم الكتاب..']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.title'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.title')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $attributes = $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $component = $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>

                <div class="flex flex-col md:flex-row gap-5">
                    <?php if (isset($component)) { $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-book','data' => ['id' => 'section','title' => 'القسم']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-book'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'section','title' => 'القسم']); ?>
                        <div class="flex">
                            <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['id' => 'section','wire:model.live' => 'book.section','class' => 'pt-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'section','wire:model.live' => 'book.section','class' => 'pt-4']); ?>
                                <option selected>اختار اسم القسم</option>
                                <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($section->id); ?>" <?php if($section->id == $book->section): echo 'selected'; endif; ?>
                                        wire:key="section-book-<?php echo e($section->id); ?>">
                                        <?php echo e($section->title); ?> - <?php echo e($section->number); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(App\Enums\PermissionEnum::SECTIONS_BOOK->value)): ?>
                                <button type="button" x-on:click="type = 'add'"
                                    x-on:click.prevent="$dispatch('open-modal', 'sections-shelfs')"
                                    @click="$dispatch('open-section')"
                                    class="border border-gray-300 bg-white text-gray-900 text-sm rounded-lg focus:ring-border-brown-max focus:border-brown-max py-2 px-4 ">
                                    +
                                </button>
                            <?php endif; ?>
                        </div>
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.section'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.section')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $attributes = $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $component = $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-book','data' => ['id' => 'shelf','title' => 'الرف']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-book'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'shelf','title' => 'الرف']); ?>
                        <div class="flex">
                            <?php if (isset($component)) { $__componentOriginaled2cde6083938c436304f332ba96bb7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled2cde6083938c436304f332ba96bb7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select','data' => ['id' => 'shelf','wire:model' => 'book.shelf','class' => 'pt-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'shelf','wire:model' => 'book.shelf','class' => 'pt-4']); ?>
                                <option selected value="">اختار اسم الرف </option>
                                <?php $__currentLoopData = $shelfs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shelf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($shelf->id); ?>" <?php if($shelf->id == $book->shelf): echo 'selected'; endif; ?>
                                        wire:key="shelf-book-<?php echo e($shelf->id); ?>">
                                        <?php echo e($shelf->title); ?> - <?php echo e($shelf->number); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $attributes = $__attributesOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__attributesOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled2cde6083938c436304f332ba96bb7c)): ?>
<?php $component = $__componentOriginaled2cde6083938c436304f332ba96bb7c; ?>
<?php unset($__componentOriginaled2cde6083938c436304f332ba96bb7c); ?>
<?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(App\Enums\PermissionEnum::SECTIONS_BOOK->value)): ?>
                                <button type="button" x-on:click="type = 'add'" x-show="$wire.book.section"
                                    x-on:click.prevent="$dispatch('open-modal', 'sections-shelfs')"
                                    @click="$dispatch('add-modal-selected-section', { id: '<?php echo e($book->section); ?>' })"
                                    class="border border-gray-300 bg-white text-gray-900 text-sm rounded-lg focus:ring-border-brown-max focus:border-brown-max py-2 px-4 ">
                                    +
                                </button>
                            <?php endif; ?>
                        </div>
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.shelf'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.shelf')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $attributes = $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $component = $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
                </div>
                <div>
                    <?php if (isset($component)) { $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-book','data' => ['id' => 'series','title' => 'السلسلة']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-book'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'series','title' => 'السلسلة']); ?>
                        <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'series','wire:model' => 'book.series','class' => 'w-full pt-4','placeholder' => 'أكتب هنا اسم السلسلة..']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'series','wire:model' => 'book.series','class' => 'w-full pt-4','placeholder' => 'أكتب هنا اسم السلسلة..']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.series'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.series')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $attributes = $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $component = $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
                </div>
                <div class="flex flex-col md:flex-row gap-5">
                    <?php if (isset($component)) { $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-book','data' => ['id' => 'publisher','title' => 'الناشر']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-book'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'publisher','title' => 'الناشر']); ?>
                        <div class="flex">
                            <?php if (isset($component)) { $__componentOriginal93f56a9791a1857c74a51e0e80d6e731 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal93f56a9791a1857c74a51e0e80d6e731 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.searchable-select','data' => ['id' => 'publisher','options' => $publishers,'noOptionsText' => 'لا يوجد هذا الناشر لدينا','placeholder' => 'أختار الناشر','nameProperty' => 'name','property' => 'book.publisher','nameEvent' => 'updated-publishers']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('searchable-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'publisher','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($publishers),'noOptionsText' => 'لا يوجد هذا الناشر لدينا','placeholder' => 'أختار الناشر','nameProperty' => 'name','property' => 'book.publisher','nameEvent' => 'updated-publishers']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal93f56a9791a1857c74a51e0e80d6e731)): ?>
<?php $attributes = $__attributesOriginal93f56a9791a1857c74a51e0e80d6e731; ?>
<?php unset($__attributesOriginal93f56a9791a1857c74a51e0e80d6e731); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal93f56a9791a1857c74a51e0e80d6e731)): ?>
<?php $component = $__componentOriginal93f56a9791a1857c74a51e0e80d6e731; ?>
<?php unset($__componentOriginal93f56a9791a1857c74a51e0e80d6e731); ?>
<?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(App\Enums\PermissionEnum::PUBLISHERS->value)): ?>
                                <button type="button" x-on:click="type = 'add'"
                                    x-on:click.prevent="$dispatch('open-modal', 'publisher')"
                                    class="border border-gray-300 bg-white text-gray-900 text-sm rounded-lg focus:ring-border-brown-max focus:border-brown-max py-2 px-4 ">
                                    +
                                </button>
                            <?php endif; ?>
                        </div>
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.publisher'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.publisher')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $attributes = $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $component = $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-book','data' => ['id' => 'author','title' => 'المؤلف']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-book'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'author','title' => 'المؤلف']); ?>
                        <div class="flex">
                            <?php if (isset($component)) { $__componentOriginal93f56a9791a1857c74a51e0e80d6e731 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal93f56a9791a1857c74a51e0e80d6e731 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.searchable-select','data' => ['id' => 'author','options' => $authors,'noOptionsText' => 'لا يوجد هذا المؤلف لدينا','placeholder' => 'أختار المؤلف','nameProperty' => 'name','property' => 'book.author','nameEvent' => 'updated-authors']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('searchable-select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'author','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($authors),'noOptionsText' => 'لا يوجد هذا المؤلف لدينا','placeholder' => 'أختار المؤلف','nameProperty' => 'name','property' => 'book.author','nameEvent' => 'updated-authors']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal93f56a9791a1857c74a51e0e80d6e731)): ?>
<?php $attributes = $__attributesOriginal93f56a9791a1857c74a51e0e80d6e731; ?>
<?php unset($__attributesOriginal93f56a9791a1857c74a51e0e80d6e731); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal93f56a9791a1857c74a51e0e80d6e731)): ?>
<?php $component = $__componentOriginal93f56a9791a1857c74a51e0e80d6e731; ?>
<?php unset($__componentOriginal93f56a9791a1857c74a51e0e80d6e731); ?>
<?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(App\Enums\PermissionEnum::AUTHORS->value)): ?>
                                <button type="button" x-on:click="type = 'add'"
                                    x-on:click.prevent="$dispatch('open-modal', 'author')"
                                    class="border border-gray-300 bg-white text-gray-900 text-sm rounded-lg focus:ring-border-brown-max focus:border-brown-max py-2 px-4 ">
                                    +
                                </button>
                            <?php endif; ?>
                        </div>
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.author'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.author')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $attributes = $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $component = $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
                </div>
                <?php if (isset($component)) { $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-book','data' => ['id' => 'subjects','title' => 'الموضوعات']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-book'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'subjects','title' => 'الموضوعات']); ?>
                    <?php if (isset($component)) { $__componentOriginal4727f9fd7c3055c2cf9c658d89b16886 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.textarea','data' => ['id' => 'subjects','class' => 'w-full pt-4','wire:model' => 'book.subjects','placeholder' => 'أكتب مواضيع الاساسية مع الفصل بينهم بـــ -']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'subjects','class' => 'w-full pt-4','wire:model' => 'book.subjects','placeholder' => 'أكتب مواضيع الاساسية مع الفصل بينهم بـــ -']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886)): ?>
<?php $attributes = $__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886; ?>
<?php unset($__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4727f9fd7c3055c2cf9c658d89b16886)): ?>
<?php $component = $__componentOriginal4727f9fd7c3055c2cf9c658d89b16886; ?>
<?php unset($__componentOriginal4727f9fd7c3055c2cf9c658d89b16886); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.subjects'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.subjects')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $attributes = $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $component = $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-book','data' => ['id' => 'content','title' => 'ملخص الكتاب']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-book'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'content','title' => 'ملخص الكتاب']); ?>
                    <?php if (isset($component)) { $__componentOriginal4727f9fd7c3055c2cf9c658d89b16886 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.textarea','data' => ['id' => 'content','class' => 'w-full pt-4','placeholder' => 'هل يمكنك كتابة ملخص الهذا لكتاب -','wire:model' => 'book.content']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'content','class' => 'w-full pt-4','placeholder' => 'هل يمكنك كتابة ملخص الهذا لكتاب -','wire:model' => 'book.content']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886)): ?>
<?php $attributes = $__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886; ?>
<?php unset($__attributesOriginal4727f9fd7c3055c2cf9c658d89b16886); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4727f9fd7c3055c2cf9c658d89b16886)): ?>
<?php $component = $__componentOriginal4727f9fd7c3055c2cf9c658d89b16886; ?>
<?php unset($__componentOriginal4727f9fd7c3055c2cf9c658d89b16886); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.content'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.content')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $attributes = $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $component = $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
                <div class="flex flex-col md:flex-row gap-5">
                    <?php if (isset($component)) { $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-book','data' => ['id' => 'copies','title' => 'عدد النسخ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-book'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'copies','title' => 'عدد النسخ']); ?>
                        <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['type' => 'number','id' => 'copies','class' => 'w-full pt-4','placeholder' => 'كم نسخة لديك من هذا الكتاب؟..','wire:model' => 'book.copies']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','id' => 'copies','class' => 'w-full pt-4','placeholder' => 'كم نسخة لديك من هذا الكتاب؟..','wire:model' => 'book.copies']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.copies'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.copies')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $attributes = $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $component = $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-book','data' => ['id' => 'part_number','title' => 'رقم الجزء']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-book'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'part_number','title' => 'رقم الجزء']); ?>
                        <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['type' => 'number','id' => 'part_number','class' => 'w-full pt-4','placeholder' => 'ما هو رقم هذا الجزاء؟','wire:model' => 'book.part_number']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','id' => 'part_number','class' => 'w-full pt-4','placeholder' => 'ما هو رقم هذا الجزاء؟','wire:model' => 'book.part_number']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.part_number'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.part_number')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $attributes = $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $component = $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
                </div>
                <div class="flex flex-col md:flex-row gap-5">
                    <?php if (isset($component)) { $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-book','data' => ['id' => 'papers','title' => 'عدد الصفحات']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-book'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'papers','title' => 'عدد الصفحات']); ?>
                        <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['type' => 'number','id' => 'papers','class' => 'w-full pt-4','placeholder' => 'كم عدد صفحات هذا الكتاب؟..','wire:model' => 'book.papers']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','id' => 'papers','class' => 'w-full pt-4','placeholder' => 'كم عدد صفحات هذا الكتاب؟..','wire:model' => 'book.papers']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.papers'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.papers')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $attributes = $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $component = $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-book','data' => ['id' => 'current_unit_number','title' => 'رقم الوحدة']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-book'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'current_unit_number','title' => 'رقم الوحدة']); ?>
                        <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['type' => 'number','id' => 'current_unit_number','class' => 'w-full pt-4','placeholder' => 'ما هي رقم الوحدة؟','wire:model' => 'book.current_unit_number']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','id' => 'current_unit_number','class' => 'w-full pt-4','placeholder' => 'ما هي رقم الوحدة؟','wire:model' => 'book.current_unit_number']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.current_unit_number'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.current_unit_number')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $attributes = $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $component = $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
                </div>
                <div class="flex flex-col md:flex-row gap-5">
                    <?php if (isset($component)) { $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-book','data' => ['id' => 'row','title' => 'رقم الصف']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-book'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'row','title' => 'رقم الصف']); ?>
                        <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['type' => 'number','id' => 'row','class' => 'w-full pt-4','placeholder' => 'ما هو رقم الصف؟','wire:model' => 'book.row']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','id' => 'row','class' => 'w-full pt-4','placeholder' => 'ما هو رقم الصف؟','wire:model' => 'book.row']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.row'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.row')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $attributes = $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $component = $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-book','data' => ['id' => 'position_book','title' => 'رقم الكتاب في الصف']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-book'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'position_book','title' => 'رقم الكتاب في الصف']); ?>
                        <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['type' => 'number','id' => 'position_book','class' => 'w-full pt-4','placeholder' => 'ما هو رقم هذا الكتاب في الصف؟','wire:model' => 'book.position_book']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'number','id' => 'position_book','class' => 'w-full pt-4','placeholder' => 'ما هو رقم هذا الكتاب في الصف؟','wire:model' => 'book.position_book']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.position_book'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.position_book')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $attributes = $__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__attributesOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab)): ?>
<?php $component = $__componentOriginal9484fe5a4932e4e679f29ab6c69735ab; ?>
<?php unset($__componentOriginal9484fe5a4932e4e679f29ab6c69735ab); ?>
<?php endif; ?>
                </div>

                <div>
                    <button wire:loading.attr="disabled" type="submit"
                        class="py-2 px-4 w-full text-white font-bold bg-green-700 rounded-lg hover:bg-green-900 duration-200 cursor-pointer">
                        <?php if (isset($component)) { $__componentOriginald5d051f243b37508d39f8ce3d92a5684 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald5d051f243b37508d39f8ce3d92a5684 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader','data' => ['wire:loading' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('loader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:loading' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald5d051f243b37508d39f8ce3d92a5684)): ?>
<?php $attributes = $__attributesOriginald5d051f243b37508d39f8ce3d92a5684; ?>
<?php unset($__attributesOriginald5d051f243b37508d39f8ce3d92a5684); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald5d051f243b37508d39f8ce3d92a5684)): ?>
<?php $component = $__componentOriginald5d051f243b37508d39f8ce3d92a5684; ?>
<?php unset($__componentOriginald5d051f243b37508d39f8ce3d92a5684); ?>
<?php endif; ?>
                        <span x-text="$wire.type !== 'store' ? 'تحديث الكتاب' : 'أضافه الكتاب'"></span>
                    </button>
                </div>
            </div>
            <div class="w-full md:w-1/4 pt-4">
                <div>
                    <label for="photo"
                        class="h-80 cursor-pointer flex flex-col items-center justify-center text-center rounded-xl w-full font-bold text-gray-300  p-10 border-4 border-dashed border-gray-300 hover:bg-gray-200/50 hover:text-gray-400 duration-100">
                        <span class="text-4xl">+</span>
                        <?php if(!is_null($book->oldPhoto) && is_null($book->photo)): ?>
                            <p class="text-xl">هل تود تغير الصورة</p>
                            <img src="<?php echo e(Storage::url($book->oldPhoto)); ?>" class="w-[95%] h-[95%] rounded-xl mt-4"
                                alt="">
                        <?php else: ?>
                            <p class="text-xl">أضغط هنا لتحديد الصورة</p>
                            <?php if($book->photo): ?>
                                <img x-show="$wire.book.photo" src="<?php echo e($book->photo?->temporaryUrl()); ?>"
                                    class="w-[95%] h-[95%] rounded-xl mt-4" alt="صورة الغلاف">
                            <?php endif; ?>
                        <?php endif; ?>
                    </label>
                    <input type="file" id="photo" class="hidden" accept="image/png,image/jpg,image/jpeg"
                        wire:model='book.photo'>
                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.photo'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.photo')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                </div>
                <div class="mt-4">
                    <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white" for="pdf">ارفاق
                        نسخه من الكتاب</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="pdf" type="file" wire:model='book.pdf' accept="pdf">
                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('book.pdf'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('book.pdf')),'class' => 'mt-2 ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                </div>

                <?php if(!is_null($book->oldPdf)): ?>
                    <div class="mt-4 flex w-full text-white">
                        <button type="button" wire:click='downloadPdfBook'
                            class="w-full bg-red-800 hover:bg-red-900 duration-200 rounded-tr-lg rounded-br-lg   py-1 px-2">
                            تحميل الكتاب
                        </button>
                        <button type="button" wire:click='deletePdfBook(<?php echo e($book->id); ?>)'
                            class="bg-gray-700 hover:bg-gray-900 duration-200 rounded-tl-lg rounded-bl-lg py-1 px-2">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="mt-4 bg-white p-2 rounded-lg border border-gray-200 shadow-lg">
                    <?php if (isset($component)) { $__componentOriginal592735d30e1926fbb04ff9e089d1fccf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal592735d30e1926fbb04ff9e089d1fccf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.toggle','data' => ['id' => 'toggleMarkup','wire:model' => 'book.markup','currentStatus' => ''.e($book?->markup ?? false).'','label' => 'عرض هذا الكتاب في الصفحة الرئيسية']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'toggleMarkup','wire:model' => 'book.markup','currentStatus' => ''.e($book?->markup ?? false).'','label' => 'عرض هذا الكتاب في الصفحة الرئيسية']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal592735d30e1926fbb04ff9e089d1fccf)): ?>
<?php $attributes = $__attributesOriginal592735d30e1926fbb04ff9e089d1fccf; ?>
<?php unset($__attributesOriginal592735d30e1926fbb04ff9e089d1fccf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal592735d30e1926fbb04ff9e089d1fccf)): ?>
<?php $component = $__componentOriginal592735d30e1926fbb04ff9e089d1fccf; ?>
<?php unset($__componentOriginal592735d30e1926fbb04ff9e089d1fccf); ?>
<?php endif; ?>
                </div>
                <?php if($type !== 'store'): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(App\Enums\PermissionEnum::DELETE_BOOK->value)): ?>
                        <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['type' => 'button','xOn:click' => '$dispatch(\'open-modal\', \'delete-book\')','class' => 'mt-4 py-2 px-4 w-full text-white font-bold bg-red-700 rounded-lg hover:bg-red-900 duration-200 cursor-pointer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','x-on:click' => '$dispatch(\'open-modal\', \'delete-book\')','class' => 'mt-4 py-2 px-4 w-full text-white font-bold bg-red-700 rounded-lg hover:bg-red-900 duration-200 cursor-pointer']); ?>
                            حذف الكتاب
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <div>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.modals.add-author', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1208457126-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.modals.add-publisher', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1208457126-4', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.modals.section-shelf', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1208457126-5', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php if($type !== 'store'): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(App\Enums\PermissionEnum::DELETE_BOOK->value)): ?>
                <?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['name' => 'delete-book']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'delete-book']); ?>
                    <div class="p-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                                <i class="fa-solid fa-gear"></i>
                                <span>
                                    هل تريد حذف هذا الكتاب؟!
                                </span>
                            </h2>
                            <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                                x-on:click="$dispatch('close')"></i>
                        </div>
                        <div class="my-6">
                            <p class="font-bold text-center ">
                                هذا الاجراء نهائي ولا يمكنك التراجع عنه؟ سيتم ايضا مسح اي مرفقات تخص هذا الكتاب!!
                            </p>
                        </div>
                        <div class="mt-6 flex justify-end">
                            <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['xOn:click' => '$dispatch(\'close\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$dispatch(\'close\')']); ?>
                                <?php echo e(__('الغاء')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>

                            <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['wire:loading.attr' => 'disabled','wire:click' => 'delete','class' => 'ms-3 bg-red-700/70 hover:bg-red-700 active:bg-red-700 focus:ring-red-700/50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:loading.attr' => 'disabled','wire:click' => 'delete','class' => 'ms-3 bg-red-700/70 hover:bg-red-700 active:bg-red-700 focus:ring-red-700/50']); ?>
                                <?php if (isset($component)) { $__componentOriginald5d051f243b37508d39f8ce3d92a5684 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald5d051f243b37508d39f8ce3d92a5684 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader','data' => ['wire:loading' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('loader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:loading' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald5d051f243b37508d39f8ce3d92a5684)): ?>
<?php $attributes = $__attributesOriginald5d051f243b37508d39f8ce3d92a5684; ?>
<?php unset($__attributesOriginald5d051f243b37508d39f8ce3d92a5684); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald5d051f243b37508d39f8ce3d92a5684)): ?>
<?php $component = $__componentOriginald5d051f243b37508d39f8ce3d92a5684; ?>
<?php unset($__componentOriginald5d051f243b37508d39f8ce3d92a5684); ?>
<?php endif; ?>
                                <?php echo e(__('حذف نهائي')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>

                        </div>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $attributes = $__attributesOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__attributesOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f64f32e90b9102968f2bc548315018c)): ?>
<?php $component = $__componentOriginal9f64f32e90b9102968f2bc548315018c; ?>
<?php unset($__componentOriginal9f64f32e90b9102968f2bc548315018c); ?>
<?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div><?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/livewire/dashboard/books/operations.blade.php ENDPATH**/ ?>