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
            @yield('content')
        </main>

        <livewire:layout.footer />

    </div>

    @livewireScripts
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
</body>

</html>
