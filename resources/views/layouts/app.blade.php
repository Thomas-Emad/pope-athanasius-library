<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    @include('layouts.head')
</head>

<body class="font-amiri antialiased">
    <div class="bg-gray-100">

        <livewire:layout.navigation />

        <!-- Page Content -->
        <main class="min-h-screen">
            {{ $slot }}
            @yield('content')
        </main>

        <livewire:layout.footer />

    </div>

    <script src="{{ asset('assets/js/all.min.js') }}"></script>
    @livewireScripts
</body>

</html>
