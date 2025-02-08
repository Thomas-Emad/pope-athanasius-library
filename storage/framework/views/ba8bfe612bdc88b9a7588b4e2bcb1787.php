<div>
    <div class="container px-6 max-w-full my-4">
        <div class=" bg-white p-4 rounded-lg bvorder border-gray-100 shadow text-gray-800">
            <h1 class="flex items-center gap-2 font-bold text-2xl pb-2 border-b-4 mb-2 border-b-brown-max w-fit">
                <?php if($book->markup): ?>
                    <i class="fa-solid fa-star text-amber-600"
                        title="هذا يعني أن هذا الكتاب يتم عرضه في الصفحة الرئيسية"></i>
                <?php endif; ?>
                <div>
                    <span><?php echo e($book->title); ?></span>
                </div>
            </h1>
            <div class="flex justify-between flex-col-reverse items-center md:items-start md:flex-row">
                <div class="w-full">
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 text-lg text-gray-700 w-full">
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-barcode text-blue-500"></i>
                            <p>
                                <span class="font-bold">كود:</span>
                                <span>#<?php echo e($book->code); ?></span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-receipt text-green-500"></i>
                            <p>
                                <span class="font-bold">القسم:</span>
                                <span><?php echo e($book->section->title); ?></span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-layer-group text-red-500"></i>
                            <p>
                                <span class="font-bold">الرف:</span>
                                <span><?php echo e($book->shelf->title); ?></span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-book text-purple-500"></i>
                            <p>
                                <span class="font-bold">السلسة:</span>
                                <span><?php echo e($book->series); ?></span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-hashtag text-orange-500"></i>
                            <p>
                                <span class="font-bold">رقم الجزء:</span>
                                <span><?php echo e($book->part_number); ?></span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-user text-yellow-500"></i>
                            <p>
                                <span class="font-bold">مؤلف:</span>
                                <span><?php echo e($book->author->name); ?></span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-copy text-pink-500"></i>
                            <p>
                                <span class="font-bold">عدد النسخ:</span>
                                <span><?php echo e($book->copies); ?></span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-building text-brown-500"></i>
                            <p>
                                <span class="font-bold">الناشر:</span>
                                <span><?php echo e($book->publisher->name); ?></span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-file-lines text-gray-500"></i>
                            <p>
                                <span class="font-bold">عدد الصفحات:</span>
                                <span><?php echo e($book->papers); ?></span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-box text-indigo-500"></i>
                            <p>
                                <span class="font-bold">رقم الوحدة:</span>
                                <span><?php echo e($book->current_unit_number); ?></span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-arrow-up-1-9 text-orange-600"></i>
                            <p>
                                <span class="font-bold">رقم الرف:</span>
                                <span><?php echo e($book->row); ?></span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-sort text-teal-500"></i>
                            <p>
                                <span class="font-bold">ترتيب الكتاب:</span>
                                <span><?php echo e($book->position_book); ?></span>
                            </p>
                        </li>
                    </ul>

                    <div class="mt-4">
                        <?php if(!is_null($book->pdf)): ?>
                            <button wire:click="downloadPdfBook()"
                                class="inline-block py-2 px-4 bg-red-800 hover:bg-red-600 duration-200 text-white font-bold rounded-lg mt-4">
                                تحميل الكتاب بصيغة PDF
                            </button>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(App\Enums\PermissionEnum::BOOK->value)): ?>
                            <a href="<?php echo e(route('dashboard.books.edit', $book->id)); ?>" wire:navigate
                                class="inline-block py-2 px-4 bg-amber-800 hover:bg-amber-600 duration-200 text-white font-bold rounded-lg mt-4">
                                التعديل على الكتاب
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="w-64 h-80 rounded-lg border border-gray-200 bg-white flex items-center justify-center">
                    <img src="<?php echo e($book->photo ? Storage::url($book->photo) : asset('assets/images/mockup.jpg')); ?>"
                        class="max-w-full max-h-full object-contain" alt="<?php echo e($book->title); ?>"
                        onerror="this.onerror=null; this.src='<?php echo e(asset('assets/images/mockup.jpg')); ?>';">
                </div>
            </div>
        </div>
        <div class="bg-white p-4 mt-4 rounded-lg bvorder border-gray-100 shadow text-gray-800">
            <h1 class="flex items-center gap-2 font-bold text-2xl pb-2 border-b-4 mb-2 border-b-brown-max w-fit">
                <div>
                    <i class="fa-solid fa-clipboard-list"></i>
                    <span>مواضيع الكتاب</span>
                </div>
            </h1>
            <div>
                <?php
                    $subjects = explode(',', $book->subjects);
                ?>
                <ul class="ps-8">
                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(strlen(trim($item)) > 0): ?>
                            <li class="list-disc"><?php echo e($item); ?></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php if(empty($subjects)): ?>
                    <p class="text-gray-600 italic text-center">لا يوجد هنا اي موضوع مسجل لهذا الكتب..</p>
                <?php endif; ?>
            </div>
        </div>
        <?php if($book->content): ?>
            <div class="bg-white p-4 mt-4 rounded-lg bvorder border-gray-100 shadow text-gray-800">
                <h1 class="flex items-center gap-2 font-bold text-2xl pb-2 border-b-4 mb-2 border-b-brown-max w-fit">
                    <div>
                        <i class="fa-solid fa-context"></i>
                        <span>ملخص الكتاب</span>
                    </div>
                </h1>
                <p class=" whitespace-pre-wrap"><?php echo e($book->content); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/livewire/book-page.blade.php ENDPATH**/ ?>