<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Traits\RemoveTempFilesTrait;

new class extends Component {
    use WithFileUploads, RemoveTempFilesTrait;
    public $id,
        $name = '',
        $phone = '',
        $brith_day = '',
        $email = '',
        $photo,
        $oldPhoto;
    public bool $allowEdit = true;

    /**
     * Mount the component.
     */
    public function mount($id = null): void
    {
        $user = $id ? User::where('id', $id)->firstOrFail() : Auth::user();
        $this->setAttributes($user);
        $this->cleanTempFiles();
        $this->allowEdit();
    }

    private function setAttributes($user)
    {
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone ?? '';
        $this->oldPhoto = $user->photo ?? '';
        $this->brith_day = !is_null($user->brith_day) ? $user->brith_day?->format('Y-m-d') ?? '' : null;
    }

    private function allowEdit()
    {
        $this->allowEdit = Auth::check() && Auth::user()->id == $this->id;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        // Validate input
        $validated = $this->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
                'phone' => ['required', 'string', 'regex:/^\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/'],
                'photo' => ['nullable', 'image', 'max:3072'],
                'brith_day' => ['nullable', 'date'],
            ],
            [],
            [
                'name' => 'الاسم',
                'email' => 'البريد الإلكتروني',
                'phone' => 'رقم الهاتف',
                'photo' => 'صورتك الشخصية',
                'brith_day' => 'تاريخ ميلادك',
            ],
        );
        // Handle photo upload
        $photoPath = $this->oldPhoto;
        if ($this->photo) {
            if ($this->oldPhoto && Storage::disk('public')->exists($this->oldPhoto)) {
                Storage::disk('public')->delete($this->oldPhoto);
            }
            $photoPath = $this->photo->store('users', 'public');
        }

        // Update user details
        $user->fill([
            'name' => $this->name,
            'email' => strtolower($this->email),
            'phone' => $this->phone,
            'photo' => $photoPath,
            'brith_day' => $this->brith_day ?? null,
        ]);

        // Reset email verification if email has changed
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header class="flex">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('الملف الشخصي') }}
        </h2>
    </header>
    <form wire:submit="updateProfileInformation" class="space-y-6">
        <div class="flex justify-around">
            <div>
                <input type="file" id="photo" wire:model="photo" accept="image/png,image/jpg,image/jpeg"
                    :disabled="{{ !$allowEdit }}" hidden>
                <label for="photo"
                    class="flex items-center justify-center w-24 h-24 rounded-full bg-gray-100 border-2 border-gray-700/20 border-dashed cursor-pointer hover:opacity-50 duration-150">
                    @if ($photo && !is_string($photo))
                        <img src="{{ $photo->temporaryUrl() }}" class="w-full h-full rounded-full" alt="صورة المستخدم">
                    @elseif($oldPhoto && !is_null($oldPhoto))
                        <img src="{{ Storage::url($oldPhoto) }}" class="w-full h-full rounded-full" alt="صورة المستخدم">
                    @else
                        <i class="fa-solid fa-user text-2xl text-gray-400"></i>
                    @endif
                </label>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="w-full">
                <x-input-label for="name" :value="__('الاسم')" />
                <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full"
                    required autofocus autocomplete="name" disabled="{{ !$allowEdit }}" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class="w-full">
                <x-input-label for="email" :value="__('البريد الإلكتروني')" />
                <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full"
                    required autocomplete="username" disabled="{{ !$allowEdit }}" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('يجب تفعيل البريد الإلكتروني الحالي أولاً...') }}

                            <button wire:click.prevent="sendVerification"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('اضغط هنا لإعادة إرسال رسالة إلى البريد الإلكتروني.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('لقد تم إرسال الرسالة إليك بنجاح.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-4">
            <div class="w-full">
                <x-input-label for="phone" :value="__('رقم الهاتف')" />
                <x-text-input wire:model="phone" id="phone" name="phone" type="text" class="mt-1 block w-full"
                    autofocus autocomplete="phone" disabled="{{ !$allowEdit }}" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>
            <div class="w-full">
                <x-input-label for="brith_day" :value="__('تاريخ ميلادك')" />
                <x-text-input wire:model="brith_day" id="brith_day" name="brith_day" type="date"
                    class="mt-1 block w-full" min="1950-01-01" max="2025-01-01" disabled="{{ !$allowEdit }}" />
                <x-input-error class="mt-2" :messages="$errors->get('brith_day')" />
            </div>
        </div>
        @if ($allowEdit)
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('حفظ') }}</x-primary-button>

                <x-action-message class="me-3" on="profile-updated">
                    {{ __('تم الحفظ.') }}
                </x-action-message>
            </div>
        @endif
    </form>
</section>
