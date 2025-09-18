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
        Schema::create('inventario_sbn', function (Blueprint $table) {
            $table->id('id_inventario');
            $table->foreignId('id_equipo')->constrained(
                table: 'equipos',
                column: 'id_equipo'
            )->onDelete('cascade');
            $table->string('codigo_sbn', 100)->unique();
            $table->string('estado_sbn', 100)->default('operativo');
            $table->date('fecha_registro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario_sbn');
    }
};
