<x-app-layout>
    <div class="filters space-y-3 md:space-y-0 md:space-x-3 flex flex-col md:flex-row">
        <div class="w-full md:w-1/3">
            <select name="category" id="category" class="w-full text-xs rounded-xl px-4 py-2 border-none">
                <option value="category One">Category One</option>
                <option value="category Two">Category Two</option>
                <option value="category Three">Category Three</option>
                <option value="category Four">Category Four</option>
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select name="othe_filterso" id="othe_filterso" class="w-full  text-xs rounded-xl px-4 py-2 border-none">
                <option value="Filter One">Filter One</option>
                <option value="Filter Two">Filter Two</option>
                <option value="Filter Three">Filter Three</option>
                <option value="Filter Four">Filter Four</option>
            </select>
        </div>
        <div class="w-full md:w2/3 relative">
            <input type="text" placeholder="Find an idea"
                class="w-full text-xs rounded-xl px-4 py-2 pl-8 border-none placeholder:text-gray-900">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 h-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
        </div>
    </div> <!-- end filters -->
    <div class="ideas-container space-y-6 my-6">
        @foreach ($ideas as $idea)
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
                        <div class="font-semibold text-2xl">{{ $idea->id }}</div>
                        <div class="text-gray-500">votes</div>
                    </div>
                    <div class="mt-8">
                        <button
                            class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 transition duration-150 font-bold text-xxs uppercase rounded-xl px-4 py-3">
                            vote
                        </button>
                    </div>
                </div>
                <div class="flex flex-1 px-2 py-6 flex-col md:flex-row">
                    <div class="flex-none mx-4 md:mx-0">
                        <a href="#">
                            <img src="{{ $idea->user->getAvatar()}}"
                                alt="avatar {{ $idea->user->email }}" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="mx-4  w-full">
                        <h4 class="text-xl font-semibold mt-2 md:mt-0">
                            <a href="{{ route('idea.show', $idea) }}"
                                class="idea-link hover:underline">{{ $idea->title }}</a>
                        </h4>
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            {{ $idea->description }}
                        </div>
                        <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                                <div>{{ $idea->created_at->diffForHumans() }}</div>
                                <div>&bull;</div>
                                <div>Category 1</div>
                                <div>&bull;</div>
                                <div class="text-gray-900">3 comments</div>
                            </div>
                            <div x-data="{ isOpen: false }" class="flex items-center space-x-2 mt-4 md:mt-0">
                                <div
                                    class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                    open
                                </div>
                                <button @click="isOpen= !isOpen"
                                    class="relative border bg-gray-100 hover:bg-gray-200 rounded-full h-7  px-3 flex justify-center transition duration-150">
                                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                        stroke="currentColor" className="w-6 h-6">
                                        <path strokeLinecap="round" strokeLinejoin="round"
                                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                    <ul x-show="isOpen" x-cloak @click.away="isOpen = false"
                                        class="absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8 top-8 -left-20 md:left-0 right-0 md:-right-40">
                                        <li><a href="#"
                                                class="hover:bg-gray-100 block px-5 py-3 transition duration-150">Mark
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
                                    <div class="text-sm font-bold leading-none">
                                        {{ $idea->id }}
                                    </div>
                                    <div class="text-xxs font-semibold leading-none text-gray-400">Voting</div>
                                </div>
                                <button
                                    class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 transition duration-150 font-bold text-xxs uppercase rounded-xl px-4 py-3">
                                    vote
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div> <!-- end ideas container -->
    {{ $ideas->links() }}

</x-app-layout>
