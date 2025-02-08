<di x-data="{ type: '' }">
    <div>
        <div class="flex justify-between items-center gap-2 mb-8">
            <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
                <i class="fa-solid fa-book-bible me-2"></i>
                <span>الكتب</span>
            </h1>
            <div class="flex items-center gap-2">
                <a href="<?php echo e(route('dashboard.books.create')); ?>" wire:navigate
                    class="text-white font-bold bg-brown-max py-2 px-4 rounded-lg hover:bg-brown-lite duration-200">
                    أضافه كتاب
                </a>
                <div x-on:click="$dispatch('open-modal', 'more')"
                    class="p-2 text-xl text-gray-600 hover:bg-gray-100 rounded-lg duration-150 cursor-pointer">
                    <i class="fa-solid fa-gear"></i>
                </div>
            </div>
        </div>

        <div class="relative  sm:rounded-lg">
            <div
                class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <?php if (isset($component)) { $__componentOriginal8ac2915b2fdd8f1531597e30ada0003c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8ac2915b2fdd8f1531597e30ada0003c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-dashboard','data' => ['wire:model.live.debounce.500ms' => 'search','placeholder' => 'أكتب هنا اسم الكتاب، المؤلف، الناشر، الموضوعات، القسم، الرف، كود الكتاب...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('search-dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live.debounce.500ms' => 'search','placeholder' => 'أكتب هنا اسم الكتاب، المؤلف، الناشر، الموضوعات، القسم، الرف، كود الكتاب...']); ?>
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
                <div>
                    <?php if (isset($component)) { $__componentOriginal592735d30e1926fbb04ff9e089d1fccf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal592735d30e1926fbb04ff9e089d1fccf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.toggle','data' => ['id' => 'getMarkUpBooks','wire:model.live' => 'getMarkUpBooks','label' => 'الكتب المميزه']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'getMarkUpBooks','wire:model.live' => 'getMarkUpBooks','label' => 'الكتب المميزه']); ?>
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
            </div>
            <div class="overflow-x-auto ">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                الكود
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                مميزه
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                صورة
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                اسم الكتاب
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                القسم
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                الرف
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                الناشر
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                المؤلف
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                المشاهدات
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                PDF
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                متزامن؟
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                الاعدادت
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr wire:key="book-<?php echo e($item->id); ?>"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo e($item->code); ?>

                                </th>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    <?php if (isset($component)) { $__componentOriginalb3231451c892c0ff8ddec086a2254255 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3231451c892c0ff8ddec086a2254255 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-yes-no','data' => ['status' => ''.e($item->markup).'','labelTrue' => 'هذا الكتاب مميزه يظهر في الصفحه الرئيسيه','labelFalse' => 'هذا الكتاب لا يظهر في الصفحه الرئيسيه']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status-yes-no'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => ''.e($item->markup).'','labelTrue' => 'هذا الكتاب مميزه يظهر في الصفحه الرئيسيه','labelFalse' => 'هذا الكتاب لا يظهر في الصفحه الرئيسيه']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3231451c892c0ff8ddec086a2254255)): ?>
<?php $attributes = $__attributesOriginalb3231451c892c0ff8ddec086a2254255; ?>
<?php unset($__attributesOriginalb3231451c892c0ff8ddec086a2254255); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3231451c892c0ff8ddec086a2254255)): ?>
<?php $component = $__componentOriginalb3231451c892c0ff8ddec086a2254255; ?>
<?php unset($__componentOriginalb3231451c892c0ff8ddec086a2254255); ?>
<?php endif; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <img src="<?php echo e($item->photo && Storage::exists($item->photo) ? Storage::url($item->photo) : asset('assets/images/logo.png')); ?>"
                                        class="shadow w-8 h-8 rounded-xl" alt="Photo Book"
                                        onerror="this.onerror=null;this.src='<?php echo e(asset('assets/images/logo.png')); ?>';">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php echo e(str($item->title)->limit(20)); ?>

                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    <?php echo e($item->section->title); ?>

                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    <?php echo e($item->shelf->title); ?>

                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    <?php echo e($item->publisher->name); ?>

                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    <?php echo e($item->author->name); ?>

                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    <?php echo e($item->views); ?>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if (isset($component)) { $__componentOriginalb3231451c892c0ff8ddec086a2254255 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3231451c892c0ff8ddec086a2254255 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-yes-no','data' => ['status' => ''.e($item->pdf).'','labelTrue' => 'هذا الكتاب يحتوي علي ملف PDF','labelFalse' => 'هذا الكتاب لا يحتوي علي اي ملف']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status-yes-no'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => ''.e($item->pdf).'','labelTrue' => 'هذا الكتاب يحتوي علي ملف PDF','labelFalse' => 'هذا الكتاب لا يحتوي علي اي ملف']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3231451c892c0ff8ddec086a2254255)): ?>
