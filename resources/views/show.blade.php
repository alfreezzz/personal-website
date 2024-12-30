<x-layout-2 :title="$title">
    <div id="blog" class="xl:px-32 px-5 mt-32 flex max-lg:flex-col lg:justify-between">
        <div class="grow-2 shrink lg:basis-[65%] basis-full lg:pr-5">
            <div class="leading-relaxed">
                <img src="{{ asset('storage/' . $currentArticle->img) }}" alt="Article image"
                        class="w-full max-h-[350px] object-cover lg:mb-5 mb-3 rounded-lg">
                <h1 class="text-2xl mb-5 font-bold tracking-wide">{{ $currentArticle->judul_artikel }}</h1>
                <p class="tracking-wider text-justify">{!! $currentArticle->isi_artikel !!}</p>
            </div>
            <div class="mt-7 max-lg:mb-12 flex justify-between w-full">
                <div class="flex lg:gap-5 gap-3 items-start">
                    <x-button><a href="{{ route('blog.edit', $currentArticle->slug) }}">Edit</a></x-button>
                    <form action="{{ url('blog/'.$currentArticle->id)}}" method="POST"  class="bg-black border-2 border-[#C7EEFF] rounded-lg lg:px-4 px-3 py-1 lg:text-base sm:text-sm text-xs lg:tracking-widest tracking-wide sm:tracking-wider hover:bg-[#C7EEFF] hover:text-black transition"
                        onsubmit="return confirm('Are u sure?')">
                        @method('delete')
                        @csrf
                        <button>Delete</button>
                    </form>
                </div>
                <x-button><a href="{{ url('/') }}#blog">&larr; Go back</a></x-button>
            </div>
        </div>
            
        <div class="grow shrink lg:basis-[35%] basis-full border-l pl-5">
            <h3 class="text-2xl mb-7 font-semibold">Recent Posts</h3>
    
            @foreach ($relatedArticles as $related)
            <div class="flex mb-5 items-center">
                <a href="{{ url('blog/' . $related->slug) }}">
                    <div class="w-20 h-20 rounded overflow-hidden">
                        <img src="{{ Storage::exists('public/' . $related->img) ? asset('storage/' . $related->img) : 'https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ=' }}" alt="Related article image"
                             class="w-full h-full object-cover hover:border-2 hover:border-[#0077C0] transition duration-200">
                    </div>
                </a>
                <div class="text-left ml-5">
                    <h4 class="m-0 font-medium tracking-wide leading-[1.3] mb-2"><a href="{{ url('blog/' . $related->slug) }}" class="hover:underline">{{ $related->judul_artikel }}</a></h4>
                    <p class="mr-1 my-0 text-sm font-light tracking-wider">{{ $related->created_at->diffForHumans() }}</p>
                </div>
            </div>        
            @endforeach     
    
        </div>
    </div>        
</x-layout-2>