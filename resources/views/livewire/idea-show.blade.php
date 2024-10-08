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
                @admin
                    @if ($idea->spam_reports > 0)
                        <div class="text-red mb-3">spam reports: {{ $idea->spam_reports }}</div>
                    @endif
                @endadmin
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
                        <div class="text-gray-900">{{ $idea->comments()->count() }} Comments</div>
                    </div>
                    <div x-data="{ isOpen: false }" class="flex items-center space-x-2 mt-3">
                        <div
                            class="{{ $idea->status->getStyle() }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            {{ $idea->status->name }}
                        </div>
                        @auth
                            <div class="relative">
                                <button @click="isOpen = !isOpen"
                                    class="relative border bg-gray-100 hover:bg-gray-200 rounded-full h-7  px-3 flex justify-center transition duration-150">
                                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                        stroke="currentColor" className="w-6 h-6">
                                        <path strokeLinecap="round" strokeLinejoin="round"
                                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </button>
                                <ul x-show="isOpen" x-cloak @click.away="isOpen = false"
                                    class="absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8 top-8 -left-20 z-10 md:left-0 -right-40">
                                    @can('update', $idea)
                                        <li
                                            @click="
                                            isOpen=false
                                            $dispatch('showing-edit-idea-modal')">
                                            <a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-150">
                                                Edit Idea</a>
                                        </li>
                                    @endcan

                                    @can('delete', $idea)
                                        <li
                                            @click="
                                            isOpen=false
                                            $dispatch('showing-delete-idea-modal')">
                                            <a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-150">
                                                Delete Idea</a>
                                        </li>
                                    @endcan

                                    <li>
                                        <a @click="
                                            isOpen=false
                                            $dispatch('showing-mark-as-spam-idea-modal')"
                                            href="#"
                                            class="hover:bg-gray-100 block px-5 py-3 transition duration-150">
                                            Mark as spam</a>
                                    </li>
                                </ul>
                            </div>
                        @endauth
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

            <livewire:add-comment :idea="$idea" />

            @admin
                <livewire:set-status :idea="$idea" />
            @endadmin
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
