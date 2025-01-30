<div>
    <div class="container max-w-full px-6 mt-4">
        <div class="flex justify-between items-center gap-2">
            <h1 class="w-fit font-bold pb-2 text-4xl border-b-4 border-b-brown-max ">
                <i class="fa-solid fa-book-medical"></i>
                <span>أقسام الكتب</span>
            </h1>
            @can(App\Enums\PermissionEnum::SECTIONS_BOOK->value)
                <div>
                    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'sections-shelfs')"
                        class="text-white font-bold bg-brown-max py-2 px-4 rounded-lg hover:bg-brown-lite duration-200">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            @endcan
        </div>
        <div class="mt-10 grid gap-4" style="grid-template-columns: repeat(auto-fill, minmax(250px, 1fr))">
            @foreach ($sections as $section)
                <button wire:key="{{ $section->id }}" type="button" x-data="{ isOpen: false }"
                    x-on:click="isOpen = !isOpen"
                    class="bg-white p-2 rounded-lg shadow hover:-translate-y-1 duration-200 h-fit w-full">
                    <div class="flex justify-between gap-2 items-center">
                        <span class="text-lg flex gap-2 items-center">
                            @can(App\Enums\PermissionEnum::SECTIONS_BOOK->value)
                                <!-- Edit Section Button -->
                                <span wire:click.stop='editSection({{ $section->id }})'
                                    class="me-2 hover:text-amber-600 duration-150 cursor-pointer" aria-label="Edit Section">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>
                            @endcan
                            <!-- Section Title Link -->
                            <a href="{{ route('search', ['search' => $section->title]) }}" wire:navigate
                                class="bg-gray-100 p-2 rounded-xl hover:bg-gray-200 duration-150">
                                <i class="fa-solid fa-book-bookmark text-xl"></i>
                                <span>{{ $section->title }}</span>
                            </a>
                        </span>
                        <!-- Section Number -->
                        <span class="bg-brown-max text-white text-xm py-1 px-2 rounded-xl">
                            {{ $section->number ?? 'N/A' }}
                        </span>
                    </div>
                    <!-- Shelf List (Toggleable) -->
                    <div class="flex flex-col gap-4 mt-4" x-show="isOpen" x-cloak>
                        @forelse ($section->shelfs as $shelf)
                            <div
                                class="p-2 rounded-lg flex justify-between gap-2 items-center bg-gray-100 hover:bg-slate-200 duration-200">
                                <span class="text-lg flex gap-2 items-center">
                                    @can(App\Enums\PermissionEnum::SECTIONS_BOOK->value)
                                        <!-- Edit Shelf Button -->
                                        <span wire:click.stop='editShelf({{ $shelf->id }})'
                                            class="me-2 hover:text-amber-600 duration-150 cursor-pointer"
                                            aria-label="Edit Shelf">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </span>
                                    @endcan
                                    <!-- Shelf Title Link -->
                                    <a href="{{ route('search', ['search' => $shelf->title]) }}" wire:navigate
                                        class="hover:text-brown-max duration-150">
                                        <i class="fa-solid fa-book-bookmark text-xl"></i>
                                        <span>{{ $shelf->title }}</span>
                                    </a>
                                </span>
                                <!-- Shelf Number -->
                                <span class="bg-brown-max text-white text-xm py-1 px-2 rounded-xl">
                                    {{ $shelf->number ?? 'N/A' }}
                                </span>
                            </div>
                        @empty
                            <!-- No Shelves Message -->
                            <p class="font-bold text-center italic w-full text-xl text-gray-700">
                                لا يوجد رفوف هنا..
                            </p>
                        @endforelse
                    </div>
                </button>
            @endforeach
        </div>
        @if (sizeof($sections) == 0)
            <p class="font-bold text-center italic w-full text-2xl text-gray-700">لا يوجد أقسام هنا..</p>
        @endif

    </div>

    <x-modals.section-shelf-modal :sections="$sections" />
    <x-modal name="edit-sections" :show="$errors->isNotEmpty()" focusable>
        <div class="p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span>
                        ماذا تريد أن تحدثه؟!
                    </span>
                </h2>
                <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                    x-on:click="$dispatch('close')"></i>
            </div>
            <div class="mt-4">
                <div>
                    <form wire:submit='updateSection'>
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
                                {{ __('إلغاء') }}
                            </x-secondary-button>

                            <x-button type="submit" wire:loading.attr="disabled"
                                class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                                <x-loader wire:loading wire:target="updateSection" />
                                {{ __('تحديث') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-modal>
    <x-modal name="edit-shelf" :show="$errors->isNotEmpty()" focusable>
        <div class="p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span>
                        ماذا تريد أن تحدثه؟!
                    </span>
                </h2>
                <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                    x-on:click="$dispatch('close')"></i>
            </div>
            <div class="mt-4">
                <div>
                    <form wire:submit='updateShelf'>
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
                                <option selected>اختر اسم القسم</option>
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
                                {{ __('إلغاء') }}
                            </x-secondary-button>

                            <x-button type="submit" wire:loading.attr="disabled"
                                class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                                <x-loader wire:loading wire:target="updateShelf" />
                                {{ __('تحديث') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-modal>
</div>
