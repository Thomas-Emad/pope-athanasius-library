<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    @include('layouts.head', ['title' => 'لدينا خطا في الموقع بسيط'])
    <meta name="robots" content="noindex">
    @livewireStyles
</head>

<body class="font-amiri antialiased">
    <div class="bg-gray-100 ">

        <livewire:layout.navigation />

        <!-- Page Content -->
        <main class="min-h-screen">
            <div class="p-2 flex flex-col justify-center">
                <img src="{{ asset('assets/images/errors/419.png') }}" class="inline-block mx-auto w-5/6 md:w-2/6"
                    alt="">
                <div class="text-center text-gray-900">
                    <h1 class="font-bold text-2xl">عذرا, يبدوا ان هناك خطا ما هنا, ونحن نعمل علي حل هذ المشكله في اسرع
                        وقت
                    </h1>
                </div>
            </div>

        </main>

        <livewire:layout.footer />

    </div>

    @livewireScripts
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
</body>

</html>
