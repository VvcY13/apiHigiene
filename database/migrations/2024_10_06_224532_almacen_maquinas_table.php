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
        Schema::create('almacen_maquinas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_almacen')->constrained('almacenes')->onDelete('cascade');
            $table->foreignId('id_insumo')->constrained('insumos')->onDelete('cascade');
            $table->integer('cantidad');
            $table->string('unidad_medida');
            $table->decimal('diametro_cm', 8, 2);
            $table->decimal('diametro_metros', 8, 2);
            $table->decimal('cantidad_kilos', 10, 2);
            $table->decimal('cantidad_gramos', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('almacen_maquinas');
    }
};
