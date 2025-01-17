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
                <form wire:submit='saveUnit' x-show="openUnit">
                    <div class="mt-6">
                        <x-input-label for="unit-title" value="{{ __('اسم الوحده') }}" class="sr-only" />
                        <x-text-input wire:model="unit.title" id="unit-title" type="text" class="mt-1 block w-full"
                            placeholder="{{ __('اكتب هنا اسم الوحده') }}" />
                        <x-input-error :messages="$errors->get('unit.title')" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-input-label for="unit-number" value="{{ __('رقم الوحده') }}" class="sr-only" />
                        <x-text-input wire:model="unit.number" id="unit-number" type="text" class="mt-1 block w-full"
                            placeholder="{{ __('اكتب هنا رقم الوحده') }}" />
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
            </div>
        </div>
    </x-modal>
</div>
