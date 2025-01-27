@props(['sections'])
<div x-data="{ openSection: true }" @add-modal-selected-section.window="openSection = false"
    @open-section.window="openSection = true">
    <x-modal name="sections-shelfs" :show="$errors->isNotEmpty()" focusable>
        <div class="p-6">
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
                <div class="flex gap-2" x-show>
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
</div>
