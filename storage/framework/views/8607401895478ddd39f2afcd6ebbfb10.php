<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="rtl">

<head>
    <?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="font-amiri text-gray-900  antialiased overflow-x-hidden">
    <div class="bg-gray-100">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('layout.navigation', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3467253548-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        <!-- Page Content -->
        <main class="min-h-screen">
            <div class="container max-w-full px-6 my-5">
                <h1 class="font-bold text-2xl">
                    <i class="fa-solid fa-house me-2"></i>
                    <span>لوحة التحكم</span>
                </h1>
                <div class="flex flex-col md:flex-row justify-between gap-4 mt-4">
                    <div class="w-full md:w-1/4 bg-white p-2 rounded-xl shadow-md">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(App\Enums\PermissionEnum::CONTROLR_DASHBOARD->value)): ?>
                            <?php if (isset($component)) { $__componentOriginal56e65ba37f24823db3f45bd48b6a1566 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-dashboard','data' => ['link' => ''.e(route('dashboard.index')).'','label' => 'الصفحة الرئيسية','isActive' => Route::is('dashboard.index'),'icon' => 'fa-solid fa-chart-line']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('dashboard.index')).'','label' => 'الصفحة الرئيسية','isActive' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(Route::is('dashboard.index')),'icon' => 'fa-solid fa-chart-line']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $attributes = $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $component = $__componentOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(App\Enums\PermissionEnum::BOOK->value)): ?>
                            <?php if (isset($component)) { $__componentOriginal56e65ba37f24823db3f45bd48b6a1566 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-dashboard','data' => ['link' => ''.e(route('dashboard.books')).'','label' => 'الكتب','isActive' => Route::is('dashboard.books'),'icon' => 'fa-solid fa-book-open']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('dashboard.books')).'','label' => 'الكتب','isActive' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(Route::is('dashboard.books')),'icon' => 'fa-solid fa-book-open']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $attributes = $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $component = $__componentOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(App\Enums\PermissionEnum::SECTIONS_BOOK->value)): ?>
                            <?php if (isset($component)) { $__componentOriginal56e65ba37f24823db3f45bd48b6a1566 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-dashboard','data' => ['link' => ''.e(route('dashboard.sections')).'','label' => 'اقسام الكتب','isActive' => Route::is('dashboard.sections'),'icon' => 'fa-solid fa-book-bible']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('dashboard.sections')).'','label' => 'اقسام الكتب','isActive' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(Route::is('dashboard.sections')),'icon' => 'fa-solid fa-book-bible']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $attributes = $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $component = $__componentOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(App\Enums\PermissionEnum::POSTS->value)): ?>
                            <?php if (isset($component)) { $__componentOriginal56e65ba37f24823db3f45bd48b6a1566 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-dashboard','data' => ['link' => ''.e(route('dashboard.posts')).'','label' => 'المنشورات','icon' => 'fa-solid fa-newspaper','isActive' => Route::is('dashboard.posts')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('dashboard.posts')).'','label' => 'المنشورات','icon' => 'fa-solid fa-newspaper','isActive' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(Route::is('dashboard.posts'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $attributes = $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $component = $__componentOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(App\Enums\PermissionEnum::PUBLISHERS->value)): ?>
                            <?php if (isset($component)) { $__componentOriginal56e65ba37f24823db3f45bd48b6a1566 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-dashboard','data' => ['link' => ''.e(route('dashboard.publishers')).'','label' => 'الناشرين','isActive' => Route::is('dashboard.publishers'),'icon' => 'fa-solid fa-building']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('dashboard.publishers')).'','label' => 'الناشرين','isActive' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(Route::is('dashboard.publishers')),'icon' => 'fa-solid fa-building']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $attributes = $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $component = $__componentOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(App\Enums\PermissionEnum::AUTHORS->value)): ?>
                            <?php if (isset($component)) { $__componentOriginal56e65ba37f24823db3f45bd48b6a1566 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-dashboard','data' => ['link' => ''.e(route('dashboard.authors')).'','label' => 'المؤلفين','isActive' => Route::is('dashboard.authors'),'icon' => 'fa-solid fa-feather-pointed']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('dashboard.authors')).'','label' => 'المؤلفين','isActive' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(Route::is('dashboard.authors')),'icon' => 'fa-solid fa-feather-pointed']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $attributes = $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $component = $__componentOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(App\Enums\PermissionEnum::WORD_TODAY->value)): ?>
                            <?php if (isset($component)) { $__componentOriginal56e65ba37f24823db3f45bd48b6a1566 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-dashboard','data' => ['link' => ''.e(route('dashboard.words')).'','label' => 'كلمة اليوم','isActive' => Route::is('dashboard.words'),'icon' => 'fa-solid fa-quote-right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('dashboard.words')).'','label' => 'كلمة اليوم','isActive' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(Route::is('dashboard.words')),'icon' => 'fa-solid fa-quote-right']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $attributes = $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $component = $__componentOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(App\Enums\PermissionEnum::USERS->value)): ?>
                            <?php if (isset($component)) { $__componentOriginal56e65ba37f24823db3f45bd48b6a1566 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-dashboard','data' => ['link' => ''.e(route('dashboard.users')).'','label' => 'المستخدمين','isActive' => Route::is('dashboard.users'),'icon' => 'fa-solid fa-users']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('dashboard.users')).'','label' => 'المستخدمين','isActive' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(Route::is('dashboard.users')),'icon' => 'fa-solid fa-users']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $attributes = $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $component = $__componentOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal56e65ba37f24823db3f45bd48b6a1566 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link-dashboard','data' => ['link' => ''.e(route('dashboard.roles')).'','label' => 'ألاذونات والصلاحيات','isActive' => Route::is('dashboard.roles'),'icon' => 'fa-solid fa-users-gear']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['link' => ''.e(route('dashboard.roles')).'','label' => 'ألاذونات والصلاحيات','isActive' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(Route::is('dashboard.roles')),'icon' => 'fa-solid fa-users-gear']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $attributes = $__attributesOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__attributesOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566)): ?>
<?php $component = $__componentOriginal56e65ba37f24823db3f45bd48b6a1566; ?>
<?php unset($__componentOriginal56e65ba37f24823db3f45bd48b6a1566); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="w-full md:w-3/4 bg-white p-4 rounded-xl shadow-md">
                        <?php echo $__env->yieldContent('content'); ?>
                        <?php echo e($slot); ?>

                    </div>
                </div>
            </div>
        </main>

        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('layout.footer', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3467253548-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    </div>

    <script src="<?php echo e(asset('assets/js/all.min.js')); ?>"></script>
</body>

</html>
<?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/layouts/dashboard.blade.php ENDPATH**/ ?>