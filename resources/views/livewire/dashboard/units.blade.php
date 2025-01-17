<div>
    <div>
        <div class="flex justify-between items-center gap-2 mb-8">
            <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
                <i class="fa-solid fa-book-bible me-2"></i>
                <span>اقسام الكتب</span>
            </h1>
            <div>
                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-units')"
                    class="text-white font-bold bg-brown-max py-2 px-4 rounded-lg hover:bg-brown-lite duration-200">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
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
                    <input type="text" id="table-search" wire:model.blur='search'
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="ابحث عن اسم الوحده..">
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            اسم القسم
                        </th>
                        <th scope="col" class="px-6 py-3">
                            رقم القسم
                        </th>
                        <th scope="col" class="px-6 py-3">
                            مرات الاستخدام
                        </th>
                        <th scope="col" class="px-6 py-3">
                            عدد الوحدات
                        </th>
                        <th scope="col" class="px-6 py-3">
                            الاعدادت
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($units as $unit)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ str($unit->title)->limit(20) }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $unit->number }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $unit->books_count }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $unit->shelfs_count }}
                            </td>
                            <td class="px-6 py-4">
                                <button wire:click='showShelfs({{ $unit->id }})'
                                    class="me-2 text-xl hover:text-blue-600 duration-150">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button wire:click='editUnit({{ $unit->id }})'
                                    class="me-2 text-xl hover:text-amber-600 duration-150">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-2 text-center  italic text-gray-600">لا يوجد وحدات هنا, يمكن
                                اضافه واحده..</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $units->links() }}
            </div>
        </div>

    </div>
    <div>
        <x-modal name="add-units" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6" x-data="{ openUnit: true }">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span>
                            هل تريد اضافه شئ جديد؟!
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <div class="mt-4">
                    <div class="flex gap-2">
                        <button type="button" x-on:click="openUnit = true"
                            :class="openUnit ? 'bg-amber-800' : 'bg-amber-600'"
                            class=" hover:bg-amber-800 duration-200 py-2 px-4 text-white w-full rounded-xl text-center">
                            أضافة وحده
                        </button>
                        <button type="button" x-on:click="openUnit = false"
                            :class="!openUnit ? 'bg-amber-800' : 'bg-amber-600'"
                            class=" hover:bg-amber-800 duration-200 py-2 px-4 text-white w-full rounded-xl text-center">
                            أضافه راف
                        </button>

                    </div>
                    <div>
                        <form wire:submit='saveUnit' x-show="openUnit">
                            <div class="mt-6">
                                <x-input-label for="unit-title" value="{{ __('اسم الوحده') }}" class="sr-only" />
                                <x-text-input wire:model="unit.title" id="unit-title" type="text"
                                    class="mt-1 block w-full" placeholder="{{ __('اكتب هنا اسم الوحده') }}" />
                                <x-input-error :messages="$errors->get('unit.title')" class="mt-2" />
                            </div>

                            <div class="mt-2">
                                <x-input-label for="unit-number" value="{{ __('رقم الوحده') }}" class="sr-only" />
                                <x-text-input wire:model="unit.number" id="unit-number" type="text"
                                    class="mt-1 block w-full" placeholder="{{ __('اكتب هنا رقم الوحده') }}" />
                                <x-input-error :messages="$errors->get('unit.number')" class="mt-2" />
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('الغاء') }}
                                </x-secondary-button>

                                <x-button
                                    class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                                    {{ __('أضافه') }}
                                </x-button>
                            </div>
                        </form>
                        <form wire:submit='saveShelf' x-show="!openUnit">
                            <div class="mt-6">
                                <x-input-label for="shelf-title" value="{{ __('اسم الرف') }}" class="sr-only" />
                                <x-text-input wire:model="shelf.title" id="shelf-title" type="text"
                                    class="mt-1 block w-full" placeholder="{{ __('اكتب هنا اسم الرف') }}" />
                                <x-input-error :messages="$errors->get('shelf.title')" class="mt-2" />
                            </div>

                            <div class="mt-2">
                                <x-input-label for="shelf-number" value="{{ __('رقم الرف') }}" class="sr-only" />
                                <x-text-input wire:model="shelf.number" id="shelf-number" type="text"
                                    class="mt-1 block w-full" placeholder="{{ __('اكتب هنا رقم الرف') }}" />
                                <x-input-error :messages="$errors->get('shelf.number')" class="mt-2" />
                            </div>

                            <div class="mt-2">
                                <x-select id="units" label="اختار الوحده" wire:model="shelf.unit">
                                    <option selected>قم باختيار اسم الوحده</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}" wire:key="unit-{{ $unit->id }}">
                                            {{ $unit->title }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error :messages="$errors->get('shelf.unit')" class="mt-2" />
                            </div>


                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('الغاء') }}
                                </x-secondary-button>

                                <x-button
                                    class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                                    {{ __('أضافه') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </x-modal>
        <x-modal name="edit-units" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span>
                            ماذا تريد تحديثه؟!
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <div class="mt-4">
                    <div>
                        <form wire:submit='updateUnit'>
                            <div class="mt-6">
                                <x-input-label for="unit-title" value="{{ __('اسم الوحده') }}" class="sr-only" />
                                <x-text-input wire:model="unit.title" id="unit-title" type="text"
                                    class="mt-1 block w-full" placeholder="{{ __('اكتب هنا اسم الوحده') }}" />
                                <x-input-error :messages="$errors->get('unit.title')" class="mt-2" />
                            </div>

                            <div class="mt-2">
                                <x-input-label for="unit-number" value="{{ __('رقم الوحده') }}" class="sr-only" />
                                <x-text-input wire:model="unit.number" id="unit-number" type="text"
                                    class="mt-1 block w-full" placeholder="{{ __('اكتب هنا رقم الوحده') }}" />
                                <x-input-error :messages="$errors->get('unit.number')" class="mt-2" />
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('الغاء') }}
                                </x-secondary-button>

                                <x-button
                                    class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                                    {{ __('تحديث') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </x-modal>
        <x-modal name="edit-shelf" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span>
                            ماذا تريد تحديثه؟!
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <div class="mt-4">
                    <div>
                        <form wire:submit='updateShelf'>
                            <div class="mt-6">
                                <x-input-label for="shelf-title" value="{{ __('اسم الرف') }}" class="sr-only" />
                                <x-text-input wire:model="shelf.title" id="shelf-title" type="text"
                                    class="mt-1 block w-full" placeholder="{{ __('اكتب هنا اسم الرف') }}" />
                                <x-input-error :messages="$errors->get('shelf.title')" class="mt-2" />
                            </div>

                            <div class="mt-2">
                                <x-input-label for="shelf-number" value="{{ __('رقم الرف') }}" class="sr-only" />
                                <x-text-input wire:model="shelf.number" id="shelf-number" type="text"
                                    class="mt-1 block w-full" placeholder="{{ __('اكتب هنا رقم الرف') }}" />
                                <x-input-error :messages="$errors->get('shelf.number')" class="mt-2" />
                            </div>

                            <div class="mt-2">
                                <x-select id="units" label="اختار الوحده" wire:model="shelf.unit">
                                    <option selected>قم باختيار اسم الوحده</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}" wire:key="unit-{{ $unit->id }}">
                                            {{ $unit->title }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error :messages="$errors->get('shelf.unit')" class="mt-2" />
                            </div>


                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('الغاء') }}
                                </x-secondary-button>

                                <x-button
                                    class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                                    {{ __('تحديث') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </x-modal>
        <x-modal name="show-shelfs" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span>
                            هذا كل الروف لدي هذا الوحده
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <div class="mt-4">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    اسم الروف
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    رقم الروف
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    المزيد
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($shelfs as $shelf)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ str($shelf->title)->limit(20) }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $shelf->number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button wire:click='editShelf({{ $shelf->id }})'
                                            class="me-2 text-xl hover:text-amber-600 duration-150">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-2 text-center italic text-gray-600">لا يوجد وحدات
                                        هنا, يمكن اضافه
                                        واحده..</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </x-modal>
    </div>
</div>
