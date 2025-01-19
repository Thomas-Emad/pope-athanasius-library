<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    @include('layouts.head')
</head>

<body class=" antialiased">
    <div class="bg-gray-100">
        <livewire:layout.navigation />

        <!-- Page Content -->
        <main class="min-h-screen">
            <div class="container max-w-full px-10 my-5">
                <h1 class="font-bold text-2xl">
                    <i class="fa-solid fa-house me-2"></i>
                    <span>لوحة التحكم</span>
                </h1>
                <div class="flex flex-col md:flex-row justify-between gap-4 mt-4">
                    <div class="w-full md:w-1/4 bg-white p-2 rounded-xl shadow-md">
                        <a href="{{ route('dashboard.index') }}" wire:navigate
                            class="block w-full py-2 px-4 rounded-lg bg-gray-50/50 border-b border-gray-200 hover:bg-gray-100 duration-200  @if (Route::is('dashboard.index')) text-white bg-brown-max @endif">
                            <i class="fa-solid fa-chart-line me-2"></i>
                            <span>الصفحه الرائيسيه</span>
                        </a>
                        <a href="{{ route('dashboard.books') }}" wire:navigate
                            class="block w-full py-2 px-4 rounded-lg bg-gray-50/50 border-b border-gray-200 hover:bg-gray-100 duration-200 @if (Route::is('dashboard.books')) text-white bg-brown-max @endif">
                            <i class="fa-solid fa-book-open me-2"></i>
                            <span>الكتب</span>
                        </a>
                        <a href="{{ route('dashboard.units') }}" wire:navigate
                            class="block w-full py-2 px-4 rounded-lg bg-gray-50/50 border-b border-gray-200 hover:bg-gray-100 duration-200 @if (Route::is('dashboard.units')) text-white bg-brown-max @endif">
                            <i class="fa-solid fa-book-bible me-2"></i>
                            <span>اقسام الكتب</span>
                        </a>
                        <a href="#"
                            class="block w-full py-2 px-4 rounded-lg bg-gray-50/50 border-b border-gray-200 hover:bg-gray-100 duration-200">
                            <i class="fa-solid fa-newspaper me-2"></i>
                            <span>المنشورات</span>
                        </a>

                        <a href="#"
                            class="block w-full py-2 px-4 rounded-lg bg-gray-50/50 border-b border-gray-200 hover:bg-gray-100 duration-200">
                            <i class="fa-solid fa-users-gear me-2"></i>
                            <span>المستخدمين</span>
                        </a>
                        <a href="{{ route('dashboard.publishers') }}" wire:navigate
                            class="block w-full py-2 px-4 rounded-lg bg-gray-50/50 border-b border-gray-200 hover:bg-gray-100 duration-200 @if (Route::is('dashboard.publishers')) text-white bg-brown-max @endif">
                            <i class="fa-solid fa-building me-2"></i>
                            <span>الناشرين</span>
                        </a>
                        <a href="{{ route('dashboard.authors') }}" wire:navigate
                            class="block w-full py-2 px-4 rounded-lg bg-gray-50/50 border-b border-gray-200 hover:bg-gray-100 duration-200 @if (Route::is('dashboard.authors')) text-white bg-brown-max @endif">
                            <i class="fa-solid fa-feather-pointed me-2"></i>
                            <span>المؤلفين</span>
                        </a>
                        <a href="{{ route('dashboard.words') }}" wire:navigate
                            class="block w-full py-2 px-4 rounded-lg bg-gray-50/50 border-b border-gray-200 hover:bg-gray-100 duration-200 @if (Route::is('dashboard.authors')) text-white bg-brown-max @endif">
                            <i class="fa-solid fa-quote-right me-2"></i>
                            <span>كلمة اليوم</span>
                        </a>

                    </div>
                    <div class="w-full md:w-3/4 bg-white p-4 rounded-xl shadow-md">
                        @yield('content')
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>

        <livewire:layout.footer />

    </div>

    <script src="{{ asset('assets/js/all.min.js') }}"></script>
</body>

</html>
