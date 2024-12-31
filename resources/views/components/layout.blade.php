<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    <link rel="icon" href="{{ asset('assets/images/icon.png') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <title>Zaa</title>
    <style>
        #home {
            opacity: 0; /* Awalnya tidak terlihat */
            transition: opacity 1.2s ease-out, transform 1.2s ease-out; /* Efek transisi */
        }
    
        #home.show {
            opacity: 1; /* Muncul */
            transform: translateY(0); /* Kembali ke posisi awal */
        }
        .typing-loop-animation {
            overflow: hidden; /* Menyembunyikan teks di luar area */
            white-space: nowrap; /* Tidak membungkus teks */
            border-right: 2px solid #0077C0; /* Kursor ketikan */
            display: inline-block;
            animation: typing 2.3s steps(12, end) 1, blink 1s step-end infinite;
        }
    
        @keyframes typing {
            0% { width: 0; } /* Mulai dari kosong */
            90% { width: 100%; } /* Mengetik hingga selesai */
            100% { width: 100%; } /* Tetap di akhir selama sisa waktu */
        }
    
        @keyframes blink {
            50% { border-color: transparent; } /* Berkedip */
        }
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
<body class="bg-black text-[#C7EEFF]">
    
    <x-navigasi></x-navigasi>

    {{ $slot }}

    <x-footer></x-footer>
</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const links = document.querySelectorAll('a[href^="#"]');

        links.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();

                const targetID = this.getAttribute('href');
                const targetElement = document.querySelector(targetID);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", () => {
        const homeElement = document.getElementById("home");
        
        // Cek apakah elemen "home" sudah ada di viewport
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        homeElement.classList.add("show");
                    }
                });
            },
            { threshold: 0.1 } // Muncul jika 10% elemen masuk viewport
        );
        
        observer.observe(homeElement);
    });

    document.addEventListener("DOMContentLoaded", () => {
        const typingElement = document.querySelector(".typing-loop-animation");

        function resetTypingAnimation() {
            typingElement.classList.remove("typing-loop-animation"); // Hapus animasi
            void typingElement.offsetWidth; // Paksa reflow
            typingElement.classList.add("typing-loop-animation"); // Tambahkan lagi animasi
        }

        // Set perulangan animasi dengan jeda 3 detik
        setInterval(resetTypingAnimation, 7000); // 4s (durasi animasi) + 3s (jeda)
    });
</script>
</html>