<x-modal name="create-post" :show="$errors->isNotEmpty()" focusable>
    <div class="p-6">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                <i class="fa-solid fa-newspaper"></i>
                <span>
                    هل لديك منشور جديد ترغب بإضافته؟
                </span>
            </h2>
            <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                x-on:click="$dispatch('close')"></i>
        </div>
        <form class="mt-4">
            <div class="mt-6">
                <x-input-label for="title" value="{{ __('عنوان المنشور') }}" class="sr-only" />
                <x-text-input wire:model="storeFrom.title" id="title" type="text" class="mt-1 block w-full"
                    placeholder="{{ __('أكتب هنا عنوان المنشور') }}" />
                <x-input-error :messages="$errors->get('storeFrom.title')" class="mt-2 " />
            </div>

            <div class="mt-6">
                <x-input-label for="content" value="{{ __('المحتوي') }}" class="sr-only" />
                <x-textarea wire:model="storeFrom.content" id="content" type="text" class="mt-1 block w-full"
                    placeholder="{{ __('أكتب هنا ما تريده كمحتوي..') }}" />
                <x-input-error :messages="$errors->get('storeFrom.content')" class="mt-2 " />
            </div>

            <div class="mt-6">
                <label for="photo"
                    class="minh-40 cursor-pointer flex flex-col items-center justify-center text-center rounded-xl w-full font-bold text-gray-300 p-10 border-4 border-dashed border-gray-300 hover:bg-gray-200/50 hover:text-gray-400 duration-100"
                    aria-label="Upload photo" title="Upload photo">
                    <span class="text-4xl">+</span>
                    <p class="text-xl">أضغط هنا لتحديد الصورة</p>
                    @if ($this->storeFrom->photo)
                        <img src="{{ $this->storeFrom->photo?->temporaryUrl() }}"
                            class="block w-[95%] h-[80%] rounded-xl mt-4" alt="Uploaded photo preview">
                    @endif
                </label>
                <input type="file" id="photo" class="hidden" accept="image/png,image/jpg,image/jpeg"
                    wire:model='storeFrom.photo'>
                <x-input-error :messages="$errors->get('storeFrom.photo')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('الغاء') }}
                </x-secondary-button>
                <x-button wire:click.prevent="save" wire:loading.attr="disabled"
                    class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                    <x-loader wire:loading wire:target="save" />
                    أضافه
                </x-button>
            </div>
        </form>
    </div>
</x-modal>
