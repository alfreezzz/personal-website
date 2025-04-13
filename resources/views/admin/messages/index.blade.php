<x-layout-2 :title="$title">
    <div class="mt-28 lg:px-8 sm:mx-5 px-3 py-3 xl:mx-32 mx-3 border border-[#C7EEFF] rounded-lg shadow-lg shadow-[#C7EEFF] pb-12">
        <x-header>{{ $title }}</x-header>
        <x-sub-header>Looking for smth?</x-sub-header>
        <form action="{{ route('admin.messages.index', ['token' => request()->query('token')]) }}" method="GET" class="flex justify-end items-center" id="filterForm">
            <input type="hidden" name="token" value="{{ request()->query('token') }}">

            <div class="relative" x-data="{ isOpen: false, selectedFilter: '{{ request('filter', 'latest') }}' }">
                <button
                    type="button"
                    @click="isOpen = !isOpen"
                    class="flex items-center justify-between w-full lg:px-4 px-3 py-1 text-sm lg:text-base text-[#C7EEFF] bg-black rounded-md shadow ring-2 ring-inset ring-[#C7EEFF] hover:bg-gray-800"
                >
                    Filter by Date
                    <svg class="w-5 h-5 ml-2 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
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
                    class="absolute right-0 z-10 mt-2 w-64 origin-top-right bg-black rounded-md shadow-lg ring-1 ring-[#C7EEFF] focus:outline-none p-4 space-y-3"
                >
                    <input type="hidden" name="filter" :value="selectedFilter">
        
                    <span>Sort Order</span>
                    <hr class="w-full text-white">
                    <div class="flex flex-col space-y-2 text-sm text-[#C7EEFF]">
                        <label class="flex items-center space-x-2">
                            <input
                                type="radio"
                                name="filterOption"
                                value="latest"
                                x-model="selectedFilter"
                                @change="$el.closest('form').submit()"
                                class="text-[#C7EEFF] bg-black border-[#C7EEFF] focus:ring-[#C7EEFF]"
                            >
                            <span>Latest First</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input
                                type="radio"
                                name="filterOption"
                                value="earliest"
                                x-model="selectedFilter"
                                @change="$el.closest('form').submit()"
                                class="text-[#C7EEFF] bg-black border-[#C7EEFF] focus:ring-[#C7EEFF]"
                            >
                            <span>Earliest First</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input
                                type="radio"
                                name="filterOption"
                                value="range"
                                x-model="selectedFilter"
                                @change="$el.closest('form').submit()"
                                class="text-[#C7EEFF] bg-black border-[#C7EEFF] focus:ring-[#C7EEFF]"
                            >
                            <span>Custom Date Range</span>
                        </label>
                    </div>
        
                    <div class="flex flex-col space-y-2" x-show="selectedFilter === 'range'">
                        <label for="start_date" class="text-sm text-[#C7EEFF]">Start Date</label>
                        <input
                            type="date"
                            name="start_date"
                            id="start_date"
                            value="{{ request('start_date') }}"
                            @change="$el.closest('form').submit()"
                            class="bg-black text-[#C7EEFF] border border-[#C7EEFF] rounded-md px-3 py-1 text-sm hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#C7EEFF]"
                        >
        
                        <label for="end_date" class="text-sm text-[#C7EEFF]">End Date</label>
                        <input
                            type="date"
                            name="end_date"
                            id="end_date"
                            value="{{ request('end_date') }}"
                            @change="$el.closest('form').submit()"
                            class="bg-black text-[#C7EEFF] border border-[#C7EEFF] rounded-md px-3 py-1 text-sm hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#C7EEFF]"
                        >
                    </div>
                </div>
            </div>
        </form>             
                       
        @if($messages->isEmpty())
            <div class="flex flex-col max-w-screen-mobile-m justify-center items-center mx-auto mt-9 lg:mt-12">
                <svg class="w-1/5 h-1/5" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="#9ca3af"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-120H640q-30 38-71.5 59T480-240q-47 0-88.5-21T320-320H200v120Zm280-120q38 0 69-22t43-58h168v-360H200v360h168q12 36 43 58t69 22ZM200-200h560-560Z"/></svg>
                <p class="text-center text-gray-400 mb-4 mt-2 font-light sm:text-base text-sm">No message yet ;)</p>
            </div>
        @else
            <div class="space-y-12 mt-6">
                @foreach ($messages as $message)
                    <div class="">
                        <div class="flex justify-between items-center">
                            <div class="">
                                <p class="sm:text-lg text-base font-medium">{{ $loop->iteration }}. {{ $message->name }} <a href="mailto:{{ $message->email }}" class="sm:text-base text-sm font-thin hover:underline">({{ $message->email }})</a></p>
                                <p class="text-xs font-thin" title="{{ \Carbon\Carbon::parse($message->created_at)->timezone('Asia/Jakarta')->format('d M Y H:m') }}">{{ $message->created_at->diffForHumans() }}</p>
                            </div>
                            <x-btn-delete action="{{ route('admin.messages.delete', ['id' => $message->id, 'token' => request()->query('token')]) }}"></x-btn-delete>
                        </div>
                        <p class="sm:text-sm text-xs leading-normal tracking-wide mt-3 whitespace-pre-line" style="word-break: break-all">{{ $message->message }}</p>
                    </div>
                @endforeach
            </div>
        @endif
        <a href="{{ url('/') . '?' . http_build_query(['token' => request()->query('token')]) }}#contact"
            class="mt-8 inline-flex group drop-shadow-[0_1px_3px_rgb(199,238,255)] hover:brightness-150 font-semibold bg-black border-1 border-[#C7EEFF] items-center justify-center rounded-lg sm:px-4 px-3 py-1.5 transition">
                <svg class="w-4 h-4 lg:w-5 lg:h-5 mr-1 group-hover:-translate-x-1.5 transition" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"fill="#C7EEFF"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg>
                <span class="sm:text-base text-sm text-[#C7EEFF]">Go back</span>
        </a>
    </div>
</x-layout-2>
