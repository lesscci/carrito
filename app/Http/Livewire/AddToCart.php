<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;

class AddToCart extends Component
{
    public $productoId;
    public $selectedProducto;
    public $cantidad = 0;

    public function addToCart()
{
    $producto = Producto::find($this->productoId);

    if ($producto) {
        $cart = Session::get('cart', []);

        // Compruebo si el producto ya está en el carrito
        $productoExistenteIndex = collect($cart['productos'])->search(function ($item) use ($producto) {
            return $item['id'] === $producto->id;
           
        }); dd($productoExistenteIndex);

        if ($productoExistenteIndex !== false) {
      
            $cart['productos'][$productoExistenteIndex]['cantidad']++;

        } else {
            $producto->cantidad = 1;
            $cart['productos'][] = $producto->toArray();
        }

        $cart['cantidad'] = ($cart['cantidad'] ?? 0) + 1;

        Session::put('cart', $cart);
        toastr()->success('Producto añadido al carrito', 'Añadido', ['timeOut' => 5000]);

        $this->cantidad = $cart['cantidad'];

        dd($cart['cantidad']);
    } else {
        toastr()->error('Producto no encontrado', 'Error');
    }
}



    
    
    
    

    public function increment()
    {
        $this->cantidad++;
    }

    public function mount($productoId)
    {
        $this->selectedProducto = Producto::find($productoId);
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
