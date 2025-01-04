<div id="project" class="mt-32 xl:px-32 px-5 mx-auto">
    <x-header>Projects I've Made</x-header>
    <div class="justify-between flex my-5">
        <div class="">
            <x-button><a href="{{ url('portofolio/create') }}">New project</a></x-button>
        </div>

        <form action="{{ url('#project') }}" method="GET" class="flex items-center" id="filterForm">
            <div class="relative" x-data="{ isOpen: false }">
                <button
                    type="button"
                    @click="isOpen = !isOpen"
                    class="flex lg:tracking-widest tracking-wide sm:tracking-wider items-center justify-between w-full lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] bg-black rounded-md shadow ring-2 ring-inset ring-[#C7EEFF] hover:bg-gray-800"
                    id="jenis-apk-menu-button"
                    aria-expanded="true"
                    aria-haspopup="true"
                >
                    All app
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
                            href="{{ url('/') }}#project" 
                            class="block lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100"
                        >
                            All app
                        </a>
                        @foreach($projectcategories as $projectcategory)
                            <a
                                href="?jenis_apk={{ $projectcategory->jenis_apk }}#project"
                                class="block lg:px-4 px-3 py-1 text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100"
                            >
                                {{ $projectcategory->jenis_apk }}
                            </a>
                        @endforeach
                        <div class="border-t border-[#C7EEFF]"></div>
                        <a
                            href="?filter=latest#project"
                            class="block lg:px-4 px-3 py-1 text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100"
                        >
                            Latest
                        </a>
                        <a
                            href="?filter=oldest#project"
                            class="block lg:px-4 px-3 py-1 text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100"
                        >
                            Oldest
                        </a>
                    </div>
                </div>
            </div>
        </form>
                
    </div>           

    @if($projects->isEmpty())
        <p class="text-center text-gray-400 my-16">Project has not yet been added.</p>
    @else
    <div class="flex flex-col lg:gap-12 gap-16 mt-5 mx-auto">

        @foreach ($projects as $project)
        <div class="">
            <div class="flex max-lg:flex-col justify-between items-start">
                <a href="{{ $project->url ?? "#" }}" class="lg:w-1/3 w-full" target="_blank">
                    <img src="{{ Storage::exists('public/' . $project->img) ? asset('storage/' . $project->img) : 'https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ=' }}" 
                         alt="Project" 
                         class="object-cover w-full lg:h-52 h-64 sm:h-80 rounded-lg hover:border-2 hover:border-[#0077C0] transition duration-200">
                </a>
                
                <div class="lg:w-2/3 w-full lg:ml-6">
                    <div class="flex items-center justify-between mb-2 max-lg:mt-3">
                        <a href="{{ $project->url ?? "#" }}" class="hover:underline" target="_blank">
                            <h2 class="lg:text-2xl text-xl font-semibold lg:mr-6 mr-4">{{ $project->nama_apk }}</h2>
                        </a>
                        <h3 class="lg:text-lg text-gray-400 text-right">{{ $project->tgl_selesai }}</h3>
                    </div>
                    <a href="?jenis_apk={{ $project->jenis_apk }}#project" class="px-3 py-1 rounded-xl bg-[#0077C0] lg:text-sm text-xs font-medium hover:bg-[#005a99] transition duration-200">{{ $project->jenis_apk }}</a>
                    <p class="mt-5 text-gray-300 max-lg:text-sm" id="project-description-{{ $project->id }}">
                        <span class="short-description">
                            {!! Str::limit(strip_tags($project->deskripsi), 125) !!}
                        </span>
                        <span class="full-description hidden">
                            {!! strip_tags($project->deskripsi) !!}
                        </span>
                        @if (strlen(strip_tags($project->deskripsi)) > 125)
                            <a href="javascript:void(0)" class="font-semibold text-[#C7EEFF] hover:underline read-more" data-id="{{ $project->id }}">Read More</a>
                        @endif
                    </p>                    
                    <div class="lg:mt-7 mt-5 flex justify-between items-center">
                        <div class="grid grid-cols-6 sm:grid-cols-9 lg:grid-cols-9">
                            @foreach (json_decode($project->bahasa) as $bahasa)
                                <div class="rounded-full border border-[#C7EEFF] sm:w-10 sm:h-10 w-8 h-8 hover:bg-[#C7EEFF] transition duration-200 flex justify-center items-center">
                                    @switch($bahasa)
                                        @case('HTML5')
                                            <svg role="img" class="sm:w-5 sm:h-5 h-4 w-4" fill="#E34F26" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <title>HTML5</title>
                                                <path d="M1.5 0h21l-1.91 21.563L11.977 24l-8.564-2.438L1.5 0zm7.031 9.75l-.232-2.718 10.059.003.23-2.622L5.412 4.41l.698 8.01h9.126l-.326 3.426-2.91.804-2.955-.81-.188-2.11H6.248l.33 4.171L12 19.351l5.379-1.443.744-8.157H8.531z"/>
                                            </svg>
                                            @break
                                        @case('CSS3')
                                            <svg role="img" class="sm:w-5 sm:h-5 h-4 w-4" fill="#1572B6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <title>CSS3</title>
                                                <path d="M1.5 0h21l-1.91 21.563L11.977 24l-8.565-2.438L1.5 0zm17.09 4.413L5.41 4.41l.213 2.622 10.125.002-.255 2.716h-6.64l.24 2.573h6.182l-.366 3.523-2.91.804-2.956-.81-.188-2.11h-2.61l.29 3.855L12 19.288l5.373-1.53L18.59 4.414z"/>
                                            </svg>
                                            @break
                                        @case('Javascript')
                                            <svg role="img" class="sm:w-5 sm:h-5 h-4 w-4" fill="#F7DF1E" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <title>JavaScript</title>
                                                <path d="M0 0h24v24H0V0zm22.034 18.276c-.175-1.095-.888-2.015-3.003-2.873-.736-.345-1.554-.585-1.797-1.14-.091-.33-.105-.51-.046-.705.15-.646.915-.84 1.515-.66.39.12.75.42.976.9 1.034-.676 1.034-.676 1.755-1.125-.27-.42-.404-.601-.586-.78-.63-.705-1.469-1.065-2.834-1.034l-.705.089c-.676.165-1.32.525-1.71 1.005-1.14 1.291-.811 3.541.569 4.471 1.365 1.02 3.361 1.244 3.616 2.205.24 1.17-.87 1.545-1.966 1.41-.811-.18-1.26-.586-1.755-1.336l-1.83 1.051c.21.48.45.689.81 1.109 1.74 1.756 6.09 1.666 6.871-1.004.029-.09.24-.705.074-1.65l.046.067zm-8.983-7.245h-2.248c0 1.938-.009 3.864-.009 5.805 0 1.232.063 2.363-.138 2.711-.33.689-1.18.601-1.566.48-.396-.196-.597-.466-.83-.855-.063-.105-.11-.196-.127-.196l-1.825 1.125c.305.63.75 1.172 1.324 1.517.855.51 2.004.675 3.207.405.783-.226 1.458-.691 1.811-1.411.51-.93.402-2.07.397-3.346.012-2.054 0-4.109 0-6.179l.004-.056z"/>
                                            </svg>
                                            @break
                                        @case('Laravel')
                                            <svg role="img" class="sm:w-5 sm:h-5 h-4 w-4 peer-checked:fill-[#c7eeff2f]" fill="#FF2D20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Laravel</title><path d="M23.642 5.43a.364.364 0 01.014.1v5.149c0 .135-.073.26-.189.326l-4.323 2.49v4.934a.378.378 0 01-.188.326L9.93 23.949a.316.316 0 01-.066.027c-.008.002-.016.008-.024.01a.348.348 0 01-.192 0c-.011-.002-.02-.008-.03-.012-.02-.008-.042-.014-.062-.025L.533 18.755a.376.376 0 01-.189-.326V2.974c0-.033.005-.066.014-.098.003-.012.01-.02.014-.032a.369.369 0 01.023-.058c.004-.013.015-.022.023-.033l.033-.045c.012-.01.025-.018.037-.027.014-.012.027-.024.041-.034H.53L5.043.05a.375.375 0 01.375 0L9.93 2.647h.002c.015.01.027.021.04.033l.038.027c.013.014.02.03.033.045.008.011.02.021.025.033.01.02.017.038.024.058.003.011.01.021.013.032.01.031.014.064.014.098v9.652l3.76-2.164V5.527c0-.033.004-.066.013-.098.003-.01.01-.02.013-.032a.487.487 0 01.024-.059c.007-.012.018-.02.025-.033.012-.015.021-.03.033-.043.012-.012.025-.02.037-.028.014-.01.026-.023.041-.032h.001l4.513-2.598a.375.375 0 01.375 0l4.513 2.598c.016.01.027.021.042.031.012.01.025.018.036.028.013.014.022.03.034.044.008.012.019.021.024.033.011.02.018.04.024.06.006.01.012.021.015.032zm-.74 5.032V6.179l-1.578.908-2.182 1.256v4.283zm-4.51 7.75v-4.287l-2.147 1.225-6.126 3.498v4.325zM1.093 3.624v14.588l8.273 4.761v-4.325l-4.322-2.445-.002-.003H5.04c-.014-.01-.025-.021-.04-.031-.011-.01-.024-.018-.035-.027l-.001-.002c-.013-.012-.021-.025-.031-.04-.01-.011-.021-.022-.028-.036h-.002c-.008-.014-.013-.031-.02-.047-.006-.016-.014-.027-.018-.043a.49.49 0 01-.008-.057c-.002-.014-.006-.027-.006-.041V5.789l-2.18-1.257zM5.23.81L1.47 2.974l3.76 2.164 3.758-2.164zm1.956 13.505l2.182-1.256V3.624l-1.58.91-2.182 1.255v9.435zm11.581-10.95l-3.76 2.163 3.76 2.163 3.759-2.164zm-.376 4.978L16.21 7.087 14.63 6.18v4.283l2.182 1.256 1.58.908zm-8.65 9.654l5.514-3.148 2.756-1.572-3.757-2.163-4.323 2.489-3.941 2.27z"/></svg>
                                        @break
                                        @case('Tailwind CSS')
                                            <svg role="img" class="sm:w-5 sm:h-5 h-4 w-4 peer-checked:fill-[#c7eeff2f]" fill="#06B6D4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Tailwind CSS</title><path d="M12.001,4.8c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 C13.666,10.618,15.027,12,18.001,12c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C16.337,6.182,14.976,4.8,12.001,4.8z M6.001,12c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 c1.177,1.194,2.538,2.576,5.512,2.576c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C10.337,13.382,8.976,12,6.001,12z"/></svg>
                                        @break
                                        @case('Alpine JS')
                                            <svg role="img" class="sm:w-5 sm:h-5 h-4 w-4 peer-checked:fill-[#c7eeff2f]" fill="#8BC0D0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Alpine.js</title><path d="m24 12-5.72 5.746-5.724-5.741 5.724-5.75L24 12zM5.72 6.254 0 12l5.72 5.746h11.44L5.72 6.254z"/></svg>
                                        @break
                                        <!-- Tambahkan case untuk bahasa lainnya -->
                                        @default
                                            <span class="text-xs font-thin">{{ $bahasa }}</span>
                                    @endswitch
                                </div>
                            @endforeach
                        </div>
                        
                        <a href="{{ $project->url ?? "#" }}" class="sm:text-lg font-medium text-[#0077C0] hover:border-2 border-[#0077C0] px-4 py-1 rounded-md hover:text-[#C7EEFF] transition duration-200" target="_blank">Live preview</a>
                    </div>
                </div>
            </div>
            <div class="flex sm:gap-4 gap-3 mt-5">
                <x-button><a href="{{ route('portofolio.edit', $project->id) }}">Edit</a></x-button>
                <form action="{{ url('portofolio/'.$project->id)}}" method="POST"  class="bg-black border-2 border-[#C7EEFF] rounded-lg lg:px-4 px-3 py-1 lg:text-base sm:text-sm text-xs lg:tracking-widest tracking-wide sm:tracking-wider hover:bg-[#C7EEFF] hover:text-black transition"
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const readMoreLinks = document.querySelectorAll('.read-more');

        readMoreLinks.forEach(link => {
            link.addEventListener('click', function () {
                const projectId = this.getAttribute('data-id');
                const shortDescription = document.querySelector(`#project-description-${projectId} .short-description`);
                const fullDescription = document.querySelector(`#project-description-${projectId} .full-description`);

                // Toggle visibility
                shortDescription.classList.toggle('hidden');
                fullDescription.classList.toggle('hidden');

                // Ubah teks Read More ke Read Less
                if (fullDescription.classList.contains('hidden')) {
                    this.textContent = 'Read More';
                } else {
                    this.textContent = 'Read Less';
                }
            });
        });
    });
</script>
