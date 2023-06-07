<div>
    @foreach ($productos as $producto)
        <div>
            <ul role="list" class="divide-y divide-gray-100">
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex gap-x-4">
                        <div style="display: flex; justify-content: center;">
                            <img src="{{ asset('storage/' . basename($producto->imagen)) }}" style="
                            width: 90px;
                            height:100px;
                        ">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{ $producto->nombre }}</p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $producto->descripcion }}</p>
                        </div>
                    </div>
                    <div class="hidden sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm leading-6 text-gray-900">{{ $producto->precio }}</p>
                        {{ $producto->cantidad }}
                    </div>
                </li>
                <button wire:click="removeProduct({{ $producto['id'] }})">Eliminar</button>


            </ul>
        </div>
        
    @endforeach

<div>
    Total {{ $total }} €
</div>
</div>

