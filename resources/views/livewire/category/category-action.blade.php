<button  onClick='Livewire.emit("openModal", "category.edit-category" ,{{ json_encode([$row->id]) }})' class="py-2 px-4 capitalize tracking-wide flex items-center p-2  transition ease-in duration-200 uppercase hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
    </svg>

</button>