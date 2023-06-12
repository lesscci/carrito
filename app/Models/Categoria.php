<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'imagen',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
