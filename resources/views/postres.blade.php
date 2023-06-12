<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
            style="display: flex; justify-content: space-between; align-items: flex-start;">
 {{ Breadcrumbs::render('postres') }}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('') }}
            </h2>
            <a href="{{ route('carrito') }}"
                class="bg-indigo-400 hover:bg-indigo-300 text-white font-bold py-2 px-4 border-b-4 border-indigo-700 hover:border-indigo-500 rounded"
                style="align-self: flex-end;">
                Ver cesta 🛒
            </a>
           

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200 "
                    style="justify-content: center;display: flex;">
                    @livewire('show-productos', ['type' => 'postres'])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
