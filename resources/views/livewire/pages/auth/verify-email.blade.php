<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    /**
     * Send an email verification notification to the user.
     */
    #[Title('تأكيد الحساب أولاً')]
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);

            return;
        }

        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="w-[95%] md:w-1/2 mt-6 px-6 py-6 bg-white shadow-md rounded-lg mx-auto">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="resetPassword">
        <a href="/" class="block" wire:navigate>
            <img src="{{ asset('assets/images/logo.png') }}" class="mx-auto w-24" alt="logo">
        </a>

        <div>
            <h1 class="text-4xl text-center my-2">يجب عليك تأكيد بريدك الإلكتروني أولاً</h1>
            <p class="text-center">هذا الإجراء مهم جدًا حتى تتمكن من متابعة تصفحك لمكتبة البابا أثناسيوس للاطلاع</p>

        </div>

        <div>
            <x-button wire:click="sendVerification" wire:loading.attr="disabled"
                class="py-4 mt-4 text-center text-sm w-full bg-brown-max hover:bg-brown-lite duration-200">
                <x-loader wire:loading wire:target="sendVerification" />
                {{ __('إعادة إرسال الرسالة') }}
            </x-button>
            <x-button wire:click="logout" wire:loading.attr="disabled"
                class="py-4 mt-4 text-center text-sm w-full bg-red-700 hover:bg-red-800 duration-200">
                <x-loader wire:loading wire:target="logout" />
                {{ __('تسجيل خروج') }}
            </x-button>
        </div>
    </form>
</div>