<?php $attributes = $__attributesOriginalb3231451c892c0ff8ddec086a2254255; ?>
<?php unset($__attributesOriginalb3231451c892c0ff8ddec086a2254255); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3231451c892c0ff8ddec086a2254255)): ?>
<?php $component = $__componentOriginalb3231451c892c0ff8ddec086a2254255; ?>
<?php unset($__componentOriginalb3231451c892c0ff8ddec086a2254255); ?>
<?php endif; ?>
                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    <?php if (isset($component)) { $__componentOriginalb3231451c892c0ff8ddec086a2254255 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3231451c892c0ff8ddec086a2254255 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-yes-no','data' => ['status' => ''.e($item->is_synced).'','labelTrue' => 'هذا الكتاب غير متزامن مع السيرفر الخارجي','labelFalse' => 'هذا الكتاب متزامن مع السيرفر الخارجي']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status-yes-no'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => ''.e($item->is_synced).'','labelTrue' => 'هذا الكتاب غير متزامن مع السيرفر الخارجي','labelFalse' => 'هذا الكتاب متزامن مع السيرفر الخارجي']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3231451c892c0ff8ddec086a2254255)): ?>
<?php $attributes = $__attributesOriginalb3231451c892c0ff8ddec086a2254255; ?>
<?php unset($__attributesOriginalb3231451c892c0ff8ddec086a2254255); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3231451c892c0ff8ddec086a2254255)): ?>
<?php $component = $__componentOriginalb3231451c892c0ff8ddec086a2254255; ?>
<?php unset($__componentOriginalb3231451c892c0ff8ddec086a2254255); ?>
<?php endif; ?>
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    <button wire:key="<?php echo e($item->id); ?>" wire:click='editBook(<?php echo e($item->id); ?>)'
                                        class="me-2 text-xl hover:text-amber-600 duration-150">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <a href="<?php echo e(route('book.show', $item->code)); ?>" wire:navigate
                                        class="me-2 text-xl hover:text-blue-600 duration-150">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="12" class="py-2 text-center  italic text-gray-600">
                                    يبدوا انه ليس لدينا هنا اي كتاب!!
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <?php echo e($books->links()); ?>

            </div>
        </div>

        <div>
            <?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['name' => 'more']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'more']); ?>
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                            <i class="fa-solid fa-gear"></i>
                            <span>
                                لدينا المزيد هنا:
                            </span>
                        </h2>
                        <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                            x-on:click="$dispatch('close')"></i>
                    </div>
                    <div class="my-6">
                        <div class="flex items-center justify-between flex-col md:flex-row">
                            <p class="font-bold flex items-center gap-2">
                                <i class="fa-solid fa-cloud-arrow-down text-gray-600"></i>
                                <span>هل تريد تصدير كافة الكتب ك Excel؟!</span>
                            </p>
                            <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['wire:loading.attr' => 'disabled','wire:click' => 'export','class' => 'w-full md:w-fit mt-1 inline-block text-sm bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:loading.attr' => 'disabled','wire:click' => 'export','class' => 'w-full md:w-fit mt-1 inline-block text-sm bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max']); ?>
                                <?php if (isset($component)) { $__componentOriginald5d051f243b37508d39f8ce3d92a5684 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald5d051f243b37508d39f8ce3d92a5684 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader','data' => ['wire:loading' => true,'wire:target' => 'export']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('loader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:loading' => true,'wire:target' => 'export']); ?>
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
                                <?php echo e(__('استخراج')); ?>

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
                        <div class="flex items-center justify-between flex-col md:flex-row mt-4">
                            <p class="font-bold flex items-center gap-2">
                                <i class="fa-solid fa-cloud-arrow-up text-gray-600"></i>
                                <span> هل لديك ملف Excel وتريد تسجيل لدينا؟!</span>
                            </p>
                            <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['wire:loading.attr' => 'disabled','xOn:click' => '$dispatch(\'close-modal\', \'more\');$dispatch(\'open-modal\', \'import-excel\')','class' => 'w-full md:w-fit mt-1 inline-block text-sm bg-blue-700/40 hover:bg-blue-600 active:bg-blue-600 focus:bg-blue-600']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:loading.attr' => 'disabled','x-on:click' => '$dispatch(\'close-modal\', \'more\');$dispatch(\'open-modal\', \'import-excel\')','class' => 'w-full md:w-fit mt-1 inline-block text-sm bg-blue-700/40 hover:bg-blue-600 active:bg-blue-600 focus:bg-blue-600']); ?>
                                <?php echo e(__('استيراد')); ?>

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
                        <hr class="my-4 block w-[95%] mx-auto">
                        <div class="flex items-center justify-between flex-col md:flex-row mt-4">
                            <p class="font-bold flex items-center gap-2">
                                <i class="fa-solid fa-rotate text-gray-600"></i>
                                <span> هل تريد مزامنة الكتب مع الموقع الخارجي؟ (يلزم توفر اتصال بالإنترنت)</span>
                            </p>
                            <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['wire:loading.attr' => 'disabled','wire:click' => 'sync','class' => 'w-full md:w-fit mt-1 inline-block text-sm bg-red-700/40 hover:bg-red-600 active:bg-red-600 focus:bg-red-600']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:loading.attr' => 'disabled','wire:click' => 'sync','class' => 'w-full md:w-fit mt-1 inline-block text-sm bg-red-700/40 hover:bg-red-600 active:bg-red-600 focus:bg-red-600']); ?>
                                <?php if (isset($component)) { $__componentOriginald5d051f243b37508d39f8ce3d92a5684 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald5d051f243b37508d39f8ce3d92a5684 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader','data' => ['wire:loading' => true,'wire:target' => 'sync']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('loader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:loading' => true,'wire:target' => 'sync']); ?>
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
                                <?php echo e(__('مزامنه')); ?>

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
                    <div>
                        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['xOn:click' => '$dispatch(\'close\')','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$dispatch(\'close\')','class' => 'w-full']); ?>
                            <?php echo e(__('خروج')); ?>

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
            <?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['name' => 'import-excel']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'import-excel']); ?>
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <span>
                                اختر الملف المراد تسجيله
                            </span>
                        </h2>
                        <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                            x-on:click="$dispatch('close')"></i>
                    </div>
                    <form wire:submit.prevent="import" class="my-6">
                        <div class="flex gap-2">
                            <input wire:model="features.importExcel"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file_input" type="file" accept="excel">
                            <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['type' => 'submit','class' => 'bg-green-700 hover:bg-green-600 duration-150']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'bg-green-700 hover:bg-green-600 duration-150']); ?>
                                <?php echo e(__('استيراد')); ?>

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
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('features.importExcel'),'class' => 'mt-2 ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('features.importExcel')),'class' => 'mt-2 ']); ?>
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
                    </form>
                    <div class="opacity-0 text-green-700 mb-4 duration-150" wire:target="import"
                        wire:loading.class="opacity-100">
                        جاري التحميل... يُرجى الانتظار
                    </div>
                    <div>
                        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['xOn:click' => '$dispatch(\'close\')','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$dispatch(\'close\')','class' => 'w-full']); ?>
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
            <?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['name' => 'success-excel']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'success-excel']); ?>
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <span>
                                تمت عملية استيراد بنجاح
                            </span>
                        </h2>
                        <i class="fa-solid fa-x hover:text-green-600 duration-150 cursor-pointer text-sm"
                            x-on:click="$dispatch('close')"></i>
                    </div>
                    <div class="my-6">
                        <div>
                            <h2 class="font-bold text-3xl text-center text-green-700">تم عملية استيراد الكتب بنجاح</h2>
                        </div>
                    </div>
                    <div>
                        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['xOn:click' => '$dispatch(\'close\')','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$dispatch(\'close\')','class' => 'w-full']); ?>
                            <?php echo e(__('خروج')); ?>

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
            <?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['name' => 'loading-sync']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'loading-sync']); ?>
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                            <i class="fa-solid fa-rotate"></i>
                            <span>
                                تجري عملية المزامنة بنجاح
                            </span>
                        </h2>
                        <i class="fa-solid fa-x hover:text-green-600 duration-150 cursor-pointer text-sm"
                            x-on:click="$dispatch('close')"></i>
                    </div>
                    <div class="my-6">
                        <h2 class="font-bold text-3xl text-center text-amber-700">
                            تجري العملية المزامنة الان, لا تغلق الصفحه او اتصال الانترنت
                        </h2>
                        <div class="flex justify-center my-4">
                            <?php if (isset($component)) { $__componentOriginald5d051f243b37508d39f8ce3d92a5684 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald5d051f243b37508d39f8ce3d92a5684 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.loader','data' => ['classLoader' => 'w-20 h-20 text-gray-200 fill-amber-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('loader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['classLoader' => 'w-20 h-20 text-gray-200 fill-amber-700']); ?>
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
                        </div>
                    </div>
                    <div>
                        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['xOn:click' => '$dispatch(\'close\')','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$dispatch(\'close\')','class' => 'w-full']); ?>
                            <?php echo e(__('خروج')); ?>

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
            <?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['name' => 'success-sync']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'success-sync']); ?>
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                            <i class="fa-solid fa-rotate"></i>
                            <span>
                                تمت عملية المزامنة بنجاح
                            </span>
                        </h2>
                        <i class="fa-solid fa-x hover:text-green-600 duration-150 cursor-pointer text-sm"
                            x-on:click="$dispatch('close')"></i>
                    </div>
                    <div class="my-6">
                        <div>
                            <h2 class="font-bold text-3xl text-center text-green-700">تمت عملية المزامنة بنجاح
                            </h2>
                        </div>
                    </div>
                    <div>
                        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['xOn:click' => '$dispatch(\'close\')','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$dispatch(\'close\')','class' => 'w-full']); ?>
                            <?php echo e(__('خروج')); ?>

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
            <?php if (isset($component)) { $__componentOriginal9f64f32e90b9102968f2bc548315018c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f64f32e90b9102968f2bc548315018c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.modal','data' => ['name' => 'fail-sync']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'fail-sync']); ?>
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                            <i class="fa-solid fa-rotate"></i>
                            <span>
                                لقد فشلت عملية المزامنة
                            </span>
                        </h2>
                        <i class="fa-solid fa-x hover:text-green-600 duration-150 cursor-pointer text-sm"
                            x-on:click="$dispatch('close')"></i>
                    </div>
                    <div class="my-6">
                        <div>
                            <h2 class="font-bold text-3xl text-center text-red-700">لقد فشلت عملية المزامنة
                            </h2>
                        </div>
                    </div>
                    <div>
                        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['xOn:click' => '$dispatch(\'close\')','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$dispatch(\'close\')','class' => 'w-full']); ?>
                            <?php echo e(__('خروج')); ?>

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
        </div>
    </div>
</di><?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/livewire/dashboard/books/index.blade.php ENDPATH**/ ?>