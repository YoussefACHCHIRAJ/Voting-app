<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laracats Voting</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Open+Sans:400,500,600&display=swap" rel="stylesheet" />

    <!--styles -->
    <livewire:styles />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-background text-gray-900 text-sm">
    <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
        <a href="/"><img src="{{ asset('images/logo.svg') }}" alt="logo"></a>

        <div class="flex items-center mt-2 md:mt-0">
            @if (Route::has('login'))
                <div class="p-4 md:p-6 space-x-3 z-10 flex">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-900 underline">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm text-gray-900 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <a href="#">
                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar"
                    class="w-10 h-10 rounded-full">
            </a>
        </div>
    </header>

    <main class="container flex max-w-custom mx-auto flex-col md:flex-row">
        <div class="w-70 md:mr-5 md:mx-0 mx-auto">
            <div class="border-2 rounded-xl border-gradient mt-16 bg-white md:sticky md:top-8">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">Add an idea</h3>
                    <p class="text-xs mt-4">Let us known what you would like and we'll take a look over!</p>
                </div>
                <form action="#" method="POST" class="space-y-4 px-4 py-6">
                    <div>
                        <input type="text" class="w-full bg-gray-100 text-sm rounded-xl placeholder:text-gray-900 px-4 py-2 border-none" placeholder="Your Idea">
                    </div>
                    <div>
                        <select name="category_add" id="category_add" class="w-full bg-gray-100 text-sm rounded-xl px-4 py-2 border-none">
                            <option value="category One">Category One</option>
                            <option value="category Two">Category Two</option>
                            <option value="category Three">Category Three</option>
                            <option value="category Four">Category Four</option>
                        </select>
                    </div>
                    <div>
                        <textarea name="idea" id="idea" cols="30" rows="4" class="w-full bg-gray-100 rounded-xl placeholder:text-gray-900 text-sm px-4 py-2 border-none" placeholder="Describe your idea"></textarea>
                    </div>
                    <div class="flex items-center justify-between space-x-3">
                        <button type="button" class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border borde-gray-100 hover:border-gray-400 transition duration-150 px-6 py-3 ease-in">
                            <svg class="text-gray-600 w-4 -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                              </svg>

                            <span class="ml-1">Attach</span>
                        </button>
                        <button type="submit" class="w-1/2 h-11 text-xs text-white bg-blue font-semibold rounded-xl border bordeblue hover:bg-blue-hover transition duration-150 px-6 py-3 ease-in">
                            <span class="ml-1">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full px-2 md:px-0 md:w-175">
            <nav class="hidden md:flex items-center justify-between text-xs">
                <ul class="flex uppercase border-b-4 pb-3 font-semibold space-x-10">
                    <li><a href="#" class="border-b-4 pb-3 border-blue">All Ideas (87)</a></li>
                    <li><a href="#"
                            class=" text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Considering
                            (6)</a></li>
                    <li><a href="#"
                            class=" text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">In
                            progress (1)</a></li>
                </ul>
                <ul class="flex uppercase border-b-4 pb-3 font-semibold space-x-10">
                    <li><a href="#"
                            class=" text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Implemented
                            (10)</a></li>
                    <li><a href="#"
                            class=" text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Closed
                            (55)</a></li>
                </ul>
            </nav>
            <div class="mt-8">
                {{ $slot }}

            </div>
        </div>
    </main>
    <livewire:scripts />
</body>

</html>
