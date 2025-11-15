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
                    <p class="font-bold flex items-center gap-2">
                        <i class="fa-solid fa-cloud-arrow-down text-gray-600"></i>
                        <span>هل تريد تصدير كافة الكتب ك Excel؟!</span>
                    </p>
                    <x-button wire:loading.attr="disabled" wire:click="export"
                        class="w-full md:w-fit mt-1 inline-block text-sm bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                        <x-loader wire:loading wire:target="export" />
                        {{ __('استخراج') }}
                    </x-button>
                </div>
                <div class="flex items-center justify-between flex-col md:flex-row mt-4">
                    <p class="font-bold flex items-center gap-2">
                        <i class="fa-solid fa-cloud-arrow-up text-gray-600"></i>
                        <span> هل لديك ملف Excel وتريد تسجيل لدينا؟!</span>
                    </p>
                    <x-button wire:loading.attr="disabled"
                        x-on:click="$dispatch('close-modal', 'more');$dispatch('open-modal', 'import-excel')"
                        class="w-full md:w-fit mt-1 inline-block text-sm bg-blue-700/40 hover:bg-blue-600 active:bg-blue-600 focus:bg-blue-600">
                        {{ __('استيراد') }}
                    </x-button>
                </div>
                <div class="flex items-center justify-between flex-col md:flex-row mt-4">
                    <p class="font-bold flex items-center gap-2">
                        <i class="fa-solid fa-file-pdf text-gray-600"></i>
                        <span>استخرج أوراق الكود الخاصة بالكتب لدينا بصيغة PDF</span>
                    </p>
                    <x-button wire:loading.attr="disabled"
                        x-on:click="$dispatch('close-modal', 'more');$dispatch('open-modal', 'export-code-pdf')"
                        class="w-full md:w-fit mt-1 inline-block text-sm bg-indigo-700/40 hover:bg-indigo-600 active:bg-indigo-600 focus:bg-indigo-600">
                        {{ __('استخراج') }}
                    </x-button>
                </div>
                @can(App\Enums\PermissionEnum::USERS)
                    <hr class="my-4 block w-[95%] mx-auto">
                    <div class="flex items-center justify-between flex-col md:flex-row mt-4">
                        <p class="font-bold flex items-center gap-2">
                            <i class="fa-solid fa-rotate text-gray-600"></i>
                            <span> هل تريد مزامنة الكتب مع الموقع الخارجي؟ (يلزم توفر اتصال بالإنترنت)</span>
                        </p>
                        <x-button wire:loading.attr="disabled" wire:click="sync"
                            class="w-full md:w-fit mt-1 inline-block text-sm bg-red-700/40 hover:bg-red-600 active:bg-red-600 focus:bg-red-600 disabled:opacity-50">
                            <x-loader wire:loading wire:target="sync" />
                            {{ __('مزامنه') }}
                        </x-button>
                    </div>
                @endcan
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
                        aria-describedby="file_input_help" id="file_input" type="file"
                        accept=".xls,.xlm,.xla,.xlc,.xlt,.xlw,.xlam,.xlsb,.xlsm,.xlsx,.csv">
                    <x-button type="submit" class="bg-green-700 hover:bg-green-600 duration-150 disabled:opacity-50"
                        wire:loading.attr="disabled" wire:target="features.importExcel, import">
                        <x-loader wire:loading wire:target="features.importExcel, import" />
                        {{ __('استيراد') }}
                    </x-button>
                </div>
                <x-input-error :messages="$errors->get('features.importExcel')" class="mt-2 " />
            </form>
            <div class="opacity-0 text-green-700 mb-4 duration-150" wire:target="import"
                wire:loading.class="opacity-100">
                جاري التحميل... يُرجى الانتظار
            </div>
            <div>
                <x-secondary-button x-on:click="$dispatch('close')" class="w-full">
                    {{ __('الغاء') }}
                </x-secondary-button>
            </div>
        </div>
    </x-modal>
    <x-modal name="export-code-pdf">
        <form wire:submit.prevent="exportCodesPDF" class="p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                    <i class="fa-solid fa-file-pdf"></i>
                    <span>
                        استخرج أوراق الكود الخاصة بالكتب لدينا بصيغة PDF
                    </span>
                </h2>
                <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                    x-on:click="$dispatch('close')"></i>
            </div>
            <div class="my-6 grid grid-cols-12 items-end gap-4">
                <div x-show="!$wire.features.selectAllCodes" class="col-span-12 md:col-span-6">
                    <x-input-label for="from_code" :value="__('من')" />
                    <x-text-input id="features.from_code" class="block mt-1 w-full" type="text" placeholder="من"
                        wire:model="features.from_code" />
                    <x-input-error :messages="$errors->get('features.from_code')" class="mt-2 " />
                </div>
                <div x-show="!$wire.features.selectAllCodes" class="col-span-12 md:col-span-6">
                    <x-input-label for="to_code" :value="__('إلى')" />
                    <x-text-input id="features.to_code" class="block mt-1 w-full" type="text" placeholder="إلى"
                        wire:model="features.to_code" />
                    <x-input-error :messages="$errors->get('features.to_code')" class="mt-2 " />
                </div>

                <h3 class="text-center col-span-12 text-green-700 font-bold text-xl my-1"
                    x-show="$wire.features.selectAllCodes">جميع الكتب محدد الان!!</h3>
                <div class="col-span-12 flex flex-col justify-end h-full">
                    <x-button x-on:click="$wire.features.selectAllCodes = !$wire.features.selectAllCodes" type="button"
                        class="w-full mt-1 justify-center text-sm bg-green-700/70 hover:bg-green-600 active:bg-green-600 focus:bg-green-600 disabled:opacity-50">
                        <span class="text-nowrap"
                            x-text="$wire.features.selectAllCodes ? 'الغاء تحديد الكل' : 'تحديد الكل'"></span>
                    </x-button>
                </div>
            </div>
            <div class="text-green-700 mb-2 duration-150" wire:target="exportCodesPDF" wire:loading>
                جاري التحميل... يُرجى الانتظار
            </div>
            <div>
                <x-button wire:loading.attr="disabled" wire:click="exportCodesPDF" wire:target="exportCodesPDF"
                    class="w-full md:w-fit mt-1 inline-block text-sm bg-green-700/70 hover:bg-green-600 active:bg-green-600 focus:bg-green-600 disabled:opacity-50">
                    <x-loader wire:loading wire:target="exportCodesPDF" />
                    {{ __('تصدير') }}
                </x-button>
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('الغاء') }}
                </x-secondary-button>
            </div>
        </form>
    </x-modal>
    <x-modal name="success-excel">
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
                <x-secondary-button x-on:click="$dispatch('close')" class="w-full">
                    {{ __('خروج') }}
                </x-secondary-button>
            </div>
        </div>
    </x-modal>
    <x-modal name="success-export">
        <div class="p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                    <i class="fa-solid fa-file-pdf"></i>
                    <span>
                        تمت عملية الاستخراج بنجاح
                    </span>
                </h2>
                <i class="fa-solid fa-x hover:text-green-600 duration-150 cursor-pointer text-sm"
                    x-on:click="$dispatch('close')"></i>
            </div>
            <div class="my-6">
                <div>
                    <h2 class="font-bold text-3xl text-center text-green-700">تم عملية الاستخراج الكتب بنجاح
                    </h2>
                </div>
            </div>
            <div>
                <x-secondary-button x-on:click="$dispatch('close')" class="w-full">
                    {{ __('خروج') }}
                </x-secondary-button>
            </div>
        </div>
    </x-modal>
    <x-modal name="loading-sync">
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
                    <x-loader classLoader="w-20 h-20 text-gray-200 fill-amber-700" />
                </div>
            </div>
            <div>
                <x-secondary-button x-on:click="$dispatch('close')" class="w-full">
                    {{ __('خروج') }}
                </x-secondary-button>
            </div>
        </div>
    </x-modal>
    <x-modal name="success-sync">
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
                <x-secondary-button x-on:click="$dispatch('close')" class="w-full">
                    {{ __('خروج') }}
                </x-secondary-button>
            </div>
        </div>
    </x-modal>
    <x-modal name="fail-sync">
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
                <x-secondary-button x-on:click="$dispatch('close')" class="w-full">
                    {{ __('خروج') }}
                </x-secondary-button>
            </div>
        </div>
    </x-modal>
    <x-modal name="fail-modal">
        <div class="p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span>
                        لقد فشلت هذا العملية, يرجا المحاولة مرة اخرى
                    </span>
                </h2>
                <i class="fa-solid fa-x hover:text-green-600 duration-150 cursor-pointer text-sm"
                    x-on:click="$dispatch('close')"></i>
            </div>
            <div class="my-6">
                <div>
                    <h2 class="font-bold text-2xl text-center text-red-700">
                        لقد فشلت هذا العملية, يرجا المحاولة مرة اخرى او اتصل بالمطور
                    </h2>
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
