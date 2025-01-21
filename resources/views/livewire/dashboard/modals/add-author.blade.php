<div>
    <x-modal name="author" :show="$errors->isNotEmpty()" focusable>
        <div class="p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span x-text="type == 'add' ? 'حسنا, يبدوا انه هناك مؤلف جديد لدينا؟!' : 'اممم, ماذا تريد تعديله؟'">
                    </span>
                </h2>
                <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                    x-on:click="$dispatch('close')"></i>
            </div>
            <form wire:submit='saveAuthor' x-show="type == 'add'" class="mt-4">
                <div class="mt-6">
                    <x-input-label for="author-name" value="{{ __('اسم مؤلف') }}" class="sr-only" />
                    <x-text-input wire:model="author.name" id="author-name" type="text" class="mt-1 block w-full"
                        placeholder="{{ __('اكتب هنا اسم مؤلف') }}" />
                    <x-input-error :messages="$errors->get('author.name')" class="mt-2" />
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
    </x-modal>
</div>
