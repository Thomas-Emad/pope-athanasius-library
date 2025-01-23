<div>
    <div x-data="{ showFilter: false }"
        class="relative container px-10 py-4  max-w-full bg-brown-lite min-h-72 flex justify-center items-center flex-col">
        <div class="text-gray-900 text-center">
            <h1 class="font-bold text-4xl mb-2">مكتبة البابا أثناسيوس للاطلاع</h1>
            <p class="italic text-2xl">كنيسة الشهيد العظيم مارمينا والبابا كيرلس السادس</p>
        </div>
        <div class="w-full flex gap-4 items-center justify-between">
            <button x-on:click="showFilter = !showFilter" type="button" class="bg-white p-4 rounded-xl">
                <i class="fa-solid fa-list"></i>
            </button>
            <div class="w-full my-4 relative">
                <div class="absolute inset-y-0 right-2 flex items-center justify-center z-10">
                    <i class="fa-solid fa-magnifying-glass text-brown-max"></i>
                </div>
                <input type="text" wire:model='search' placeholder="أكتب هنا اسم الكتاب, الناشر, المؤلف..."
                    class="py-4 px-8 border-none outline-none rounded-xl w-full focus:ring-brown-max">
                <div class="absolute inset-y-0 left-2 flex items-center justify-center  z-10">
                    <button type="button" wire:click="submit"
                        class="text-sm py-2 px-4 bg-brown-lite rounded-md text-white duration-200 hover:bg-brown-max">
                        أبحث
                    </button>
                </div>
            </div>
        </div>
        <div x-show="showFilter" x-transition:enter=" ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="absolute inset-y-0 left-0 md:left-4
            z-10 flex items-center justify-center w-full md:w-fit">
            <div class="w-full md:w-fit bg-white h-fit shadow-lg px-4 py-4 rounded-lg">
                <div class="flex items-center justify-between gap-4 pb-6">
                    <h3 class="font-bold">اعدادات متقدمه للبحث</h3>
                    <button x-on:click="showFilter = !showFilter" type="button"
                        class="hover:text-red-600 duration-200 cursor-pointer">
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>
                <div class="flex flex-col gap-2">
                    <x-toggle wire:model.change='filters.code' label='كود الكتاب' currentStatus='false' />
                    <x-toggle wire:model.change='filters.book' label='اسم الكتاب' currentStatus='true' />
                    <x-toggle wire:model.change='filters.publisher' label='اسم الناشر' currentStatus='true' />
                    <x-toggle wire:model.change='filters.author' label='اسم المؤلف' currentStatus='true' />
                    <x-toggle wire:model.change='filters.section' label='اسم القسم' currentStatus='true' />
                    <x-toggle wire:model.change='filters.shelf' label='اسم الرف' currentStatus='true' />
                    <x-toggle wire:model.change='filters.subjects' label='الموضوعات' currentStatus='false' />
                    <x-toggle wire:model.change='filters.series' label='السلسله' currentStatus='false' />

                </div>
                <x-select id="orderBy" wire:model.change='orderBy' class="mt-4 cursor-pointer">
                    <option value="new">أحدث الكتب اولا</option>
                    <option value="old">أقدم الكتب اولا</option>
                    <option value="top_views">الكتب ألاكثر مشاهده</option>
                </x-select>
            </div>
        </div>
    </div>
    <div class="container px-10 max-w-full">
        <h2 class="font-bold text-xl my-4">هذا نتيجة البحث:</h2>
        <div>
            <div class="grid gap-4 pb-8" style="grid-template-columns: repeat(auto-fill, minmax(150px, 1fr))">
                @foreach ($books as $book)
                    <a href="{{ route('book.show', $book->code) }}" wire:navigate wire:key='book-{{ $book->id }}'
                        class="bg-white shadow rounded-md overflow-hidden hover:-translate-y-2 duration-200">
                        <img src="{{ $book->photo ? Storage::url($book->photo) : asset('assets/images/mockup.jpg') }}"
                            class="w-full h-56" alt="mockup book"
                            onerror="this.onerror=null; this.src='{{ asset('assets/images/mockup.jpg') }}';">
                        <div class="text-center px-2">
                            <h3 class="font-bold">{{ str($book->title)->limit(20) }}</h3>
                            <span>{{ str($book->author->name)->limit(20) }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
            @if ($books->total() > 10)
                <div class="bg-white py-2 px-4 rounded-lg shadow mt-6">
                    {{ $books->links() }}
                </div>
            @endif

            @if (sizeOf($books) == 0)
                <p class="text-gray-600 text-center italic my-4">لا يوجد كتاب هنا بهذا المواصفات..</p>
            @endif
        </div>
    </div>
</div>
