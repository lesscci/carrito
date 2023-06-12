<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\HistorialCompra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class Historial extends Component
{
    public $historialesCompras;
    public $total;


public function mount($total){
    
    $this->total = $total;
    $user = Auth::user();
    $this->total = Session::get('cart.total', 0);

  $this->historialesCompras = HistorialCompra::with('producto')->get();
  foreach ($this->historialesCompras as $historialCompra) {
}
}

    
public function render()
{
    $user = Auth::user();
    $this->historialesCompras = HistorialCompra::with('producto')->get();

    return view('livewire.historial-compras', [
        'historialesCompras' => $this->historialesCompras,
    ]);
}

}
