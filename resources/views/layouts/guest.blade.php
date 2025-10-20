<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-row items-center bg-white">
            <div class="w-1/2 flex justify-center items-center">
                <img src="{{ asset('images/memories.png') }}" alt="Wanderly Memories" class="w-3/4 h-auto object-contain" />
            </div>
            <div class="w-1/2 flex justify-center items-center">
                <div class="w-full max-w-md px-6 py-4 bg-white sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
