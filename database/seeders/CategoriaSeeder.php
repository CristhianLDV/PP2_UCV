<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categorias')->insert([
            ['id_categoria' => 1, 'nombre' => 'Hardware', 'descripcion' => 'Equipos físicos', 'activo' => true],
            ['id_categoria' => 2, 'nombre' => 'Software', 'descripcion' => 'Programas y sistemas', 'activo' => true],
            ['id_categoria' => 3, 'nombre' => 'Red', 'descripcion' => 'Dispositivos de red', 'activo' => true],
        ]);
    }
}
