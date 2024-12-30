<x-layout-2 :title="$title">
    <div class="mt-28 lg:px-8 px-5 py-3 xl:mx-32 mx-5 border border-[#C7EEFF] rounded-lg shadow-lg shadow-[#C7EEFF] pb-12">
        <x-header>{{ $title }}</x-header>
        <div class="overflow-x-auto my-5">
            <table class="w-full table-auto border-collapse border border-[#C7EEFF]">
                <thead class="border bg-[#0077C0]">
                    <tr class="text-center text-black">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Message</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                    <tr class="border-b hover:bg-black hover:text-[#C7EEFF]">
                        <td class="px-4 py-2">{{ $message->name }}</td>
                        <td class="px-4 py-2">{{ $message->email }}</td>
                        <td class="px-4 py-2">{{ $message->message }}</td>
                        <td class="px-4 py-2 text-sm text-gray-500">{{ $message->created_at->diffForHumans() }}</td>
                        <td class="px-4 py-2 text-center">
                            <form action="{{ url('admin/messages/'.$message->id)}}" method="POST" 
                                class="bg-black border-2 border-[#C7EEFF] rounded-lg lg:px-4 px-3 py-1 lg:text-base sm:text-sm text-xs lg:tracking-widest tracking-wide sm:tracking-wider hover:bg-[#C7EEFF] hover:text-black transition"
                                onsubmit="return confirm('Are you sure?')">
                                @method('delete')
                                @csrf
                                <button type="submit" class="w-full">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <x-button><a href="{{ url('/') }}#contact">&larr; Go back</a></x-button>
    </div>
</x-layout-2>
