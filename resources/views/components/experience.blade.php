<div id="experience" class="mt-32 lg:px-8 px-5 py-3 xl:mx-32 mx-5 border border-[#C7EEFF] rounded-lg shadow-lg shadow-[#C7EEFF]">
    <x-header>Experiences</x-header>
    <x-button><a href="{{ url('experience/create') }}">New experience</a></x-button>
    <div class="space-y-16 lg:mt-12 mt-8 mb-4 lg:mb-8">

        @foreach($experiences as $experience)
        <div class="flex">
            <div class="flex">
                <div class="font-light tracking-widest lg:w-36 lg:text-base text-xs w-16">{{ $experience->thn_mulai }} - 
                    <div class="text-right">{{ $experience->thn_selesai ?? 'Now' }}</div>
                </div>
            </div>
            <div class="flex flex-col items-center">
                <div class="lg:w-5 lg:h-5 w-4 h-4 bg-[#0077C0] rounded-full"></div>
                <div class="w-px h-full bg-[#C7EEFF]"></div>
            </div>
            <div class="lg:ml-10 ml-5">
                <h2 class="lg:text-xl text-base font-bold tracking-wide lg:mb-5 mb-3">{{ $experience->nama_perusahaan }} - {{ $experience->posisi }}</h2>
                <p class="leading-normal tracking-wider font-light text-justify lg:text-base text-sm">{{ $experience->deskripsi }}</p>
                <div class="flex lg:space-x-4 space-x-3 mt-4">
                    <x-button><a href="{{ route('experience.edit', $experience->id) }}">Revise</a></x-button>
                    <form action="{{ url('experience/'.$experience->id)}}" method="POST"  class="bg-black border-2 border-[#C7EEFF] rounded-lg lg:px-4 px-3 py-1 lg:text-base sm:text-sm text-xs lg:tracking-widest tracking-wide sm:tracking-wider hover:bg-[#C7EEFF] hover:text-black transition"
                        onsubmit="return confirm('Are u sure?')">
                        @method('delete')
                        @csrf
                        <button>Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>