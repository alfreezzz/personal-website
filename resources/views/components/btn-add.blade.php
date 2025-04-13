<a {{ $attributes }} 
    class="inline-flex drop-shadow-[0_1px_4px_rgb(0,119,192)] hover:translate-y-0.5 hover:scale-105 hover:brightness-150 font-semibold focus:scale-90 bg-black border-2 border-[#0076c0] items-center justify-center rounded-lg sm:px-4 px-3 py-1.5 transition">
        <svg class="w-5 h-5 lg:w-6 lg:h-6 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#C7EEFF">
            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/>
        </svg>
        <span class="sm:text-base text-sm text-[#C7EEFF]">{{ $slot }}</span>
</a>