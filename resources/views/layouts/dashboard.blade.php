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
                        <x-link-dashboard link="{{ route('dashboard.index') }}" label="الصفحه الرائيسيه"
                            :isActive="Route::is('dashboard.index')" icon="fa-solid fa-chart-line" />
                        <x-link-dashboard link="{{ route('dashboard.books') }}" label="الكتب" :isActive="Route::is('dashboard.books')"
                            icon="fa-solid fa-book-open" />
                        <x-link-dashboard link="{{ route('dashboard.units') }}" label="اقسام الكتب" :isActive="Route::is('dashboard.units')"
                            icon="fa-solid fa-book-bible" />
                        @if (auth()->check() && auth()->user()->isOwner())
                            <x-link-dashboard link="#" label="المنشورات" icon="fa-solid fa-newspaper" />
                            <x-link-dashboard link="{{ route('dashboard.users') }}" label="المستخدمين" :isActive="Route::is('dashboard.users')"
                                icon="fa-solid fa-users-gear" />
                        @endif
                        <x-link-dashboard link="{{ route('dashboard.publishers') }}" label="الناشرين" :isActive="Route::is('dashboard.publishers')"
                            icon="fa-solid fa-building" />
                        <x-link-dashboard link="{{ route('dashboard.authors') }}" label="المؤلفين" :isActive="Route::is('dashboard.authors')"
                            icon="fa-solid fa-feather-pointed" />
                        @if (auth()->check() && auth()->user()->isOwner())
                            <x-link-dashboard link="{{ route('dashboard.words') }}" label="كلمة اليوم" :isActive="Route::is('dashboard.words')"
                                icon="fa-solid fa-quote-right" />
                        @endif

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
