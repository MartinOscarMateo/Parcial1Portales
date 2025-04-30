<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Agregar columnas para imágenes adicionales
            $table->string('extra_image_1')->nullable(); // Imagen extra 1
            $table->string('extra_image_2')->nullable(); // Imagen extra 2
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Eliminar las columnas de imágenes adicionales
            $table->dropColumn('extra_image_1');
            $table->dropColumn('extra_image_2');
        });
    }
};
