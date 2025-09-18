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
        Schema::create('mantenimientos', function (Blueprint $table) {
             $table->id('id_mantenimiento');
            $table->foreignId('id_equipo')->constrained(
                table: 'equipos',
                column: 'id_equipo'
            )->onDelete('cascade');
            $table->string('tipo', 100);
            $table->text('descripcion');
            $table->date('fecha');
            $table->foreignId('id_responsable')->constrained(
                table: 'users',
                column: 'id'
            )->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
