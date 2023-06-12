<?php

namespace App\Models;

use App\Models\User;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistorialCompra extends Model
{
    use HasFactory;

    protected $table = 'historial_compras';

    protected $fillable = [
        'user_id',
        'producto_id',
        'cantidad',
        'precio',
        'fecha',
    ];

    // Relación con el modelo User (opcional, si se desea obtener información del usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Producto (opcional, si se desea obtener información del producto)
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
