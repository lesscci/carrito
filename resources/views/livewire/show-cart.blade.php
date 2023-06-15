<div class="cesta">
    <div class="text-sm text-gray-700 uppercase font-bold bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        Total: {{ $cartTotalQuantity }} {{ Str::plural('unidad', $cartTotalQuantity) }}
    </div>

    @if (count($productos) > 0)
        @foreach ($productos as $producto)
            <div wire:key="{{ $producto->rowId }}">
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-6 py-5 ">
                        <div class="flex gap-x-4">
                            <div style="display: flex; justify-content: center;">
                                <img src="{{ $producto->options->get('imagen') }}" style="width: 90px; height: 100px;">
                            </div>
                            <div class="min-w-0 flex-auto" style="align-self: center;">
                                <p class="text-sm font-semibold leading-6 text-gray-900">{{ $producto->name }}</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                    @if (isset($producto->options['descripcion']))
                                        {{ $producto->options['descripcion'] }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="hidden sm:flex sm:flex-col sm:items-end"
                            style="display: flex; align-items: center; gap:10px;">
                            <div>
                                <input type="number" class="w-16 px-2 py-1 border border-gray-300"
                                    wire:model="cantidad.{{ $producto->rowId }}" min="1"
                                    value="{{ $cantidad[$producto->rowId] ?? $producto->qty }}"
                                    wire:change="updateQuantity('{{ $producto->rowId }}', $event.target.value)">
                            </div>
                            <div>
                                <p class="text-sm leading-6 text-gray-900">
                                    Subtotal: {{ $producto->price * $producto->qty }} €
                                </p>
                            </div>
                            <div>
                                <button class="text-red-500 hover:text-red-600"
                                    wire:click="removeProduct('{{ $producto->rowId }}')">
                                    Eliminar
                                </button>

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <hr class="my-4">
        @endforeach

        <div class="py-4" style="display: flex; justify-content: flex-end;">
            TOTAL<span class="font-bold"> {{ $total }}€</span>
        </div>
        <hr class="my-4">
            <div class="flex justify-between items-end">


            <div class="pago">
                <div class="col-lg-8 col-md-9 col-sm-12 px-1 py-1 flex flex-col items-end justify-end gap-4">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <form class="mb-3 px-4 ">
                            <h1 class="mb-3 pt-1 text-center">Pago</h1>
                    
                            <div class="form-group">
                                <x-label for="typeText">Número tarjeta</x-label>
                                <input type="text" id="typeText" class="form-control form-control-sm" size="17"
                                    value="1234 5678 9012 3457" minlength="19" maxlength="19" />
                            </div>
                    
                            <div class="form-group">
                                <x-label for="typeName">Nombre</x-label>
                                <input type="text" id="typeName" class="form-control form-control-sm" size="17" value="John Smith" />
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <x-label for="typeExp">Fecha de expiración</x-label>
                                        <input type="text" id="typeExp" class="form-control form-control-sm" value="01/22" size="7"
                                            minlength="7" maxlength="7" />
                                    </div>
                                </div>
                    
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <x-label for="typeText">CVV</x-label>
                                        <input type="password" id="typeText" class="form-control form-control-sm"
                                            value="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                    </div>
                                </div>
                            </div>
                    
                            <div class="flex justify-center">
                                <button wire:click="comprar"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                                    Comprar
                                </button>
                            </div>

                        </form>
                    </div>
                    
                </div>
            </div>
            <div class="">
                <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                    Volver al catálogo
                </a>
                
            </div>
        </div>
    @else
        <div>No hay productos en tu cesta</div>
    @endif

</div>
