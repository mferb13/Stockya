<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        Producto::insert([
            [
                'nombre' => 'Pollo Entero',
                'descripcion' => 'Pollo fresco',
                'precio' => 25000,
                'imagen' => 'pollo.png',
                'stock' => 100
            ],
            [
                'nombre' => 'Pan HB Catalina',
                'descripcion' => 'Pan saludable',
                'precio' => 5000,
                'imagen' => 'pan.jpeg',
                'stock' => 50
            ],
            [
                'nombre' => 'Arroz Diana 5kg',
                'descripcion' => 'Arroz de calidad',
                'precio' => 18000,
                'imagen' => 'arroz.png',
                'stock' => 80
            ],
            // Agrega más productos como quieras
        ]);
    }
}
