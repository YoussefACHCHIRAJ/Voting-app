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
    @vite(['resources/css/app.css', 'resources/css/prism.css', 'resources/js/app.js', 'resources/js/prism.js'])
</head>

<body>
    <a href="/"
        class=" underline px-2 py-3 inline-block text-gray-400 font-semibold hover:text-gray-600 transition-all duration-100"> < Back
         to All exercices page</a>
    {{ $slot }}
</body>

</html>
