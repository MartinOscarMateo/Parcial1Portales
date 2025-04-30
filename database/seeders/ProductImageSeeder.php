<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 9; $i++) {
            $product = Product::find($i);

            if ($product) {
                $product->image = "images/products/zapa{$i}.webp";
                $product->extra_image_1 = "images/products/zapa{$i}extra1.webp";
                $product->extra_image_2 = "images/products/zapa{$i}extra2.webp";
                $product->save();
            }
        }
    }
}
