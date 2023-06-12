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

        Producto::create([
            'nombre' => 'Cocacola',
            'descripcion' => 'Refresco',
            'precio' => 1.20,
            'stock' => 10,
            'imagen' => 'storage/cocacola.jpg',
            'categoria_id' =>1
        ]);

        Producto::create([
            'nombre' => 'Fanta Naranja',
            'descripcion' => 'Refresco',
            'precio' => 1.00,
            'stock' => 10,
            'imagen' => 'storage/fantaNaranja.jpg',
            'categoria_id' =>1
        ]);

        Producto::create([
            'nombre' => 'Fanta Limón',
            'descripcion' => 'Refresco',
            'precio' => 1.00,
            'stock' => 10,
            'imagen' => 'storage/fantaLimon.jpg',
            'categoria_id' =>1
        ]);

        Producto::create([
            'nombre' => 'Nestea',
            'descripcion' => 'Refresco',
            'precio' => 1.10,
            'stock' => 10,
            'imagen' => 'storage/nestea.jpg',
            'categoria_id' =>1
        ]);


        /**
         * Postres
         * 
         */
        Producto::create([
            'nombre' => 'Magnum',
            'descripcion' => 'Bombón helado caramelo ',
            'precio' => 4.20,
            'stock' => 10,
            'imagen' => 'storage/magnum.jpg',
            'categoria_id' =>3
        ]);

        Producto::create([
            'nombre' => 'Helado Vainilla',
            'descripcion' => 'Bombón helado sabor vainilla ',
            'precio' => 2.40,
            'stock' => 10,
            'imagen' => 'storage/vainilla.jpg',
            'categoria_id' =>3
        ]);

        Producto::create([
            'nombre' => 'Tarta de nata',
            'descripcion' => 'Tarta helada laminada de nata',
            'precio' => 1.99,
            'stock' => 10,
            'imagen' => 'storage/tarta.jpg',
            'categoria_id' =>3
        ]);

        Producto::create([
            'nombre' => 'Tarta',
            'descripcion' => 'Tarta Red Velvet 700 g',
            'precio' => 10.10,
            'stock' => 10,
            'imagen' => 'storage/velvet.jpg',
            'categoria_id' =>3
        ]);
    }
}
