<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    @include('layouts.head', ['title' => 'هناك خطا صغير جدا, هل يمكنك الضغط هنا؟'])
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
                <div class="text-center text-gray-900" dir="rtl">
                    <h1 class="font-bold text-2xl">هناك خطأ بسيط، هل يمكنك التحديث؟</h1>
                    <button type="button" wire:click='$refresh'
                        class="py-2 px-8 bg-brown-max text-white font-bold rounded-lg hover:bg-brown-lite duration-200">
                        تحديث
                    </button>
                </div>
            </div>

        </main>

        <livewire:layout.footer />

    </div>

    @livewireScripts
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
</body>

</html>
