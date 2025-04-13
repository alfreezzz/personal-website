<div id="experience" class="scroll-section mt-32 lg:px-8 sm:px-5 px-3 pt-3 pb-6 xl:mx-32 mx-5 border border-[#C7EEFF] rounded-lg shadow-lg shadow-[#C7EEFF] relative">
    <x-header>Experience</x-header>
    <x-sub-header>
        <span class="font-medium">Internships</span>, 
        <span class="font-medium">freelance work</span>, and 
        <span class="font-medium">personal projects</span>.
    </x-sub-header>
    @if(request()->query('token') === env('ADMIN_ACCESS_TOKEN'))
        <div class="flex justify-end">
            <x-btn-add href="{{ url('experience/create') . '?' . http_build_query(['token' => request()->query('token')]) }}">
                experience
            </x-btn-add>
        </div>
    @endif

    <div class="timeline-line absolute left-4 sm:left-32 lg:left-44 w-px top-24 sm:top-20 lg:top-32 bottom-9 lg:bottom-10 bg-[#C7EEFF]"></div>
    <div id="timeline-circle" class="absolute sm:w-5 sm:h-5 w-4 h-4 bg-[#0077C0] top-24 sm:top-20 lg:top-32 rounded-full left-4 sm:left-32 lg:left-44" style="transform: translateX(-50%); z-index: 2"></div>
    
    <div id="experiences-container" class="space-y-16 lg:mt-12 mt-8 mb-4">
        @if($experiences->isEmpty())
            <div class="flex flex-col max-w-screen-mobile-m justify-center items-center mx-auto lg:-mt-12 -mt-4">
                <svg class="w-1/5 h-1/5" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#9ca3af">
                    <path d="M160-120q-33 0-56.5-23.5T80-200v-440q0-33 23.5-56.5T160-720h160v-80q0-33 23.5-56.5T400-880h160q33 0 56.5 23.5T640-800v80h160q33 0 56.5 23.5T880-640v440q0 33-23.5 56.5T800-120H160Zm0-80h640v-440H160v440Zm240-520h160v-80H400v80ZM160-200v-440 440Z"/>
                </svg>
                <p class="text-center text-gray-400 mb-4 mt-2 font-light sm:text-base text-sm">
                    Experience has not yet been added.
                </p>
                <x-cta-btn href="{{ url('experience/create') . '?' . http_build_query(['token' => request()->query('token')]) }}">
                    Add an experience
                </x-cta-btn>
            </div>
        @else
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
                        @if(request()->query('token') === env('ADMIN_ACCESS_TOKEN'))
                            <div class="flex lg:space-x-4 space-x-3 mt-4">
                                <x-btn-edit href="{{ route('experience.edit', ['experience' => $experience->id, 'token' => request()->query('token')]) }}"></x-btn-edit>
                                <x-btn-delete action="{{ url('experience/'.$experience->id). '?' . http_build_query(['token' => request()->query('token')])}}"></x-btn-delete>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>