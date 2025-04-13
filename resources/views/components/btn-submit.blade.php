<button type="submit"
    class="inline-flex drop-shadow-[0_1px_4px_rgb(0,119,192)] hover:translate-y-0.5 hover:scale-105 hover:brightness-150 font-semibold focus:scale-90 bg-black border-2 border-[#0076c0] items-center justify-center rounded-lg sm:px-6 px-5 py-1.5 transition relative"
    onclick="spinButton(this)">
        <span class="sm:text-lg text-base text-[#C7EEFF] transition-opacity duration-300" id="buttonText">{{ $slot }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute opacity-0 text-[#C7EEFF] transition-opacity duration-300" id="spinIcon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
        </svg>
</button>

<script>
    function spinButton(button) {
        const textElement = button.querySelector('#buttonText');
        const iconElement = button.querySelector('#spinIcon');
        
        // Hide text, show icon
        textElement.style.opacity = '0';
        iconElement.style.opacity = '1';
        
        // Add spin animation to icon
        iconElement.style.animation = 'spin 0.8s linear';
        
        // Reset after animation completes
        setTimeout(() => {
            textElement.style.opacity = '1';
            iconElement.style.opacity = '0';
            iconElement.style.animation = 'none';
        }, 800);
    }

    // Add the CSS for the spin animation
    document.head.insertAdjacentHTML('beforeend', `
        <style>
            @keyframes spin {
                from {
                    transform: rotate(0deg);
                }
                to {
                    transform: rotate(360deg);
                }
            }
        </style>
    `);
</script>