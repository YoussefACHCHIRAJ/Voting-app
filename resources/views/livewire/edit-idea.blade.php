<div x-cloak x-data="{ isOpen: false }" x-init="@this.on('ideaWasUpdated', () => isOpen = false)" @showing-edit-idea-modal.window="isOpen=true" x-show="isOpen"
    @keydown.escape.window="isOpen=false" class="relative z-10" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div x-transition x-show.transition.opacity="isOpen"
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed bottom-0  z-10 w-screen overflow-y-auto">
        <div class="min-h-full ">
            <div x-transition x-show.transition.origin.bottom.delay.350ms="isOpen"
                class="modal relative transform overflow-hidden rounded-tl-xl rounded-tr-xl bg-white transition-all py-4 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="absolute top-0 right-0 pt-4 pr-4">
                        <button @click='isOpen = false' class="text-gray-400 hover:text-gray-500">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>

                        </button>
                    </div>
                    <h3 class="text-center text-lg font-medium text-gray-900">Edit Idea</h3>
                    <p class="text-xs text-center mt-4 text-gray-500">You have one hour to edit your idea from the time
                        you created it</p>
                    <form wire:submit.prevent="editIdea" action="#" method="POST" class="space-y-4 px-4 py-6">
                        <div>
                            <input type="text" wire:model="title"
                                class="w-full bg-gray-100 text-sm rounded-xl placeholder:text-gray-900 px-4 py-2 border-none"
                                placeholder="Your Idea">
                            @error('title')
                                <p class="text-red text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <select wire:model="category" name="category_add" id="category_add"
                                class="w-full bg-gray-100 text-sm rounded-xl px-4 py-2 border-none">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-red text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <textarea wire:model="description" name="idea" id="idea" cols="30" rows="4"
                                class="w-full bg-gray-100 rounded-xl placeholder:text-gray-900 text-sm px-4 py-2 border-none"
                                placeholder="Describe your idea"></textarea>
                            @error('description')
                                <p class="text-red text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between space-x-3">
                            <button type="button"
                                class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border borde-gray-100 hover:border-gray-400 transition duration-150 px-6 py-3 ease-in">
                                <svg class="text-gray-600 w-4 -rotate-45" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>

                                <span class="ml-1">Attach</span>
                            </button>
                            <button type="submit"
                                class="w-1/2 h-11 text-xs text-white bg-blue font-semibold rounded-xl border bordeblue hover:bg-blue-hover transition duration-150 px-6 py-3 ease-in">
                                <span class="ml-1">Submit</span>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
