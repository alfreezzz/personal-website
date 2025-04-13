<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        @vite('resources/css/app.css')

        <link rel="icon" href="{{ asset('assets/images/icon.png') }}">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        <title>Alfreezzz_</title>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="icon" href="{{ asset('assets/images/IMG_20241107_055309.jpg') }}">
    </head>
    <body class="bg-black text-[#C7EEFF]">
        
        <x-navigasi></x-navigasi>

        {{ $slot }}

        <x-footer></x-footer>
    </body>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</html>