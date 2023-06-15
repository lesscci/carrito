<?php

namespace App\Models;

use App\Models\Producto;
use App\Models\HistorialCompras;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $table = 'detalle_compras';

    protected $fillable = [
        'historial_compra_id',
        'producto_id',
        'cantidad',
        'precio',
    ];

    /**
     * Relación con el modelo HistorialCompra
     */
    public function historialCompra()
    {
        return $this->belongsTo(HistorialCompras::class, 'historial_compra_id');
    }
    
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    
}
