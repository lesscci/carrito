<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $imagenPath = storage_path('app/public/storage/cocacola.jpg');
        Storage::copy('cocacola.jpg', $imagenPath);


        Producto::create([
            'nombre' => 'Cocacola',
            'descripcion' => 'Refresco',
            'precio' => 1.20,
            'cantidad' => 1,
            'imagen' => 'storage/cocacola.jpg'
        ]);

        Producto::create([
            'nombre' => 'Fanta Naranja',
            'descripcion' => 'Refresco',
            'precio' => 1.00,
            'cantidad' => 1,
            'imagen' => 'storage/fantaNaranja.jpg'
        ]);

        Producto::create([
            'nombre' => 'Fanta Limón',
            'descripcion' => 'Refresco',
            'precio' => 1.00,
            'cantidad' => 1,
            'imagen' => 'storage/fantaLimon.jpg'
        ]);

        Producto::create([
            'nombre' => 'Nestea',
            'descripcion' => 'Refresco',
            'precio' => 1.10,
            'cantidad' => 1,
            'imagen' => 'storage/nestea.jpg'
        ]);


    }
}
