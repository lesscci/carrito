<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;

class ShowCart extends Component
{
    public $cantidad;
    public $open = false;
    public $productos;

    /**
     * Primera vez cuando se abre la página
     */
    public function mount()
    {
        $cart = Session::get('cart', []);
        $this->cantidad = $cart['cantidad'] ?? 0;

        // Obtener los productos por sus IDs
        $productosIds = collect($cart['productos'] ?? [])->pluck('id')->toArray();
        $this->productos = Producto::whereIn('id', $productosIds)->get();
    }

    /**
     * Calculo de todos los productos
     */
    public function calculateTotal()
    {
        $total = 0;

        foreach ($this->productos as $producto) {
            $total += $producto->precio * $producto->cantidad;
        }

        return $total;
    }

    /**
     * Vuelvo a declarar el total para que lo pueda recoger en la vista
     */
    public function render()
    {
        $total = $this->calculateTotal();

        return view('livewire.show-cart', [
            'total' => $total,
            'productos' => $this->productos,
        ]);
    }

    public function removeProduct($productId)
{
    foreach ($this->productos as $key => $producto) {
        if ($producto->id === $productId) {
            if ($producto->cantidad === 1) {
                unset($this->productos[$key]);
            } else {
                $this->productos[$key]->cantidad--;
            }
            break;
        }
    }

    // Actualizar el carrito de sesión con los productos actualizados
    $cart = Session::get('cart', []);
    $cart['productos'] = $this->productos->toArray();
    Session::put('cart', $cart);

    toastr()->success('Producto eliminado del carrito', 'Eliminado', ['timeOut' => 5000]);
}

}
