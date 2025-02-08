<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="rtl">

<head>
    <?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="font-amiri text-gray-900  antialiased overflow-x-hidden ">
    <div class="min-h-screen flex flex-col sm:justify-center items-center py-6 sm:pt-0 bg-brown-max">
        <div class="w-full">
            <?php echo e($slot); ?>

        </div>
    </div>
</body>

</html>
<?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/layouts/guest.blade.php ENDPATH**/ ?>