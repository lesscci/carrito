<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

use App\Models\HistorialCompra;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShowCart extends Component
{
    public $cantidad = [];

    public $open = false;
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
        //Cuando se ejecute este evento se ejecutará el método mount.
        //En este caso es para actualizar la lista de productos en el cartrito y recalcular el total. 
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
        $this->total = $this->calculateTotal();
        return view('livewire.show-cart')->with('total', $this->total);
        
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



    foreach ($productos as $producto) {
        $historialCompra = new HistorialCompra();
        $historialCompra->user_id = $userId;
        $historialCompra->producto_id = $producto->id;
        $historialCompra->cantidad = $producto->qty;
        $historialCompra->precio = $producto->price;
        $historialCompra->total = $total; 

        $historialCompra->fecha = now();
        $historialCompra->save();
    }

    Cart::destroy();

    session()->flash('message', 'Compra realizada con éxito.');

    return redirect()->to('historial' );
}



}
