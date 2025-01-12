<div>
    <div class="container max-w-full px-10 mt-4">
        <div class="flex justify-between items-center gap-2">
            <h1 class="w-fit font-bold pb-2 text-4xl border-b-4 border-b-brown-max ">
                <i class="fa-solid fa-book-medical"></i>
                <span> أقسام الكتب </span>
            </h1>
            @if (auth()->user()->isAdmin())
                <div>
                    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-units')"
                        class="text-white font-bold bg-brown-max py-2 px-4 rounded-lg hover:bg-brown-lite duration-200">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            @endif
        </div>
        <div class="mt-10 flex flex-warp gap-4">
            @forelse ($units as $unit)
                <button wire:key="{{ $unit->id }}" type="button" x-data="{ isOpen: false }"
                    x-on:click="isOpen = !isOpen"
                    class="bg-white p-4  rounded-lg shadow hover:-translate-y-1 duration-200 h-fit w-full md:w-1/2 lg:w-1/3">
                    <div class="flex justify-between gap-2 items-center">
                        <span class=" text-lg flex gap-2 items-center">
                            @if (auth()->user()->isAdmin())
                                <span wire:click='editUnit({{ $unit->id }})'
                                    class="me-2 hover:text-amber-600 duration-150">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>
                            @endif
                            <i class="fa-solid fa-book-bookmark  text-xl"></i>
                            <span>
                                {{ $unit->title }}
                            </span>
                        </span>
                        <span class="bg-brown-max text-white text-xm py-1 px-2 rounded-xl">{{ $unit->number }}</span>
                    </div>
                    <div class="flex flex-col gap-4 mt-4" x-show="isOpen">
                        @forelse ($unit->shelfs as $shelf)
                            <a href="#"
                                class="p-2 rounded-lg flex justify-between gap-2 items-center bg-gray-100 hover:bg-slate-200 duration-200">
                                <span class=" text-lg flex gap-2 items-center">
                                    @if (auth()->user()->isAdmin())
                                        <span wire:click='editShelf({{ $shelf->id }})'
                                            class="me-2 hover:text-amber-600 duration-150">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </span>
                                    @endif
                                    <i class="fa-solid fa-book-bookmark  text-xl"></i>
                                    <span>
                                        {{ $shelf->title }}
                                    </span>
                                </span>
                                <span
                                    class="bg-brown-max text-white text-xm py-1 px-2 rounded-xl">{{ $shelf->number }}</span>
                            </a>
                        @empty
                            <p class="font-bold text-center italic w-full text-2xl text-gray-700">لا يوجد روفوف هنا..
                            </p>
                        @endforelse
                    </div>
                </button>
            @empty
                <p class="font-bold text-center italic w-full text-2xl text-gray-700">لا يوجد اقسام هنا..</p>
            @endforelse

        </div>
    </div>


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
</div>
