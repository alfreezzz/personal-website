<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        @vite('resources/css/app.css')

        <link rel="icon" href="{{ asset('assets/images/icon.png') }}">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        <title>{{ $title }} - Alfreezzz_</title>
        <link rel="icon" href="{{ asset('assets/images/IMG_20241107_055309.jpg') }}">

        <style>
            /* From Uiverse.io by qhns3 */
            .container {
                width: 100%;
                height: 100%;

                background: #000000;
                --gap: 5em;
                --line: 1px;
                --color: rgba(255, 255, 255, 0.2);

                background-image: linear-gradient(
                        -90deg,
                        transparent calc(var(--gap) - var(--line)),
                        var(--color) calc(var(--gap) - var(--line) + 1px),
                        var(--color) var(--gap)
                    ),
                    linear-gradient(
                        0deg,
                        transparent calc(var(--gap) - var(--line)),
                        var(--color) calc(var(--gap) - var(--line) + 1px),
                        var(--color) var(--gap)
                    );
                background-size: var(--gap) var(--gap);
            }
        </style>
        
    </head>
    <body class="bg-black text-[#C7EEFF] min-h-screen h-full">

        <div class="min-h-screen flex flex-col">
            <x-navigasi-2 />
            
            <main class="flex-grow">
                {{ $slot }}
            </main>
        
            <x-footer />
        </div>
        
    </body>
</html>