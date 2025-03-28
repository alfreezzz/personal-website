<x-layout-2 :title="$title">
    <div id="project" class="mt-28 xl:px-32 sm:px-5 px-3 mx-auto">
        <x-header>{{ $title }}</x-header>          

        <div class="flex flex-col lg:gap-12 gap-16 mt-5 mx-auto">

            <form action="{{ route('portofolio.update', ['portofolio' => $projects->id, 'token' => request()->query('token')]) }}" method="POST" enctype="multipart/form-data" class="">
                @csrf
                @method('PUT')
                <input type="hidden" name="token" value="{{ request()->query('token') }}">

                <div class="flex max-lg:flex-col justify-between items-start mb-5">
                    <div href="#" class="lg:w-1/3 w-full">
                        <div class="relative">
                            <input type="file" name="img" id="imageInput" accept="image/*" onchange="previewImage(event)" class="hidden">
                            <label for="imageInput" class="border border-[#c7eeff2f] bg-black w-full rounded-md px-2 py-1 text-center cursor-pointer text-white hover:ring-2 hover:ring-[#0077C0]">
                                Input your image
                            </label>
                            @error('img')
                                <span class="text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <img src="{{ $projects->img ? asset('storage/' . $projects->img) : '' }}" 
                            alt="Project" id="imagePreview"
                            class="object-cover mt-5 w-full h-auto rounded-lg border border-[#c7eeff2f] hover:border-2 hover:border-[#0077C0] transition duration-200">
                    </div>
                    
                    <div class="lg:w-2/3 w-full lg:ml-6">
                        <div class="flex items-center justify-between space-x-2 mb-2 max-lg:mt-3">
                            <input type="text" name="nama_apk" placeholder="App name" 
                                value="{{ old('nama_apk', $projects->nama_apk) }}" 
                                class="border border-[#c7eeff2f] bg-black w-full rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-[#0077C0]">
                            @error('nama_apk')
                                <span class="text-sm">{{ $message }}</span>
                            @enderror
                            <input type="date" name="tgl_selesai" placeholder="Finished date" 
                                value="{{ old('tgl_selesai', $projects->tgl_selesai ? \Carbon\Carbon::parse($projects->tgl_selesai)->toDateString() : '') }}" 
                                class="border border-[#c7eeff2f] bg-black w-36 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-[#0077C0]">
                            @error('tgl_selesai')
                                <span class="text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative" x-data="{ isOpen: false, selected: '{{ old('jenis_apk', $projects->jenis_apk) }}' }">
                            <button
                                type="button"
                                @click="isOpen = !isOpen"
                                class="flex items-center justify-between w-40 lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] bg-black rounded-md shadow ring-2 ring-inset ring-[#c7eeff2f] hover:bg-gray-800"
                                id="jenis-apk-menu-button"
                                aria-expanded="true"
                                aria-haspopup="true"
                            >
                                <span x-text="selected"></span>
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
                                class="absolute z-10 mt-2 w-40 bg-black rounded-md shadow-lg ring-1 ring-[#c7eeff2f] focus:outline-none"
                            >
                                <ul class="py-1" role="listbox">
                                    <li
                                        class="block lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100 cursor-pointer"
                                        @click="selected = 'Web app'; isOpen = false"
                                    >
                                        Web app
                                    </li>
                                    <li
                                        class="block lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100 cursor-pointer"
                                        @click="selected = 'Desktop app'; isOpen = false"
                                    >
                                        Desktop app
                                    </li>
                                    <li
                                        class="block lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100 cursor-pointer"
                                        @click="selected = 'Mobile app'; isOpen = false"
                                    >
                                        Mobile app
                                    </li>
                                    <li
                                        class="block lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100 cursor-pointer"
                                        @click="selected = 'UI/UX'; isOpen = false"
                                    >
                                        UI/UX
                                    </li>
                                </ul>
                            </div>
                    
                            <input type="hidden" name="jenis_apk" :value="selected">
                            @error('jenis_apk')
                                <span class="text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <textarea name="deskripsi" placeholder="Content" 
                                class="border border-[#c7eeff2f] bg-black w-full rounded-md px-2 py-1 resize-none mt-3 h-24 focus:outline-none focus:ring-2 focus:ring-[#0077C0]">{{ old('deskripsi', $projects->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <span class="text-sm">{{ $message }}</span>
                        @enderror
                        <div class="lg:mt-7 mt-5 flex justify-between items-center">
                            <div class="grid grid-cols-4 sm:grid-cols-9">
                                <label class="flex items-center justify-center rounded-full border border-[#C7EEFF] w-10 h-10 hover:bg-[#C7EEFF] transition duration-200 cursor-pointer">
                                    <input type="checkbox" name="bahasa[]" value="HTML5" class="hidden peer" />
                                    <svg role="img" class="sm:w-5 sm:h-5 w-4 h-4 peer-checked:fill-[#c7eeff2f]" fill="#E34F26" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>HTML5</title><path d="M1.5 0h21l-1.91 21.563L11.977 24l-8.564-2.438L1.5 0zm7.031 9.75l-.232-2.718 10.059.003.23-2.622L5.412 4.41l.698 8.01h9.126l-.326 3.426-2.91.804-2.955-.81-.188-2.11H6.248l.33 4.171L12 19.351l5.379-1.443.744-8.157H8.531z"/></svg>
                                </label>
                                <label class="flex items-center justify-center rounded-full border border-[#C7EEFF] w-10 h-10 hover:bg-[#C7EEFF] transition duration-200 cursor-pointer">
                                    <input type="checkbox" name="bahasa[]" value="CSS3" class="hidden peer" />
                                    <svg role="img" class="sm:w-5 sm:h-5 w-4 h-4 peer-checked:fill-[#c7eeff2f]" fill="#1572B6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>CSS3</title><path d="M1.5 0h21l-1.91 21.563L11.977 24l-8.565-2.438L1.5 0zm17.09 4.413L5.41 4.41l.213 2.622 10.125.002-.255 2.716h-6.64l.24 2.573h6.182l-.366 3.523-2.91.804-2.956-.81-.188-2.11h-2.61l.29 3.855L12 19.288l5.373-1.53L18.59 4.414z"/></svg>
                                </label>
                                <label class="flex items-center justify-center rounded-full border border-[#C7EEFF] w-10 h-10 hover:bg-[#C7EEFF] transition duration-200 cursor-pointer">
                                    <input type="checkbox" name="bahasa[]" value="Javascript" class="hidden peer" />
                                    <svg role="img" class="sm:w-5 sm:h-5 w-4 h-4 peer-checked:fill-[#c7eeff2f]" fill="#F7DF1E" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>JavaScript</title><path d="M0 0h24v24H0V0zm22.034 18.276c-.175-1.095-.888-2.015-3.003-2.873-.736-.345-1.554-.585-1.797-1.14-.091-.33-.105-.51-.046-.705.15-.646.915-.84 1.515-.66.39.12.75.42.976.9 1.034-.676 1.034-.676 1.755-1.125-.27-.42-.404-.601-.586-.78-.63-.705-1.469-1.065-2.834-1.034l-.705.089c-.676.165-1.32.525-1.71 1.005-1.14 1.291-.811 3.541.569 4.471 1.365 1.02 3.361 1.244 3.616 2.205.24 1.17-.87 1.545-1.966 1.41-.811-.18-1.26-.586-1.755-1.336l-1.83 1.051c.21.48.45.689.81 1.109 1.74 1.756 6.09 1.666 6.871-1.004.029-.09.24-.705.074-1.65l.046.067zm-8.983-7.245h-2.248c0 1.938-.009 3.864-.009 5.805 0 1.232.063 2.363-.138 2.711-.33.689-1.18.601-1.566.48-.396-.196-.597-.466-.83-.855-.063-.105-.11-.196-.127-.196l-1.825 1.125c.305.63.75 1.172 1.324 1.517.855.51 2.004.675 3.207.405.783-.226 1.458-.691 1.811-1.411.51-.93.402-2.07.397-3.346.012-2.054 0-4.109 0-6.179l.004-.056z"/></svg>
                                </label>
                                <label class="flex items-center justify-center rounded-full border border-[#C7EEFF] w-10 h-10 hover:bg-[#C7EEFF] transition duration-200 cursor-pointer">
                                    <input type="checkbox" name="bahasa[]" value="PHP" class="hidden peer" />
                                    <svg role="img" class="sm:w-5 sm:h-5 w-4 h-4 peer-checked:fill-[#c7eeff2f]" fill="#777BB4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>PHP</title><path d="M7.01 10.207h-.944l-.515 2.648h.838c.556 0 .97-.105 1.242-.314.272-.21.455-.559.55-1.049.092-.47.05-.802-.124-.995-.175-.193-.523-.29-1.047-.29zM12 5.688C5.373 5.688 0 8.514 0 12s5.373 6.313 12 6.313S24 15.486 24 12c0-3.486-5.373-6.312-12-6.312zm-3.26 7.451c-.261.25-.575.438-.917.551-.336.108-.765.164-1.285.164H5.357l-.327 1.681H3.652l1.23-6.326h2.65c.797 0 1.378.209 1.744.628.366.418.476 1.002.33 1.752a2.836 2.836 0 0 1-.305.847c-.143.255-.33.49-.561.703zm4.024.715l.543-2.799c.063-.318.039-.536-.068-.651-.107-.116-.336-.174-.687-.174H11.46l-.704 3.625H9.388l1.23-6.327h1.367l-.327 1.682h1.218c.767 0 1.295.134 1.586.401s.378.7.263 1.299l-.572 2.944h-1.389zm7.597-2.265a2.782 2.782 0 0 1-.305.847c-.143.255-.33.49-.561.703a2.44 2.44 0 0 1-.917.551c-.336.108-.765.164-1.286.164h-1.18l-.327 1.682h-1.378l1.23-6.326h2.649c.797 0 1.378.209 1.744.628.366.417.477 1.001.331 1.751zM17.766 10.207h-.943l-.516 2.648h.838c.557 0 .971-.105 1.242-.314.272-.21.455-.559.551-1.049.092-.47.049-.802-.125-.995s-.524-.29-1.047-.29z"/></svg>
                                </label>
                                <label class="flex items-center justify-center rounded-full border border-[#C7EEFF] w-10 h-10 hover:bg-[#C7EEFF] transition duration-200 cursor-pointer">
                                    <input type="checkbox" name="bahasa[]" value="Laravel" class="hidden peer" />
                                    <svg role="img" class="sm:w-5 sm:h-5 w-4 h-4 peer-checked:fill-[#c7eeff2f]" fill="#FF2D20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Laravel</title><path d="M23.642 5.43a.364.364 0 01.014.1v5.149c0 .135-.073.26-.189.326l-4.323 2.49v4.934a.378.378 0 01-.188.326L9.93 23.949a.316.316 0 01-.066.027c-.008.002-.016.008-.024.01a.348.348 0 01-.192 0c-.011-.002-.02-.008-.03-.012-.02-.008-.042-.014-.062-.025L.533 18.755a.376.376 0 01-.189-.326V2.974c0-.033.005-.066.014-.098.003-.012.01-.02.014-.032a.369.369 0 01.023-.058c.004-.013.015-.022.023-.033l.033-.045c.012-.01.025-.018.037-.027.014-.012.027-.024.041-.034H.53L5.043.05a.375.375 0 01.375 0L9.93 2.647h.002c.015.01.027.021.04.033l.038.027c.013.014.02.03.033.045.008.011.02.021.025.033.01.02.017.038.024.058.003.011.01.021.013.032.01.031.014.064.014.098v9.652l3.76-2.164V5.527c0-.033.004-.066.013-.098.003-.01.01-.02.013-.032a.487.487 0 01.024-.059c.007-.012.018-.02.025-.033.012-.015.021-.03.033-.043.012-.012.025-.02.037-.028.014-.01.026-.023.041-.032h.001l4.513-2.598a.375.375 0 01.375 0l4.513 2.598c.016.01.027.021.042.031.012.01.025.018.036.028.013.014.022.03.034.044.008.012.019.021.024.033.011.02.018.04.024.06.006.01.012.021.015.032zm-.74 5.032V6.179l-1.578.908-2.182 1.256v4.283zm-4.51 7.75v-4.287l-2.147 1.225-6.126 3.498v4.325zM1.093 3.624v14.588l8.273 4.761v-4.325l-4.322-2.445-.002-.003H5.04c-.014-.01-.025-.021-.04-.031-.011-.01-.024-.018-.035-.027l-.001-.002c-.013-.012-.021-.025-.031-.04-.01-.011-.021-.022-.028-.036h-.002c-.008-.014-.013-.031-.02-.047-.006-.016-.014-.027-.018-.043a.49.49 0 01-.008-.057c-.002-.014-.006-.027-.006-.041V5.789l-2.18-1.257zM5.23.81L1.47 2.974l3.76 2.164 3.758-2.164zm1.956 13.505l2.182-1.256V3.624l-1.58.91-2.182 1.255v9.435zm11.581-10.95l-3.76 2.163 3.76 2.163 3.759-2.164zm-.376 4.978L16.21 7.087 14.63 6.18v4.283l2.182 1.256 1.58.908zm-8.65 9.654l5.514-3.148 2.756-1.572-3.757-2.163-4.323 2.489-3.941 2.27z"/></svg>
                                </label>
                                <label class="flex items-center justify-center rounded-full border border-[#C7EEFF] w-10 h-10 hover:bg-[#C7EEFF] transition duration-200 cursor-pointer">
                                    <input type="checkbox" name="bahasa[]" value="Tailwind CSS" class="hidden peer" />
                                    <svg role="img" class="sm:w-5 sm:h-5 w-4 h-4 peer-checked:fill-[#c7eeff2f]" fill="#06B6D4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Tailwind CSS</title><path d="M12.001,4.8c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 C13.666,10.618,15.027,12,18.001,12c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C16.337,6.182,14.976,4.8,12.001,4.8z M6.001,12c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 c1.177,1.194,2.538,2.576,5.512,2.576c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C10.337,13.382,8.976,12,6.001,12z"/></svg>
                                </label>
                                <label class="flex items-center justify-center rounded-full border border-[#C7EEFF] w-10 h-10 hover:bg-[#C7EEFF] transition duration-200 cursor-pointer">
                                    <input type="checkbox" name="bahasa[]" value="Alpine JS" class="hidden peer" />
                                    <svg role="img" class="sm:w-5 sm:h-5 w-4 h-4 peer-checked:fill-[#c7eeff2f]" fill="#8BC0D0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Alpine.js</title><path d="m24 12-5.72 5.746-5.724-5.741 5.724-5.75L24 12zM5.72 6.254 0 12l5.72 5.746h11.44L5.72 6.254z"/></svg>
                                </label>
                                <label class="flex items-center justify-center rounded-full border border-[#C7EEFF] w-10 h-10 hover:bg-[#C7EEFF] transition duration-200 cursor-pointer">
                                    <input type="checkbox" name="bahasa[]" value="Figma" class="hidden peer" />
                                    <svg role="img" class="sm:w-5 sm:h-5 w-4 h-4 peer-checked:fill-[#c7eeff2f]" fill="#F24E1E" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Figma</title><path d="M15.852 8.981h-4.588V0h4.588c2.476 0 4.49 2.014 4.49 4.49s-2.014 4.491-4.49 4.491zM12.735 7.51h3.117c1.665 0 3.019-1.355 3.019-3.019s-1.355-3.019-3.019-3.019h-3.117V7.51zm0 1.471H8.148c-2.476 0-4.49-2.014-4.49-4.49S5.672 0 8.148 0h4.588v8.981zm-4.587-7.51c-1.665 0-3.019 1.355-3.019 3.019s1.354 3.02 3.019 3.02h3.117V1.471H8.148zm4.587 15.019H8.148c-2.476 0-4.49-2.014-4.49-4.49s2.014-4.49 4.49-4.49h4.588v8.98zM8.148 8.981c-1.665 0-3.019 1.355-3.019 3.019s1.355 3.019 3.019 3.019h3.117V8.981H8.148zM8.172 24c-2.489 0-4.515-2.014-4.515-4.49s2.014-4.49 4.49-4.49h4.588v4.441c0 2.503-2.047 4.539-4.563 4.539zm-.024-7.51a3.023 3.023 0 0 0-3.019 3.019c0 1.665 1.365 3.019 3.044 3.019 1.705 0 3.093-1.376 3.093-3.068v-2.97H8.148zm7.704 0h-.098c-2.476 0-4.49-2.014-4.49-4.49s2.014-4.49 4.49-4.49h.098c2.476 0 4.49 2.014 4.49 4.49s-2.014 4.49-4.49 4.49zm-.097-7.509c-1.665 0-3.019 1.355-3.019 3.019s1.355 3.019 3.019 3.019h.098c1.665 0 3.019-1.355 3.019-3.019s-1.355-3.019-3.019-3.019h-.098z"/></svg>
                                </label>
                                @error('bahasa[]')
                                    <span class="text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="url" name="url" placeholder="Link (if relevant)" 
                                value="{{ old('url', $projects->url) }}" 
                                class="border border-[#c7eeff2f] bg-black sm:w-64 w-32 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-[#0077C0]">
                            @error('url')
                                <span class="text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-btn-submit>Update</x-btn-submit>
            </form>

        </div>    
    </div>
    <script>
        function previewImage(event) {
            const imageInput = event.target;
            const imagePreview = document.getElementById('imagePreview');

            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                }
                reader.readAsDataURL(imageInput.files[0]);
            }
        }
    </script>
</x-layout-2>