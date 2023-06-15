<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\HistorialCompras;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Historial extends Component
{
    public $open = true;
    public $historialSeleccionado;
    public $productos;
    public $totalUnidades; // Variable para almacenar el número total de unidades

    public function mount()
    {
        $this->open = false; 
        $user = Auth::user();
        $this->historialesCompras = HistorialCompras::where('user_id', $user->id)->get();
        $this->productos = [];
        $this->totalUnidades = 0; // Inicializar el total de unidades en 0
    }

    public function redirectToHistorial()
    {
        return Redirect::route('historial');
    }
    

    public function verDetalles($historialCompraId)
    {
        $this->historialSeleccionado = HistorialCompras::findOrFail($historialCompraId);
     
        $this->productos = $this->historialSeleccionado->detalles->map(function ($detalle) {
            return [
                'producto' => $detalle->producto->nombre,  // Asumiendo que el modelo Producto tiene un atributo 'nombre'
                'cantidad' => $detalle->cantidad,
                'costo' => $detalle->precio,
            ];
        })->all();
        
        $this->totalUnidades = collect($this->productos)->sum('cantidad'); // Calcular el número total de unidades

        $this->open = true;
    }
    

    public function render()
    {

        
        return view('livewire.historial-compras', [
            'productos' => $this->productos,
            'totalUnidades' => $this->totalUnidades, // Pasar el número total de unidades a la vista
        ]);
    }
    
}
