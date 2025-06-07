<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;
use Illuminate\Validation\Rule;

new class extends Component {
    public bool $requiredCurrentPassword = true;
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function rules(): array
    {
        return [
            'current_password' => [
                Rule::requiredIf(function () {
                    return $this->requiredCurrentPassword;
                }),
                'string',
                'current_password',
            ],
            'password' => ['required', 'string', Password::defaults(), 'confirmed'],
        ];
    }

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate(
                $this->rules(),
                [],
                [
                    'current_password' => 'كلمة المرور الحالية',
                    'password' => 'كلمة المرور الجديدة',
                ],
            );
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }

    public function mount(): void
    {
        $this->requiredCurrentPassword = Auth::check() && (!request()->route('id') || request()->route('id') == Auth::user()->id);
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('تحديث كلمة السر') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('تأكد جيدًا أن كلمة المرور قوية وسرية.') }}
        </p>
    </header>

    <form wire:submit="updatePassword" class="mt-6 space-y-6">
        @if ($this->requiredCurrentPassword)
            <div>
                <x-input-label for="update_password_current_password" :value="__('كلمة المرور الحالية')" />
                <x-text-input wire:model="current_password" id="update_password_current_password" name="current_password"
                    type="password" class="mt-1 block w-full" autocomplete="current-password" />
                <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
            </div>
        @endif

        <div class="flex items-center justify-between flex-col md:flex-row gap-4">
            <div class="w-full">
                <x-input-label for="update_password_password" :value="__('كلمة المرور الجديدة')" />
                <x-text-input wire:model="password" id="update_password_password" name="password" type="password"
                    class="mt-1 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="w-full">
                <x-input-label for="update_password_password_confirmation" :value="__('تأكيد كلمة المرور')" />
                <x-text-input wire:model="password_confirmation" id="update_password_password_confirmation"
                    name="password_confirmation" type="password" class="mt-1 block w-full"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('حفظ') }}</x-primary-button>

            <x-action-message class="me-3" on="password-updated">
                {{ __('تم الحفظ.') }}
            </x-action-message>
        </div>
    </form>
</section>
