<div>

    <x-secondary-button wire:click="create">
        Crear producto 
    </x-secondary-button>

    <ul role="list" class="divide-y divide-gray-100">
        @foreach ($cartItems as $item)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex gap-x-4">
                    <img src="{{ asset('storage/' . basename($item->imagen)) }}"
                        style="width: 90px; height:100px;">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $item->nombre }}</p>
                        <p class="mt-1 truncate text-sm leading-5 text-gray-500">{{ $item->descripcion }}</p>
                        <p class="mt-1 truncate text-sm leading-5 text-gray-500">Precio: {{ $item->precio }}</p>
                        <p class="mt-1 truncate text-sm leading-5 text-gray-500">Stock: {{ $item->stock }}</p>
                        <p class="mt-1 truncate text-sm leading-5 text-gray-500">Categoria: {{ $item->categoria->nombre }}</p>
                    </div>
                </div>
                <div class="hidden sm:flex sm:flex-col sm:items-end">
                    <a href="#" wire:click="edit({{ $item->id }})" class="text-sm leading-6 text-gray-900">Editar</a>
                    <a href="#" wire:click="delete({{ $item->id }})" class="text-sm leading-6 text-gray-900">Eliminar</a>
                </div>
            </li>
        @endforeach
    </ul>

    <!-- Modal EDITAR -->
    <x-dialog-modal wire:model="open">
        <x-slot name='title'>
            Editar el producto {{ $editItem->nombre }}
        </x-slot>

        <x-slot name='content'>
            <div>
                <x-label for="edit-nombre" value="Nombre producto" />
                <x-input wire:model="editItem.nombre" id="edit-nombre" type="text" class="w-full" />
            </div>

            <div>
                <x-label for="edit-descripcion" value="Descripción" />
                <x-input wire:model="editItem.descripcion" id="edit-descripcion" type="text" class="w-full" />
            </div>
            
            <div>
                <x-label for="edit-precio" value="Precio" />
                <x-input wire:model="editItem.precio" id="edit-precio" type="text" class="w-full" />
            </div>

            <div>
                <x-label for="edit-stock" value="Stock" />
                <x-input wire:model="editItem.stock" id="edit-stock" type="text" class="w-full" />
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-secondary-button wire:click="save" wire:loading.attr="disabled" class="diabled:capacity-25">
                Actualizar
            </x-secondary-button>
            <x-danger-button wire:click="$set('open', false)">
                Cancelar
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Modal CREAR -->
    <x-dialog-modal wire:model="open_create">
        <x-slot name='title'>
            Editar el producto {{ $editItem->nombre }}
        </x-slot>

        <x-slot name='content'>
            <div>
                <x-label for="edit-nombre" value="Nombre producto" />
                <x-input wire:model="editItem.nombre" id="edit-nombre" type="text" class="w-full" />
            </div>

            <div>
                <x-label for="edit-descripcion" value="Descripción" />
                <x-input wire:model="editItem.descripcion" id="edit-descripcion" type="text" class="w-full" />
            </div>
            
            <div>
                <x-label for="edit-precio" value="Precio" />
                <x-input wire:model="editItem.precio" id="edit-precio" type="text" class="w-full" />
            </div>

            <div>
                <x-label for="edit-stock" value="Stock" />
                <x-input wire:model="editItem.stock" id="edit-stock" type="text" class="w-full" />
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-secondary-button wire:click="save" wire:loading.attr="disabled" class="diabled:capacity-25">
                Actualizar
            </x-secondary-button>
            <x-danger-button wire:click="$set('open', false)">
                Cancelar
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

</div>
