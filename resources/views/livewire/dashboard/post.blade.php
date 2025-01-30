<div>
    <div>
        <div class="flex justify-between items-center gap-2 mb-8">
            <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
                <i class="fa-solid fa-book-bible me-2"></i>
                <span>المنشورات</span>
            </h1>
            <div>
                <button x-on:click.prevent="$dispatch('open-modal', 'create-post')"
                    class="text-white font-bold bg-brown-max py-2 px-4 rounded-lg hover:bg-brown-lite duration-200">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg mb-4">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <x-search-dashboard wire:model.blur='search' placeholder="ابحث عن عنوان منشور او اسم الناشر.." />

                <div class="me-2">
                    <x-toggle id="showOnlyMarkup" label='المنشورات المميزه' wire:model.change='showOnlyMarkup' />
                </div>
                {{ $showOnlyMarkup }}
            </div>
            <div class="overflow-x-auto ">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                العنوان
                            </th>
                            <th scope="col" class="px-6 py-3">
                                محتوي
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                الناشر
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                تعين كمميزه
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                تاريخ الانشاء
                            </th>
                            <th scope="col" class="px-6 py-3">
                                المزيد
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $item)
                            <tr wire:key='post-{{ $item->id }}'
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ str($item->title)->limit(20) }}
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap" title="{{ $item->content }}">
                                    {{ str($item->content)->limit(20) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap" title="{{ $item->user->name }}">
                                    {{ str($item->user->name)->limit(20) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-toggle id="setAsMarkup-{{ $item->id }}"
                                        wire:click='setAsMarkup({{ $item->id }})' label=''
                                        currentStatus='{{ $item->markup }}' />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->created_at->format('Y-m-d') }}
                                </td>
                                <td class="px-6 py-4 flex gap-2 whitespace-nowrap">
                                    <button wire:click="show({{ $item->id }})"
                                        class="me-2 text-xl hover:text-brown-max duration-200">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button wire:click="edit({{ $item->id }})"
                                        class="me-2 text-xl hover:text-amber-600 duration-150">
                                        <i class="fa-solid fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-2 text-center  italic text-gray-600">
                                    يبدوا انه ليس لدينا هنا اي منشور!!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>

    </div>
    <div>
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
                        <x-text-input wire:model="store.title" id="title" type="text" class="mt-1 block w-full"
                            placeholder="{{ __('أكتب هنا عنوان المنشور') }}" />
                        <x-input-error :messages="$errors->get('store.title')" class="mt-2 " />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="content" value="{{ __('المحتوي') }}" class="sr-only" />
                        <x-textarea wire:model="store.content" id="content" type="text" class="mt-1 block w-full"
                            placeholder="{{ __('أكتب هنا ما تريده كمحتوي..') }}" />
                        <x-input-error :messages="$errors->get('store.content')" class="mt-2 " />
                    </div>

                    <div class="mt-6">
                        <label for="photo"
                            class="minh-40 cursor-pointer flex flex-col items-center justify-center text-center rounded-xl w-full font-bold text-gray-300 p-10 border-4 border-dashed border-gray-300 hover:bg-gray-200/50 hover:text-gray-400 duration-100"
                            aria-label="Upload photo" title="Upload photo">
                            <span class="text-4xl">+</span>
                            <p class="text-xl">أضغط هنا لتحديد الصورة</p>
                            @if ($this->store->photo)
                                <img src="{{ $this->store->photo?->temporaryUrl() }}"
                                    class="block w-[95%] h-[80%] rounded-xl mt-4" alt="Uploaded photo preview">
                            @endif
                        </label>
                        <input type="file" id="photo" class="hidden" accept="image/png,image/jpg,image/jpeg"
                            wire:model='store.photo'>
                        <x-input-error :messages="$errors->get('store.photo')" class="mt-2" />

                        <p wire:loading wire:target="store.photo" class="mt-2 text-green-300">يتم رفع الصوره الان</p>
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

        <x-modal name="edit-post" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-newspaper"></i>
                        <span>
                            ماذا يجب تحديثه؟!
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <form wire:submit.prevent="updatePost" class="mt-4">
                    <div class="mt-6">
                        <x-input-label for="title" value="{{ __('عنوان المنشور') }}" class="sr-only" />
                        <x-text-input wire:model="update.title" id="title" type="text"
                            class="mt-1 block w-full" placeholder="{{ __('أكتب هنا عنوان المنشور') }}" />
                        <x-input-error :messages="$errors->get('update.title')" class="mt-2 " />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="content" value="{{ __('المحتوي') }}" class="sr-only" />
                        <x-textarea wire:model="update.content" id="content" type="text"
                            class="mt-1 block w-full" placeholder="{{ __('أكتب هنا ما تريده كمحتوي..') }}" />
                        <x-input-error :messages="$errors->get('update.content')" class="mt-2 " />
                    </div>

                    <div class="mt-6">
                        <label for="update-photo"
                            class="minh-40 cursor-pointer flex flex-col items-center justify-center text-center rounded-xl w-full font-bold text-gray-300 p-10 border-4 border-dashed border-gray-300 hover:bg-gray-200/50 hover:text-gray-400 duration-100"
                            aria-label="Upload photo" title="Upload photo">
                            <span class="text-4xl">+</span>
                            @if (gettype($update->photo) == 'object')
                                <p class="text-xl">هل تود تغير الصورة</p>
                                <img src="{{ $update->photo?->temporaryUrl() }}"
                                    class="block w-[95%] h-[80%] rounded-xl mt-4" alt="Uploaded photo preview">
                            @elseif($update->oldPhoto && !is_null($update->oldPhoto))
                                <p class="text-xl">هل تود تغير الصورة</p>
                                <img src="{{ $update->oldPhoto ? Storage::url($update->oldPhoto) : '' }}"
                                    class="block w-[95%] h-[95%] rounded-xl mt-4" alt="Old photo">
                            @else
                                <p class="text-xl">أضغط هنا لتحديد الصورة</p>
                            @endif
                        </label>
                        <input type="file" id="update-photo" class="hidden"
                            accept="image/png,image/jpg,image/jpeg" wire:model='update.photo'>
                        <x-input-error :messages="$errors->get('update.photo')" class="mt-2" />

                        <p wire:loading wire:target="update.photo" class="mt-2 text-green-300">يتم رفع الصوره الان</p>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('الغاء') }}
                        </x-secondary-button>

                        <x-button type="submit" wire:loading.attr="disabled" x-text="'تحديث'"
                            class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                            <x-loader wire:loading wire:target="updatePost" />
                        </x-button>
                    </div>
                </form>
            </div>
        </x-modal>

        <x-modal name="show-post" focusable>
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-newspaper"></i>
                        <span>
                            عرض هذا المنشور
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <div class="mt-4">
                    <div>
                        <h2 class="font-bold text-2xl">
                            <span x-text="$wire.post.title"></span>
                        </h2>
                        @if ($post->photo)
                            <img x-show='$wire.post.photo' src="{{ Storage::url($post->photo) }}"
                                class="max-w-full rounded-lg h-40  my-4" alt="عرض صورة الغلاف">
                        @endif
                        <div class=" my-2">
                            <h3 class="font-bold mb-2">المحتوي:</h3>
                            <p class="p-2 border border-gray-100 rounded-xl" x-text="$wire.post.content"></p>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('الغاء') }}
                        </x-secondary-button>

                        <x-button wire:loading.attr="disabled" x-on:click="$dispatch('close')"
                            x-on:click.prevent="$dispatch('open-modal', 'delete-post')"
                            class="ms-3 bg-red-700 hover:bg-red-800 active:bg-brown-max focus:ring-brown-max">
                            <x-loader wire:loading />
                            {{ __('حذف') }}
                        </x-button>
                    </div>
                </div>
            </div>
        </x-modal>
        <x-modal name="delete-post" focusable>
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-newspaper"></i>
                        <span>
                            هل انت متاكد من حذف هذا المنشور؟!
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <div class="mt-4">
                    <p class="text-gray-700">هذا الاجراء نهائي ولن يمكنك استرجاع هذا المنشور لاحقا!!</p>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('الغاء') }}
                        </x-secondary-button>

                        <x-button wire:loading.attr="disabled" wire:click='delete'
                            class="ms-3 bg-red-700 hover:bg-red-800 active:bg-brown-max focus:ring-brown-max">
                            <x-loader wire:loading />
                            {{ __('حذف') }}
                        </x-button>
                    </div>
                </div>
            </div>
        </x-modal>
    </div>
</div>
