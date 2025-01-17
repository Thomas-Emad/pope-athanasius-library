<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    @include('layouts.head', ['title' => 'هذا الصفحه غير موجود هنا'])
    <meta name="robots" content="noindex">
    @livewireStyles
</head>

<body class="font-amiri antialiased">
    <div class="bg-gray-100 ">

        <livewire:layout.navigation />

        <!-- Page Content -->
        <main class="min-h-screen">

            <div class="text-center text-gray-900 py-8">
                <h1 class="font-bold text-2xl">يبدوا انك متسرع جدا, انتظر قليل</h1>
            </div>
        </main>

        <livewire:layout.footer />

    </div>

    @livewireScripts
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
</body>

</html>
