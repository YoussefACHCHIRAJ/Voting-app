<x-app-layout>
    <div class="filters space-x-6 flex">
        <div class="w-1/3">
            <select name="category" id="category" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="category One">Category One</option>
                <option value="category Two">Category Two</option>
                <option value="category Three">Category Three</option>
                <option value="category Four">Category Four</option>
            </select>
        </div>
        <div class="w-1/3">
            <select name="othe_filterso" id="othe_filterso" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="Filter One">Filter One</option>
                <option value="Filter Two">Filter Two</option>
                <option value="Filter Three">Filter Three</option>
                <option value="Filter Four">Filter Four</option>
            </select>
        </div>
        <div class="w2/3 relative">
            <input type="text" placeholder="Find an idea"
                class="w-full rounded-xl px-4 py-2 pl-8 border-none placeholder:text-gray-900">
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
        <div
            class="idea-container hover:shadow-card cursor-pointer transition duration-150 ease-in bg-white rounded-xl flex">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">votes</div>
                </div>
                <div class="mt-8">
                    <button
                        class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 transition duration-150 font-bold text-xxs uppercase rounded-xl px-4 py-3">
                        vote
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar"
                        class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore tempora eaque nostrum laborum
                        alias ullam delectus nemo fugiat perferendis. Est quos et officiis in perspiciatis fuga, odio,
                        cupiditate voluptatem, nostrum harum nisi commodi repellendus reiciendis corrupti eaque veniam
                        dolorum distinctio ducimus cumque impedit unde? Consectetur rem temporibus tempore odio velit!
                        Accusantium, culpa quidem quam expedita alias vel ducimus labore eligendi iure animi molestias
                        nostrum possimus. Sint cumque sequi ipsum dolore quasi voluptatum libero animi eos itaque? Iusto
                        mollitia maiores, qui itaque ipsa odit soluta placeat, deleniti rem ea dolor reprehenderit
                        adipisci labore vitae et ipsam dolores numquam debitis necessitatibus id.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div
                                class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                open
                            </div>
                            <button
                                class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7  px-3 flex justify-center transition duration-150">
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                    stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <ul
                                    class="absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8 top-4 -right-40">
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
        </div> <!-- end idea container -->

        <div
            class="idea-container hover:shadow-card cursor-pointer transition duration-150 ease-in bg-white rounded-xl flex">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl text-blue">12</div>
                    <div class="text-gray-500">votes</div>
                </div>
                <div class="mt-8">
                    <button
                        class="w-20 bg-blue text-white border border-gray-200 hover:border-gray-400 transition duration-150 font-bold text-xxs uppercase rounded-xl px-4 py-3">
                        voted
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar"
                        class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore tempora eaque nostrum laborum
                        alias ullam delectus nemo fugiat perferendis. Est quos et officiis in perspiciatis fuga, odio,
                        cupiditate voluptatem, nostrum harum nisi commodi repellendus reiciendis corrupti eaque veniam
                        dolorum distinctio ducimus cumque impedit unde? Consectetur rem temporibus tempore odio velit!
                        Accusantium, culpa quidem quam expedita alias vel ducimus labore eligendi iure animi molestias
                        nostrum possimus. Sint cumque sequi ipsum dolore quasi voluptatum libero animi eos itaque? Iusto
                        mollitia maiores, qui itaque ipsa odit soluta placeat, deleniti rem ea dolor reprehenderit
                        adipisci labore vitae et ipsam dolores numquam debitis necessitatibus id.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div
                                class="bg-yellow text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                In progress
                            </div>
                            <button
                                class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7  px-3 flex justify-center transition duration-150">
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                    stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <ul
                                    class="absolute w-44 font-semibold hidden text-left bg-white shadow-dialog rounded-xl py-3 ml-8 top-4 -right-40">
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
        </div> <!-- end idea container -->

        <div
            class="idea-container hover:shadow-card cursor-pointer transition duration-150 ease-in bg-white rounded-xl flex">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">votes</div>
                </div>
                <div class="mt-8">
                    <button
                        class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 transition duration-150 font-bold text-xxs uppercase rounded-xl px-4 py-3">
                        vote
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar"
                        class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore tempora eaque nostrum laborum
                        alias ullam delectus nemo fugiat perferendis. Est quos et officiis in perspiciatis fuga, odio,
                        cupiditate voluptatem, nostrum harum nisi commodi repellendus reiciendis corrupti eaque veniam
                        dolorum distinctio ducimus cumque impedit unde? Consectetur rem temporibus tempore odio velit!
                        Accusantium, culpa quidem quam expedita alias vel ducimus labore eligendi iure animi molestias
                        nostrum possimus. Sint cumque sequi ipsum dolore quasi voluptatum libero animi eos itaque? Iusto
                        mollitia maiores, qui itaque ipsa odit soluta placeat, deleniti rem ea dolor reprehenderit
                        adipisci labore vitae et ipsam dolores numquam debitis necessitatibus id.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div
                                class="bg-red text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                closed
                            </div>
                            <button
                                class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7  px-3 flex justify-center transition duration-150">
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
        </div> <!-- end idea container -->

        <div
            class="idea-container hover:shadow-card cursor-pointer transition duration-150 ease-in bg-white rounded-xl flex">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">votes</div>
                </div>
                <div class="mt-8">
                    <button
                        class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 transition duration-150 font-bold text-xxs uppercase rounded-xl px-4 py-3">
                        vote
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar"
                        class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore tempora eaque nostrum laborum
                        alias ullam delectus nemo fugiat perferendis. Est quos et officiis in perspiciatis fuga, odio,
                        cupiditate voluptatem, nostrum harum nisi commodi repellendus reiciendis corrupti eaque veniam
                        dolorum distinctio ducimus cumque impedit unde? Consectetur rem temporibus tempore odio velit!
                        Accusantium, culpa quidem quam expedita alias vel ducimus labore eligendi iure animi molestias
                        nostrum possimus. Sint cumque sequi ipsum dolore quasi voluptatum libero animi eos itaque? Iusto
                        mollitia maiores, qui itaque ipsa odit soluta placeat, deleniti rem ea dolor reprehenderit
                        adipisci labore vitae et ipsam dolores numquam debitis necessitatibus id.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div
                                class="bg-green text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                implemented
                            </div>
                            <button
                                class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7  px-3 flex justify-center transition duration-150">
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                    stroke="currentColor" className="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <ul
                                    class=" hidden absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8 top-4 -right-40">
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
        </div> <!-- end idea container -->

        <div
            class="idea-container hover:shadow-card cursor-pointer transition duration-150 ease-in bg-white rounded-xl flex">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">votes</div>
                </div>
                <div class="mt-8">
                    <button
                        class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 transition duration-150 font-bold text-xxs uppercase rounded-xl px-4 py-3">
                        vote
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar"
                        class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore tempora eaque nostrum laborum
                        alias ullam delectus nemo fugiat perferendis. Est quos et officiis in perspiciatis fuga, odio,
                        cupiditate voluptatem, nostrum harum nisi commodi repellendus reiciendis corrupti eaque veniam
                        dolorum distinctio ducimus cumque impedit unde? Consectetur rem temporibus tempore odio velit!
                        Accusantium, culpa quidem quam expedita alias vel ducimus labore eligendi iure animi molestias
                        nostrum possimus. Sint cumque sequi ipsum dolore quasi voluptatum libero animi eos itaque? Iusto
                        mollitia maiores, qui itaque ipsa odit soluta placeat, deleniti rem ea dolor reprehenderit
                        adipisci labore vitae et ipsam dolores numquam debitis necessitatibus id.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div
                                class="bg-purple text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                considering
                            </div>
                            <button
                                class="relative  bg-gray-100 hover:bg-gray-200 rounded-full h-7  px-3 flex justify-center transition duration-150">
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
        </div> <!-- end idea container -->

    </div> <!-- end ideas container -->

</x-app-layout>
