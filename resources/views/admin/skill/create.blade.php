<x-layout-2 :title="$title">

    <div class="mt-36 xl:px-32 px-5 items-center">
        <div class="w-full border border-[#C7EEFF] rounded-xl p-5 shadow-[#C7EEFF] shadow-inner">
            <h2 class="text-center text-2xl font-bold bg-gradient-to-b from-[#0077C0] via-[#0077C0] to-[#C7EEFF] bg-clip-text text-transparent tracking-wide max-lg:mb-12">-- {{ $title }} --</h2>

            <form action="{{ url('skill') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex justify-between">
                    <div class="mb-4 flex flex-col">
                        <input type="text" name="bahasa" placeholder="Programming language" class="border border-[#c7eeff2f] bg-black w-64 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-[#0077C0]">
                        @error('bahasa')
                            <span class="text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4 flex flex-col">
                        <input type="number" name="persen" id="persen" placeholder="Percentage %" class="border border-[#c7eeff2f] bg-black w-32 rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-[#0077C0]" oninput="updateProgressBar()">
                        @error('persen')
                            <span class="text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="w-full rounded-full h-5 bg-gray-700 mb-16">
                    <div id="progress-bar" class="h-5 rounded-full" style="width: 0%; transition: width 0.5s ease;"></div>
                    <input type="text" name="warna" id="warna" placeholder="Hexa color" class="border border-[#c7eeff2f] bg-black w-24 rounded-md px-2 py-1 focus:outline-none focus:ring-2 my-3 focus:ring-[#0077C0]" oninput="updateProgressBar()">
                    @error('warna')
                        <span class="text-sm">{{ $message }}</span>
                    @enderror
                </div>  
                <x-button type="submit">Submit</x-button>
            </form>
        </div>
    </div>

    <script>
        function updateProgressBar() {
            var persenInput = document.getElementById('persen');
            var warnaInput = document.getElementById('warna');
            var progressBar = document.getElementById('progress-bar');

            // Update lebar progress bar
            var persenValue = Math.min(Math.max(persenInput.value, 0), 100); // Membatasi input antara 0 dan 100
            progressBar.style.width = persenValue + '%';

            // Update warna progress bar
            var warnaValue = warnaInput.value;
            if (/^[0-9A-Fa-f]{6}$/i.test(warnaValue)) { // Validasi format heksadesimal warna tanpa #
                progressBar.style.backgroundColor = "#" + warnaValue;
            } else {
                progressBar.style.backgroundColor = "#0077C0"; // Warna default jika input tidak valid
            }
        }
    </script>

</x-layout-2>
