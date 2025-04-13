<div id="contact" class="scroll-section mt-32 xl:px-32 lg:px-5 px-3 sm:px-5">
    <x-header>Contact</x-header>
    <x-sub-header>Feel free to 
        <span class="font-semibold">reach out</span> and 
        <span class="font-semibold">get in touch</span>.
    </x-sub-header>
    <div class="flex max-lg:flex-col items-center gap-16 lg:mt-10 mt-5">
        <div class="border border-[#C7EEFF] rounded-xl lg:p-6 sm:p-9 p-6 lg:w-[50%] w-full shadow-behind shadow-gray">
            @if(session('success'))
                <div class="bg-green-500 text-[#C7EEFF] text-center p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <h2 class="text-xl sm:text-3xl lg:text-2xl font-bold text-center mb-2 sm:mb-5 lg:mb-3 underline">
                Contact Form
            </h2>
            <form 
                x-data="{
                    name: '',
                    email: '',
                    message: '',
                    errors: {
                        name: '',
                        email: '',
                        message: ''
                    },
                    validateName() {
                        this.errors.name = this.name.trim().length < 2 
                            ? 'Name must be at least 2 characters long' 
                            : '';
                    },
                    validateEmail() {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        this.errors.email = !emailRegex.test(this.email)
                            ? 'Please enter a valid email address'
                            : '';
                    },
                    validateMessage() {
                        this.errors.message = this.message.trim().length < 10
                            ? 'Message must be at least 10 characters long'
                            : '';
                    },
                    get isFormValid() {
                        return this.name.trim().length >= 2 && 
                            /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.email) && 
                            this.message.trim().length >= 10;
                    },
                    submitForm() {
                        this.validateName();
                        this.validateEmail();
                        this.validateMessage();

                        if (this.isFormValid) {
                            this.$el.submit();
                        }
                    }
                }" 
                @submit.prevent="submitForm" 
                class="flex flex-col gap-3 lg:gap-1"
                action="{{ route('welcome.send') }}" 
                method="POST"
            >
                @csrf
                <input type="hidden" name="token" value="{{ request()->query('token') }}">
                <div class="mb-4">
                    <label for="name" class="font-medium block mb-1">Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        x-model="name"
                        @blur="validateName"
                        placeholder="Phantom thieves" 
                        class="border border-[#c7eeff2f] bg-black w-full rounded-md px-2 py-1.5 focus:outline-none focus:ring-2 focus:ring-[#0077C0]"
                    >
                    <template x-if="errors.name">
                        <span class="text-red-500 text-sm" x-text="errors.name"></span>
                    </template>
                </div>

                <div class="mb-4">
                    <label for="email" class="font-medium block mb-1">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        x-model="email"
                        @blur="validateEmail"
                        placeholder="phantom@metaverse.jp" 
                        class="border border-[#c7eeff2f] bg-black w-full rounded-md px-2 py-1.5 focus:outline-none focus:ring-2 focus:ring-[#0077C0]"
                    >
                    <template x-if="errors.email">
                        <span class="text-red-500 text-sm" x-text="errors.email"></span>
                    </template>
                </div>

                <div class="mb-4">
                    <label for="message" class="font-medium block mb-1">Message</label>
                    <textarea 
                        id="message" 
                        name="message" 
                        x-model="message"
                        @blur="validateMessage"
                        placeholder="Place your blocks... I mean, words here!" 
                        class="border border-[#c7eeff2f] bg-black w-full rounded-md px-2 py-1 resize-none h-32 focus:outline-none focus:ring-2 focus:ring-[#0077C0]"
                    ></textarea>
                    <template x-if="errors.message">
                        <span class="text-red-500 text-sm" x-text="errors.message"></span>
                    </template>
                </div>

                <button 
                    type="submit"
                    :disabled="!isFormValid"
                    class="relative inline-flex h-12 active:scale-95 transistion overflow-hidden rounded-lg p-[1px] focus:outline-none"
                    :class="{'opacity-50 cursor-not-allowed': !isFormValid}"
                >
                    <span
                        class="absolute inset-[-1000%] animate-[spin_2s_linear_infinite] bg-[conic-gradient(from_90deg_at_50%_50%,#e7029a_0%,#f472b6_50%,#bd5fff_100%)]"
                    >
                    </span>
                    <span
                        class="inline-flex h-full w-full cursor-pointer items-center justify-center rounded-lg bg-slate-950 px-7 text-sm font-medium text-white backdrop-blur-3xl gap-2"
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

            <p class="text-center text-sm mt-10 tracking-wider font-light">
                Or send me mail by 
                <a href="mailto:roshinante678@gmail.com" 
                   class="inline-flex group items-center justify-center underline text-gray-300 hover:text-gray-400 transition font-bold">
                    <span>mailto: instead</span>
                    <svg class="w-4 h-4 lg:w-5 lg:h-5 ml-2 rotate-12 group-hover:animate-bounce transition-transform duration-300 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#C7EEFF">
                        <path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/>
                    </svg>                      
                </a>
            </p>
        </div>
    
        <div class="flex flex-col gap-4 lg:w-[50%] w-full">
            <div class="flex gap-3">
                <a href="https://wa.me/6289670336495" target="_blank" class="w-8 h-8">
                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <title>WhatsApp</title>
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" fill="#25D366"/>
                    </svg>
                </a>
                <div class="leading-normal">
                    <h3 class="font-bold lg:text-2xl sm:text-xl text-base tracking-wide">
                        Chat with me on WhatsApp
                    </h3>
                    <p class="tracking-wide font-extralight sm:text-base text-sm max-sm:my-1">
                        Feel free to drop a message or discuss your ideas directly.
                    </p>
                    <a href="https://wa.me/6289670336495" 
                       class="font-medium tracking-wider inline-flex group items-center justify-center transition" target="_blank">
                        <span class="sm:text-base text-sm text-[#C7EEFF] group-hover:underline ">
                            Start chatting on WhatsApp
                        </span>
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 ml-1 group-hover:translate-x-1.5 transition group-hover:-translate-y-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#C7EEFF">
                            <path d="m256-240-56-56 384-384H240v-80h480v480h-80v-344L256-240Z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <hr class="w-full border">
            <div class="flex gap-3">
                <a href="https://github.com/alfreezzz" target="_blank" class="w-8 h-8">
                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <title>GitHub</title>
                        <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" fill="#FF69B4"/>
                    </svg>
                </a>
                <div class="leading-normal">
                    <h3 class="font-bold lg:text-2xl sm:text-xl text-base tracking-wide">
                        Discover my GitHub projects
                    </h3>
                    <p class="tracking-wide font-extralight sm:text-base text-sm max-sm:my-1">
                        Explore my repositories and see what I've been working on.
                    </p>
                    <a href="https://github.com/alfreezzz" 
                       class="font-medium tracking-wider inline-flex group items-center justify-center transition" target="_blank">
                        <span class="sm:text-base text-sm text-[#C7EEFF] group-hover:underline ">
                            Visit my GitHub profile
                        </span>
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 ml-1 group-hover:translate-x-1.5 transition group-hover:-translate-y-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#C7EEFF">
                            <path d="m256-240-56-56 384-384H240v-80h480v480h-80v-344L256-240Z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <hr class="w-full border">
            <div class="flex gap-3">
                <a href="https://www.linkedin.com/in/alfriza-akhmad-rahadi-a22896343/" target="_blank" class="w-8 h-8">
                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <title>LinkedIn</title>
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.327-.025-3.037-1.852-3.037-1.853 0-2.137 1.445-2.137 2.939v5.667H9.35V9h3.413v1.561h.049c.475-.899 1.637-1.852 3.372-1.852 3.605 0 4.269 2.372 4.269 5.455v6.288zM5.337 7.433c-1.144 0-2.072-.93-2.072-2.075 0-1.144.928-2.073 2.072-2.073 1.145 0 2.073.929 2.073 2.073 0 1.145-.928 2.075-2.073 2.075zm1.777 13.019H3.56V9h3.554v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.225.792 24 1.771 24h20.451C23.2 24 24 23.225 24 22.271V1.729C24 .774 23.2 0 22.225 0z" fill="#0A66C2"/>
                    </svg>
                </a>
                <div class="leading-normal">
                    <h3 class="font-bold lg:text-2xl sm:text-xl text-base tracking-wide">
                        Connect with me on LinkedIn
                    </h3>
                    <p class="tracking-wide font-extralight sm:text-base text-sm max-sm:my-1">
                        Let's collaborate and grow our professional network together.
                    </p>
                    <a href="https://www.linkedin.com/in/alfriza-akhmad-rahadi-a22896343/" 
                       class="font-medium tracking-wider inline-flex group items-center justify-center transition" target="_blank">
                        <span class="sm:text-base text-sm text-[#C7EEFF] group-hover:underline">
                            Check out my LinkedIn profile
                        </span>
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 ml-1 group-hover:translate-x-1.5 transition group-hover:-translate-y-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#C7EEFF">
                            <path d="m256-240-56-56 384-384H240v-80h480v480h-80v-344L256-240Z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <hr class="w-full border">
            <div class="flex gap-3">
                <a href="https://www.instagram.com/alfreezzz_/" target="_blank" class="w-8 h-8">
                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <title>Instagram</title>
                        <path d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077" fill="#FF0069"/>
                    </svg>
                </a>
                <div class="leading-normal">
                    <h3 class="font-bold lg:text-2xl sm:text-xl text-base tracking-wide">
                        Or follow me on Instagram
                    </h3>
                    <p class="tracking-wide font-extralight sm:text-base text-sm max-sm:my-1">
                        Stay connected and see more of my journey.
                    </p>
                    <a href="https://www.instagram.com/alfreezzz_/" 
                       class="font-medium tracking-wider inline-flex group items-center justify-center transition" target="_blank">
                        <span class="sm:text-base text-sm text-[#C7EEFF] group-hover:underline">
                            Follow me on Instagram
                        </span>
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 ml-1 group-hover:translate-x-1.5 transition group-hover:-translate-y-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#C7EEFF">
                            <path d="m256-240-56-56 384-384H240v-80h480v480h-80v-344L256-240Z"/>
                        </svg>
                    </a>
                </div>
            </div>
            @if(request()->query('token') === env('ADMIN_ACCESS_TOKEN'))
                <a href="{{ route('admin.messages.index', ['token' => request()->query('token')]) }}"
                   class="inline-flex shadow-2xl hover:shadow-white drop-shadow-[0_1px_2px_rgb(0,119,192)] hover:-translate-y-0.5 hover:scale-105 hover:brightness-150 font-semibold focus:scale-95 bg-[#0077C0] border-2 border-[#0076c0] items-center justify-center rounded-lg sm:px-4 px-3 py-1.5 transition">
                    <span class="sm:text-base text-sm text-[#09293d]">View messages</span>
                    <svg  class="w-5 h-5 lg:w-6 lg:h-6 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#09293d">
                        <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/>
                    </svg>
                </a>
            @endif
        </div>
    </div>
</div>