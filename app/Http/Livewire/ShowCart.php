<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\DetalleCompra;
use App\Models\HistorialCompras;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShowCart extends Component
{
    public $cantidad = [];
    public $open = false;
    public $open_create = false; 
    public $productos;
    protected $listeners = ['inputChanged'];
    public $total;

    /**
     * Primera vez cuando se abre la página
     */
    public function mount()
    {
        $this->productos = Cart::content();
        $this->total = $this->calculateTotal();

        $this->listeners = [
            'productAddedToCart' => 'mount',
        ];

        foreach ($this->productos as $producto) {
            $this->cantidad[$producto->rowId] = $producto->qty;
        }
    }

    /**
     * Calculo de todos los productos
     */
    public function calculateTotal()
    {
        $total = Cart::total();
        return $total;
    }

    /**
     * Vuelvo a declarar el total para que lo pueda recoger en la vista
     */
    public function render()
    {
        $cartTotalQuantity = Cart::count();

        $this->total = $this->calculateTotal();
        return view('livewire.show-cart')
        ->with('total', $this->total)
        ->with('cartTotalQuantity', $cartTotalQuantity);
    }

    /**
     * ELIMINAR PRODUCTO POR ID
     */
    public function removeProduct($rowId)
    {
        $product = Cart::get($rowId);

        if ($product) {
            if ($product->qty > 1) {
                Cart::update($rowId, $product->qty - 1);
            } else {
                Cart::remove($rowId);
            }

            toastr()->success('Producto eliminado del carrito', 'Eliminado', ['timeOut' => 5000]);
        } else {
            toastr()->error('No se pudo encontrar el producto en el carrito', 'Error');
        }

        $this->mount();
    }

    public function updateQuantity($rowId, $newQuantity)
    {
        Cart::update($rowId, $newQuantity);
        toastr()->success('Cantidad actualizada', 'Éxito');
        $this->mount(); // Vuelve a cargar los productos y recalcular el total
    }


    public function comprar()
    {
        $userId = auth()->id();
        $productos = Cart::content();
        $total = Cart::total();
    
        $historialCompra = new HistorialCompras();
        $historialCompra->user_id = $userId;
        $historialCompra->total = $total;
        $historialCompra->fecha = now();
        $historialCompra->save();
    
        foreach ($productos as $producto) {
            $detalleCompra = new DetalleCompra();
            $detalleCompra->historial_compra_id = $historialCompra->id;
            $detalleCompra->producto_id = $producto->id;
            $detalleCompra->cantidad = $producto->qty;
            $detalleCompra->precio = $producto->price;
            $detalleCompra->save();
        }
    
        Cart::destroy();
    
        session()->flash('message', 'Compra realizada con éxito.');
    
        return redirect()->route('historial');
    }
    

    public function create(){

        $producto = Producto::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion, 
            'precio' => $this->precio, 
            'stock' => $this->stock, 
            'categoria' => $this->categoria,
        ]);
    }

}
