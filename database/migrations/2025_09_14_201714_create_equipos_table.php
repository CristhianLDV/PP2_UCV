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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id('id_equipo');
            $table->string('codigo_patrimonial', 100)->unique()->nullable();
            $table->string('nombre_equipo', 255);
            $table->foreignId('id_tipo_equipo')->constrained(
                table: 'tipos_equipos',
                column: 'id_tipo_equipo'
            )->onDelete('cascade');
            $table->foreignId('id_marca')->constrained(
                table: 'marcas',
                column: 'id_marca'
            )->onDelete('cascade');
            $table->string('modelo', 100)->nullable();
            $table->string('serie', 100)->unique()->nullable();
            $table->string('estado', 500)->nullable();
            $table->foreignId('id_usuario')->nullable()->constrained(
                table: 'users',
                column: 'id'
            )->onDelete('set null');
            $table->foreignId('id_ubicacion')->nullable()->constrained(
                table: 'ubicaciones',
                column: 'id_ubicacion'
            )->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
