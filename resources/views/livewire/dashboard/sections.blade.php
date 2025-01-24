<div>
    <div>
        <div class="flex justify-between items-center gap-2 mb-8">
            <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
                <i class="fa-solid fa-book-bible me-2"></i>
                <span>اقسام الكتب</span>
            </h1>
            <div>
                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-sections')"
                    class="text-white font-bold bg-brown-max py-2 px-4 rounded-lg hover:bg-brown-lite duration-200">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <x-search-dashboard wire:model.blur='search' placeholder="ابحث عن اسم القسم.." />
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            اسم القسم
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            رقم القسم
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            مرات الاستخدام
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            عدد الرف
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            الاعدادت
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sections as $section)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ str($section->title)->limit(20) }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $section->number ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $section->books_count }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $section->shelfs_count }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button wire:click='showShelfs({{ $section->id }})'
                                    class="me-2 text-xl hover:text-blue-600 duration-150">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button wire:click='editSection({{ $section->id }})'
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
                {{ $sections->links() }}
            </div>
        </div>

    </div>
    <div>
        <x-modal name="add-sections" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6" x-data="{ openSection: true }">
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
                        <button type="button" x-on:click="openSection = true"
                            :class="openSection ? 'bg-amber-800' : 'bg-amber-600'"
                            class=" hover:bg-amber-800 duration-200 py-2 px-4 text-white w-full rounded-xl text-center">
                            أضافة قسم
                        </button>
                        <button type="button" x-on:click="openSection = false"
                            :class="!openSection ? 'bg-amber-800' : 'bg-amber-600'"
                            class=" hover:bg-amber-800 duration-200 py-2 px-4 text-white w-full rounded-xl text-center">
                            أضافه راف
                        </button>

                    </div>
                    <div>
                        <form wire:submit='saveSection' x-show="openSection">
                            <div class="mt-6">
                                <x-input-label for="section-title" value="{{ __('اسم القسم') }}" class="sr-only" />
                                <x-text-input wire:model="section.title" id="section-title" type="text"
                                    class="mt-1 block w-full" placeholder="{{ __('اكتب هنا اسم القسم') }}" />
                                <x-input-error :messages="$errors->get('section.title')" class="mt-2" />
                            </div>

                            <div class="mt-2">
                                <x-input-label for="section-number" value="{{ __('رقم القسم') }}" class="sr-only" />
                                <x-text-input wire:model="section.number" id="section-number" type="text"
                                    class="mt-1 block w-full" placeholder="{{ __('اكتب هنا رقم القسم') }}" />
                                <x-input-error :messages="$errors->get('section.number')" class="mt-2" />
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('الغاء') }}
                                </x-secondary-button>
                                <x-button type="submit" wire:loading.attr="disabled" x-text="'أضافه'"
                                    class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                                    <x-loader wire:loading />
                                </x-button>
                            </div>
                        </form>
                        <form wire:submit='saveShelf' x-show="!openSection">
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
                                <x-select id="sections" label="اختار القسم" wire:model="shelf.section">
                                    <option selected>قم باختيار اسم القسم</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}" wire:key="section-{{ $section->id }}">
                                            {{ $section->title }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error :messages="$errors->get('shelf.section')" class="mt-2" />
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('الغاء') }}
                                </x-secondary-button>

                                <x-button type="submit" wire:loading.attr="disabled" x-text="'أضافه'"
                                    class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                                    <x-loader wire:loading />
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </x-modal>
        <x-modal name="edit-sections" :show="$errors->isNotEmpty()" focusable>
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
                        <form wire:submit='updateSection'>
                            <div class="mt-6">
                                <x-input-label for="section-title" value="{{ __('اسم القسم') }}" class="sr-only" />
                                <x-text-input wire:model="section.title" id="section-title" type="text"
                                    class="mt-1 block w-full" placeholder="{{ __('اكتب هنا اسم القسم') }}" />
                                <x-input-error :messages="$errors->get('section.title')" class="mt-2" />
                            </div>

                            <div class="mt-2">
                                <x-input-label for="section-number" value="{{ __('رقم القسم') }}" class="sr-only" />
                                <x-text-input wire:model="section.number" id="section-number" type="text"
                                    class="mt-1 block w-full" placeholder="{{ __('اكتب هنا رقم القسم') }}" />
                                <x-input-error :messages="$errors->get('section.number')" class="mt-2" />
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('الغاء') }}
                                </x-secondary-button>
                                <x-button type="submit" wire:loading.attr="disabled" x-text="'تحديث'"
                                    class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                                    <x-loader wire:loading />
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
                                <x-select id="sections" label="اختار القسم" wire:model="shelf.section">
                                    <option selected>قم باختيار اسم القسم</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}" wire:key="section-{{ $section->id }}">
                                            {{ $section->title }}
                                        </option>
                                    @endforeach
                                </x-select>
                                <x-input-error :messages="$errors->get('shelf.section')" class="mt-2" />
                            </div>


                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('الغاء') }}
                                </x-secondary-button>
                                <x-button type="submit" wire:loading.attr="disabled" x-text="'تحديث'"
                                    class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                                    <x-loader wire:loading />
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
                            هذا كل الروف لدي هذا القسم
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
                                        {{ $shelf->number ?? 'N/A' }}
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
