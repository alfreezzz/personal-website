<x-layout-2 :title="$title">
    <div class="mt-28 lg:px-8 px-5 py-3 xl:mx-32 mx-5 border border-[#C7EEFF] rounded-lg shadow-lg shadow-[#C7EEFF] pb-12">
        <x-header>{{ $title }}</x-header>
        @if($messages->isEmpty())
            <p class="text-center text-gray-400 my-16">No message has been sent.</p>
        @else
        <div class="space-y-12 mt-6">
            @foreach ($messages as $message)
            <div class="">
                <div class="flex justify-between items-center">
                    <div class="">
                        <p class="text-lg font-medium">{{ $loop->iteration }}. {{ $message->name }} <a href="mailto:{{ $message->email }}" class="text-base font-thin hover:underline">({{ $message->email }})</a></p>
                        <p class="text-xs font-thin">{{ $message->created_at->diffForHumans() }}</p>
                    </div>
                    <form action="{{ url('admin/messages/'.$message->id)}}" method="POST" 
                        class="bg-black border-2 border-[#C7EEFF] rounded-lg lg:px-4 px-3 py-1 lg:text-base sm:text-sm text-xs lg:tracking-widest tracking-wide sm:tracking-wider hover:bg-[#C7EEFF] hover:text-black transition"
                        onsubmit="return confirm('Are you sure?')">
                        @method('delete')
                        @csrf
                        <button type="submit" class="w-full">Delete</button>
                    </form>
                </div>
                <p class="text-sm leading-normal tracking-wide mt-3" style="word-break: break-all">{{ $message->message }}</p>
            </div>
            @endforeach
        </div>
        @endif
        <div class="mt-8">
            <x-button><a href="{{ url('/') }}#contact">&larr; Go back</a></x-button>
        </div>
    </div>
</x-layout-2>
