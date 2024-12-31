<div id="blog" class="mt-32 xl:px-32 px-5">
    <x-header>My Blog</x-header>
    <div class="justify-between flex">
        <div class="">
            <x-button><a href="{{ url('blog/create') }}">New article</a></x-button>
        </div>
        <form action="{{ url('#blog') }}" method="GET" class="flex items-center" id="filterForm">
            <div class="relative" x-data="{ isOpen: false }">
                <button
                    type="button"
                    @click="isOpen = !isOpen"
                    class="flex lg:tracking-widest tracking-wide sm:tracking-wider items-center justify-between w-full lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] bg-black rounded-md shadow ring-2 ring-inset ring-[#C7EEFF] hover:bg-gray-800"
                    id="jenis-apk-menu-button"
                    aria-expanded="true"
                    aria-haspopup="true"
                >
                    All article
                    <svg
                        class="w-5 h-5 ml-2 text-gray-300"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
            
                <div
                    x-show="isOpen"
                    @click.away="isOpen = false"
                    x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75 transform"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 z-10 mt-2 w-56 origin-top-right bg-black rounded-md shadow-lg ring-1 ring-[#C7EEFF] focus:outline-none"
                    role="menu"
                >
                    <div class="py-1" role="none">
                        <a
                            href="{{ url('/') }}#blog" 
                            class="block lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100"
                        >
                            All article
                        </a>
                        @foreach($blogcategories as $blogcategory)
                            <a
                                href="?jenis_artikel={{ $blogcategory->jenis_artikel }}#blog"
                                class="block lg:px-4 px-3 py-1 text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100"
                            >
                                {{ $blogcategory->jenis_artikel }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>         
    </div>   
    @if($blogs->isEmpty())
        <p class="text-center text-gray-400 my-16">Article has not yet been added.</p>
    @else
    <div class="grid lg:grid-cols-3 sm:grid-cols-2 sm:gap-5 gap-3 max-sm:mt-5 pt-5 mx-auto">

        @foreach ($blogs as $blog)
        <div class="card flex flex-col sm:border border-[#C7EEFF] sm:p-4 text-left rounded-md lg:pb-12 pb-8">
            <div class="w-full max-sm:hidden relative mb-4 overflow-hidden rounded sm:h-[200px] h-[250px]">
                <a href="{{ url('blog/' . $blog->slug) }}">
                    <img src="{{ Storage::exists('public/' . $blog->img) ? asset('storage/' . $blog->img) : 'https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ=' }}" 
                        alt="Article" 
                        class="w-full h-full object-cover hover:border-2 hover:border-[#0077C0] transition duration-200">
                </a>
            </div>
            <div class="text-left flex-grow text-sm leading-normal">
                <a href="{{ url('blog/' . $blog->slug) }}"><h3 class="text-lg font-semibold tracking-wider hover:underline leading-tight mb-2">{{$blog->judul_artikel}}</h3></a>
                <div class="flex justify-between blogs-center mb-4">
                    <h4 class="font-extralight">{{ $blog->created_at->diffForHumans() }}</h4>
                    <a href="?jenis_artikel={{ $blog->jenis_artikel }}#blog" class="px-2 rounded-xl bg-[#0077C0] text-sm font-light tracking-wider hover:bg-[#005a99] transition duration-200">{{ $blog->jenis_artikel }}</a>
                </div>
                <a href="{{ url('blog/' . $blog->slug) }}"><p class="hover:underline">{!! Str::limit(strip_tags($blog->isi_artikel), 150) !!}</p></a>
            </div>
            <hr class="sm:hidden mt-5">
        </div>
        @endforeach

    </div>
    @endif
</div>