<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    @include('layouts.head', ['title' => 'ليس لديك اذن لفتح هذا الصفحه'])
    <meta name="robots" content="noindex">
    @livewireStyles
</head>

<body class="font-amiri antialiased">
    <div class="bg-gray-100 ">

        <livewire:layout.navigation />

        <!-- Page Content -->
        <main class="min-h-screen">
            <div class="p-2 flex flex-col justify-center">
                <img src="{{ asset('assets/images/errors/401.png') }}" class="inline-block mx-auto w-5/6 md:w-2/6"
                    alt="">
                <div class="text-center text-gray-900">
                    <h1 class="font-bold text-2xl">ليس لديك اذن لفتح هذا الصفحه!!</h1>
                    <p class="text-xl">يبدوا انه ليس لديك اذن لفتح هذا الصفحه, اذا كانت تعتقد ان يجب ان يكون, اتصل ب
                        مشرف
                        الموقع</p>
                </div>
            </div>

        </main>

        <livewire:layout.footer />

    </div>

    @livewireScripts
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
</body>

</html>
