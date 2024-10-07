<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedidasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medidas')->insert([
            [
                'nombreMedida' => 'Chico',
                'largo' => 45.00,
                'ancho' => 60.00,
                'cantidad_bolsas' => 20,
                'cantidad_bolsones' =>80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombreMedida' => 'Mediano',
                'largo' => 60.00,
                'ancho' => 60.00,
                'cantidad_bolsas' =>10,
                'cantidad_bolsones' => 72,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombreMedida' => 'Grande',
                'largo' => 90.00,
                'ancho' => 60.00,
                'cantidad_bolsas' => 10,
                'cantidad_bolsones' => 72,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
