<div>
    <div class="flex justify-between items-center gap-2 mb-8">
        <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
            <i class="fa-solid fa-book-bible me-2"></i>
            <span>الاحصائيات</span>
        </h1>
    </div>
    <div class="flex flex-col justify-center md:flex-row gap-4 flex-wrap text-gray-700">
        <div class="flex flex-col justify-center md:flex-row gap-4 flex-wrap text-gray-700">
            <x-card-index-dashboard label="المستخدمين" value="2000" icon="fa-solid fa-users" />
            <x-card-index-dashboard label="الكتب" value="2000" icon="fa-solid fa-book" />
            <x-card-index-dashboard label="مشاهدات الكتب" value="2000" icon="fa-solid fa-book" />
            <x-card-index-dashboard label="المنشورات" value="2000" icon="fa-solid fa-edit" />
            <x-card-index-dashboard label="الناشرين" value="2000" icon="fa-solid fa-edit" />
            <x-card-index-dashboard label="المؤلفين" value="2000" icon="fa-solid fa-edit" />
        </div>
    </div>
    <hr class="block w-[95%] mx-auto my-4">
    <div class="flex justify-between items-center gap-2 mb-8">
        <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
            <i class="fa-solid fa-book-bible me-2"></i>
            <span>اكثر الكتب اطلاعا</span>
        </h1>
    </div>
    <div>
        <div class="mt-10 grid gap-4" style="grid-template-columns: repeat(auto-fill, minmax(250px, 1fr))">
            @foreach ($books as $book)
                <a href="{{ route('book.show', $book->code) }}" wire:navigate wire:key='book-{{ $book->id }}'
                    class="p-2 bg-white shadow rounded-md overflow-hidden hover:-translate-y-2 duration-200 flex flex-row items-center gap-2">
                    <img src="{{ $book->photo ? Storage::url($book->photo) : asset('assets/images/mockup.jpg') }}"
                        class="h-14 w-14 border border-gray-200 rounded-xl" alt="mockup book"
                        onerror="this.onerror=null; this.src='{{ asset('assets/images/mockup.jpg') }}';">
                    <div class="text-center px-2 text-xs">
                        <h3 class="font-bold">{{ str($book->title)->limit(20) }}</h3>
                        <p>
                            <span>المؤلف:</span>
                            {{ str($book->author->name)->limit(20) }}
                        </p>
                        <p>
                            <span>عدد المشاهدات:</span>
                            {{ $book->views }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

</div>
