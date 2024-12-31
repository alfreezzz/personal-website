<div id="about" class="lg:mt-48 mt-52 xl:px-32 px-5">
    <div class="flex max-lg:flex-col lg:gap-12 gap-8 lg:max-h-[360px]">
        <div class="lg:w-[50%] w-full border border-[#C7EEFF] rounded-xl h-[360px] text-[#C7EEFF] flex flex-col justify-end px-4 pb-3 relative overflow-hidden group">
            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                style="background-image: url('assets/images/IMG_20241022_152417.jpg');">
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
            <div class="relative z-10">
                <div class="flex justify-between items-end">
                    <div class="w-[67%]">
                        <h2 class="text-2xl font-bold mb-1 -ml-0.5">-- Me! --</h2>
                        <p class="text-sm leading-tight tracking-wide">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et dui eget odio vehicula finibus. 
                            Ut tempor ultrices elit vitae maximus.
                        </p>
                    </div>
                    <a href="{{ asset('assets/files/CV Alfriza Akhmad Rahadi.pdf') }}" download class="hover:underline text-black font-bold decoration-2 bg-[#C7EEFF] border-2 border-black rounded-lg px-4 py-1 text-sm hover:bg-black hover:text-[#C7EEFF] hover:border-[#C7EEFF] transition">Download CV</a>
                </div>
            </div>
        </div>              
        
        <div class="lg:w-[50%] border border-[#C7EEFF] rounded-xl p-5 shadow-[#C7EEFF] shadow-inner">
            <h2 class="text-center text-2xl font-bold text-[#0077C0] tracking-wide -mt-3">-- Skills --</h2>
            <a class="bg-black border border-[#C7EEFF] rounded-xl px-4 py-0.5 text-sm tracking-wider hover:bg-[#C7EEFF] hover:text-black transition" href="{{ url('skill/create') }}">New skill</a>
            @if($skills->isEmpty())
                <p class="text-center text-gray-400 my-16 lg:my-28">Skill has not yet been added.</p>
            @else
            <div class="grid grid-cols-2 mt-4 gap-x-12 gap-y-4">
                @foreach ($skills as $skill)
                <div class="">
                    <div class="flex justify-between mx-2">
                        <h4 class="text-md font-medium tracking-wider">{{ $skill->bahasa }}</h4>
                        <h4 class="font-bold">{{ $skill->persen }}%</h4>
                    </div>
                    <div class="w-full rounded-full h-4 bg-gray-700">
                        <div class="h-4 rounded-full" style="width: {{ $skill->persen }}%; background-color: #{{ $skill->warna }};"></div>
                    </div>  
                    <div class="flex gap-2 mt-2">
                        <button class="bg-black border border-[#C7EEFF] rounded-xl px-3 py-0.5 text-xs tracking-wider hover:bg-[#C7EEFF] hover:text-black transition"><a href="{{ route('skill.edit', $skill->id) }}">Update</a></button>
                        <form action="{{url('skill/'.$skill->id)}}" method="POST"  class="bg-black py-0.5 border border-[#C7EEFF] rounded-xl px-3 text-xs tracking-wider hover:bg-[#C7EEFF] hover:text-black transition"
                            onsubmit="return confirm('Are u sure?')">
                            @method('delete')
                            @csrf
                            <button>Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
                
            </div>
            @endif
        </div>
    </div>
</div>