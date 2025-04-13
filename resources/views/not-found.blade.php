<x-layout-2 :title="$title">
    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col justify-center items-center sm:mx-5 w-full xl:mx-32 mx-3">
            <x-header>{{ $title }}</x-header>
            <x-sub-header>The page you are looking for is not available</x-sub-header>
            <a href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#project"
               class="mt-4 inline-flex group drop-shadow-[0_1px_3px_rgb(199,238,255)] hover:brightness-150 font-semibold bg-black border-1 border-[#C7EEFF] items-center justify-center rounded-lg sm:px-4 px-3 py-1.5 transition">
                <svg class="w-4 h-4 lg:w-5 lg:h-5 mr-1 group-hover:-translate-x-1.5 transition" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#C7EEFF">
                    <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
                </svg>
                <span class="sm:text-base text-sm text-[#C7EEFF]">Go back</span>
            </a>
        </div>
    </div>
</x-layout-2>
