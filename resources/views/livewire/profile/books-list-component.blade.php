<di x-data="{ type: '' }">
    <div>
        <div class="flex justify-between items-center gap-2 mb-8">
            <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
                <i class="fa-solid fa-book-bible me-2"></i>
                <span>الكتب</span>
            </h1>
            @can(App\Enums\PermissionEnum::BOOK->value)
                @if (auth()?->user()?->id == $id)
                    <div class="flex items-center gap-2">
                        <a href="{{ route('dashboard.books.create') }}" wire:navigate
                            class="text-white font-bold bg-brown-max py-2 px-4 rounded-lg hover:bg-brown-lite duration-200">
                            أضافه كتاب
                        </a>
                    </div>
                @endif
            @endcan
        </div>

        <div class="relative  sm:rounded-lg">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <x-search-dashboard wire:model.live.debounce.500ms='search'
                    placeholder="أكتب هنا اسم الكتاب، المؤلف، الناشر، الموضوعات، القسم، الرف، كود الكتاب..." />
                <div>
                    <x-toggle id="getMarkUpBooks" wire:model.live='getMarkUpBooks' label='الكتب المميزه' />
                </div>
            </div>
            <div class="overflow-x-auto ">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                الكود
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                مميزه
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                صورة
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                اسم الكتاب
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                القسم
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                الرف
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                الناشر
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                المؤلف
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                المشاهدات
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                PDF
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                متزامن؟
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                الاعدادت
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $item)
                            <tr wire:key="book-{{ $item->id }}"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->code }}
                                </th>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    <x-status-yes-no status="{{ $item->markup }}"
                                        labelTrue="هذا الكتاب مميزه يظهر في الصفحه الرئيسيه"
                                        labelFalse="هذا الكتاب لا يظهر في الصفحه الرئيسيه" />
                                </td>
                                <td class="px-6 py-4">
                                    <img src="{{ $item->photo && Storage::exists($item->photo) ? Storage::url($item->photo) : asset('assets/images/logo.png') }}"
                                        class="shadow w-8 h-8 rounded-xl" alt="Photo Book"
                                        onerror="this.onerror=null;this.src='{{ asset('assets/images/logo.png') }}';">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ str($item->title)->limit(20) }}
                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    {{ $item->section?->title ?? '-' }}
                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    {{ $item->shelf?->title ?? '-' }}
                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    {{ $item->publisher?->name ?? '-' }}
                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    {{ $item->author?->name ?? '-' }}
                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    {{ $item->views ?? '0' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-status-yes-no status="{{ $item->pdf }}"
                                        labelTrue="هذا الكتاب يحتوي علي ملف PDF"
                                        labelFalse="هذا الكتاب لا يحتوي علي اي ملف" />
                                </td>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    <x-status-yes-no status="{{ $item->is_synced }}"
                                        labelTrue="هذا الكتاب غير متزامن مع السيرفر الخارجي"
                                        labelFalse="هذا الكتاب متزامن مع السيرفر الخارجي" />
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    @if (auth()?->user()?->id == $id)
                                        <a href="{{ route('dashboard.books.edit', $item) }}" wire:navigate
                                            class="me-2 text-xl hover:text-amber-600 duration-150">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('book.show', $item->code) }}" wire:navigate
                                        class="me-2 text-xl hover:text-blue-600 duration-150">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="py-2 text-center  italic text-gray-600">
                                    يبدوا انه ليس لدينا هنا اي كتاب!!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</di>
