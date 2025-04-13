<div id="about" class="scroll-section lg:mt-36 mt-32 xl:px-32 px-3 sm:px-5">
    <div class="about relative flex sm:flex-row flex-col lg:gap-0 sm:gap-12 items-center lg:px-8 sm:px-5 px-3">
        <!-- Animated Rotating Line Container -->
        <div class="absolute left-5 sm:left-10 mobile-m:left-6 mobile-l:left-8 lg:left-20 xl:left-28 lg:top-40 sm:top-36 top-[9.5rem] mobile-m:top-44 mobile-l:top-48 -translate-y-1/2 lg:w-64 sm:w-56 w-10/12 aspect-square">
            <!-- Rotating SVG Line -->
            <svg 
                viewBox="0 0 220 220" 
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[calc(100%+40px)] h-[calc(100%+40px)] z-[-2]"
            >
                <defs>
                    <!-- Gradient Definition -->
                    <linearGradient id="gradientLine" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#0077C0;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#C7EEFF;stop-opacity:0" />
                    </linearGradient>

                    <!-- Mask to fade out bottom part -->
                    <mask id="fade-mask">
                        <circle cx="110" cy="110" r="105" fill="white" />
                        <rect 
                            x="0" 
                            y="110" 
                            width="220" 
                            height="110" 
                            fill="url(#bottomFadeGradient)" 
                        />
                    </mask>

                    <!-- Gradient for bottom fade -->
                    <linearGradient id="bottomFadeGradient">
                        <stop offset="0%" stop-color="white" stop-opacity="1"/>
                        <stop offset="100%" stop-color="white" stop-opacity="0"/>
                    </linearGradient>
                </defs>

                <circle 
                    cx="110" 
                    cy="110" 
                    r="105" 
                    fill="none" 
                    stroke="url(#gradientLine)" 
                    stroke-width="4" 
                    stroke-linecap="round"
                    mask="url(#fade-mask)"
                    class="origin-center animate-spin-slow"
                />
            </svg>
        </div>

        <div class="absolute left-5 sm:left-10 mobile-m:left-6 mobile-l:left-8 lg:left-20 xl:left-28 lg:top-40 sm:top-36 top-[9.5rem] mobile-m:top-44 mobile-l:top-48 -translate-y-1/2 lg:w-64 sm:w-56 w-10/12 aspect-square bg-gradient-to-br from-[#0077C0] via-[#0077C0] to-[#C7EEFF] rounded-full z-[-1]"></div>
        <div class="sm:w-2/5 w-full py-8">
            <img src="{{ asset('assets/images/IMG_20241022_152417-removebg-preview.png') }}" 
                 alt="Iza"
                 class="sm:w-72 w-full mx-auto relative z-10 drop-shadow-[0_0_12px_rgba(0,0,0,1)] hover:scale-105 transition hover:-translate-y-1">
        </div>
        <div class="sm:w-3/5 w-full">
            <div class="flex justify-between mb-3">
                <h1 class="text-left lg:text-4xl text-3xl font-bold tracking-wide bg-gradient-to-b from-[#0077C0] via-[#0077C0] to-[#C7EEFF] bg-clip-text text-transparent">
                    -- Me! --
                </h1>
                @if(request()->query('token') === env('ADMIN_ACCESS_TOKEN'))
                    <x-btn-add href="{{ url('skill/create') . '?' . http_build_query(['token' => request()->query('token')]) }}">
                        skill
                    </x-btn-add>
                @endif
            </div>
            <div class="tracking-wide font-light leading-relaxed sm:text-sm lg:text-base">
                <p>Hi, my name is 
                    <span class="font-medium">Alfriza Akhmad Rahadi</span>, you may call me 
                    <span class="font-medium">Alfriza</span> or 
                    <span class="font-medium">Iza</span>. I grew up in a village located in 
                    <span class="font-medium">Bogor, Jawa Barat.</span> I am currently studying at 
                    <a class="font-medium underline" href="https://smkamaliah.sch.id/">
                        Amaliah Ciawi Vocational School
                    </a> with a Software and Game Development Major.
                </p>
                <br>
                <p>
                    Since I was young, I have always been passionate about gaming. Playing games made 
                    me curious about how they were created, which led me to explore programming. I 
                    started learning basic coding, and over time, I became more interested in web 
                    development.
                </p>
            </div>
            <div class="flex lg:gap-2 sm:gap-1.5 gap-1 flex-wrap lg:mt-3 mt-2">
                @if($skills->isEmpty())
                    <div class="flex items-center mobile-m:space-x-5 space-y-2 flex-wrap">
                        <p class="text-center text-gray-400 text-sm sm:text-base font-light">Skill has not yet been added.</p>
                        <x-cta-btn href="{{ url('skill/create') . '?' . http_build_query(['token' => request()->query('token')]) }}">
                            Add a skill
                        </x-cta-btn>
                    </div>
                @else
                    @foreach ($skills as $skill)
                        <div x-data="{ open: false }" class="relative inline-block">
                            <!-- Skill Button -->
                            <button @click="open = !open" class="px-3 rounded text-center lg:text-base text-sm filter hover:brightness-75 transition"
                                style="background-color: #{{ $skill->warna }}; color: {{ hexdec($skill->warna) > 0x888888 ? '#000' : '#FFF' }}">
                                {{ $skill->bahasa }}
                            </button>

                            @if(request()->query('token') === env('ADMIN_ACCESS_TOKEN'))
                                <!-- Dropdown Menu -->
                                <div 
                                    x-show="open" 
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-90"
                                    @click.away="open = false"
                                    class="absolute right-0 z-20 mt-2 w-32 origin-top-right"
                                >
                                    <div class="bg-white divide-y divide-gray-100 rounded-lg shadow-lg ring-1 ring-black/5 border border-gray-100">
                                        <div class="px-1 py-1">
                                            <a 
                                                href="{{ route('skill.edit', ['skill' => $skill->id, 'token' => request()->query('token')]) }}"
                                                class="group flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400 group-hover:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>
                                        </div>
                                        <div class="px-1 py-1">
                                            <form 
                                                action="{{ route('skill.destroy', ['skill' => $skill->id, 'token' => request()->query('token')]) }}" 
                                                method="POST" 
                                                onsubmit="return confirm('Are u sure?')"
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <button 
                                                    type="submit" 
                                                    class="group flex w-full items-center rounded-md px-3 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-200"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-400 group-hover:text-red-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="others relative flex sm:flex-row flex-col items-center sm:px-8 px-5 sm:gap-5 gap-3 sm:mt-5 mt-9">
        {{-- Social Media --}}
        <div class=" w-full border border-[#C7EEFF] sm:aspect-2/1 max-sm:min-h-32 rounded-lg flex flex-col justify-center items-center p-2 relative overflow-hidden">
            <!-- Web Background Grid -->
            <div class="absolute inset-0 bg-[length:40px_40px] bg-[linear-gradient(to_right,rgb(229,231,235)_1px,transparent_1px),linear-gradient(to_bottom,rgb(229,231,235)_1px,transparent_1px)] opacity-20 pointer-events-none z-0"></div>
            
            <!-- Web Elements -->
            <div class="absolute inset-0 opacity-10 pointer-events-none">
                <div class="absolute top-4 left-4 w-16 h-16 bg-blue-200 rounded-full"></div>
                <div class="absolute bottom-4 right-4 w-24 h-24 bg-blue-300 rounded-full"></div>
            </div>
            <h2 class="lg:text-lg text-xl sm:text-sm font-bold mb-3">
                Social Media
            </h2>
            <div class="flex space-x-5 sm:space-x-3 lg:space-x-4 justify-center">
                <a href="https://wa.me/6289670336495" target="_blank" 
                   class="lg:w-7 lg:h-7 hover:rotate-12 transition hover:scale-105 sm:w-5 sm:h-5 mobile-m:w-10 mobile-m:h-10 w-8 h-8">
                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <title>WhatsApp</title>
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" fill="#25D366"/>
                    </svg>
                </a>
                <a href="https://github.com/alfreezzz" target="_blank" class="lg:w-7 lg:h-7 hover:rotate-12 transition hover:scale-105 sm:w-5 sm:h-5 mobile-m:w-10 mobile-m:h-10 w-8 h-8">
                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <title>GitHub</title>
                        <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" fill="#FF69B4"/>
                    </svg>
                </a>
                <a href="https://www.linkedin.com/in/alfriza-akhmad-rahadi-a22896343/" target="_blank" class="lg:w-7 lg:h-7 hover:rotate-12 transition hover:scale-105 sm:w-5 sm:h-5 mobile-m:w-10 mobile-m:h-10 w-8 h-8">
                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <title>LinkedIn</title>
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.327-.025-3.037-1.852-3.037-1.853 0-2.137 1.445-2.137 2.939v5.667H9.35V9h3.413v1.561h.049c.475-.899 1.637-1.852 3.372-1.852 3.605 0 4.269 2.372 4.269 5.455v6.288zM5.337 7.433c-1.144 0-2.072-.93-2.072-2.075 0-1.144.928-2.073 2.072-2.073 1.145 0 2.073.929 2.073 2.073 0 1.145-.928 2.075-2.073 2.075zm1.777 13.019H3.56V9h3.554v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.225.792 24 1.771 24h20.451C23.2 24 24 23.225 24 22.271V1.729C24 .774 23.2 0 22.225 0z" fill="#0A66C2"/>
                    </svg>
                </a>
                <a href="https://www.instagram.com/alfreezzz_/" target="_blank" class="lg:w-7 lg:h-7 hover:rotate-12 transition hover:scale-105 sm:w-5 sm:h-5 mobile-m:w-10 mobile-m:h-10 w-8 h-8">
                    <svg role="img" fill="#FF0069" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <title>Instagram</title>
                        <path d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077"/>
                    </svg>
                </a>
            </div>
        </div>
        {{-- Hobbies --}}
        <div class="hobbies w-full border border-[#C7EEFF] sm:aspect-2/1 max-sm:min-h-32 rounded-lg flex flex-col justify-center items-center p-2">
            <h2 class="lg:text-lg text-xl sm:text-sm font-bold mb-1"> 
                <div class="relative inline-block px-3 text-white font-bold">
                    <span class="absolute inset-0 -skew-x-12 bg-gradient-to-tr from-red-700 via-red-600 to-red-500"></span>
                    <span class="relative italic">Hobbies</span>
                </div>
            </h2>
            <div class="flex gap-8 w-full justify-center">
                <svg class="lg:w-12 lg:h-12 w-16 h-16 sm:w-8 sm:h-8 transition-all hover:animate-bounce" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#9D00FF">
                    <path d="M182-200q-51 0-79-35.5T82-322l42-300q9-60 53.5-99T282-760h396q60 0 104.5 39t53.5 99l42 300q7 51-21 86.5T778-200q-21 0-39-7.5T706-230l-90-90H344l-90 90q-15 15-33 22.5t-39 7.5Zm16-86 114-114h336l114 114q2 2 16 6 11 0 17.5-6.5T800-304l-44-308q-4-29-26-48.5T678-680H282q-30 0-52 19.5T204-612l-44 308q-2 11 4.5 17.5T182-280q2 0 16-6Zm482-154q17 0 28.5-11.5T720-480q0-17-11.5-28.5T680-520q-17 0-28.5 11.5T640-480q0 17 11.5 28.5T680-440Zm-80-120q17 0 28.5-11.5T640-600q0-17-11.5-28.5T600-640q-17 0-28.5 11.5T560-600q0 17 11.5 28.5T600-560ZM310-440h60v-70h70v-60h-70v-70h-60v70h-70v60h70v70Zm170-40Z"/>
                </svg>
                <svg class="lg:w-12 lg:h-12 w-16 h-16 sm:w-8 sm:h-8 transition-all hover:animate-pulse" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#40E0D0">
                    <path d="M360-120H200q-33 0-56.5-23.5T120-200v-280q0-75 28.5-140.5t77-114q48.5-48.5 114-77T480-840q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480v280q0 33-23.5 56.5T760-120H600v-320h160v-40q0-117-81.5-198.5T480-760q-117 0-198.5 81.5T200-480v40h160v320Zm-80-240h-80v160h80v-160Zm400 0v160h80v-160h-80Zm-400 0h-80 80Zm400 0h80-80Z"/>
                </svg>
            </div>
        </div>
        {{-- Repository --}}
        <div x-data="{ repos: 0 }" x-init="fetch('https://api.github.com/users/alfreezzz')
            .then(response => response.json())
            .then(data => repos = data.public_repos)" 
            class="w-full border border-[#C7EEFF] sm:aspect-2/1 max-sm:min-h-32 rounded-lg flex flex-col justify-center items-center p-2 relative overflow-hidden bg-[#18171777]">
            <svg class="absolute opacity-10 -right-4 -bottom-4 w-48 h-48 text-purple-200" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.605-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.236 1.911 1.236 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
            </svg>
            <h2 class="lg:text-lg text-xl sm:text-xs font-bold text-[#0077C0]">
                Repository
            </h2>
            <div class="flex items-center space-x-1 group transition-transform duration-300">
                <svg class="sm:w-6 sm:h-6 lg:h-10 lg:w-10 h-12 w-12 text-purple-600 transform transition-transform duration-300 group-hover:scale-110 group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2H5z"/>
                </svg>
                <span class="lg:text-2xl text-4xl sm:text-lg font-bold text-purple-800 transform transition-transform duration-300 group-hover:scale-110 group-hover:translate-x-0.5" x-text="repos">
                    0
                </span>
                <span class="animate-blink border border-purple-800 h-8 sm:h-4 lg:h-6 mt-1.5 sm:mt-0.5 lg:mt-1 transition-transform duration-300 group-hover:scale-110 group-hover:translate-x-0.5"></span>
            </div>            
            <span class="text-sm sm:text-xs lg:text-sm text-gray-600">Total Public Repos</span>
        </div>
        {{-- CV --}}
        <div class="cv w-full border border-[#C7EEFF] sm:aspect-2/1 max-sm:min-h-32 rounded-lg flex flex-col justify-center items-center p-2">
            {{-- /* From Uiverse.io by 3bdel3ziz-T */  --}}
            <a href="{{ asset('assets/files/CV Alfriza Akhmad Rahadi.pdf') }}" download
                class="cursor-pointer group/download relative flex gap-1 px-8 sm:px-4 lg:text-base lg:px-6 sm:text-xs items-center py-4 sm:py-2 bg-[#5c5fe9] text-[#f1f1f1] rounded-3xl hover:bg-opacity-70 font-semibold shadow-xl active:shadow-inner transition-all duration-300"
                >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    class="h-6 w-6 sm:h-4 sm:w-4 lg:h-5 lg:w-5"
                >
                    <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                    <g
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    id="SVGRepo_tracerCarrier"
                    ></g>
                    <g id="SVGRepo_iconCarrier">
                    <g id="Interface / Download">
                        <path
                        stroke-linejoin="round"
                        stroke-linecap="round"
                        stroke-width="2"
                        stroke="#f1f1f1"
                        d="M6 21H18M12 3V17M12 17L17 12M12 17L7 12"
                        id="Vector"
                        ></path>
                    </g>
                    </g>
                </svg>
                Download CV
                <div
                    class="absolute text-xs uppercase scale-0 rounded-md py-2 px-2 bg-[#5c5fe9] left-2/4 mb-3 bottom-full group-hover/download:scale-100 origin-bottom transition-all duration-300 shadow-lg before:content-[''] before:absolute before:top-full before:left-2/4 before:w-3 before:h-3 before:border-solid before:bg-[#5c5fe9] before:rotate-45 before:-translate-y-2/4 before:-translate-x-2/4"
                >
                    69mb
                </div>
            </a>
        </div>
    </div>
</div>