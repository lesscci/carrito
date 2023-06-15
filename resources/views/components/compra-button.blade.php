<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center
 justify-center px-4 py-2 bg-black border border-transparent rounded-md font-semibold 
 text-xs text-white uppercase tracking-widest bg-blue-500 hover:bg-blue-700 text-white 
 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
