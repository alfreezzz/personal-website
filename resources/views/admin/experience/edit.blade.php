<x-layout-2 :title="$title">
    <div class="mt-36 lg:px-8 px-3 py-3 sm:mx-5 xl:mx-32 mx-3 border border-[#C7EEFF] rounded-lg shadow-lg shadow-[#C7EEFF]">
        <x-header>{{ $title }}</x-header>
        <div class="lg:mt-12 mt-8 mb-4 lg:mb-8">
            <form action="{{ route('experience.update', ['experience' => $experience->id, 'token' => request()->query('token')]) }}" method="POST" enctype="multipart/form-data" class="flex">
                @csrf
                @method('PUT')
                <input type="hidden" name="token" value="{{ request()->query('token') }}">

                <div class="flex">
                    <div class="lg:w-36 w-16 space-y-2">
                        <input type="text" name="thn_mulai" value="{{ $experience->thn_mulai }}" placeholder="YYYY Month" class="border border-[#c7eeff2f] bg-black lg:w-32 w-16 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-[#0077C0]"> -
                        @error('thn_mulai')
                            <span class="text-sm">{{ $message }}</span>
                        @enderror
                        <input type="text" name="thn_selesai" value="{{ $experience->thn_selesai }}" placeholder="YYYY Month (if finished)" class="border items-end border-[#c7eeff2f] bg-black lg:w-32 w-16 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-[#0077C0]">
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="lg:w-5 lg:h-5 w-4 h-4 bg-[#0077C0] rounded-full"></div>
                    <div class="w-px h-full bg-[#C7EEFF]"></div>
                </div>
                <div class="lg:ml-10 ml-5">
                    <div class="flex max-lg:flex-col">
                        <div class="flex flex-col">
                            <input type="text" name="nama_perusahaan" value="{{ $experience->nama_perusahaan }}" placeholder="Company name" class="border border-[#c7eeff2f] bg-black sm:w-80 w-36 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-[#0077C0]">
                            @error('nama_perusahaan')
                                <span class="text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <h2 class="font-light tracking-widest lg:text-base text-xs mx-3"> - </h2>
                        <div class="flex flex-col">
                            <input type="text" name="posisi" value="{{ $experience->posisi }}" placeholder="Position" class="border border-[#c7eeff2f] bg-black sm:w-80 w-36 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-[#0077C0]">
                            @error('posisi')
                                <span class="text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <textarea name="deskripsi" placeholder="Description" class="lg:mt-7 mt-5 mb-4 border border-[#c7eeff2f] bg-black w-full rounded-md px-2 py-1 resize-none h-32 focus:outline-none focus:ring-2 focus:ring-[#0077C0]">{{ $experience->deskripsi }}</textarea>
                    @error('deskripsi')
                        <span class="text-sm">{{ $message }}</span>
                    @enderror
                    <x-btn-submit>Update</x-btn-submit>
                </div>
            </form>
        </div>
    </div>
</x-layout-2>
