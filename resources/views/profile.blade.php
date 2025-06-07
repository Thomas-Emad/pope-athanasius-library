@section('title', 'الملف الشخصي')
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <livewire:profile.update-profile-information-form :id="request()->route('id')" />
                </div>
            </div>
            @if (Auth::check())
                @if (
                    (request()->route('id') && Auth::user()->id == request()->route('id')) ||
                        !request()->route('id') ||
                        Auth::user()->hasPermissionTo(App\Enums\PermissionEnum::UPDATE_PASSWORD->value))
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="w-full">
                            <livewire:profile.update-password-form />
                        </div>
                    </div>
                    <hr>
                @endif
                @if ($hasPermissionBook)
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="w-full">
                            <livewire:profile.books-list-component :id="request()->route('id') ?? null" />
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-app-layout>
