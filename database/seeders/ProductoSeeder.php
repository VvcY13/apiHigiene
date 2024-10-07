<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            [
                'nombre' => 'Chico 45*60',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Mediano 60*60',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Grande 90*60',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
