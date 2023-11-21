<div x-data
    @click="
                    const target = $event.target.tagName.toLowerCase();
                    const exceptions = ['button','svg','path','a'];
                    const mustClicked = !(exceptions.includes(target));
                    if( mustClicked )
                        $event.target.closest('.idea-container').querySelector('.idea-link').click()
                "
    class="idea-container hover:shadow-card cursor-pointer transition duration-150 ease-in bg-white rounded-xl flex">
    <div class="hidden md:block border-r border-gray-100 px-5 py-8">
        <div class="text-center">
            <div class="font-semibold text-2xl @if ($hasVoted) text-blue @endif">{{ $votesCount }}
            </div>
            <div class="{{ $hasVoted ? 'text-blue' : 'text-gray-500' }}">votes</div>
        </div>
        <div class="mt-8">
            @if ($hasVoted)
                <button wire:click.prevent="vote"
                    class="w-20 bg-blue border border-blue hover:bg-blue-hover text-white transition duration-150 font-bold text-xxs uppercase rounded-xl px-4 py-3">
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
    <div class="flex flex-1 px-2 py-6 flex-col md:flex-row">
        <div class="flex-none mx-4 md:mx-0">
            <a href="#">
                <img src="{{ $idea->user->getAvatar() }}" alt="avatar {{ $idea->user->email }}"
                    class="w-14 h-14 rounded-xl">
            </a>
        </div>
        <div class="mx-4  w-full">
            <h4 class="text-xl font-semibold mt-2 md:mt-0">
                <a href="{{ route('idea.show', $idea) }}" class="idea-link hover:underline">{{ $idea->title }}</a>
            </h4>
            <div class="text-gray-600 mt-3 line-clamp-3">
                {{ $idea->description }}
            </div>
            <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                    <div>{{ $idea->created_at->diffForHumans() }}</div>
                    <div>&bull;</div>
                    <div>{{ $idea->category->name }}</div>
                    <div>&bull;</div>
                    <div class="text-gray-900">3 comments</div>
                </div>
                <div x-data="{ isOpen: false }" class="flex items-center space-x-2 mt-4 md:mt-0">
                    <div
                        class="{{ $idea->status->getStyle() }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                        {{ $idea->status->name }}
                    </div>
                    <button @click="isOpen= !isOpen"
                        class="relative border bg-gray-100 hover:bg-gray-200 rounded-full h-7  px-3 flex justify-center transition duration-150">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor"
                            className="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                        <ul x-show="isOpen" x-cloak @click.away="isOpen = false"
                            class="absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8 top-8 -left-20 md:left-0 right-0 md:-right-40">
                            <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-150">Mark
                                    as
                                    spam</a></li>
                            <li><a href="#"
                                    class="hover:bg-gray-100 block px-5 py-3 transition duration-150">Delete
                                    post</a></li>
                        </ul>
                    </button>
                </div>
                <div class="flex md:hidden items-center mt-4 md:mt-0">
                    <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                        <div class="text-sm font-bold leading-none @if ($hasVoted) text-blue @endif">
                            {{ $idea->votes_count }}
                        </div>
                        <div
                            class="text-xxs font-semibold leading-none {{ $hasVoted ? 'text-blue' : 'text-gray-500' }}">
                            Voting</div>
                    </div>

                    @if ($hasVoted)
                        <button wire:click.prevent="vote"
                            class="w-20 bg-blue border border-blue hover:bg-blue-hover text-white transition duration-150 font-bold text-xxs uppercase rounded-xl px-4 py-3">
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
</div>
