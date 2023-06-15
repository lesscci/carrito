<x-app-layout>
    <x-slot name="header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
            style="display: flex; justify-content: space-between; align-items: flex-start;">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            </h2>
            <a href="{{ route('historial') }}" class="font-semibold text-xl text-gray-800 leading-tight">

            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200 ">
              

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <x-slot name="header">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                Modulos disponibles
                            </h2>
                        </x-slot>

                        <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                            <div class="px-3 py-3 items-center">

                                <div class="flex" style="gap: 10%; justify-content: space-between;">

                                    <div class="my-4">
                                        <div
                                            class="max-w-xl m-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                                            <svg xmlns="http://www.w3.org/2000/svg" height="2em"
                                                viewBox="0 0 640 512">
                                                <style>
                                                    svg {
                                                        fill: #235fc7
                                                    }
                                                </style>
                                                <path
                                                    d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                            </svg>

                                            <h5
                                                class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                                Usuarios
                                            </h5>


                                            <a href=""
                                                class="inline-flex items-center text-blue-600 hover:underline">
                                                Ver todos los usuarios
                                                <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z">
                                                    </path>
                                                    <path
                                                        d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="my-4">
                                        <div
                                            class="max-w-xl  m-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                                            <svg xmlns="http://www.w3.org/2000/svg" height="2em"
                                                viewBox="0 0 512 512">

                                                <path
                                                    d="M192 32c0 17.7 14.3 32 32 32c123.7 0 224 100.3 224 224c0 17.7 14.3 32 32 32s32-14.3 32-32C512 128.9 383.1 0 224 0c-17.7 0-32 14.3-32 32zm0 96c0 17.7 14.3 32 32 32c70.7 0 128 57.3 128 128c0 17.7 14.3 32 32 32s32-14.3 32-32c0-106-86-192-192-192c-17.7 0-32 14.3-32 32zM96 144c0-26.5-21.5-48-48-48S0 117.5 0 144V368c0 79.5 64.5 144 144 144s144-64.5 144-144s-64.5-144-144-144H128v96h16c26.5 0 48 21.5 48 48s-21.5 48-48 48s-48-21.5-48-48V144z" />
                                            </svg>

                                            <h5
                                                class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                                Productos
                                            </h5>

                                            <a href="{{ route('productosAdmin') }}"
                                                class="inline-flex items-center text-blue-600 hover:underline">
                                                Ver todos los productos
                                                <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z">
                                                    </path>
                                                    <path
                                                        d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
