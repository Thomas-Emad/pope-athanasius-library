<div>
    <div class="container max-w-full mt-6 px-6 text-gray-800">
        <h1 class="text-4xl text-center">المنشورات</h1>

        @can(App\Enums\PermissionEnum::POSTS->value)
            <div class="bg-white py-2 px-4 rounded-lg shadow flex justify-between items-center my-4">
                <span class="text-lg">إضافة منشور جديد</span>
                <x-button wire:loading.attr="disabled" x-on:click="$dispatch('open-modal', 'create-post')"
                    class="ms-3 bg-brown-max hover:ring-brown-max">
                    <x-loader wire:loading wire:target="save" />
                    {{ __('إضافة') }}
                </x-button>
            </div>
        @endcan
        <hr class="block w-[95%] mx-auto my-4">
        <div class="flex flex-col gap-4 mb-4">
            @forelse ($posts as $item)
                <div class="bg-white py-2 px-4 rounded-lg shadow " wire:key="post-{{ $item->id }}">
                    <div class="flex justify-between items-center gap-4">
                        <div class="flex justify-between items-center gap-4">
                            <img class="w-10 h-10 rounded-full "
                                src="{{ $item->user->photo ? Storage::url($item->user->photo) : asset('assets/images/logo.png') }}"
                                alt="صورة المستخدم"
                                onerror="this.onerror=null; this.src='{{ asset('assets/images/logo.png') }}';">
                            <div>
                                <h3 class="text-lg ">{{ $item->user->name }}</h3>
                                <span class="text-sm"> {{ $item->created_at->format('Y-m-d H:i') }} </span>
                            </div>
                        </div>
                        @can(App\Enums\PermissionEnum::POSTS->value)
                            <div>
                                <i wire:click='deletePost({{ $item->id }})'
                                    class="cursor-pointer fa-solid fa-trash-can me-2 text-gray-700 hover:text-red-700 duration-200"></i>
                                <i wire:click='markup({{ $item->id }})' @class([
                                    'cursor-pointer fa-solid fa-bookmark  duration-200',
                                    'text-green-700 hover:text-red-700' => $item->markup,
                                    'text-gray-800 hover:text-green-700' => !$item->markup,
                                ])></i>
                            </div>
                        @endcan
                        @cannot(App\Enums\PermissionEnum::POSTS->value)
                            <i x-show="{{ $item->markup }}"
                                class="cursor-pointer fa-solid fa-bookmark  duration-200 text-green-700"></i>
                        @endcannot
                    </div>
                    <hr class="block w-[95%] mx-auto my-4 bg-gray-700">
                    <h2 class="font-bold mb-2 text-lg">{{ $item->title }}</h2>
                    @if ($item->photo)
                        <img src="{{ Storage::url($item->photo) }}" class="max-w-full mx-auto my-4" alt="صورة الغلاف">
                    @endif
                    @if ($item->content)
                        <div class="p-2 border border-gray-200 rounded-lg overflow-y-auto max-h-52 ">
                            {{ $item->content }}
                        </div>
                    @endif

                </div>
            @empty
                <p class="text-gray-600 text-center italic my-4">ليس لدينا هنا أي منشور، عد لاحقًا..</p>
            @endforelse
        </div>
        @if ($posts->total() > 10)
            <div class="bg-white py-2 px-4 rounded-lg shadow my-6">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
    <div>

        <livewire:dashboard.modals.add-post />
        <x-modal name="delete-post" focusable>
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900 flex gap-1 items-center">
                        <i class="fa-solid fa-newspaper"></i>
                        <span>
                            هل أنت متأكد من حذف هذا المنشور؟!
                        </span>
                    </h2>
                    <i class="fa-solid fa-x hover:text-red-600 duration-150 cursor-pointer text-sm"
                        x-on:click="$dispatch('close')"></i>
                </div>
                <form wire:submit='delete' class="mt-4">
                    <p class="text-gray-700">هذا الإجراء نهائي، ولن يمكنك استرجاع هذا المنشور لاحقًا!!</p>
                    <x-text-input wire:model="post.title" name="post-title-delete" disabled='true'
                        class="mt-4 w-full" />

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('إلغاء') }}
                        </x-secondary-button>

                        <x-button wire:loading.attr="disabled" wire:click='delete'
                            class="ms-3 bg-red-700 hover:bg-red-800 active:bg-brown-max focus:ring-brown-max">
                            <x-loader wire:loading />
                            {{ __('حذف') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </x-modal>
    </div>
</div>
