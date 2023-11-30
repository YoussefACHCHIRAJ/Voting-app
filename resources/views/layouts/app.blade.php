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
                        <a wire:navigate href="{{ route('login') }}" class="text-sm text-gray-900 underline">Log
                            in</a>

                        @if (Route::has('register'))
                            <a wire:navigate href="{{ route('register') }}"
                                class="text-sm text-gray-900 underline">Register</a>
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
                    <p class="text-xs mt-4">
                        @auth
                            Let us known what you would like and we'll take a look over!</p>
                    @else
                        Pleaze login to create an idea
                    @endauth
                </div>

                @auth
                    <livewire:create-idea />
                @else
                    <div class="flex flex-col items-center justify-center gap-3 mx-3 px-3 mt-2 md:mt-0">
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
        <div class="w-full px-2 md:px-0 md:w-175">
            <livewire:status-filters />
            <div class="mt-8">
                {{ $slot }}

            </div>
        </div>
    </main>

    @if (session('success_message'))
        <div x-cloak x-data="{
            isOpen: true,
        }"
        x-init="setTimeout(() => isOpen = false, 4000)"
         @keydown.escape.window="isOpen=false" x-show="isOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-x-8"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform translate-x-8"
            class="flex justify-between max-w-xs sm:max-w-sm w-full gap-3 fixed bottom-4 right-4 bg-white rounded-xl shadow-lg border px-6 py-5 mx-4 sm:mx-6 my-8 z-10">
            <div class="flex gap-2">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-6 h-6 text-green">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="font-semibold text-gray-500 text-xs sm:text-base">{{ session('success_message') }}</p>
            </div>
            <button class="text-gray-400 hover:text-gray-500">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif
    <livewire:scripts />
</body>

</html>
