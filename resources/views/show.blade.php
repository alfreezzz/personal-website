<x-layout-2 :title="$title">
    <div id="blog" class="xl:px-32 px-3 sm:px-5 mt-32 flex max-lg:flex-col lg:justify-between">
        <div class="grow-2 shrink lg:basis-[65%] basis-full lg:pr-5">
            <div class="leading-relaxed">
                <h1 class="sm:text-4xl text-2xl font-bold tracking-wide mb-1">{{ $currentArticle->judul_artikel }}</h1>
                <div class="mb-4 mt-2">
                    <p class="sm:text-sm text-xs font-light tracking-wider">{{ \Carbon\Carbon::parse($currentArticle->created_at)->timezone('Asia/Jakarta')->format('d M Y') }} • <a href="/?jenis_artikel={{ $currentArticle->jenis_artikel }}#blog" class="font-medium hover:text-gray-400">{{ $currentArticle->jenis_artikel }}</a></p>
                </div>
                <img src="{{ asset('storage/' . $currentArticle->img) }}" alt="Article image"
                        class="w-full max-h-[350px] object-cover lg:mb-8 mb-3 lg:mt-5 mt-4 rounded-lg">
                <p class="tracking-wider text-justify text-base leading-relaxed whitespace-pre-line">{{ $currentArticle->isi_artikel }}</p>
            </div>
            <div class="mt-7 max-lg:mb-12 flex justify-between w-full items-center">
                <div class="flex lg:gap-5 gap-3 items-center">
                    <x-btn-edit href="{{ route('blog.edit', $currentArticle->slug) }}"></x-btn-edit>
                    <x-btn-delete action="{{ url('blog/'.$currentArticle->id)}}"></x-btn-delete>
                </div>
                <a href="{{ url('/') }}#blog"
                    class="inline-flex group drop-shadow-[0_1px_3px_rgb(199,238,255)] hover:brightness-150 font-semibold bg-black border-1 border-[#C7EEFF] items-center justify-center rounded-lg sm:px-4 px-3 py-1.5 transition">
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 mr-1 group-hover:-translate-x-1.5 transition" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="#C7EEFF"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg>
                        <span class="sm:text-base text-sm text-[#C7EEFF]">Go back</span>
                </a>
            </div>
        </div>
            
        <div class="grow shrink lg:basis-[35%] basis-full border-l pl-5">
            <h3 class="text-2xl mb-7 font-semibold underline">Recent Posts</h3>
    
            @foreach ($relatedArticles as $related)
            <div class="flex mb-5 items-center">
                <a href="{{ url('blog/' . $related->slug) }}">
                    <div class="w-20 h-20 rounded overflow-hidden">
                        <img src="{{ Storage::exists('public/' . $related->img) ? asset('storage/' . $related->img) : 'https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ=' }}" alt="Related article image"
                             class="w-full h-full object-cover hover:border-2 hover:border-[#0077C0] transition duration-200">
                    </div>
                </a>
                <div class="text-left ml-5">
                    <h4 class="m-0 font-medium tracking-wide leading-[1.3] mb-2 sm:text-base text-xs"><a href="{{ url('blog/' . $related->slug) }}" class="hover:underline">{{ $related->judul_artikel }}</a></h4>
                    <p class="mr-1 my-0 sm:text-sm text-xs font-light tracking-wider">{{ $related->created_at->diffForHumans() }}</p>
                </div>
            </div>        
            @endforeach     
    
        </div>
    </div>        
</x-layout-2>