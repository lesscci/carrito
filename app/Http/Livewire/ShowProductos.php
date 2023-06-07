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


    public function render()
    
    {
        $data = Producto::all();
        return view('livewire.show-productos',compact('data'));
    }

}
