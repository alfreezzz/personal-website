<div id="blog" class="scroll-section mt-32 xl:px-32 px-3 sm:px-5">
    <x-header>Blog</x-header>
    <x-sub-header></x-sub-header>
    <div class="justify-between flex">
        @if(request()->query('token') === env('ADMIN_ACCESS_TOKEN'))
            <x-btn-add href="{{ url('admin/blog/create') . '?' . http_build_query(['token' => request()->query('token')]) }}">article</x-btn-add>
        @endif
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
                            href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#blog" 
                            class="block lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100"
                        >
                            All article
                        </a>
                        @foreach($blogcategories as $blogcategory)
                            <a
                                href="{{ url()->current() . '?' . http_build_query(array_merge(request()->query(), ['jenis_artikel' => $blogcategory->jenis_artikel])) }}#blog"
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
        <div class="flex flex-col max-w-screen-mobile-m justify-center items-center mx-auto max-sm:mt-5">
            <svg class="w-1/5 h-1/5" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#9ca3af"><path d="M280-280h280v-80H280v80Zm0-160h400v-80H280v80Zm0-160h400v-80H280v80Zm-80 480q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>
            <p class="text-center text-gray-400 mb-4 mt-2 font-light sm:text-base text-sm">Article has not yet been added.</p>
            <x-cta-btn href="{{ url('admin/blog/create') . '?' . http_build_query(['token' => request()->query('token')]) }}">Write an article</x-cta-btn>
        </div>
    @else
    <div class="grid lg:grid-cols-3 sm:grid-cols-2 sm:gap-5 gap-3 max-sm:mt-5 pt-5 mx-auto">

        @foreach ($blogs as $blog)
        <div class="card flex flex-col sm:border border-[#C7EEFF] sm:p-4 text-left rounded-md lg:pb-12 pb-8">
            <div class="w-full max-sm:hidden relative mb-4 overflow-hidden rounded sm:h-[200px] h-[250px]">
                <a href="{{ url('blog/' . $blog->slug) . '?' . http_build_query(['token' => request()->query('token')]) }}">
                    <img src="{{ Storage::exists('public/' . $blog->img) ? asset('storage/' . $blog->img) : 'https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ=' }}" 
                        alt="Article" 
                        class="w-full h-full object-cover hover:border-2 border-[#0077C0] transition duration-200">
                </a>
            </div>
            <div class="text-left flex-grow text-sm leading-normal">
                <a href="{{ url('blog/' . $blog->slug) . '?' . http_build_query(['token' => request()->query('token')]) }}"><h3 class="sm:text-lg text-base font-semibold tracking-wider hover:underline leading-tight mb-2">{{$blog->judul_artikel}}</h3></a>
                <div class="mb-4">
                    <p class="font-extralight text-sm">{{ $blog->created_at->diffForHumans() }} • <a href="{{ url()->current() . '?' . http_build_query(array_merge(request()->query(), ['jenis_artikel' => $blog->jenis_artikel])) }}#blog" class="font-medium hover:text-gray-400">{{ $blog->jenis_artikel }}</a></p>
                </div>
                <a href="{{ url('blog/' . $blog->slug) . '?' . http_build_query(['token' => request()->query('token')]) }}"><p class="hover:underline text-sm leading-relaxed">{!! Str::limit(strip_tags($blog->isi_artikel), 150) !!}</p></a>
            </div>
            <hr class="sm:hidden mt-5">
        </div>
        @endforeach

    </div>
    @endif
</div>