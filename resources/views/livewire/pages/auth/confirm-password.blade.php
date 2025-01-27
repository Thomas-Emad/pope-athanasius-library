<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    #[Title('تاكيد كلمة المرور')]
    public string $password = '';

    /**
     * Confirm the current user's password.
     */
    public function confirmPassword(): void
    {
        $this->validate(
            [
                'password' => ['required', 'string'],
            ],
            [],
            [
                'password' => 'كلمة المرور',
            ],
        );

        if (
            !Auth::guard('web')->validate([
                'email' => Auth::user()->email,
                'password' => $this->password,
            ])
        ) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        session(['auth.password_confirmed_at' => time()]);

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('هذه منطقة آمنة للتطبيق. يرجى تأكيد كلمة المرور الخاصة بك قبل الاستمرار.') }}
    </div>

    <form wire:submit="confirmPassword">
        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('كلمة المرور')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-button wire:loading.attr="disabled"
                class="justify-center py-4 mt-4 text-center text-sm w-full bg-brown-max hover:bg-brown-lite duration-200">
                <x-loader wire:loading />
                {{ __('تاكيد') }}
            </x-button>
        </div>
    </form>
</div>
