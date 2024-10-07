<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('almacenes')->insert([
            [
                'nomAlmacen' => 'almacenStock',
                'referencia' => 'stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomAlmacen' => 'almacenMaquina',
                'referencia' => 'maquina',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
