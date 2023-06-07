<x-app-layout>
    <x-slot name="header" >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" style="display: flex; justify-content: space-between; align-items: flex-start;">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Mi cesta') }}
        </h2>
      
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200 " style="justify-content: center;display: flex;flex-direction: column;">
                    <livewire:show-cart/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
