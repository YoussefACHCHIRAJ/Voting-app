<div>
    <div class="idea-container mt-4 bg-white rounded-xl flex">
        <div class="flex flex-1 flex-col md:flex-row px-4 py-6">
            <div class="flex-none mx-2">
                <a href="#">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="mx-2  w-full">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">{{ $idea->title }}</a>
                </h4>
                <div class="text-gray-600 mt-3">
                    {{ $idea->description }}
                </div>
                <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                    <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                        <div class="hidden md:block font-bold text-gray-900">{{ $idea->user->name }}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 comments</div>
                    </div>
                    <div x-data="{ isOpen: false }" class="flex items-center space-x-2 mt-3">
                        <div
                            class="{{ $idea->status->getStyle() }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            {{ $idea->status->name }}
                        </div>
                        <button @click="isOpen = !isOpen"
                            class="relative border bg-gray-100 hover:bg-gray-200 rounded-full h-7  px-3 flex justify-center transition duration-150">
                            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                stroke="currentColor" className="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                            <ul x-show="isOpen" x-cloak @click.away="isOpen = false"
                                class="absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8 top-8 -left-20 z-10 md:left-0 -right-40">
                                <li><a href="#"
                                        class="hover:bg-gray-100 block px-5 py-3 transition duration-150">Mark as
                                        spam</a></li>
                                <li><a href="#"
                                        class="hover:bg-gray-100 block px-5 py-3 transition duration-150">Delete
                                        post</a></li>
                            </ul>
                        </button>
                    </div>
                    <div class="flex md:hidden items-center mt-4 md:mt-0">
                        <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                            <div
                                class="text-sm font-bold leading-none @if ($hasVoted) text-blue @endif">
                                {{ $votesCount }}
                            </div>
                            <div class="text-xxs font-semibold leading-none text-gray-400">Voting</div>
                        </div>
                        @if ($hasVoted)
                            <button wire:click.prevent="vote"
                                class="w-20 bg-blue border border-blue text-white hover:bg-blue-hover transition duration-150 font-bold text-xxs uppercase rounded-xl px-4 py-3">
                                voted
                            </button>
                        @else
                            <button wire:click.prevent="vote"
                                class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 transition duration-150 font-bold text-xxs uppercase rounded-xl px-4 py-3">
                                vote
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end idea container -->
    <div class="flex items-center justify-between mt-6">
        <div class="flex flex-col md:flex-row items-center gap-x-4 ml-6">
            <div class="relative w-full" x-data="{ isOpen: false }">
                <button type="submit" @click="isOpen = !isOpen"
                    class="w-full md:w-32 h-11 text-sm text-white bg-blue font-semibold rounded-xl border bordeblue hover:bg-blue-hover transition duration-150 px-6 py-3 ease-in">
                    <span class="ml-1">Reply</span>
                </button>
                <div x-show="isOpen" x-cloak @click.away="isOpen = false"
                    class="absolute z-10 w-64 md:w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
                    <form action="#" class="space-y-4 px-4 py-6">
                        <div>
                            <textarea name="post_comment" id="post_comment" cols="30" rows="4"
                                class="w-full text-sm bg-gray-100 rounded-xl placeholder:text-gray-900 border-none px-4 py-2"
                                placeholder="Go ahead, don't be shy. Share your thoughts..."></textarea>
                        </div>
                        <div class="flex flex-col md:flex-row items-center gap-3">
                            <button type="submit"
                                class="w-full md:w-1/2 h-11 text-sm text-white bg-blue font-semibold rounded-xl border bordeblue hover:bg-blue-hover transition duration-150 px-6 py-3 ease-in">
                                <span>Post Comment</span>
                            </button>
                            <button type="button"
                                class="flex items-center justify-center w-full md:w-32 h-11 text-xs bg-gray-200 font-semibold rounded-xl border borde-gray-100 hover:border-gray-400 transition duration-150 px-6 py-3 ease-in">
                                <svg class="text-gray-600 w-4 -rotate-45" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>

                                <span class="ml-1">Attach</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @auth
                @if (auth()->user()->isAdmin())
                    <livewire:set-status :idea="$idea" />
                @endif
            @endauth
        </div>
        <div class=" hidden md:flex items-center gap-x-4">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug @if ($hasVoted) text-blue @endif">
                    {{ $votesCount }}</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>
            @if ($hasVoted)
                <button wire:click.prevent="vote" type="button"
                    class="w-32 uppercase h-11 text-xs bg-blue text-white font-semibold rounded-xl border borde-blue hover:bg-blue-hover transition duration-150 px-6 py-3 ease-in">
                    <span>Voted</span>
                </button>
            @else
                <button wire:click.prevent="vote" type="button"
                    class="w-32 uppercase h-11 text-xs bg-gray-200 font-semibold rounded-xl border borde-gray-100 hover:border-gray-400 transition duration-150 px-6 py-3 ease-in">
                    <span>Vote</span>
                </button>
            @endif
        </div>
    </div> <!-- end buttons container -->
</div>
