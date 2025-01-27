<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\Attributes\Title;

new #[Layout('layouts.guest')] class extends Component {
    #[Title('نسيت كلمة المرور')]
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate(
            [
                'email' => ['required', 'string', 'email'],
            ],
            [],
            [
                'email' => 'البريد الإلكتروني',
            ],
        );

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink($this->only('email'));

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<div class="w-[95%] md:w-1/2 mt-6 px-6 py-6 bg-white shadow-md rounded-lg mx-auto">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink">
        <a href="/" class="block" wire:navigate>
            <img src="{{ asset('assets/images/logo.png') }}" class="mx-auto w-24" alt="logo">
        </a>
        <h1 class="text-4xl text-center my-2">هل نسيت كلمة المرور؟!</h1>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('البريد الإلكتروني')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-button wire:loading.attr="disabled"
                class="justify-center py-4 mt-4 text-center text-sm w-full bg-brown-max hover:bg-brown-lite duration-200">
                <x-loader wire:loading />
                {{ __('تعيين كلمة مرور جديدة') }}
            </x-button>
        </div>

        <hr class="block w-2/3 mx-auto my-4">

        <p class="text-center">
            <span>
                هل تريد تسجيل دخولك؟
            </span>
            <a href="{{ route('login') }}" wire:navigate class="text-brown-max">
                هنا
            </a>
        </p>
    </form>
</div>
