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
                'nombre' => 'Blu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'SuperPet',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
