<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddToCart extends Component
{
    public $productoId;
    public $selectedProducto;
    public $cantidad = 1;


    public function mount($productoId)
    {
        $this->productoId = $productoId;
        $this->selectedProducto = Producto::find($productoId);

    }

    public function addToCart()
{
    $nombre = $this->selectedProducto->nombre;

    $product = [
        'id' => $this->selectedProducto->id,
        'name' => $nombre,
        'price' => $this->selectedProducto->precio,
        'qty' => $this->cantidad,
        'options' => [
            'imagen' => asset('storage/' . basename($this->selectedProducto->imagen)),
            'descripcion' => $this->selectedProducto->descripcion,
        ],
        

    ];
    $this->emit('productAddedToCart');

    Cart::add($product);
    toastr()->success($nombre . ' agregado a la cesta', 'Producto añadido');

}

    public function render()
    {

        return view('livewire.add-to-cart');
    }
}
