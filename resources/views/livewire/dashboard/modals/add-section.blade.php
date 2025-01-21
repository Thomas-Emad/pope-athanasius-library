<div>
    <x-modal name="add-sections" :show="$errors->isNotEmpty()" focusable>
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
                <form wire:submit='saveSection'>
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
            </div>
        </div>
    </x-modal>
</div>
