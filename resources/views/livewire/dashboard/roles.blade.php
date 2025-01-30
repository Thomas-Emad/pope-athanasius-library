<div>
    <div>
        <div class="flex justify-between items-center gap-2 mb-8">
            <h1 class="font-bold text-2xl pb-2 border-b-4 border-b-brown-max">
                <i class="fa-solid fa-book-bible me-2"></i>
                <span>الاذونات</span>
            </h1>
            <div>
                <button x-on:click="type = 'add'" x-on:click.prevent="$dispatch('open-modal', 'add-role')"
                    class="text-white font-bold bg-brown-max py-2 px-4 rounded-lg hover:bg-brown-lite duration-200">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                اسم الدور
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                عدد الصلاحيات
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                عدد المستخدمين
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                تاريخ الانشاء
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                المزيد
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr wire:key='role-{{ $role->id }}'
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ str($role->name)->limit(20) }}
                                </td>
                                <th scope="row"
                                    class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $role->permissions_count }}
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $role->users_count }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $role->created_at->format('Y-m-d') }}
                                </td>
                                <td class="px-6 py-4 flex gap-2 whitespace-nowrap">
                                    <button wire:click="edit({{ $role->id }})"
                                        class="me-2 text-xl hover:text-amber-600 duration-150">
                                        <i class="fa-solid fa-edit"></i>
                                    </button>
                                    @if ($role->id > 3)
                                        <button wire:click="getForDelete({{ $role->id }})"
                                            class="me-2 text-xl hover:text-red-600 duration-150">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-2 text-center  italic text-gray-600">
                                    يبدوا انه ليس لدينا هنا اي دور!!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $roles->links() }}
            </div>
        </div>

    </div>
    <div>
        <x-modal name="add-role" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-users-gear"></i>
                        <span>
                            هل تريد انشاء دور جديد؟!
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <form wire:submit.prevent='save' class="mt-4">
                    <div class="mt-6">
                        <x-input-label for="name" value="{{ __('اسم الدور') }}" class="sr-only" />
                        <x-text-input wire:model="store.name" id="name" type="text" class="mt-1 block w-full"
                            placeholder="{{ __('هل يمكنك كتابه اسم الدور') }}" />
                        <x-input-error :messages="$errors->get('store.name')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        @foreach ($permissions as $per)
                            <div class="inline-block mx-4">
                                <x-toggle id="permission-{{ $per->id }}" wire:model="store.permissions"
                                    value="{{ $per->id }}" label="{{ $per->name }}" />
                            </div>
                        @endforeach
                        <x-input-error :messages="$errors->get('store.permissions')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('الغاء') }}
                        </x-secondary-button>

                        <x-button wire:loading.attr="disabled"
                            class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                            <x-loader wire:loading />
                            {{ __('أضافه') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </x-modal>
        <x-modal name="edit-role" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-users-gear"></i>
                        <span>
                            ماذا تريد تحديثه هنا؟
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <form wire:submit.prevent='updateForm' class="mt-4">
                    <div class="mt-6">
                        <x-input-label for="edit-name" value="{{ __('اسم الدور') }}" class="sr-only" />
                        <x-text-input wire:model="update.name" id="edit-name" type="text" class="mt-1 block w-full"
                            placeholder="{{ __('هل يمكنك كتابه اسم الدور') }}" />
                        <x-input-error :messages="$errors->get('update.name')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        @foreach ($permissions as $per)
                            <div class="inline-block mx-4">
                                <x-toggle id="update-permission-{{ $per->id }}" wire:model="update.permissions"
                                    value="{{ $per->id }}" label="{{ $per->name }}" />
                            </div>
                        @endforeach
                        <x-input-error :messages="$errors->get('update.permissions')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('الغاء') }}
                        </x-secondary-button>

                        <x-button type="submit"
                            class="ms-3 bg-brown-lite hover:bg-brown-max active:bg-brown-max focus:ring-brown-max">
                            <x-loader wire:loading />
                            {{ __('تحديث') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </x-modal>
        <x-modal name="delete-role">
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-trash"></i>
                        <span>
                            هل انت متاكد؟! تريد حذف هذا الدور؟!
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <form wire:submit.prevent='delete' class="mt-4">
                    <div class="my-4">
                        <x-text-input wire:model="update.name" name="delete-role" disabled="true" class="w-full" />
                    </div>
                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('الغاء') }}
                        </x-secondary-button>

                        <x-button type="submit"
                            class="ms-3 bg-red-700 hover:bg-red-800 active:bg-red-800 focus:ring-red-800">
                            <x-loader wire:loading />
                            {{ __('حذف نهائي') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </x-modal>
    </div>
</div>
