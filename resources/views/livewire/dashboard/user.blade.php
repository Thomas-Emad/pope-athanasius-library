<div>
    <div>
        <div class="flex justify-between items-center gap-2 mb-8">
            <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
                <i class="fa-solid fa-book-bible me-2"></i>
                <span>المستخدمين</span>
            </h1>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <div>
                    <label for="table-search" class="sr-only">ابحث</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search" wire:model.blur='search'
                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="ابحث عن مستخدم, البريد الالكتروني..">
                    </div>
                </div>
                <div class="me-2">
                    <x-toggle label='الخدام فقط' wire:model.change='showOnlyMain' />
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                الصوره
                            </th>
                            <th scope="col" class="px-6 py-3">
                                اسم المستخدم
                            </th>
                            <th scope="col" class="px-6 py-3">
                                نوع
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                رقم الهاتف
                            </th>
                            <th scope="col" class="px-6 py-3">
                                البريد الالكتروني
                            </th>
                            <th scope="col" class="px-6 py-3">
                                العمر
                            </th>
                            <th scope="col" class="px-6 py-3">
                                تاريخ الانشاء
                            </th>
                            <th scope="col" class="px-6 py-3">
                                المزيد
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr wire:key='word-{{ $user->id }}'
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ $user->photo ? Storage::url($user->photo) : asset('assets/images/logo.png') }}"
                                        class="w-8 h-8 rounded-full" alt="صورة المستخدم"
                                        onerror="this.onerror=null; this.src='{{ asset('assets/images/logo.png') }}';">
                                </td>
                                <th scope="row"
                                    class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ str($user->name)->limit(20) }}
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->getRoleNames()->first() }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->phone ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->brith_day ? round($user->brith_day->diffInYears(now())) : 'N/A' }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $user->created_at->format('Y-m-d') }}
                                </td>
                                <td class="px-6 py-4 flex gap-2 whitespace-nowrap">
                                    <button wire:key="show-{{ $user->id }}"
                                        wire:click="showUser({{ $user->id }})"
                                        class="me-2 text-xl hover:text-blue-600 duration-150">
                                        <i class="fa-solid fa-user"></i>
                                    </button>
                                    <button wire:key="role-{{ $user->id }}"
                                        wire:click="changeRoleUser({{ $user->id }})"
                                        class="me-2 text-xl hover:text-red-600 duration-150">
                                        <i class="fa-solid fa-users-gear"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-2 text-center  italic text-gray-600">
                                    يبدوا انه ليس لدينا هنا اي مستخدم!!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>

    </div>
    <div>
        <x-modal name="change-role" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-users-gear"></i>
                        <span>
                            هل تريد تغيير أذونات هذا المستخدم؟!
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <form wire:submit.prevent='update' class="mt-4">
                    <div class="mt-6">
                        <x-input-label for="username" value="{{ __('اسم المستخدم') }}" class="sr-only" />
                        <x-text-input wire:model="user.username" id="username" type="text" class="mt-1 block w-full"
                            placeholder="{{ __('هنا يسجل اسم المستخدم') }}" disabled="false" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="email" value="{{ __('البريد الالكتروني') }}" class="sr-only" />
                        <x-text-input wire:model="user.email" id="email" type="text" class="mt-1 block w-full"
                            placeholder="{{ __('هنا يُسجَّل البريد الإلكتروني.') }}" disabled="false" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="role" value="{{ __('دور المستخدم') }}" class="sr-only" />
                        <x-select wire:model="user.role" id="role" class="mt-1 block w-full">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }} </option>
                            @endforeach
                        </x-select>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('الغاء') }}
                        </x-secondary-button>

                        <x-button wire:loading.attr="disabled"
                            class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                            <x-loader wire:loading />
                            {{ __('تحديث') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </x-modal>


        <x-modal name="show-user" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <div>
                            <img src="{{ $user->photo ? Storage::url($user->photo) : asset('assets/images/logo.png') }}"
                                class="w-8 h-8 rounded-full" alt="صورة المستخدم"
                                onerror="this.onerror=null; this.src='{{ asset('assets/images/logo.png') }}';">
                        </div> <span>
                            معلومات عن هذا المستخدم
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <form class="mt-4">
                    <div>
                        <div class="mt-3">
                            <span>{{ __('اسم المستخدم') }}</span>
                            <x-text-input wire:model="user.username" id="username" type="text"
                                class="mt-1 block w-full disabled:bg-gray-200"
                                placeholder="{{ __('هنا يُسجَّل اسم المستخدم') }}" disabled="false" />
                        </div>
                        <div class="mt-3">
                            <span>{{ __('البريد الالكتروني') }}</span>
                            <x-text-input wire:model="user.email" id="email" type="text"
                                class="mt-1 block w-full disabled:bg-gray-100"
                                placeholder="{{ __('هنا يُسجَّل البريد الإلكتروني') }}" disabled="false" />
                        </div>
                        <div class="mt-3">
                            <span>{{ __('أذونات المستخدم') }}</span>
                            <x-text-input wire:model="user.role" id="role" type="text"
                                class="mt-1 block w-full disabled:bg-gray-100"
                                placeholder="{{ __('هنا تُحدَّد/تُعيَّن أذونات المستخدم') }}" disabled="false" />
                        </div>
                        <div class="mt-3">
                            <span>{{ __('رقم الهاتف') }}</span>
                            <x-text-input wire:model="user.phone" id="phone" type="text"
                                class="mt-1 block w-full disabled:bg-gray-100"
                                placeholder="{{ __('هنا يسجل رقم الهاتف') }}" disabled="false" />
                        </div>
                        <div class="mt-3">
                            <span>{{ __('تاريخ الميلاد') }}</span>
                            <x-text-input wire:model="user.username" id="username" type="text"
                                class="mt-1 block w-full disabled:bg-gray-200"
                                placeholder="{{ __('هنا يسجل اسم المستخدم') }}" disabled="false" />
                        </div>
                        <div class="mt-3">
                            <span>{{ __('تاريخ انشاء الحساب') }}</span>
                            <x-text-input wire:model="user.created_at" id="created_at" type="text"
                                class="mt-1 block w-full disabled:bg-gray-100"
                                placeholder="{{ __('هنا يسجل تاريخ انشاء الحساب') }}" disabled="false" />
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <x-secondary-button class="w-full" x-on:click="$dispatch('close')">
                            {{ __('الغاء') }}
                        </x-secondary-button>
                    </div>
                </form>
            </div>
        </x-modal>

    </div>
</div>
