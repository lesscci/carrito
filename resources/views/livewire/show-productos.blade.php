<div class="flex flex-wrap">
    @foreach ($data as $item)
        <div id="contenedor-padre" style="
        display: flex;
        padding: 10px;">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
                style="
                width: 200px;
                display: flex;
                justify-content: center;
                height: 300px;
            ">
                <a href="#">
                    <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                </a>
                <div class="p-5">
                    <div style="display: flex; justify-content: center;">
                        <img src="{{ asset('storage/' . basename($item->imagen)) }}" style="
                        width: 90px;
                        height:100px;
                    ">
                    </div>
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $item->nombre }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ $item->descripcion }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Precio: {{ $item->precio }} €
                    </p>

                   @livewire('add-to-cart', ['productoId' => $item->id], key($item->id))
                  
                </div>
            </div>
        </div>
    @endforeach
</div>
