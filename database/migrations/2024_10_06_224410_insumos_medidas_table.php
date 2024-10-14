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
        Schema::create('insumos_medidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_insumo')->constrained('insumos')->onDelete('cascade');
            $table->enum('tipoMedida',['cm','metros','kilos','gramos']);
            $table->decimal('factorConversion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insumos_medidas');
    }
};
