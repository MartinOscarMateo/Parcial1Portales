<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void // Este seeder nos agrega productos de prueba en la tabla products
    {
        Product::create([
            'name' => 'Remera Negra',
            'description' => 'Remera básica color negro de algodón.',
            'price' => 5999,
            'image' => 'images/products/remera1.jpg',
        ]);

        Product::create([
            'name' => 'Remera Blanca',
            'description' => 'Remera básica color blanco de algodón.',
            'price' => 5999,
            'image' => 'images/products/remera1.jpg',
        ]);
    }
}
