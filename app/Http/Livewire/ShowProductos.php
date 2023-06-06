<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ShowProductos extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $nombre, $descripcion, $imagen, $precio, $cantidad;
    private $pagination = 5;


    public function agregarAlCarrito($itemId)
{
    // Lógica para buscar y agregar el elemento al carrito
    // Aquí puedes usar el ID para encontrar el elemento en tu base de datos o en la colección de datos

    // Ejemplo básico:
    $item = Item::find($itemId);

    if ($item) {
        $this->carrito[] = $item;
    }
}

    public function render()
    
    {
        $data = Producto::all();
        
        return view('livewire.show-productos',compact('data'));
    }

}
