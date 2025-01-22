<di x-data="{ type: '' }">
    <div>
        <div class="flex justify-between items-center gap-2 mb-8">
            <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
                <i class="fa-solid fa-book-bible me-2"></i>
                <span>الكتب</span>
            </h1>
            <div class="flex items-center gap-2">
                <a href="{{ route('dashboard.books.create') }}" wire:navigate
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
                <div>
                    <label for="table-search" class="sr-only">ابحث</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search" wire:model.live.debounce.500ms='search'
                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="ابحث عن اسم الكتاب..">
                    </div>
                </div>
                <div>
                    <x-toggle wire:model.live='getMarkUpBooks' label='الكتب المميزه' />
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
                                PDF
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
                                الاعدادت
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $item)
                            <tr wire:key="book-{{ $item->id }}"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->code }}
                                </th>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    @if ($item->markup)
                                        <span title="هذا الكتاب مميزه يظهر في الصفحه الرئيسيه"
                                            class="text-xs text-green-700 border-2 border-green-700 py-0.5 px-1 rounded-full">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                    @else
                                        <span title="هذا الكتاب لا يظهر في الصفحه الرئيسيه"
                                            class="text-xs text-red-700 border-2 border-red-700 py-0.5 px-1 rounded-full">
                                            <i class="fa-solid fa-x"></i>
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img src="{{ $item->photo ? Storage::url($item->photo) : asset('assets/images/logo.png') }}"
                                        class="shadow w-14 h-8 rounded-xl" alt="Photo Book"
                                        onerror="this.onerror=null; this.src='{{ asset('assets/images/logo.png') }}';">
                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    {{ str($item->title)->limit(20) }}
                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    @if ($item->pdf)
                                        <span title="هذا الكتاب يحتوي علي ملف PDF"
                                            class="text-xs text-green-700 border-2 border-green-700 py-0.5 px-1 rounded-full">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                    @else
                                        <span title="هذا الكتاب لا يحتوي علي اي ملف"
                                            class="text-xs text-red-700 border-2 border-red-700 py-0.5 px-1 rounded-full">
                                            <i class="fa-solid fa-x"></i>
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    {{ $item->section->title }}
                                </td>

                                <td class="px-6 py-4  whitespace-nowrap">
                                    {{ $item->shelf->title }}
                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    {{ $item->publisher->name }}
                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    {{ $item->author->name }}
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    <button wire:key="{{ $item->id }}" wire:click='editBook({{ $item->id }})'
                                        class="me-2 text-xl hover:text-amber-600 duration-150">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <a href="{{ route('book.show', $item->code) }}" wire:navigate
                                        class="me-2 text-xl hover:text-blue-600 duration-150">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="py-2 text-center  italic text-gray-600">
                                    يبدوا انه ليس لدينا هنا اي كتاب!!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


            <div class="mt-4">
                {{ $books->links() }}
            </div>
        </div>

        <div>
            <x-modal name="more">
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
                            <p class="font-bold">- هل تريد تصدير كافة الكتب ك Excel؟!</p>
                            <x-button wire:loading.attr="disabled" wire:click="export"
                                class="w-full md:w-fit mt-1 inline-block text-sm bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                                <x-loader wire:loading wire:target="export" />
                                {{ __('استخراج') }}
                            </x-button>
                        </div>
                        <div class="flex items-center justify-between flex-col md:flex-row mt-4">
                            <p class="font-bold">- هل لديك ملف Excel وتريد تسجيل لدينا؟!</p>
                            <x-button wire:loading.attr="disabled"
                                x-on:click="$dispatch('close-modal', 'more');$dispatch('open-modal', 'import-excel')"
                                class="w-full md:w-fit mt-1 inline-block text-sm bg-blue-700/40 hover:bg-blue-600 active:bg-blue-600 focus:bg-blue-600">
                                {{ __('استيراد') }}
                            </x-button>
                        </div>
                        <hr class="my-4 block w-[95%] mx-auto">
                        <div class="flex items-center justify-between flex-col md:flex-row mt-4">
                            <p class="font-bold">- هل تريد مزامنه الكتب مع الموقع الخارجي؟! (يجب توفر الانترنت)</p>
                            <x-button wire:loading.attr="disabled" wire:target=""
                                class="w-full md:w-fit mt-1 inline-block text-sm bg-red-700/40 hover:bg-red-600 active:bg-red-600 focus:bg-red-600">
                                <x-loader wire:loading wire:target="" />
                                {{ __('مزامنه') }}
                            </x-button>
                        </div>
                    </div>
                    <div>
                        <x-secondary-button x-on:click="$dispatch('close')" class="w-full">
                            {{ __('خروج') }}
                        </x-secondary-button>
                    </div>
                </div>
            </x-modal>
            <x-modal name="import-excel">
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                            <i class="fa-solid fa-gear"></i>
                            <span>
                                اختار الملف المراد تسجيله
                            </span>
                        </h2>
                        <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                            x-on:click="$dispatch('close')"></i>
                    </div>
                    <form wire:submit.prevent="import" class="my-6">
                        <div>
                            <div class="flex gap-2">
                                <input wire:model="features.importExcel"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="file_input_help" id="file_input" type="file"
                                    accept="excel">
                                <x-button type="submit" class="bg-green-700 hover:bg-green-600 duration-150">
                                    {{ __('استيراد') }}
                                </x-button>
                            </div>
                            <x-input-error :messages="$errors->get('features.importExcel')" class="mt-2 " />
                        </div>
                        <div class="opacity-0 text-green-700 mt-4 duration-150" wire:target='import'
                            wire:loading.class="opacity-1">
                            يتم التحميل انتظر..
                        </div>
                    </form>
                    <div>
                        <x-secondary-button x-on:click="$dispatch('close')" class="w-full">
                            {{ __('الغاء') }}
                        </x-secondary-button>
                    </div>
                </div>
            </x-modal>
            <x-modal name="success-excel">
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                            <i class="fa-solid fa-gear"></i>
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
                        <x-secondary-button x-on:click="$dispatch('close')" class="w-full">
                            {{ __('خروج') }}
                        </x-secondary-button>
                    </div>
                </div>
            </x-modal>
        </div>
    </div>
</di>
