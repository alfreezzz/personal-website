<nav x-data="{ open: false }" class="w-full xl:px-32 px-5 py-5 flex justify-between items-center bg-black fixed top-0 left-0 z-50">
    <label for="Alfreezzz_">
        <a href="{{ url('/') }}#about" class="text-xl font-pixelmono">Alfreezzz_</a>
    </label>
    <!-- Desktop Navigation -->
    <ul class="hidden lg:flex lg:space-x-8 text-sm font-light tracking-wide">
        <li><a href="{{ url('/') }}#home" class="relative group">Home<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#C7EEFF] transition-all duration-300 group-hover:w-full"></span></a></li>
        <li><a href="{{ url('/') }}#about" class="relative group">About<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#C7EEFF] transition-all duration-300 group-hover:w-full"></span></a></li>
        <li><a href="{{ url('/') }}#experience" class="relative group">Experience<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#C7EEFF] transition-all duration-300 group-hover:w-full"></span></a></li>
        <li><a href="{{ url('/') }}#project" class="relative group">Project<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#C7EEFF] transition-all duration-300 group-hover:w-full"></span></a></li>
        <li><a href="{{ url('/') }}#blog" class="relative group">Blog<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#C7EEFF] transition-all duration-300 group-hover:w-full"></span></a></li>
        <li><a href="{{ url('/') }}#contact" class="relative group">Contact<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#C7EEFF] transition-all duration-300 group-hover:w-full"></span></a></li>
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
    <div x-show="open" @click.outside="open = false" @keyup.esc.window="open = false" x-transition.origin.top.duration.300ms class="absolute top-16 left-0 w-full bg-black text-sm font-light flex flex-col space-y-4 px-5 py-5 lg:hidden">
        <a href="{{ url('/') }}#home" class="relative group">Home<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#C7EEFF] transition-all duration-300 group-hover:w-full"></span></a>
        <a href="{{ url('/') }}#about" class="relative group">About<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#C7EEFF] transition-all duration-300 group-hover:w-full"></span></a>
        <a href="{{ url('/') }}#experience" class="relative group">Experience<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#C7EEFF] transition-all duration-300 group-hover:w-full"></span></a>
        <a href="{{ url('/') }}#project" class="relative group">Project<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#C7EEFF] transition-all duration-300 group-hover:w-full"></span></a>
        <a href="{{ url('/') }}#blog" class="relative group">Blog<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#C7EEFF] transition-all duration-300 group-hover:w-full"></span></a>
        <a href="{{ url('/') }}#contact" class="relative group">Contact<span class="absolute left-0 bottom-0 w-0 h-0.5 bg-[#C7EEFF] transition-all duration-300 group-hover:w-full"></span></a>
    </div>
</nav>
