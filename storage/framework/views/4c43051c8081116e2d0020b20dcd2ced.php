<div class="text-gray-900">
    <div class="bg-brown-lite flex items-center justify-center px-2 py-20 text-center">
        <div class="w-full md:w-3/4">
            <div class="text-gray-900">
                <h1 class="font-bold text-4xl mb-4">مكتبة البابا أثناسيوس للاطلاع</h1>
                <p class="italic text-3xl">كنيسة الشهيد العظيم مارمينا والبابا كيرلس السادس</p>
            </div>
            <div class="w-full my-4 relative">
                <div class="absolute inset-y-0 right-2 flex items-center justify-center z-10">
                    <i class="fa-solid fa-magnifying-glass text-brown-max"></i>
                </div>
                <input name="search-book" wire:model='book' wire:keydown.enter="search" type="text"
                    placeholder="أكتب هنا اسم الكتاب..."
                    class="py-4 px-8 border-none outline-none rounded-xl w-full focus:ring-brown-max">
                <div class="absolute inset-y-0 left-2 flex items-center justify-center  z-10">
                    <button type="button" wire:click='search'
                        class="text-sm py-2 px-4 bg-brown-lite rounded-md text-white duration-200 hover:bg-brown-max">
                        أبحث
                    </button>
                </div>
            </div>
            <div class="text-white flex flex-col md:flex-row items-center gap-2 justify-center">
                <a href="<?php echo e(route('search', ['orderBy' => 'new'])); ?>" wire:navigate
                    class="block w-full md:w-fit py-2 px-8 border border-white hover:bg-brown-max hover:border-transparent hover:shadow-md duration-200 rounded-lg">
                    أحدث الكتب
                </a>
                <a href="<?php echo e(route('search', ['orderBy' => 'top_views'])); ?>" wire:navigate
                    class="block w-full md:w-fit py-2 px-8 border border-white hover:bg-brown-max hover:border-transparent hover:shadow-md duration-200 rounded-lg">
                    أكثر الكتب اطلاعًا
                </a>
                <a href="<?php echo e(route('search', ['orderBy' => 'old'])); ?>" wire:navigate
                    class="block w-full md:w-fit py-2 px-8 border border-white hover:bg-brown-max hover:border-transparent hover:shadow-md duration-200 rounded-lg">
                    أقدم الكتب
                </a>
            </div>
        </div>
    </div>
    <div class="bg-gray-200">
        <div
            class="container px-6 max-w-full flex flex-col md:flex-row gap-2 justify-around items-center py-10 text-center">
            <div
                class="w-full md:w-1/3 flex flex-col gap-2 items-center opacity-70 hover:opacity-100 duration-300 cursor-pointer">
                <img src="<?php echo e(asset('assets/images/Bookshelf.png')); ?>" class="w-20" alt="books icon">
                <span class="font-bold text-4xl"> <?php echo e($counter['books']); ?> كتب </span>
                <p>آلاف الكتب المنشورة في مكتبة البابا أثناسيوس للاطلاع</p>
            </div>
            <div class="flex flex-col gap-2 items-center my-4">
                <img src="<?php echo e(asset('assets/images/logo.png')); ?>" class=" w-48" alt="Logo">
            </div>
            <div
                class="w-full md:w-1/3 flex flex-col gap-2 items-center opacity-70 hover:opacity-100 duration-300 cursor-pointer">
                <img src="<?php echo e(asset('assets/images/books.png')); ?>" class="w-20" alt="books icon">
                <span class="font-bold text-4xl"> <?php echo e($counter['authors']); ?> مؤلفين </span>
                <p>تهدف مكتبة البابا أثناسيوس إلى نشر المعرفة والعلم الذي تورثناه للجميع.</p>
            </div>
        </div>
    </div>
    <div class="bg-gray-100">
        <div class="container px-6 max-w-full  flex flex-col md:flex-row gap-4 justify-between my-10 ">
            <div class="w-full md:w-2/3">
                <div class="bg-white p-4 shadow-md rounded-md">
                    <h2 class="w-fit font-bold pb-2 text-2xl border-b-2 border-b-brown-max">
                        <i class="fa-solid fa-cross"></i>
                        <span>كلمة اليوم</span>
                    </h2>
                    <?php if(!empty($wordToday)): ?>
                        <p class="text-lg py-2"><?php echo e($wordToday->content); ?></p>
                        <p class="text-left italic"><?php echo e($wordToday->said); ?></p>
                    <?php else: ?>
                        <p class="text-lg text-center">ليس هناك أي كلمة لهذا اليوم</p>
                    <?php endif; ?>
                </div>
                <div class="mt-10 grid gap-4" style="grid-template-columns: repeat(auto-fill, minmax(150px, 1fr))">
                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('book.show', $book->code)); ?>" wire:navigate
                            wire:key='book-<?php echo e($book->id); ?>'
                            class="flex flex-col items-center justify-between  bg-white shadow rounded-md overflow-hidden hover:-translate-y-2 duration-200">
                            <!-- Image Container with Fixed Size and Background -->
                            <div class="w-full h-56 bg-white flex items-center justify-center">
                                <img src="<?php echo e($book->photo ? Storage::url($book->photo) : asset('assets/images/mockup.jpg')); ?>"
                                    class="max-w-full max-h-full object-contain" alt="<?php echo e($book->title); ?>"
                                    onerror="this.onerror=null; this.src='<?php echo e(asset('assets/images/mockup.jpg')); ?>';">
                            </div>
                            <!-- Book Details -->
                            <div class="text-center px-2 py-3">
                                <h3 class="font-bold"><?php echo e(str($book->title)->limit(20)); ?></h3>
                                <span><?php echo e(str($book->author->name)->limit(20)); ?></span>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div class="bg-white p-4 shadow-md rounded-md">
                    <div class="flex justify-between items-center">
                        <h2 class="w-fit font-bold pb-2 text-2xl border-b-2 border-b-brown-max">
                            <i class="fa-solid fa-book-medical"></i>
                            <span>أقسام الكتب</span>
                        </h2>
                        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'search-bar')"
                            class="hover:text-gray-800 hover:border-gray-800 duration-200">
                            <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                        </button>
                    </div>
                    <div class="flex flex-col gap-4 mt-4 overflow-y-auto h-fit md:h-[500px] p-2 ">
                        <?php $__empty_1 = true; $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <a href="<?php echo e(route('search', ['search' => $unit->title])); ?>" wire:navigate
                                wire:key="unit-<?php echo e($unit->id); ?>"
                                class="bg-white p-4 shadow-lg rounded-lg flex justify-between items-center hover:text-brown-max hover:-translate-y-1 duration-200">
                                <span><?php echo e($unit->title); ?></span>
                                <i class="fa-solid fa-book-bookmark"></i>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="italic text-center text-gray-600">لا يوجد هنا أي وحدة</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/thomas/Projects/LibaryLaravel/resources/views/livewire/home-page.blade.php ENDPATH**/ ?>