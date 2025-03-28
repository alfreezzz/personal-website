<nav x-data="{ open: false }" class="w-full xl:px-32 px-3 sm:px-5 sm:py-5 py-3 flex justify-between items-center bg-black bg-opacity-90 fixed top-0 left-0 z-50">
    <label for="Alfreezzz_">
        <a href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#about" class="text-xl font-pixelmono bg-black px-6 drop-shadow-[0_0px_4px_rgb(0,119,192)] rounded-lg py-1.5">Alfreezzz_</a>
    </label>
    <!-- Desktop Navigation -->
    <ul class="hidden lg:flex lg:space-x-8 text-sm font-light tracking-wide bg-black drop-shadow-[0_0px_4px_rgb(0,119,192)] px-8 py-1.5 rounded-full">
        <li><a href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#hero" class="relative group">Hero<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0077C0] transition-all duration-300 group-hover:w-full"></span></a></li>
        <li><a href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#about" class="relative group">About<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0077C0] transition-all duration-300 group-hover:w-full"></span></a></li>
        <li><a href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#experience" class="relative group">Experience<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0077C0] transition-all duration-300 group-hover:w-full"></span></a></li>
        <li><a href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#project" class="relative group">Project<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0077C0] transition-all duration-300 group-hover:w-full"></span></a></li>
        <li><a href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#blog" class="relative group">Blog<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0077C0] transition-all duration-300 group-hover:w-full"></span></a></li>
        <li><a href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#contact" class="relative group">Contact<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0077C0] transition-all duration-300 group-hover:w-full"></span></a></li>
    </ul>
    <!-- Mobile Hamburger -->
    <button @click="open = !open" class="lg:hidden focus:outline-none">
        <div class="relative w-7 h-8 flex flex-col justify-center items-center space-y-1.5">
            <span :class="{'rotate-45 translate-y-[8px]': open, 'translate-y-0': !open}" 
                  class="block w-7 h-0.5 bg-white transition-all duration-300"></span>
            <span :class="{'opacity-0': open, 'opacity-100': !open}" 
                  class="block w-7 h-0.5 bg-white transition-all duration-300"></span>
            <span :class="{'-rotate-45 -translate-y-[8px]': open, 'translate-y-0': !open}" 
                  class="block w-7 h-0.5 bg-white transition-all duration-300"></span>
        </div>        
    </button>
    <!-- Mobile Navigation -->
    <div x-show="open" @click.outside="open = false" @keyup.esc.window="open = false" x-transition.origin.top.duration.300ms class="absolute top-14 sm:top-[4.5rem] left-0 w-full bg-black bg-opacity-90 text-sm font-light flex flex-col space-y-4 px-5 py-5 lg:hidden">
        <a href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#hero" class="relative group font-medium tracking-wide text-lg">Hero<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0077C0] transition-all duration-300 group-hover:w-full"></span></a>
        <a href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#about" class="relative group font-medium tracking-wide text-lg">About<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0077C0] transition-all duration-300 group-hover:w-full"></span></a>
        <a href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#experience" class="relative group font-medium tracking-wide text-lg">Experience<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0077C0] transition-all duration-300 group-hover:w-full"></span></a>
        <a href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#project" class="relative group font-medium tracking-wide text-lg">Project<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0077C0] transition-all duration-300 group-hover:w-full"></span></a>
        <a href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#blog" class="relative group font-medium tracking-wide text-lg">Blog<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0077C0] transition-all duration-300 group-hover:w-full"></span></a>
        <a href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#contact" class="relative group font-medium tracking-wide text-lg">Contact<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#0077C0] transition-all duration-300 group-hover:w-full"></span></a>
    </div>
</nav>
