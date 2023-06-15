<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  
    public function run(): void
    {
      
        $this->call(CategoriaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(RoleSeeder::class);  $this->call(UserSeeder::class); 
       
    }
}
