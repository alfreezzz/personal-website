<a {{ $attributes }}
    class="inline-flex group drop-shadow-[0_1px_3px_rgb(199,238,255)] hover:brightness-150 font-semibold bg-black border-1 border-[#C7EEFF] items-center justify-center rounded-lg sm:px-4 px-3 py-1.5 transition">
        <span class="sm:text-base text-sm text-[#C7EEFF]">{{ $slot }}</span>
        <svg class="w-4 h-4 lg:w-5 lg:h-5 ml-1 group-hover:translate-x-1.5 transition group-hover:-translate-y-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#C7EEFF">
            <path d="m256-240-56-56 384-384H240v-80h480v480h-80v-344L256-240Z"/>
        </svg>
</a>