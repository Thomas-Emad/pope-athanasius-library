<di x-data="{ type: '' }">
    <div>
        <div class="flex justify-between items-center gap-2 mb-8">
            <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
                <i class="fa-solid fa-book-bible me-2"></i>
                <span>الناشرين</span>
            </h1>
            <div>
                <button x-on:click="type = 'add'" x-on:click.prevent="$dispatch('open-modal', 'publisher')"
                    class="text-white font-bold bg-brown-max py-2 px-4 rounded-lg hover:bg-brown-lite duration-200">
                    <i class="fa-solid fa-plus"></i>
                </button>

            </div>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <label for="table-search" class="sr-only">ابحث</label>
                <div class="relative">
                    <div
                        class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search" wire:model.blur='search'
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="ابحث عن اسم الناشر..">
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            اسم الناشر
                        </th>
                        <th scope="col" class="px-6 py-3">
                            عدد الكتاب
                        </th>
                        <th scope="col" class="px-6 py-3">
                            الاعدادت
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($publishers as $item)
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
                                    wire:click='editPublisher({{ $item->id }})'
                                    class="me-2 text-xl hover:text-amber-600 duration-150">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-2 text-center  italic text-gray-600">
                                يبدوا انه ليس لدينا هنا اي ناشر!!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $publishers->links() }}
            </div>
        </div>

    </div>
    <div>
        <x-modal name="publisher" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span
                            x-text="type == 'add' ? 'حسنا, يبدوا انه هناك ناشر جديد لدينا؟!' : 'اممم, ماذا تريد تعديله؟'">
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <form wire:submit='savePublisher' x-show="type == 'add'" class="mt-4">
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

                        <x-button
                            class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                            {{ __('أضافه') }}
                        </x-button>
                    </div>
                </form>
                <form wire:submit='updatePublisher' x-show="type == 'edit'" class="mt-4">
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

                        <x-button
                            class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                            {{ __('تحديث') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </x-modal>

    </div>
</di>
