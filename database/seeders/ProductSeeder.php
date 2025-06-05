<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //No me dejaba usar --seed por las restricciones :D

        // Desactiva las restricciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('products')->truncate();

        // Reactiva las restricciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Product::create([
            'name' => 'Zapatilla',
            'description' => 'Dc Syntax RS Blanco Negro Rojo',
            'price' => 209999,
            'image' => '/products/zapa1.webp',
        ]);

        Product::create([
            'name' => 'Zapatilla',
            'description' => 'Dc Syntax RS Negro Blanco',
            'price' => 209999,
            'image' => '/products/zapa2.webp',
        ]);

        Product::create([
            'name' => 'Zapatilla',
            'description' => 'Dc Syntax RS Negro',
            'price' => 209999,
            'image' => '/products/zapa3.webp',
        ]);

        Product::create([
            'name' => 'Zapatilla',
            'description' => 'DC Court Graffik Negro Azul',
            'price' => 169999,
            'image' => '/products/zapa4.webp',
        ]);

        Product::create([
            'name' => 'Zapatilla',
            'description' => 'Dc Court Graffik Blanco Rojo Azul',
            'price' => 169999,
            'image' => '/products/zapa5.webp',
        ]);

        Product::create([
            'name' => 'Zapatilla',
            'description' => 'Dc Court Graffik SS Negro Marrón',
            'price' => 169999,
            'image' => '/products/zapa6.webp',
        ]);
        Product::create([
            'name' => 'Zapatilla',
            'description' => 'DC Stag Blanco Negro',
            'price' => 159999,
            'image' => '/products/zapa7.webp',
        ]);
        Product::create([
            'name' => 'Zapatilla',
            'description' => 'DC Stag Gris Amarillo',
            'price' => 159999,
            'image' => '/products/zapa8.webp',
        ]);
        Product::create([
            'name' => 'Zapatilla',
            'description' => 'Dc Stag Gris Marrón',
            'price' => 159999,
            'image' => '/products/zapa9.webp',
        ]);
    }
}
