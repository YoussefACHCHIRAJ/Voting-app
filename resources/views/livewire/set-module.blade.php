<div class="relative" x-data="{ isOpen: false }" x-init="Livewire.on('moduleWasUpdated', () => isOpen = false)">
    <button type="button" @click="isOpen = !isOpen"
        class="mt-3 md:mt-0 flex items-center justify-center w-full md:w-44 h-11 text-sm bg-gray-200 font-semibold rounded-xl border borde-gray-100 hover:border-gray-400 transition duration-150 px-6 py-3 ease-in">
        <span>Set Module</span>
        <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
    </button>
    <div x-show="isOpen" x-cloak @click.away="isOpen = false"
        class="absolute z-10 w-64 md:w-76 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
        <form wire:submit.prevent="setModule" action="#" class="space-y-4 px-4 py-6">
            <div class="space-y-2">
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="module" type="radio" checked=""
                            class="bg-gray-200 text-yellow border-none" name="radio-direct" value="1">
                        <span class="ml-2">database</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="module" type="radio" class=" bg-gray-200 text-purple border-none"
                            name="radio-direct" value="2">
                        <span class="ml-2">java oop</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="module" type="radio" class=" bg-gray-200 text-red border-none"
                            name="radio-direct" value="3">
                        <span class="ml-2">web</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="module" type="radio" class=" bg-gray-200 text-green border-none"
                            name="radio-direct" value="4">
                        <span class="ml-2">script bash</span>
                    </label>
                </div>

            </div>
            <div class="flex items-center gap-3">
                <button type="button"
                    class="flex items-center justify-center w-32 h-11 text-xs bg-gray-200 font-semibold rounded-xl border borde-gray-100 hover:border-gray-400 transition duration-150 px-6 py-3 ease-in">
                    <svg class="text-gray-600 w-4 -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                    </svg>

                    <span class="ml-1">Attach</span>
                </button>
                <button type="submit"
                    class="w-1/2 h-11 text-sm text-white bg-blue font-semibold rounded-xl border bordeblue hover:bg-blue-hover transition duration-150 px-6 py-3 ease-in">
                    <span>Update</span>
                </button>
            </div>
        </form>
    </div>
</div>
