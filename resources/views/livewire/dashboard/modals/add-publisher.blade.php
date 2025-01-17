<div>
    <x-modal name="publisher" :show="$errors->isNotEmpty()" focusable>
        <div class="p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span x-text="type == 'add' ? 'حسنا, يبدوا انه هناك ناشر جديد لدينا؟!' : 'اممم, ماذا تريد تعديله؟'">
                    </span>
                </h2>
                <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                    x-on:click="$dispatch('close')"></i>
            </div>
            <form wire:submit='savePublisher' class="mt-4">
                <div class="mt-6">
                    <x-input-label for="publisher-name" value="{{ __('اسم ناشر') }}" class="sr-only" />
                    <x-text-input wire:model="publisher.name" id="publisher-name" type="text"
                        class="mt-1 block w-full" placeholder="{{ __('اكتب هنا اسم ناشر') }}" />
                    <x-input-error :messages="$errors->get('publisher.name')" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('الغاء') }}
                    </x-secondary-button>

                    <x-button class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                        {{ __('أضافه') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-modal>

</div>
