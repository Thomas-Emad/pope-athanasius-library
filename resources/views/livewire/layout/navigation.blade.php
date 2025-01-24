<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    public $book = '';
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    public function search()
    {
        $this->redirectRoute('search', ['search' => $this->book], navigate: true);
    }
}; ?>
<div class="font-serif">
    <nav x-data="{ open: false, toggleBar: false }" class="bg-brown-max rounded-bl-lg rounded-br-lg">
        <div class="container max-w-full  relative">
            <div class="py-4 px-6 flex justify-between gap-4 items-center">
                <div class="flex items-center gap-6">
                    <a href="{{ route('home') }}" wire:navigate>
                        <img src="{{ asset('assets/images/logo.png') }}" class="w-12 h-12 rounded-full" alt="Logo website">
                    </a>
                    <ul class="hidden md:flex items-center gap-4 text-white ">
                        <li>
                            <a href="{{ route('home') }}" wire:navigate
                                class="hover:text-gray-800 hover:border-gray-800 duration-200">
                                <i class="fa-solid fa-house"></i>
                                <span>الصفحة الرئيسية</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('sections') }}" wire:navigate
                                class="hover:text-gray-800 hover:border-gray-800 duration-200">
                                <i class="fa-solid fa-book-bible"></i>
                                <span>أقسام الكتب</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('posts') }}" wire:navigate
                                class="hover:text-gray-800 hover:border-gray-800 duration-200">
                                <i class="fa-solid fa-envelopes-bulk"></i>
                                <span>المنشورات</span>
                            </a>
                        </li>
                        <li>
                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'search-bar')"
                                class="hover:text-gray-800 hover:border-gray-800 duration-200">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <span>البحث</span>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="flex gap-2 items-center">
                    <button x-data="{}" x-on:click="toggleBar = !toggleBar"
                        class="md:hidden py-1 px-4 border border-gray-600/50 text-2xl rounded-lg text-yellow-900 focus:ring-4 focus:ring-gray-900/50  duration-200">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    @if (auth()->user())
                        <!-- Settings Dropdown -->
                        <div>
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="border-2 border-transparent rounded-full overflow-hidden hover:border-white focus-within:border-white duration-150">
                                        <img src="{{ auth()->user()->photo ? Storage::url(auth()->user()->photo) : asset('assets/images/logo.png') }}"
                                            class="w-12 h-12 rounded-full bg-gray-200" alt="صورة الملف الشخصي"
                                            onerror="this.onerror=null; this.src='{{ asset('assets/images/logo.png') }}';">
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    @can(App\Enums\PermissionEnum::CONTROLR_DASHBOARD->value)
                                        <x-dropdown-link :href="route('dashboard.index')" wire:navigate>
                                            لوحة التحكم
                                        </x-dropdown-link>
                                    @endcan
                                    @can(App\Enums\PermissionEnum::BOOK->value)
                                        <x-dropdown-link :href="route('dashboard.books.create')" wire:navigate>
                                            إضافة كتاب جديد
                                        </x-dropdown-link>
                                    @endcan
                                    @can(App\Enums\PermissionEnum::USERS->value)
                                        <hr class="block w-[75%] mx-auto bg-gray-600">
                                        <x-dropdown-link :href="route('dashboard.users')" wire:navigate>
                                            المستخدمين
                                        </x-dropdown-link>
                                    @endcan
                                    @can(App\Enums\PermissionEnum::WORD_TODAY->value)
                                        <hr class="block w-[75%] mx-auto bg-gray-600">
                                        <x-dropdown-link :href="route('dashboard.words')" wire:navigate>
                                            كلمة اليوم
                                        </x-dropdown-link>
                                    @endcan

                                    <x-dropdown-link :href="route('profile')" wire:navigate>
                                        الملف الشخصي
                                    </x-dropdown-link>

                                    <hr class="block w-2/3 mx-auto">
                                    <!-- Authentication -->
                                    <button wire:click="logout" class="w-full text-start">
                                        <x-dropdown-link>
                                            تسجيل خروج
                                        </x-dropdown-link>
                                    </button>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <a href="{{ route('login') }}" wire:navigate
                            class="py-2 px-4 border text-white border-white rounded-lg hover:text-gray-800 hover:border-gray-800 duration-200 ">
                            تسجيل دخول
                        </a>
                    @endif
                </div>
            </div>
            <ul x-show="toggleBar" x-collapse.duration.500ms
                class="flex flex-col md:hidden gap-4 text-white bg-brown-max p-2 w-full">
                <li>
                    <a href="{{ route('home') }}" wire:navigate
                        class="hover:text-gray-800 hover:border-gray-800 duration-200">
                        <i class="fa-solid fa-house"></i>
                        <span>الصفحة الرئيسية</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('sections') }}" wire:navigate
                        class="hover:text-gray-800 hover:border-gray-800 duration-200">
                        <i class="fa-solid fa-book-bible"></i>
                        <span>أقسام الكتب</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('posts') }}" wire:navigate
                        class="hover:text-gray-800 hover:border-gray-800 duration-200">
                        <i class="fa-solid fa-envelopes-bulk"></i>
                        <span>المنشورات</span>
                    </a>
                </li>
                <li>
                    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'search-bar')"
                        class="hover:text-gray-800 hover:border-gray-800 duration-200">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span>البحث</span>
                    </button>
                </li>
        </div>
    </nav>

    <x-modal name="search-bar" focusable>
        <form wire:submit="deleteUser" class="p-6">

            <div class="flex justify-between items-center">
                <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <span>
                        هل يمكنك إخباري باسم الكتاب؟
                    </span>
                </h2>
                <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                    x-on:click="$dispatch('close')"></i>
            </div>

            <div class="mt-6">
                <x-input-label for="book" value="{{ __('اكتب هنا اسم الكتاب') }}" class="sr-only" />

                <x-text-input wire:model="book" id="book" name="book" type="text" class="mt-1 block w-full"
                    placeholder="{{ __('اكتب هنا اسم الكتاب') }}" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('الغاء') }}
                </x-secondary-button>

                <x-button type="button" wire:click="search"
                    class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                    {{ __('بحث...') }}
                </x-button>
            </div>
        </form>
    </x-modal>
</div>
