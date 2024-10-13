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
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();
            $table->string('numero_guia')->unique(); // Número de guía para identificar la salida
            $table->timestamps();
        });

        Schema::create('salida_producto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salida_id')->constrained()->onDelete('cascade'); // Esta es la relación a 'salidas'
            $table->foreignId('id_producto')->constrained('productos'); // Esta es la relación a 'productos'
            $table->foreignId('id_medida')->constrained('medidas');
            $table->integer('cantidad'); // Cantidad despachada
            $table->timestamps(); // Agrega las columnas created_at y updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salida_producto');
        Schema::dropIfExists('salidas');
    }
};
