@props([
    'id' => '',
    'nameProperty' => 'title',
    'options' => [],
    'property' => 'title',
    'placeholder' => 'Select an option',
    'searchPlaceholder' => 'ابحث هنا...',
    'noOptionsText' => 'No options available',
    'nameEvent' => '',
    'buttonClass' =>
        'relative cursor-pointer bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-border-brown-max focus:border-brown-max block w-full p-2.5',
    'optionClass' => 'cursor-pointer select-none py-2 pl-3 pr-9 hover:bg-gray-100 hover:text-gray-800',
    'selectedOptionClass' => 'bg-sky-600 text-white',
])
<div class="w-full" :key="$id" x-data="dropdown({
    options: @js($options),
    selectedId: @entangle($property),
    nameProperty: '{{ $nameProperty }}',
    placeholder: '{{ $placeholder }}',
    nameEvent: '{{ $nameEvent }}',
    property: '{{ $property }}'
})" @click.away="open = false; search = ''">
    <div class="relative">
        <!-- Dropdown Button -->
        <button @click="open = !open" type="button" :class="['{{ $buttonClass }}']" aria-haspopup="listbox"
            :aria-expanded="open">
            <span class="block truncate" x-ref="placeholder"
                x-text="selectedOption ? selectedOption[nameProperty] : placeholder"></span>
            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                <!-- Dropdown Icon -->
                <svg class="h-5 w-5 text-gray-800" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button>

        <!-- Dropdown Options -->
        <div x-show="open" x-cloak x-transition.opacity
            class="absolute z-50 mt-1 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg" role="listbox">
            <!-- Search Input -->
            <input type="text" x-model="search" placeholder="{{ $searchPlaceholder }}" id="{{ $id }}"
                class="block w-full border-0 border-b border-gray-300 bg-white pb-2 pl-3 text-right focus:ring-0"
                aria-label="Search options">

            <!-- No Options Message -->
            <template x-if="filteredOptions.length === 0">
                <div class="py-2 pl-3 text-gray-500" role="option">
                    {{ $noOptionsText }}
                </div>
            </template>

            <ul x-ref="options" class="max-h-60 overflow-auto" role="listbox">
                <template x-for="option in filteredOptions" :key="option.id">
                    <li @click="selectOption(option.id)"
                        :class="[
                            'cursor-pointer select-none py-2 pl-3 pr-9 hover:bg-gray-100 hover:text-gray-800',
                            selectedOption && selectedOption.id === option.id ? 'bg-sky-600 text-white' : ''
                        ]"
                        role="option">
                        <span x-text="option[nameProperty]" class="font-normal block truncate"></span>
                    </li>
                </template>
            </ul>

        </div>
    </div>
</div>

<script>
    function dropdown(config) {
        return {
            open: false,
            search: '',
            selectedId: config.selectedId,
            options: Array.isArray(config.options) ? config.options : [],
            nameProperty: config.nameProperty,
            placeholder: config.placeholder,
            get filteredOptions() {
                return this.search.trim() ?
                    this.options.filter(option =>
                        option[this.nameProperty].toLowerCase().includes(this.search.toLowerCase())
                    ) :
                    this.options;
            },
            get selectedOption() {
                return this.options.find(option => option.id == this.selectedId) || null;
            },
            selectOption(id) {
                this.open = false;
                this.selectedId = id;
                this.search = '';
            },
            init() {
                this.$watch('options', (newOptions) => {
                    this.options = Array.isArray(newOptions) ? newOptions : [];
                });

                if (config.nameEvent) {
                    Livewire.on(config.nameEvent, (options) => {
                        this.options = options[0];
                        console.log(options[0])
                    });
                }
            }
        };
    }
</script>
