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
                        @can(App\Enums\PermissionEnum::CONTROLR_DASHBOARD->value)
                            <x-link-dashboard link="{{ route('dashboard.index') }}" label="الصفحة الرئيسية"
                                :isActive="Route::is('dashboard.index')" icon="fa-solid fa-chart-line" />
                        @endcan
                        @can(App\Enums\PermissionEnum::BOOK->value)
                            <x-link-dashboard link="{{ route('dashboard.books') }}" label="الكتب" :isActive="Route::is('dashboard.books')"
                                icon="fa-solid fa-book-open" />
                        @endcan
                        @can(App\Enums\PermissionEnum::SECTIONS_BOOK->value)
                            <x-link-dashboard link="{{ route('dashboard.sections') }}" label="اقسام الكتب" :isActive="Route::is('dashboard.sections')"
                                icon="fa-solid fa-book-bible" />
                        @endcan
                        @can(App\Enums\PermissionEnum::POSTS->value)
                            <x-link-dashboard link="{{ route('dashboard.posts') }}" label="المنشورات"
                                icon="fa-solid fa-newspaper" :isActive="Route::is('dashboard.posts')" />
                        @endcan

                        @can(App\Enums\PermissionEnum::PUBLISHERS->value)
                            <x-link-dashboard link="{{ route('dashboard.publishers') }}" label="الناشرين" :isActive="Route::is('dashboard.publishers')"
                                icon="fa-solid fa-building" />
                        @endcan
                        @can(App\Enums\PermissionEnum::AUTHORS->value)
                            <x-link-dashboard link="{{ route('dashboard.authors') }}" label="المؤلفين" :isActive="Route::is('dashboard.authors')"
                                icon="fa-solid fa-feather-pointed" />
                        @endcan
                        @can(App\Enums\PermissionEnum::WORD_TODAY->value)
                            <x-link-dashboard link="{{ route('dashboard.words') }}" label="كلمة اليوم" :isActive="Route::is('dashboard.words')"
                                icon="fa-solid fa-quote-right" />
                        @endcan
                        @can(App\Enums\PermissionEnum::USERS->value)
                            <x-link-dashboard link="{{ route('dashboard.users') }}" label="المستخدمين" :isActive="Route::is('dashboard.users')"
                                icon="fa-solid fa-users" />
                            <x-link-dashboard link="{{ route('dashboard.roles') }}" label="ألاذونات والصلاحيات"
                                :isActive="Route::is('dashboard.roles')" icon="fa-solid fa-users-gear" />
                        @endcan
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
