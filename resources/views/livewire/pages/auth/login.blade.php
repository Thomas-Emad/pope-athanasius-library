<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\Attributes\Title;

new #[Layout('layouts.guest')] class extends Component {
    #[Title('تسجيل دخول')]
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('home', absolute: false), navigate: true);
    }
}; ?>

<div class="w-[95%] md:w-1/2 mt-6 px-6 py-6 bg-white shadow-md rounded-lg mx-auto">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit.prevent="login" method="POST">
        <a href="/" class="block" wire:navigate>
            <img src="{{ asset('assets/images/logo.png') }}" class="mx-auto w-24" alt="logo">
        </a>
        <h1 class="text-4xl text-center my-2">تسجيل دخول</h1>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('البريد الإلكتروني')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('كلمة المرور')" />

            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password"
                name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <div>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}" wire:navigate>
                    {{ __('نسيت كلمة المرور?') }}
                </a>
            @endif

            <x-button type="submit" wire:loading.attr="disabled"
                class="justify-center py-4 mt-4 text-center text-sm w-full bg-brown-max hover:bg-brown-lite duration-200">
                <x-loader wire:loading />
                {{ __('تسجيل دخول') }}
            </x-button>
        </div>

        <hr class="block w-2/3 mx-auto my-4">

        <p class="text-center">
            <span>
                ليس لديك حساب؟
            </span>
            <a href="{{ route('register') }}" wire:navigate class="text-brown-max">
                إنشاء حساب
            </a>
        </p>
    </form>
</div>
