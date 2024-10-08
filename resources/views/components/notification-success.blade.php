<div x-data="{
    isOpen: false,
    successMessage: '',
    showNotification(message) {
        isOpen = true;
        successMessage = message;
        setTimeout(() => isOpen = false, 5000)
    }
}" x-init="
Livewire.on('ideaWasUpdated', message => showNotification(message))
Livewire.on('ideaWasMarkedAsSpam', message => showNotification(message))
Livewire.on('statusWasUpdated', message => showNotification(message))
Livewire.on('commentWasAdded', message => showNotification(message))
Livewire.on('commentWasDeleted', message => showNotification(message))
Livewire.on('commentWasUpdated', message => showNotification(message))" x-cloak @keydown.escape.window="isOpen=false"
    x-show="isOpen" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-x-8"
    x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 transform translate-x-0"
    x-transition:leave-end="opacity-0 transform translate-x-8"
    class="flex justify-between max-w-xs sm:max-w-sm w-full gap-3 fixed bottom-4 right-4 bg-white rounded-xl shadow-lg border px-6 py-5 mx-4 sm:mx-6 my-8 z-10">
    <div class="flex gap-2">
        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <p class="font-semibold text-gray-500 text-xs sm:text-base" x-text="successMessage"></p>
    </div>
    <button class="text-gray-400 hover:text-gray-500" @click="isOpen=false">
        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
