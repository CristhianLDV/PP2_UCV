<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposEquiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('tipos_equipos')->insert([
            ['nombre' => 'Laptop', 'id_categoria' => 1], // Hardware
            ['nombre' => 'Servidor', 'id_categoria' => 1], // Hardware
            ['nombre' => 'Sistema ERP', 'id_categoria' => 2], // Software
            ['nombre' => 'Router', 'id_categoria' => 3], // Red
            ['nombre' => 'Switch', 'id_categoria' => 3], // Red
        ]);
    }
}
