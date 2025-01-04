<div id="contact" class="mt-32 xl:px-32 lg:px-5 px-12">
    <x-header>Get in touch</x-header>
    <div class="flex max-lg:flex-col items-center gap-16 lg:mt-10 mt-5">
        <div class="border border-[#C7EEFF] rounded-xl lg:p-6 sm:p-9 p-6 lg:w-[50%] w-full shadow-behind shadow-gray">
            @if(session('success'))
                <div class="bg-green-500 text-[#C7EEFF] text-center p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('welcome.send') }}" method="POST" class="flex flex-col gap-3 lg:gap-1">
                @csrf
                <div class="mb-4">
                    <label for="name" class="font-medium block mb-1">Name</label>
                    <input type="text" id="name" name="name" placeholder="Phantom thieves" class="border border-[#c7eeff2f] bg-black w-full rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-[#0077C0]">
                    @error('name')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="font-medium block mb-1">Email</label>
                    <input type="email" id="email" name="email" placeholder="patientmonitor@example.com" class="border border-[#c7eeff2f] bg-black w-full rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-[#0077C0]">
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="message" class="font-medium block mb-1">Message</label>
                    <textarea id="message" name="message" placeholder="I am thou, and thou art I..." class="border border-[#c7eeff2f] bg-black w-full rounded-md px-2 py-1 resize-none h-32 focus:outline-none focus:ring-2 focus:ring-[#0077C0]"></textarea>
                    @error('message')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="relative inline-flex h-12 active:scale-95 transistion overflow-hidden rounded-lg p-[1px] focus:outline-none"
                    >
                    <span
                        class="absolute inset-[-1000%] animate-[spin_2s_linear_infinite] bg-[conic-gradient(from_90deg_at_50%_50%,#e7029a_0%,#f472b6_50%,#bd5fff_100%)]"
                    >
                    </span>
                    <span
                        class="inline-flex h-full w-full cursor-pointer items-center justify-center rounded-lg bg-slate-950 px-7 text-sm font-medium text-white backdrop-blur-3xl gap-2 undefined"
                    >
                        Send your message
                        <svg
                        stroke="currentColor"
                        fill="currentColor"
                        stroke-width="0"
                        viewBox="0 0 448 512"
                        height="1em"
                        width="1em"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="M429.6 92.1c4.9-11.9 2.1-25.6-7-34.7s-22.8-11.9-34.7-7l-352 144c-14.2 5.8-22.2 20.8-19.3 35.8s16.1 25.8 31.4 25.8H224V432c0 15.3 10.8 28.4 25.8 31.4s30-5.1 35.8-19.3l144-352z"
                        ></path>
                        </svg>
                    </span>
                </button>
            </form>
            <p class="text-center text-sm mt-10 tracking-wider font-light">Or send me mail by <a href="mailto:roshinante678@gmail.com" class="hover:underline text-gray-300 font-bold">mailto: instead</a></p>
        </div>
    
        <div class="flex flex-col gap-6 lg:w-[50%] w-full">
            <div class="flex gap-3">
                <div class="w-8 h-8">
                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>WhatsApp</title><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" fill="#25D366"/></svg>
                </div>
                <div class="leading-normal">
                    <h3 class="font-bold lg:text-2xl text-xl tracking-wide">Chat with me on WhatsApp</h3>
                    <p class="tracking-wide font-extralight lg:text-base text-sm">Feel free to drop a message or discuss your ideas directly.</p>
                    <p class="font-medium text-base tracking-wider"><a href="https://wa.me/6289670336495" class="hover:underline" target="_blank">Start chatting on WhatsApp</a></p>
                </div>
            </div>
            <hr class="w-full border">
            <div class="flex gap-3">
                <div class="w-8 h-8">
                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>GitHub</title><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" fill="#FF69B4"/></svg>
                </div>
                <div class="leading-normal">
                    <h3 class="font-bold lg:text-2xl text-xl tracking-wide">Discover my GitHub projects</h3>
                    <p class="tracking-wide font-extralight lg:text-base text-sm">Explore my repositories and see what I've been working on.</p>
                    <p class="font-medium text-base tracking-wider"><a href="https://github.com/alfreezzz" class="hover:underline" target="_blank">Visit my GitHub profile</a></p>
                </div>
            </div>
            <hr class="w-full border">
            <div class="flex gap-3">
                <div class="w-8 h-8">
                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>LinkedIn</title><path d="M20.447 20.452h-3.554v-5.569c0-1.327-.025-3.037-1.852-3.037-1.853 0-2.137 1.445-2.137 2.939v5.667H9.35V9h3.413v1.561h.049c.475-.899 1.637-1.852 3.372-1.852 3.605 0 4.269 2.372 4.269 5.455v6.288zM5.337 7.433c-1.144 0-2.072-.93-2.072-2.075 0-1.144.928-2.073 2.072-2.073 1.145 0 2.073.929 2.073 2.073 0 1.145-.928 2.075-2.073 2.075zm1.777 13.019H3.56V9h3.554v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.225.792 24 1.771 24h20.451C23.2 24 24 23.225 24 22.271V1.729C24 .774 23.2 0 22.225 0z" fill="#0A66C2"/></svg>
                </div>
                <div class="leading-normal">
                    <h3 class="font-bold lg:text-2xl text-xl tracking-wide">Or connect with me on LinkedIn</h3>
                    <p class="tracking-wide font-extralight lg:text-base text-sm">Let's collaborate and grow our professional network together.</p>
                    <p class="font-medium text-base tracking-wider"><a href="https://www.linkedin.com/in/alfriza-akhmad-rahadi-a22896343/" class="hover:underline" target="_blank">Check out my LinkedIn profile</a></p>
                </div>
            </div>
            <hr class="w-full border">
            <a href="{{ route('admin.messages.index') }}" class="bg-black border-2 text-center border-[#C7EEFF] rounded-lg px-4 py-1 text-base tracking-widest hover:bg-[#C7EEFF] hover:text-black transition hover:shadow-2xl hover:shadow-[#C7EEFF]">View messages</a>
        </div>
    </div>
</div>