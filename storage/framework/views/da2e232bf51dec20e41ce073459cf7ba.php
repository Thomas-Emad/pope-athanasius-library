<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<!-- prettier-ignore -->
<title> <?php echo e($title ?? ''); ?> <?php echo $__env->yieldContent('title', ''); ?> <?php echo e(' | ' . config('app.name', 'Laravel')); ?></title>

<link rel="stylesheet" href="<?php echo e(asset('assets/css/all.min.css')); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo.png')); ?>" type="image/x-icon">

<!-- Scripts -->
<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

<?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/layouts/head.blade.php ENDPATH**/ ?>