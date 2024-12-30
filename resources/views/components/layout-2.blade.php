<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    <link rel="icon" href="{{ asset('assets/images/icon.png') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <title>{{ $title }} - Zaa</title>
</head>

<body class="bg-black text-[#C7EEFF]">

    <x-navigasi-2></x-navigasi>

    {{ $slot }}

    <x-footer-2></x-footer-2>
</body>

</html>