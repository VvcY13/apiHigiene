<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsumosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('insumos')->insert([
            [
                'nombre' => 'Rollo Celulosa',
                'diametro_standar' => 122.00,
                'kilos_standar' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Rollo Hidrofilico',
                'diametro_standar' => 61.00,
                'kilos_standar' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Rollo Hidrofobico',
                'diametro_standar' => 69.00,
                'kilos_standar' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Rollo Polietileno',
                'diametro_standar' => 55.00, 
                'kilos_standar' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Rollo Tissue',
                'diametro_standar' => 58.00,
                'kilos_standar' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'HotMelt',
                'diametro_standar' => 0, 
                'kilos_standar' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Sap',
                'diametro_standar' => 0,
                'kilos_standar' => 700.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
