<div id="blog" class="xl:px-32 px-5 mt-32 flex max-lg:flex-col lg:justify-between">
    <div class="grow-2 shrink lg:basis-[65%] basis-full lg:pr-5">
        <div class="leading-relaxed">
            <img src="{{ asset('assets/images/IMG_20241022_152417.jpg') }}" alt="Article image"
                    class="w-full max-h-[350px] object-cover lg:mb-5 mb-3 rounded-lg">
            <h1 class="text-2xl mb-5 font-bold tracking-wide">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
            <p class="tracking-wider text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et odio voluptate deserunt iste facere quisquam perferendis accusantium minus! Dolore debitis culpa provident itaque iusto, consectetur beatae, qui repellat exercitationem nisi eveniet accusantium fuga voluptatem ipsa earum sint inventore dicta numquam totam, odio delectus voluptates rem! Consectetur quis soluta vitae nostrum quos aperiam. Sapiente maiores saepe dolor? Sit tempora voluptatibus explicabo dolorem, fugit ullam officia alias quaerat quibusdam suscipit laudantium! Aperiam id voluptas pariatur, architecto, sit perspiciatis ex reiciendis voluptatem est, molestias hic reprehenderit. A esse illo totam, amet libero illum corporis ab velit tempora quo quod obcaecati vel debitis architecto.</p>
        </div>
        <div class="mt-7 max-lg:mb-12 flex justify-between w-full">
            <div class="flex lg:gap-5 gap-3 items-start">
                <x-button>Edit</x-button>
                <x-button>Delete</x-button>
            </div>
            <x-button><a href="{{ url('/') }}">&larr; Go back</a></x-button>
        </div>
    </div>
        
    <div class="grow shrink lg:basis-[35%] basis-full border-l pl-5">
        <h3 class="text-2xl mb-7 font-semibold">Other articles</h3>

        <div class="flex mb-5 items-center">
            <a href="#">
                <div class="w-20 h-20 rounded overflow-hidden">
                    <img src="https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ=" alt="Related article image"
                         class="w-full h-full object-cover hover:border-2 hover:border-[#0077C0] transition duration-200">
                </div>
            </a>
            <div class="text-left ml-5">
                <h4 class="m-0 font-medium tracking-wide leading-[1.3] mb-2"><a href="" class="hover:underline">PPN Naik 12%</a></h4>
                <p class="mr-1 my-0 text-sm font-light tracking-wider">24-12-2024</p>
            </div>
        </div>        
        <div class="flex mb-5 items-center">
            <a href="#">
                <div class="w-20 h-20 rounded overflow-hidden">
                    <img src="{{ asset('assets/images/IMG_20241022_152417.jpg') }}" alt="Related article image"
                         class="w-full h-full object-cover hover:border-2 hover:border-[#0077C0] transition duration-200">
                </div>
            </a>
            <div class="text-left ml-5">
                <h4 class="m-0 font-medium tracking-wide leading-[1.3] mb-2"><a href="" class="hover:underline">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a></h4>
                <p class="mr-1 my-0 text-sm font-light tracking-wider">24-12-2024</p>
            </div>
        </div>        

    </div>
</div>
