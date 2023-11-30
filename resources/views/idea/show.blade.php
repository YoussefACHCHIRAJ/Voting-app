<x-app-layout>
    <div>
        <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor"
                className="w-6 h-6">
                <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>

            <span class="ml-2">All ideas (or back to chosen category with filters)</span>
        </a>
    </div>

    <livewire:idea-show :idea="$idea" :votesCount="$votesCount" />

    @can('update', $idea)
        <livewire:edit-idea :idea="$idea" />
    @endcan
    @can('delete', $idea)
        <livewire:delete-idea :idea="$idea" />
    @endcan

        <livewire:mark-idea-as-spam />


    <div class="comments-container relative space-y-6 md:ml-22 my-8 pt-4 mt-1">
        <div class="comment-container relative  mt-4 bg-white rounded-xl flex">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=11" alt="avatar"
                            class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="md:mx-4  w-full">

                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-gray-900">Youssef ACHCHIRAJ</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>

                        </div>
                        <div x-data="{ isOpen: false }" class="flex items-center space-x-2">

                            <button @click="isOpen = !isOpen"
                                class="relative border bg-gray-100 hover:bg-gray-200 rounded-full h-7  px-3 flex justify-center transition duration-150">
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                    stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <ul x-show="isOpen" x-cloak @click.away="isOpen = false"
                                    class="z-10 absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8 top-4 -right-40">
                                    <li><a href="#"
                                            class="hover:bg-gray-100 block px-5 py-3 transition duration-150">Mark as
                                            spam</a></li>
                                    <li><a href="#"
                                            class="hover:bg-gray-100 block px-5 py-3 transition duration-150">Delete
                                            post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="comment-container relative is-admin mt-4 bg-white rounded-xl flex">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="flex-none md:text-center">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=13" alt="avatar"
                            class="w-14 h-14 rounded-xl">
                    </a>
                    <div class="text-blue uppercase font-bold mt-1 text-xxs">Admin</div>
                </div>
                <div class="md:mx-4  w-full">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Status changed to "Under Consideration"</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-blue">Mohamed CHARRAFI</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>

                        </div>
                        <div class="flex items-center space-x-2">

                            <button
                                class="relative border bg-gray-100 hover:bg-gray-200 rounded-full h-7  px-3 flex justify-center transition duration-150">
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                    stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <ul
                                    class="hidden absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8 top-4 -right-40">
                                    <li><a href="#"
                                            class="hover:bg-gray-100 block px-5 py-3 transition duration-150">Mark as
                                            spam</a></li>
                                    <li><a href="#"
                                            class="hover:bg-gray-100 block px-5 py-3 transition duration-150">Delete
                                            post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="comment-container relative  mt-4 bg-white rounded-xl flex">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=15" alt="avatar"
                            class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="md:mx-4  w-full">

                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-gray-900">HoussamEddine NOUMA</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>

                        </div>
                        <div class="flex items-center space-x-2">

                            <button
                                class="relative border bg-gray-100 hover:bg-gray-200 rounded-full h-7  px-3 flex justify-center transition duration-150">
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                    stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <ul
                                    class="hidden absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8 top-4 -right-40">
                                    <li><a href="#"
                                            class="hover:bg-gray-100 block px-5 py-3 transition duration-150">Mark as
                                            spam</a></li>
                                    <li><a href="#"
                                            class="hover:bg-gray-100 block px-5 py-3 transition duration-150">Delete
                                            post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end comments container -->
</x-app-layout>
