<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShowProductos extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $type;

    public function render()
    { 
        
        $cartItems = Producto::all();

        if ($this->type === 'bebidas') {
            $cartItems = Producto::where('categoria_id', 1)->get();
        } elseif ($this->type === 'postres') {
            $cartItems = Producto::where('categoria_id', 3)->get();
        } else {
            $cartItems = Producto::all();
        }
       
        return view('livewire.show-productos', ['cartItems' => $cartItems]);
    }

    public function mount($type){

        $this->type = $type;

    }

}