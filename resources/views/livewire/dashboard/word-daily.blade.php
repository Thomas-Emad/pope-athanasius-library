<di x-data="{ type: '', idDeleteWord: '', titleDeleteWord: '' }">
    <div>
        <div class="flex justify-between items-center gap-2 mb-8">
            <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
                <i class="fa-solid fa-book-bible me-2"></i>
                <span>كلمات اليوم</span>
            </h1>
            <div>
                <button x-on:click="type = 'add'" x-on:click.prevent="$dispatch('open-modal', 'word-daily')"
                    class="text-white font-bold bg-brown-max py-2 px-4 rounded-lg hover:bg-brown-lite duration-200">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <x-search-dashboard wire:keydown.enter="search" wire:model.blur='search'
                    placeholder="ابحث عن كلمة اليوم.." />
                <div class="me-2">
                    <x-toggle id="show-word-today" label='عرض كلمة اليوم' wire:model.change='showWordToday' />
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                القائل
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                كلمة اليوم
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                رقم الكلمه
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                الحالة
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                المزيد
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($words as $item)
                            <tr wire:key='word-{{ $item->id }}'
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ str($item->said)->limit(20) }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ str($item->content)->limit(20) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->number_show }}
                                </td>
                                <td class="px-6 py-4">
                                    <x-toggle id="word-{{ $item->id }}"
                                        wire:click='setWordToDay({{ $item->id }})'
                                        currentStatus="{{ $item->is_today }}" />
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    <button x-on:click="type = 'edit'" wire:click='editWordDaily({{ $item->id }})'
                                        class="me-2 text-xl hover:text-amber-600 duration-150">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button
                                        x-on:click="idDeleteWord = `{{ $item->id }}`; titleDeleteWord = `{{ $item->content }}`"
                                        x-on:click.prevent="$dispatch('open-modal', 'delete-word-daily')"
                                        class="me-2 text-xl hover:text-red-600 duration-150">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-2 text-center  italic text-gray-600">
                                    يبدو أنه ليس لدينا هنا أي كلمة يومية!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
            <div class="mt-4">
                {{ $words->links() }}
            </div>
        </div>

    </div>
    <div>
        <x-modal name="word-daily" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span
                            x-text="type == 'add' ? 'حسنًا، يبدو أنه هناك كلمة يوم جديدة لدينا!' : 'أممم، ماذا تريد تعديله؟'">
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <form wire:submit.prevent='saveWordDaily' x-show="type == 'add'" class="mt-4" x-data
                    x-init="$watch('type', (newValue) => { if (newValue === 'add') $wire.resetForm(); })">
                    <div class="mt-6">
                        <x-input-label for="add-word-said" value="{{ __('من قائل هذه الكلمة؟') }}" class="sr-only" />
                        <x-text-input wire:model="word.said" id="add-word-said" type="text" class="mt-1 block w-full"
                            placeholder="{{ __('اكتب هنا اسم قائل هذه الكلمة') }}" />
                        <x-input-error :messages="$errors->get('word.said')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="add-word-content" value="{{ __('يمكنك إخباري بما تحتوي؟') }}"
                            class="sr-only" />
                        <x-textarea wire:model="word.content" id="add-word-content" type="text"
                            class="mt-1 block w-full" placeholder="{{ __('اكتب هنا محتوى الكلمة') }}" />
                        <x-input-error :messages="$errors->get('word.content')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-text-input type='number' name="word-number_show" wire:model="word.number_show"
                            placeholder="{{ __('ترتيب هذا الكلمة') }}" class="w-full" />
                        <x-input-error :messages="$errors->get('word.number_show')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('الغاء') }}
                        </x-secondary-button>

                        <x-button wire:loading.attr="disabled"
                            class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                            <x-loader wire:loading />
                            {{ __('أضافه') }}
                        </x-button>
                    </div>
                </form>

                <form wire:submit.prevent='updateWordDaily' x-show="type == 'edit'" class="mt-4">
                    <div class="mt-6">
                        <x-input-label for="word-said" value="{{ __('من قائل هذه الكلمة؟') }}" class="sr-only" />
                        <x-text-input wire:model="word.said" id="word-said" type="text" class="mt-1 block w-full"
                            placeholder="{{ __('اكتب هنا اسم قائل هذا الكلمه') }}" />
                        <x-input-error :messages="$errors->get('word.said')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="word-content" value="{{ __('يمكنك إخباري بما تحتوي؟') }}"
                            class="sr-only" />
                        <x-textarea wire:model="word.content" id="word-content" type="text"
                            class="mt-1 block w-full" placeholder="{{ __('اكتب هنا محتوي الكلمة') }}" />
                        <x-input-error :messages="$errors->get('word.content')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-text-input name="word-number_show" type='number' wire:model="word.number_show"
                            placeholder="{{ __('ترتيب هذا الكلمة؟') }}" class="w-full" />
                        <x-input-error :messages="$errors->get('word.number_show')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('الغاء') }}
                        </x-secondary-button>


                        <x-button wire:loading.attr="disabled"
                            class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                            <x-loader wire:loading />
                            {{ __('تحديث') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </x-modal>

        <x-modal name="delete-word-daily" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-trash-can"></i>
                        <span>
                            هل انت متاكد من حذف هذا الكلمة؟!
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <form wire:submit='deleteWordDaily(idDeleteWord)' class="mt-4">
                    <div>
                        <p class="text-gray-600">هذا إجراء نهائي ولا يمكنك التراجع عنه، هذا محتوى الكلمة :</p>
                        <x-textarea x-text="titleDeleteWord" class="mt-2 w-full" name="titleDeleteWord"
                            disabled='true' />
                    </div>
                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('الغاء') }}
                        </x-secondary-button>

                        <x-button class="ms-3 bg-red-700 hover:bg-red-800 active:bg-red-800 focus:ring-red-800">
                            <x-loader wire:loading />
                            {{ __('حذف نهائي') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </x-modal>
    </div>
</di>
