<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlmacenStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('almacen_stock')->insert([
            [
                'insumo_id' => 1, // Rollo Celulosa
                'cantidad' => 100, // Cantidad inicial, ajusta según sea necesario
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'insumo_id' => 2, // Rollo Hidrofilico
                'cantidad' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'insumo_id' => 3, // Rollo Hidrofobico
                'cantidad' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'insumo_id' => 4, // Rollo Polietileno
                'cantidad' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'insumo_id' => 5, // Rollo Tissue
                'cantidad' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'insumo_id' => 6, // HotMelt
                'cantidad' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'insumo_id' => 7, // Sap
                'cantidad' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
