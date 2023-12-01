<div class="relative w-full" x-data="{ isOpen: false }" x-init="Livewire.on('commentWasAdded', () => {
    isOpen = false;
    Livewire.hook('morph.added', ({ el }) => {
        const lastComment = document.querySelector('.comment-container:last-child');
        lastComment.scrollIntoView({ behavior: 'smooth' });
        lastComment.classList.remove('bg-white');
        lastComment.classList.add('bg-sky-300');
        setTimeout(() => {
            lastComment.classList.add('bg-white');
            lastComment.classList.remove('bg-sky-300');
        }, 5000);
})


})">
    <button @click="
            isOpen = !isOpen
            $nextTick(() => $refs.comment.focus())
        "
        type="button"
        class="w-full md:w-32 h-11 text-sm text-white bg-blue font-semibold rounded-xl border bordeblue hover:bg-blue-hover transition duration-150 px-6 py-3 ease-in">
        <span class="ml-1">Reply</span>
    </button>
    <div x-show="isOpen" x-cloak @click.away="isOpen = false"
        class="absolute z-10 w-64 md:w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
        @auth
            <form wire:submit.prevent="addComment" action="#" class="space-y-4 px-4 py-6">
                <div>
                    <textarea x-ref="comment" wire:model="body" name="post_comment" id="post_comment" cols="30" rows="4"
                        class="w-full text-sm bg-gray-100 rounded-xl placeholder:text-gray-900 border-none px-4 py-2"
                        placeholder="Go ahead, don't be shy. Share your thoughts...">{{ $body }}</textarea>
                    @error('body')
                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col md:flex-row items-center gap-3">
                    <button type="submit"
                        class="w-full md:w-1/2 h-11 text-sm text-white bg-blue font-semibold rounded-xl border bordeblue hover:bg-blue-hover transition duration-150 px-6 py-3 ease-in">
                        <span>Post Comment</span>
                    </button>
                    <button type="button"
                        class="flex items-center justify-center w-full md:w-32 h-11 text-xs bg-gray-200 font-semibold rounded-xl border borde-gray-100 hover:border-gray-400 transition duration-150 px-6 py-3 ease-in">
                        <svg class="text-gray-600 w-4 -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                        </svg>

                        <span class="ml-1">Attach</span>
                    </button>
                </div>
            </form>
        @else
            <div class="flex flex-col items-center justify-center gap-3 mx-3 px-3 py-6 mt-2 md:mt-0">
                <p class="font-normal">Pleaze login or create an account to post a comment</p>
                <a href="{{ route('login') }}"
                    class="w-full h-11 text-xs text-white bg-blue text-center font-semibold rounded-xl border bordeblue hover:bg-blue-hover transition duration-150 px-6 py-3 ease-in">Log
                    in</a>
                <a href="{{ route('register') }}"
                    class="flex items-center justify-center w-full h-11 text-xs bg-gray-200 font-semibold rounded-xl border borde-gray-100 hover:border-gray-400 transition duration-150 px-6 py-3 ease-in">

                    Sign up
                </a>

            </div>
        @endauth
    </div>
</div>
