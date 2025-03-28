<div id="experience" class="scroll-section mt-32 lg:px-8 sm:px-5 px-3 py-3 xl:mx-32 mx-5 border border-[#C7EEFF] rounded-lg shadow-lg shadow-[#C7EEFF] relative">
    <x-header>Experience</x-header>
    <x-sub-header></x-sub-header>
    <x-btn-add href="{{ url('experience/create') }}">experience</x-btn-add>
    <div class="timeline-line absolute left-4 sm:left-32 lg:left-44 w-px top-[7.5rem] lg:top-[9.5rem] bottom-[30px] lg:bottom-12 bg-[#C7EEFF]"></div>
    <div id="timeline-circle" class="absolute sm:w-5 sm:h-5 w-4 h-4 bg-[#0077C0] top-[7.5rem] lg:top-[9.5rem] rounded-full left-4 sm:left-32 lg:left-44" style="transform: translateX(-50%); z-index: 2"></div>
    
    @if($experiences->isEmpty())
        <p class="text-center text-gray-400 my-16">Experience has not yet been added.</p>
    @else
        <div id="experiences-container" class="space-y-16 lg:mt-12 mt-8 mb-4">
            @foreach($experiences as $experience)
                <div class="flex relative">
                    <div class="flex">
                        <div class="max-sm:hidden font-light tracking-widest lg:w-36 w-[6.5rem] lg:text-base text-sm">
                            {{ $experience->thn_mulai }} - <span class="text-right">{{ $experience->thn_selesai ?? 'Now' }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center opacity-0">
                        <!-- Hidden placeholder -->
                        <div class="sm:w-5 sm:h-5 w-4 h-4 rounded-full"></div>
                    </div>
                    <div class="lg:ml-10 sm:ml-5 ml-1">
                        <div class="sm:hidden font-light tracking-widest text-xs">
                            {{ $experience->thn_mulai }} - {{ $experience->thn_selesai ?? 'Now' }}
                        </div>
                        <h2 class="lg:text-lg text-base sm:font-bold font-semibold tracking-wide lg:mb-5 mb-3">
                            {{ $experience->nama_perusahaan }} - {{ $experience->posisi }}
                        </h2>
                        <p class="leading-normal tracking-wider font-light text-justify lg:text-base text-sm">
                            {{ $experience->deskripsi }}
                        </p>
                        <div class="flex lg:space-x-4 space-x-3 mt-4">
                            <x-btn-edit href="{{ route('experience.edit', $experience->id) }}"></x-btn-edit>
                            <x-btn-delete action="{{ url('experience/'.$experience->id)}}"></x-btn-delete>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>