<div>
    <div class="container px-6 max-w-full my-4">
        <div class=" bg-white p-4 rounded-lg bvorder border-gray-100 shadow text-gray-800">
            <h1 class="flex items-center gap-2 font-bold text-2xl pb-2 border-b-4 mb-2 border-b-brown-max w-fit">
                @if ($book->markup)
                    <i class="fa-solid fa-star text-amber-600"
                        title="هذا يعني أن هذا الكتاب يتم عرضه في الصفحة الرئيسية"></i>
                @endif
                <div>
                    <span>{{ $book->title }}</span>
                </div>
            </h1>
            <div class="flex justify-between flex-col-reverse items-center md:items-start md:flex-row">
                <div class="w-full">
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4 text-lg text-gray-700 w-full">
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-barcode text-blue-500"></i>
                            <p>
                                <span class="font-bold">كود:</span>
                                <span>#{{ $book->code }}</span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-receipt text-green-500"></i>
                            <p>
                                <span class="font-bold">القسم:</span>
                                <span>{{ $book->section?->title ?? '-' }}</span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-layer-group text-red-500"></i>
                            <p>
                                <span class="font-bold">الرف:</span>
                                <span>{{ $book->shelf?->title ?? '-' }}</span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-book text-purple-500"></i>
                            <p>
                                <span class="font-bold">السلسة:</span>
                                <span>{{ $book->series ?? '-' }}</span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-hashtag text-orange-500"></i>
                            <p>
                                <span class="font-bold">رقم الجزء:</span>
                                <span>{{ $book->part_number ?? '-' }}</span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-user text-yellow-500"></i>
                            <p>
                                <span class="font-bold">مؤلف:</span>
                                <span>{{ $book->author?->name ?? '-' }}</span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-copy text-pink-500"></i>
                            <p>
                                <span class="font-bold">عدد النسخ:</span>
                                <span>{{ $book->copies ?? '-' }}</span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-building text-brown-500"></i>
                            <p>
                                <span class="font-bold">الناشر:</span>
                                <span>{{ $book->publisher?->name ?? '-' }}</span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-file-lines text-gray-500"></i>
                            <p>
                                <span class="font-bold">عدد الصفحات:</span>
                                <span>{{ $book->papers ?? '-' }}</span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-box text-indigo-500"></i>
                            <p>
                                <span class="font-bold">رقم الوحدة:</span>
                                <span>{{ $book->current_unit_number ?? '-' }}</span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-arrow-up-1-9 text-orange-600"></i>
                            <p>
                                <span class="font-bold">رقم الرف:</span>
                                <span>{{ $book->row ?? '-' }}</span>
                            </p>
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fa-solid fa-sort text-teal-500"></i>
                            <p>
                                <span class="font-bold">ترتيب الكتاب:</span>
                                <span>{{ $book->position_book ?? '-' }}</span>
                            </p>
                        </li>
                        @can(App\Enums\PermissionEnum::USERS->value)
                            <li class="flex items-center gap-2">
                                <i class="fa-solid fa-user text-teal-500"></i>
                                <p>
                                    <span class="font-bold">مضيف الكتاب:</span>
                                    <span>{{ $book->user?->name ?? '-' }}</span>
                                </p>
                            </li>
                        @endcan
                    </ul>
                    <div class="mt-4">
                        @if (!is_null($book->pdf))
                            <button wire:click="downloadPdfBook()"
                                class="inline-block py-2 px-4 bg-red-800 hover:bg-red-600 duration-200 text-white font-bold rounded-lg mt-4">
                                تحميل الكتاب بصيغة PDF
                            </button>
                        @endif
                        @if (auth()->user()->id == $book->user_id || auth()->user()->hasPermissionTo(App\Enums\PermissionEnum::USERS))
                            @can(App\Enums\PermissionEnum::BOOK->value)
                                <a href="{{ route('dashboard.books.edit', $book->id) }}" wire:navigate
                                    class="inline-block py-2 px-4 bg-amber-800 hover:bg-amber-600 duration-200 text-white font-bold rounded-lg mt-4">
                                    التعديل على الكتاب
                                </a>
                            @endcan
                        @endif
                    </div>
                </div>
                <div class="w-64 h-80 rounded-lg border border-gray-200 bg-white flex items-center justify-center">
                    <img src="{{ $book->photo ? Storage::url($book->photo) : asset('assets/images/mockup.jpg') }}"
                        class="max-w-full max-h-full object-contain" alt="{{ $book->title }}"
                        onerror="this.onerror=null; this.src='{{ asset('assets/images/mockup.jpg') }}';">
                </div>
            </div>
        </div>
        @if (isset($book->subjects))
            <div class="bg-white p-4 mt-4 rounded-lg bvorder border-gray-100 shadow text-gray-800">
                <h1 class="flex items-center gap-2 font-bold text-2xl pb-2 border-b-4 mb-2 border-b-brown-max w-fit">
                    <div>
                        <i class="fa-solid fa-clipboard-list"></i>
                        <span>مواضيع الكتاب</span>
                    </div>
                </h1>
                <div>
                    @php
                        $subjects = explode('-', $book->subjects);
                    @endphp
                    <ul class="ps-8">
                        @foreach ($subjects as $item)
                            @if (strlen(trim($item)) > 0)
                                <li class="list-disc">{{ $item }}</li>
                            @endif
                        @endforeach
                    </ul>
                    @if (empty($subjects))
                        <p class="text-gray-600 italic text-center">لا يوجد هنا اي موضوع مسجل لهذا الكتب..</p>
                    @endif
                </div>
            </div>
        @endif
        @if ($book->content)
            <div class="bg-white p-4 mt-4 rounded-lg bvorder border-gray-100 shadow text-gray-800">
                <h1 class="flex items-center gap-2 font-bold text-2xl pb-2 border-b-4 mb-2 border-b-brown-max w-fit">
                    <div>
                        <i class="fa-solid fa-context"></i>
                        <span>ملخص الكتاب</span>
                    </div>
                </h1>
                <p class=" whitespace-pre-wrap">{{ $book->content }}</p>
            </div>
        @endif
    </div>
</div>
