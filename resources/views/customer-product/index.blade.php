<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <meta name="theme-color" content="#7952b3"> --}}

        <title>Customer Products</title>

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <div id="app"></div>
    </body>
</html>
