<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Actualice este archivo pa agregar el nuevo seeder de productos, cuando se ejecuta "php artisan db:seed" o "migrate --seed", tmb se ejecuta ProductSeeder :3 uwu owo

        $this->call([
            UserSeeder::class,
            RolesSeeder::class,
            RolesUserSeeder::class,
            ProductSeeder::class,
        ]);
        
    }
}
