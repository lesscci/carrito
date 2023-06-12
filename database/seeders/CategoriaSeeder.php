<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            ['nombre' => 'Bebidas', 'imagen' => 'storage/botella.jpg'],
            ['nombre' => 'Aperitivos', 'imagen' => 'storage/botella.jpg'],
            ['nombre' => 'Postres', 'imagen' => 'storage/botella.jpg'],
            ['nombre' => 'Azúcar', 'imagen' => 'storage/botella.jpg'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
