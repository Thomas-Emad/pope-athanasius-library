<di x-data="{ type: '' }">
    <div>
        <div class="flex justify-between items-center gap-2 mb-8">
            <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
                <i class="fa-solid fa-book-bible me-2"></i>
                <span>المؤلفين</span>
            </h1>
            <div>
                <button x-on:click="type = 'add'" x-on:click.prevent="$dispatch('open-modal', 'author')"
                    class="text-white font-bold bg-brown-max py-2 px-4 rounded-lg hover:bg-brown-lite duration-200">
                    <i class="fa-solid fa-plus"></i>
                </button>

            </div>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <x-search-dashboard wire:model.blur='search' placeholder="ابحث عن اسم المؤلف.." />
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            اسم المؤلف
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            عدد الكتاب
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                            الاعدادت
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($authors as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ str($item->name)->limit(20) }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->books_count }}
                            </td>

                            <td class="px-6 py-4">
                                <button wire:key="{{ $item->id }}" x-on:click="type = 'edit'"
                                    wire:click='editAuthor({{ $item->id }})'
                                    class="me-2 text-xl hover:text-amber-600 duration-150">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-2 text-center  italic text-gray-600">
                                يبدوا انه ليس لدينا هنا اي مؤلف!!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $authors->links() }}
            </div>
        </div>

    </div>
    <div>
        <x-modal name="author" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span x-text="type == 'add' ? 'حسنًا، يبدو أنه لدينا مؤلف جديد!' : 'ما الذي تريد تعديله؟'">
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <form wire:submit='saveAuthor' x-show="type == 'add'" class="mt-4">
                    <div class="mt-6">
                        <x-input-label for="author-name" value="{{ __('اسم المؤلف') }}" class="sr-only" />
                        <x-text-input wire:model="author.name" id="author-name" type="text" class="mt-1 block w-full"
                            placeholder="{{ __('اكتب هنا اسم المؤلف') }}" />
                        <x-input-error :messages="$errors->get('author.name')" class="mt-2" />
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
                <form wire:submit='updateAuthor' x-show="type == 'edit'" class="mt-4">
                    <div class="mt-6">
                        <x-input-label for="author-name" value="{{ __('اسم المؤلف') }}" class="sr-only" />
                        <x-text-input wire:model="author.name" id="author-name" type="text" class="mt-1 block w-full"
                            placeholder="{{ __('اكتب هنا اسم المؤلف') }}" />
                        <x-input-error :messages="$errors->get('author.name')" class="mt-2" />
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

    </div>
</di>
