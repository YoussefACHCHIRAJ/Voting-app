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

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-background text-gray-900 text-sm">
    <header class="flex items-center justify-between px-8 py-4">
        <a href="#"><img src="{{ asset('images/logo.svg') }}" alt="logo"></a>

        <div class="flex items-center">
            @if (Route::has('login'))
                <div class="p-6 space-x-3 z-10 ">
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

    <main class="container flex max-w-custom mx-auto">
        <div class="w-70 mr-5">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis sint obcaecati animi? Pariatur blanditiis
            culpa quia velit totam nisi commodi nobis ex rerum. Vero cupiditate ipsa quae maiores a tempore, cum vel
            adipisci nisi corporis tempora optio eum maxime sed iusto eius asperiores, ad possimus nihil aliquid? Beatae
            fuga ipsum iste. Placeat, commodi ut assumenda laborum ipsa porro autem maxime sunt numquam molestias,
            reprehenderit beatae? Nam doloribus facere, itaque accusamus nemo alias, aut necessitatibus sed ratione
            praesentium reprehenderit, recusandae ea minus suscipit impedit molestias dolorem labore ad. Repellendus
            earum velit quibusdam harum nihil tempora voluptatum mollitia in! Nihil, pariatur tempora!
        </div>
        <div class="w-175">
            <nav class="flex items-center justify-between text-xs">
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
</body>

</html>
