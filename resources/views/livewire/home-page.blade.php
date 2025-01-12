<div class="text-gray-900">
    <div class="bg-brown-lite flex items-center justify-center px-2 py-20 text-center">
        <div class="w-3/4">
            <div class="text-gray-900">
                <h1 class="font-bold text-4xl mb-2">مكتبة البابا أثناسيوس للاطلاع</h1>
                <p class="italic text-2xl">كنيسة الشهيد العظيم مارمينا والبابا كيرلس السادس</p>
            </div>
            <div class="w-full my-4 relative">
                <div class="absolute inset-y-0 right-2 flex items-center justify-center z-10">
                    <i class="fa-solid fa-magnifying-glass text-brown-max"></i>
                </div>
                <input type="text" placeholder="أكتب هنا اسم الكتاب..."
                    class="py-4 px-8 border-none outline-none rounded-xl w-full focus:ring-brown-max">
                <div class="absolute inset-y-0 left-2 flex items-center justify-center  z-10">
                    <button
                        class="text-sm py-2 px-4 bg-brown-lite rounded-md text-white duration-200 hover:bg-brown-max">
                        أبحث
                    </button>
                </div>
            </div>
            <div class="text-white flex items-center gap-2 justify-center">
                <a href="#"
                    class="py-2 px-8 border border-white hover:bg-brown-max hover:border-transparent hover:shadow-md duration-200 rounded-lg">
                    أحدث الكتب
                </a>
                <a href="#"
                    class="py-2 px-8 border border-white hover:bg-brown-max hover:border-transparent hover:shadow-md duration-200 rounded-lg">
                    أحدث الكتب
                </a>
                <a href="#"
                    class="py-2 px-8 border border-white hover:bg-brown-max hover:border-transparent hover:shadow-md duration-200 rounded-lg">
                    أحدث الكتب
                </a>
            </div>
        </div>
    </div>
    <div class="bg-gray-200">
        <div
            class="container px-10 max-w-full flex flex-col md:flex-row gap-2 justify-around items-center py-10 text-center">
            <div
                class="w-full md:w-1/3 flex flex-col gap-2 items-center opacity-70 hover:opacity-100 duration-300 cursor-pointer">
                <img src="{{ asset('assets/images/Bookshelf.png') }}" class="w-20" alt="books icon">
                <span class="font-bold text-4xl"> 4 كتاب </span>
                <p>آلاف الكتب المنشورة على مكتبة البابا أثناسيوس للاطلاع</p>
            </div>
            <div class="flex flex-col gap-2 items-center my-4">
                <img src="{{ asset('assets/images/logo.png') }}" class=" w-48" alt="Logo">
            </div>
            <div
                class="w-full md:w-1/3 flex flex-col gap-2 items-center opacity-70 hover:opacity-100 duration-300 cursor-pointer">
                <img src="{{ asset('assets/images/books.png') }}" class="w-20" alt="books icon">
                <span class="font-bold text-4xl"> 4 مؤلف </span>
                <p>تهدف مكتبة البابا أثناسيوس إلى نشر المعرفة والعلم الذي تورثناء الي الجميع </p>
            </div>
        </div>
    </div>
    <div class="bg-gray-100">
        <div class="container px-10 max-w-full  flex flex-col md:flex-row gap-4 justify-between my-10 ">
            <div class="w-full md:w-2/3">
                <div class="bg-white p-4 shadow-md rounded-md">
                    <h2 class="w-fit font-bold pb-2 text-2xl border-b-2 border-b-brown-max">
                        <i class="fa-solid fa-cross"></i>
                        <span>كلمة اليوم</span>
                    </h2>
                    <p class="text-lg py-2"> الخلاص لم يكن ممكناً بغير الله </p>
                    <p class="text-left italic"> البابا أثناسيوس الرسولى </p>
                </div>
                <div class="mt-10 grid" style="grid-template-columns: repeat(auto-fill, minmax(200px, 1fr))">
                    <a href="#"
                        class="bg-white shadow rounded-md overflow-hidden hover:-translate-y-2 duration-200">
                        <img src="{{ asset('assets/images/mockup.jpg') }}" class="w-full h-56" alt="mockup book">
                        <div class="text-center py-2">
                            <h3 class="font-bold"> اللاهوت المقارن (الجزء الاول ) </h3>
                            <span>البابا شنودة الثالث</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div class="bg-white p-4 shadow-md rounded-md">
                    <div class="flex justify-between items-center">
                        <h2 class="w-fit font-bold pb-2 text-2xl border-b-2 border-b-brown-max">
                            <i class="fa-solid fa-book-medical"></i>
                            <span> أقسام الكتب </span>
                        </h2>
                        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'search-bar')"
                            class="hover:text-gray-800 hover:border-gray-800 duration-200">
                            <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                        </button>
                    </div>
                    <div class="flex flex-col gap-4 mt-4 overflow-y-auto h-[500px] p-2 ">
                        <a href="#"
                            class="bg-white p-4 font-bold shadow-lg rounded-lg flex justify-between items-center hover:text-brown-max hover:-translate-y-1 duration-200">
                            <span> البابا أثناسيوس الرسولى </span>
                            <i class="fa-solid fa-book-bookmark"></i>
                        </a>
                        <a href="#"
                            class="bg-white p-4 font-bold shadow-lg  rounded-lg flex justify-between items-center hover:text-brown-max hover:-translate-y-1 duration-200">
                            <span> البابا أثناسيوس الرسولى </span>
                            <i class="fa-solid fa-book-bookmark"></i>
                        </a>
                        <a href="#"
                            class="bg-white p-4 font-bold shadow-lg  rounded-lg flex justify-between items-center hover:text-brown-max hover:-translate-y-1 duration-200">
                            <span> البابا أثناسيوس الرسولى </span>
                            <i class="fa-solid fa-book-bookmark"></i>
                        </a>
                        <a href="#"
                            class="bg-white p-4 font-bold shadow-lg  rounded-lg flex justify-between items-center hover:text-brown-max hover:-translate-y-1 duration-200">
                            <span> البابا أثناسيوس الرسولى </span>
                            <i class="fa-solid fa-book-bookmark"></i>
                        </a>
                        <a href="#"
                            class="bg-white p-4 font-bold shadow-lg  rounded-lg flex justify-between items-center hover:text-brown-max hover:-translate-y-1 duration-200">
                            <span> البابا أثناسيوس الرسولى </span>
                            <i class="fa-solid fa-book-bookmark"></i>
                        </a>
                        <a href="#"
                            class="bg-white p-4 font-bold shadow-lg  rounded-lg flex justify-between items-center hover:text-brown-max hover:-translate-y-1 duration-200">
                            <span> البابا أثناسيوس الرسولى </span>
                            <i class="fa-solid fa-book-bookmark"></i>
                        </a>
                        <a href="#"
                            class="bg-white p-4 font-bold shadow-lg  rounded-lg flex justify-between items-center hover:text-brown-max hover:-translate-y-1 duration-200">
                            <span> البابا أثناسيوس الرسولى </span>
                            <i class="fa-solid fa-book-bookmark"></i>
                        </a>
                        <a href="#"
                            class="bg-white p-4 font-bold shadow-lg  rounded-lg flex justify-between items-center hover:text-brown-max hover:-translate-y-1 duration-200">
                            <span> البابا أثناسيوس الرسولى </span>
                            <i class="fa-solid fa-book-bookmark"></i>
                        </a>
                        <a href="#"
                            class="bg-white p-4 font-bold shadow-lg   rounded-lg flex justify-between items-center hover:text-brown-max hover:-translate-y-1 duration-200">
                            <span> البابا أثناسيوس الرسولى </span>
                            <i class="fa-solid fa-book-bookmark"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
