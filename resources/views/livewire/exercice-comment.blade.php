<div class="comment-container transition-all  duration-150 relative  mt-4 bg-white rounded-xl flex">
    <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
        <div class="flex-none">
            <a href="#">
                <img src="{{ $avatar }}" alt="avatar" class="w-14 h-14 rounded-xl">
            </a>
        </div>
        <div class="md:mx-4  w-full">

            <div class="text-gray-600 mt-3">
                {{ $body }}
            </div>
            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                    <div class="font-bold text-gray-900">{{ $username }}</div>
                    <div>&bull;</div>
                    @if ($exerciceUserId === $comment->user->id)
                        <div class="rounded-full border bg-gray-100 px-3 py-1">OP</div>
                        <div>&bull;</div>
                    @endif
                    <div>{{ $publishedDate->diffForHumans() }}</div>

                </div>
                <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                    @auth
                        @if (
                            $comment->user->id === auth()->id() ||
                                auth()->user()->isAdmin())
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
                                    class="z-10 absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8 top-6 right-0">
                                    @can('update', $comment)
                                        <li
                                            @click="
                                            isOpen=false
                                            $dispatch('setEditComment', { commentId: {{ $comment->id }}})
                                            ">
                                            <a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-150">
                                                Edit Comment</a>
                                        </li>
                                    @endcan

                                    @can('delete', $comment)
                                        <li
                                            @click="
                                            isOpen=false
                                            $dispatch('showing-delete-comment-modal', { commentId: {{ $comment->id }}})">
                                            <a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-150">
                                                Delete Comment</a>
                                        </li>
                                    @endcan
                                </ul>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
