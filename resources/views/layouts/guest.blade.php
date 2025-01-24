<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    @include('layouts.head')
</head>

<body class="font-amiri text-gray-900  antialiased overflow-x-hidden ">
    <div class="min-h-screen flex flex-col sm:justify-center items-center py-6 sm:pt-0 bg-brown-max">
        <div class="w-full">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
