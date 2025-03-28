<x-layout-2 :title="$title">
    <div id="blog" class="xl:px-32 px-3 sm:px-5 mt-28">
        <x-header>{{ $title }}</x-header>
        <form action="{{ route('blog.store', ['token' => request()->query('token')]) }}" method="POST" enctype="multipart/form-data" class="grow-2 shrink basis-full lg:pr-5">
            @csrf
            <input type="hidden" name="token" value="{{ request()->query('token') }}">

            <div class="leading-relaxed">
                <input type="text" name="judul_artikel" placeholder="Title" class="mb-5 mt-3 border border-[#c7eeff2f] bg-black w-full rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-[#0077C0]">
                @error('judul_artikel')
                    <span class="text-sm">{{ $message }}</span>
                @enderror
                <div class="flex justify-between">
                    <div class="relative">
                        <input type="file" name="img" id="imageInput" accept="image/*" onchange="previewImage(event)" class="hidden">
                        <label for="imageInput" class="border border-[#c7eeff2f] bg-black w-full rounded-md px-2 py-1 text-center cursor-pointer text-white hover:ring-2 hover:ring-[#0077C0]">
                            Input your image
                        </label>
                        @error('img')
                            <span class="text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative" x-data="{ isOpen: false, selected: 'Article' }">
                        <button
                            type="button"
                            @click="isOpen = !isOpen"
                            class="flex items-center justify-between w-full lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] bg-black rounded-md shadow ring-2 ring-inset ring-[#c7eeff2f] hover:bg-gray-800"
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
                            class="absolute z-10 mt-2 w-full bg-black rounded-md shadow-lg ring-1 ring-[#c7eeff2f] focus:outline-none"
                        >
                            <ul class="py-1" role="listbox">
                                <li
                                    class="block lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100 cursor-pointer"
                                    @click="selected = 'Personal Blog'; isOpen = false"
                                >
                                    Personal Blog
                                </li>
                                <li
                                    class="block lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100 cursor-pointer"
                                    @click="selected = 'Technology'; isOpen = false"
                                >
                                    Technology
                                </li>
                                <li
                                    class="block lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100 cursor-pointer"
                                    @click="selected = 'Lifestyle'; isOpen = false"
                                >
                                    Lifestyle
                                </li>
                                <li
                                    class="block lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100 cursor-pointer"
                                    @click="selected = 'Education'; isOpen = false"
                                >
                                    Education
                                </li>
                                <li
                                    class="block lg:px-4 px-3 py-1 lg:text-base text-sm text-[#C7EEFF] hover:bg-gray-900 hover:text-gray-100 cursor-pointer"
                                    @click="selected = 'Hobbies and Interests'; isOpen = false"
                                >
                                    Hobbies and Interests
                                </li>
                            </ul>
                        </div>
                    
                        <input type="hidden" name="jenis_artikel" :value="selected">
                        @error('jenis_artikel')
                            <span class="text-sm">{{ $message }}</span>
                        @enderror
                    </div>                                      
                </div>
                <img src="" alt="Article image" id="imagePreview" class="w-full max-h-[350px] object-cover lg:mb-5 mb-3 mt-2 rounded-lg">
                <textarea name="isi_artikel" placeholder="Content" class="border border-[#c7eeff2f] bg-black w-full rounded-md px-2 py-1 resize-y mt-3 h-96 focus:outline-none focus:ring-2 focus:ring-[#0077C0]"></textarea>
                @error('isi_artikel')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-7 max-lg:mb-12 flex justify-between w-full">
                <div class="">

                </div>
                <x-btn-submit>Submit</x-btn-submit>
            </div>
        </form>
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
