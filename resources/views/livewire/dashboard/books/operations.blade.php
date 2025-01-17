<div x-data="{ type: 'add' }">
    <div class="container max-w-full px-10 py-4">
        <div class="flex justify-between items-center">
            <span></span>
            <h1 class="text-gray-800 font-bold text-center text-2xl">
                {{ $type === 'store' ? 'أضافه كتاب جديد' : 'التعديل علي كتاب' }}
            </h1>

            <div x-data="{
                book: @entangle('book'),
                code: $wire.book.code
            }"
                x-effect="code = `${book.current_unit_number ??''}${book.row ??''}${book.position_book ??''}`">
                <p class="font-bold">كود الكتاب: (
                    <span x-text="code"></span>
                    )
                </p>
                <x-input-error :messages="$errors->get('book.code')" class="mt-2 " />
            </div>

        </div>
        <form wire:submit.prevent="{{ $type === 'store' ? 'save' : 'update' }}"
            class="flex flex-col-reverse md:flex-row gap-10 justify-between mt-6">
            <div class="w-full md:w-3/4">
                <x-input-book id="title" title='الاسم'>
                    <x-text-input id="title" class="w-full  pt-4" wire:model='book.title'
                        placeholder="أكتب هنا اسم الكتاب.." />
                    <x-input-error :messages="$errors->get('book.title')" class="mt-2 " />
                </x-input-book>

                <div class="flex gap-4">
                    <x-input-book id="unit" title='القسم'>
                        <div class="flex">
                            <x-select id="unit" wire:model.live='book.unit' class="pt-4">
                                <option selected>اختار اسم الوحده</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">
                                        {{ $unit->title }} - {{ $unit->number }}
                                    </option>
                                @endforeach
                            </x-select>
                            <button type="button" x-on:click="type = 'add'"
                                x-on:click.prevent="$dispatch('open-modal', 'add-units')"
                                class="border border-gray-300 bg-white text-gray-900 text-sm rounded-lg focus:ring-border-brown-max focus:border-brown-max py-2 px-4 ">
                                +
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('book.unit')" class="mt-2 " />
                    </x-input-book>
                    <x-input-book id="shelf" title='الرف'>
                        <div class="flex">
                            <x-select id="shelf" wire:model='book.shelf' class="pt-4">
                                <option selected value="">اختار اسم الرف </option>
                                @foreach ($shelfs as $shelf)
                                    <option value="{{ $shelf->id }}">
                                        {{ $shelf->title }} - {{ $shelf->number }}
                                    </option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error :messages="$errors->get('book.shelf')" class="mt-2 " />
                    </x-input-book>
                </div>
                <div>
                    <x-input-book id="series" title='السلسلة'>
                        <x-text-input id="series" wire:model='book.series' class="w-full pt-4"
                            placeholder='أكتب هنا اسم السلسلة..' />
                        <x-input-error :messages="$errors->get('book.series')" class="mt-2 " />

                    </x-input-book>
                </div>
                <div class="flex gap-4">
                    <x-input-book id="publisher" title='الناشر'>
                        <div class="flex">
                            <x-select id="publisher" class="pt-4" wire:model='book.publisher'>
                                <option selected>اختار اسم الناشر</option>
                                @foreach ($publishers as $publisher)
                                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                @endforeach
                            </x-select>
                            <button type="button" x-on:click="type = 'add'"
                                x-on:click.prevent="$dispatch('open-modal', 'publisher')"
                                class="border border-gray-300 bg-white text-gray-900 text-sm rounded-lg focus:ring-border-brown-max focus:border-brown-max py-2 px-4 ">
                                +
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('book.publisher')" class="mt-2 " />

                    </x-input-book>

                    <x-input-book id="author" title='المؤلف'>
                        <div class="flex">
                            <x-select id="author" class="pt-4" placeholder="من هو مؤلف هذا الكتاب؟"
                                wire:model='book.author'>
                                <option selected>اختار اسم المؤلف</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </x-select>
                            <button type="button" x-on:click="type = 'add'"
                                x-on:click.prevent="$dispatch('open-modal', 'author')"
                                class="border border-gray-300 bg-white text-gray-900 text-sm rounded-lg focus:ring-border-brown-max focus:border-brown-max py-2 px-4 ">
                                +
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('book.author')" class="mt-2 " />

                    </x-input-book>
                </div>
                <x-input-book id="subject" title='الموضوعات'>
                    <x-textarea id="subjects" class="w-full pt-4" wire:model='book.subjects'
                        placeholder='أكتب مواضيع الاساسية مع الفصل بينهم بـــ -' />
                    <x-input-error :messages="$errors->get('book.subjects')" class="mt-2 " />

                </x-input-book>
                <x-input-book id="content" title='ملخص الكتاب'>
                    <x-textarea id="content" class="w-full pt-4" placeholder='هل يمكنك كتابة ملخص الهذا لكتاب -'
                        wire:model='book.content' />
                    <x-input-error :messages="$errors->get('book.content')" class="mt-2 " />

                </x-input-book>
                <div class="flex gap-4">
                    <x-input-book id="copies" title='عدد النسخ'>
                        <x-text-input type='number' id="copies" class="w-full pt-4"
                            placeholder='كم نسخة لديك من هذا الكتاب؟..' wire:model='book.copies' />
                        <x-input-error :messages="$errors->get('book.copies')" class="mt-2 " />

                    </x-input-book>
                    <x-input-book id="part_number" title='رقم الجزء'>
                        <x-text-input type='number' id="part_number" class="w-full pt-4"
                            placeholder='ما هو رقم هذا الجزاء؟' wire:model='book.part_number' />
                        <x-input-error :messages="$errors->get('book.part_number')" class="mt-2 " />
                    </x-input-book>
                </div>
                <div class="flex gap-4">
                    <x-input-book id="papers" title='عدد الصفحات'>
                        <x-text-input type='number' id="papers" class="w-full pt-4"
                            placeholder='كم عدد صفحات هذا الكتاب؟..' wire:model='book.papers' />
                        <x-input-error :messages="$errors->get('book.papers')" class="mt-2 " />

                    </x-input-book>
                    <x-input-book id="current_unit_number" title='رقم الوحدة'>
                        <x-text-input type='number' id="current_unit_number" class="w-full pt-4"
                            placeholder='ما هي رقم الوحدة؟' wire:model='book.current_unit_number' />
                        <x-input-error :messages="$errors->get('book.current_unit_number')" class="mt-2 " />

                    </x-input-book>
                </div>
                <div class="flex gap-4">
                    <x-input-book id="row" title='رقم الصف'>
                        <x-text-input type='number' id="row" class="w-full pt-4"
                            placeholder='ما هو رقم الصف؟' wire:model='book.row' />
                        <x-input-error :messages="$errors->get('book.row')" class="mt-2 " />

                    </x-input-book>
                    <x-input-book id="position_book" title='رقم الكتاب في الصف'>
                        <x-text-input type='number' id="position_book" class="w-full pt-4"
                            placeholder='ما هو رقم هذا الكتاب في الصف؟' wire:model='book.position_book' />
                        <x-input-error :messages="$errors->get('book.position_book')" class="mt-2 " />
                    </x-input-book>
                </div>

                <div>
                    @if ($type === 'store')
                        <button type="submit"
                            class="py-2 px-4 w-full text-white font-bold bg-green-700 rounded-lg hover:bg-green-900 duration-200 cursor-pointer">أضافه
                            الكتاب</button>
                    @else
                        <button type="submit"
                            class="py-2 px-4 w-full text-white font-bold bg-green-700 rounded-lg hover:bg-green-900 duration-200 cursor-pointer">تحديث
                            الكتاب</button>
                    @endif
                </div>
            </div>
            <div class="w-full md:w-1/4 pt-4">
                <div>
                    <label for="photo"
                        class="h-80 cursor-pointer flex flex-col items-center justify-center text-center rounded-xl w-full font-bold text-gray-300  p-10 border-4 border-dashed border-gray-300 hover:bg-gray-200/50 hover:text-gray-400 duration-100">
                        <span class="text-4xl">+</span>
                        @if (!is_null($book->oldPhoto) && is_null($book->photo))
                            <p class="text-xl">هل تود تغير الصورة</p>
                            <img src="{{ Storage::url($book->oldPhoto) }}" class="w-[95%] h-[95%] rounded-xl mt-4"
                                alt="">
                        @else
                            <p class="text-xl">أضغط هنا لتحديد الصورة</p>
                            <img x-show="$wire.book.photo" src="{{ $book->photo?->temporaryUrl() }}"
                                class="w-[95%] h-[95%] rounded-xl mt-4" alt="">
                        @endif
                    </label>
                    <input type="file" id="photo" class="hidden" accept="image/png,image/jpg,image/jpeg"
                        wire:model='book.photo'>
                    <x-input-error :messages="$errors->get('book.photo')" class="mt-2 " />

                </div>
                <div class="mt-4">
                    <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white" for="pdf">ارفاق
                        نسخه من الكتاب</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="pdf" type="file" wire:model='book.pdf' accept="pdf">
                    <x-input-error :messages="$errors->get('book.pdf')" class="mt-2 " />
                </div>

                @if (!is_null($book->oldPdf))
                    <div class="mt-4 flex w-full text-white">
                        <button type="button" wire:click='downloadPdfBook'
                            class="w-full bg-red-800 hover:bg-red-900 duration-200 rounded-tr-lg rounded-br-lg   py-1 px-2">
                            تحميل الكتاب
                        </button>
                        <button type="button" wire:click='deletePdfBook({{ $book->id }})'
                            class="bg-gray-700 hover:bg-gray-900 duration-200 rounded-tl-lg rounded-bl-lg py-1 px-2">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                @endif
            </div>
        </form>
    </div>

    <div>
        <livewire:dashboard.modals.add-author />
        <livewire:dashboard.modals.add-publisher />
        <livewire:dashboard.modals.add-unit />

    </div>
</div>
