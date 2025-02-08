<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="rtl">

<head>
    <?php echo $__env->make('layouts.head', ['title' => 'ليس لديك اذن لفتح هذا الصفحه'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <meta name="robots" content="noindex">
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body class="font-amiri antialiased">
    <div class="bg-gray-100 ">

        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('layout.navigation', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-914424154-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        <!-- Page Content -->
        <main class="min-h-screen">
            <div class="p-2 flex flex-col justify-center">
                <img src="<?php echo e(asset('assets/images/errors/401.png')); ?>" class="inline-block mx-auto w-5/6 md:w-2/6"
                    alt="">
                <div class="text-center text-gray-900">
                    <h1 class="font-bold text-2xl">غير مصرح لك بفتح هذه الصفحة!</h1>
                    <p class="text-xl">يبدو أنه ليس لديك إذن لفتح هذه الصفحة. إذا كنت تعتقد أنك مُخوّل، اتصل بمشرف
                        الموقع.</p>
                </div>
            </div>
        </main>

        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('layout.footer', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-914424154-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <script src="<?php echo e(asset('assets/js/all.min.js')); ?>"></script>
</body>

</html>
<?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/errors/403.blade.php ENDPATH**/ ?>