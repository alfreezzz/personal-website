<x-layout-2 :title="$title">
    <div class="mt-28 lg:px-8 sm:mx-5 px-3 py-3 xl:mx-32 mx-3 border border-[#C7EEFF] rounded-lg shadow-lg shadow-[#C7EEFF] pb-12">
        <x-header>{{ $title }}</x-header>
        <x-sub-header>Looking for smth?</x-sub-header>
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
