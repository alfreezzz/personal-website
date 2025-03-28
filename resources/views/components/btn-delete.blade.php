<form {{ $attributes }} method="POST" class="inline-block">
    @csrf
    @method('DELETE')
    <button type="submit" 
            onclick="return confirm('Are u sure?')"
            class="inline-flex drop-shadow-[0_1px_4px_rgb(239,68,68)] hover:translate-y-0.5 hover:scale-105 hover:brightness-150 font-semibold focus:scale-90 bg-black border-2 border-red-600 items-center justify-center rounded-lg sm:px-4 px-3 py-1.5 transition">
            <svg class="w-5 h-5 lg:w-6 lg:h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#C7EEFF"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
    </button>
</form>