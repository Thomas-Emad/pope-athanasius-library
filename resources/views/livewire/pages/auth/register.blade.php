<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $phone = '';

    /**
     * Handle an incoming registration request.
     */

    #[Title('أنشاء حساب')]
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string'],
        ]);
        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('home', absolute: false), navigate: true);
    }
}; ?>



<div class="w-[95%] md:w-1/2 mt-6 px-6 py-6 bg-white shadow-md rounded-lg mx-auto">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="register">
        <a href="/" class="block" wire:navigate>
            <img src="{{ asset('assets/images/logo.png') }}" class="mx-auto w-24" alt="logo">
        </a>
        <h1 class="text-4xl text-center my-2">أنشاء حساب</h1>

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('الاسم')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('البريد الالكتروني')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>



        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('رقم الهاتف')" />
            <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="text" name="phone"
                required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('كلمة المرور')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('تاكيد كلمة المرور')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <x-button class="py-4 mt-4 text-center text-sm w-full bg-brown-max hover:bg-brown-lite duration-200">
                {{ __('أنشاء حساب') }}
            </x-button>
        </div>

        <hr class="block w-2/3 mx-auto my-4">

        <p class="text-center">
            <span>
                ليس لديك حساب؟
            </span>
            <a href="{{ route('login') }}" wire:navigate class="text-brown-max">
                انشاء حساب
            </a>
        </p>
    </form>
</div>
