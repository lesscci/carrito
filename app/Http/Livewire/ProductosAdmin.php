<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

class ProductosAdmin extends Component
{
    public $open = false;
    public $open_create = false;
    public $editItem;
    public $cartItems;
    public $producto;


    public function render()
    {
        $this->cartItems = Producto::all();

        return view('livewire.productos-admin', ['cartItems' => $this->cartItems]);
    }

    public function mount()
    {
        $this->editItem = new Producto(); // Inicializar $editItem como un nuevo objeto Producto
        $this->cartItems = Producto::all();
    }

    protected $rules = [
        'editItem.nombre' => 'required',
        'editItem.precio' => 'required',
        'editItem.descripcion' => 'required',
        'editItem.descripcion' => 'required',
        'editItem.stock' => 'required',
    ];


    public function save()
    {
        $this->validate();    
        $this->editItem->save();
        $this->reset(['open']);
        $this->emitTo('productos-admin','render');
        session()->flash('message', 'El producto se ha actualizado correctamente.');
    }
    

    public function delete($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        $this->cartItems = Producto::all();
        toastr()->success('Producto eliminado del carrito', 'Eliminado', ['timeOut' => 5000]);
    }

    public function edit($itemId)
    {
        $this->editItem = Producto::find($itemId);
        $this->open = true;
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
