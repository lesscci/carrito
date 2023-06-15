<div>
    <div class="cesta flex justify-center items-center">

        @if (count($historialesCompras) > 0)
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Pedido realizado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cantidad artículos
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Núm. Pedido
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($historialesCompras as $historialCompra)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $historialCompra->created_at }}
                                </th>
                                <td class="px-6 py-4" style="text-align-last: center;">
                                    {{ $historialCompra->cantidad }}
                                </td>
                                <td class="px-6 py-4" style="text-align-last: center;">
                                    {{ $historialCompra->id }}
                                </td>
                                <td class="px-6 py-4" style="text-align-last: center;">
                                    {{ $historialCompra->total }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" wire:click="verDetalles({{ $historialCompra->id }})">Ver los detalles</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div>No has realizado ningún pedido</div>
        @endif
    </div>


<x-dialog-modal wire:model="open">
    <x-slot name="title">
        Detalles del historial de compra
    </x-slot>

    <x-slot name="content">

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Producto</th>
                    <th scope="col" class="px-6 py-3">Unidades</th>
                    <th scope="col" class="px-6 py-3">Costo</th>
                    
                </tr>
            </thead>
            <tbody>

                @foreach ($productos as $producto)
                    <tr>
                        <td class="px-6 py-4">{{ $producto['producto']}}</td>
                        <td class="px-6 py-4">{{ $producto['cantidad'] }}</td>

                        <td class="px-6 py-4">{{ $producto['costo'] }}</td>
                       
                    </tr>
                @endforeach  

            </tbody>
        </table>

    </x-slot>

    <x-slot name="footer">
        <x-button wire:click="$set('open', false)">
            Cancelar
        </x-button>
    </x-slot>
</x-dialog-modal>

</div>