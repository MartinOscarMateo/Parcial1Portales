<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();

        Post::create([
            'title' => '¡Llega la nueva colección DC 2025!',
            'content' => 'Ya están disponibles las nuevas zapatillas DC. No te pierdas los últimos modelos exclusivos para Argentina.',
            'created_at' => Carbon::now()
        ]);

        Post::create([
            'title' => 'Promo 2x1 en productos seleccionados',
            'content' => 'Durante esta semana, aprovechá el 2x1 en varios productos de la línea DC Syntax.',
            'created_at' => Carbon::now()->subDays(2)
        ]);

        Post::create([
            'title' => 'Envíos gratis a todo el país',
            'content' => 'Desde ahora todos los pedidos superiores a $50.000 tienen envío gratuito. ¡Comprá sin moverte de casa!',
            'created_at' => Carbon::now()->subDays(5)
        ]);
    }
}
