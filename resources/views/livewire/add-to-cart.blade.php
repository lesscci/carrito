<div>
    <div class="flex items-center">
        <button wire:click="addToCart" href="#"
            class="inline-flex items-center px-3 py-2 text-sm font-medium 
            text-center text-white bg-indigo-400 rounded-lg 
            hover:bg-indigo-300 focus:ring-4 focus:outline-none 
            focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            style="width: 64px;">
            Añadir
        </button>
        <input type="number" wire:model="cantidad" min="0"
            class="ml-3 w-16 py-2 px-2 text-center text-gray-700 border border-gray-300 
            rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-300" />
    </div>
</div>
