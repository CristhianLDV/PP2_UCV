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
        Schema::create('equipo__componente', function (Blueprint $table) {
            $table->id('id_equipo_componente');
             $table->foreignId('id_equipo')->constrained(
                table: 'equipos',
                column: 'id_equipo'
            )->onDelete('cascade');
            $table->foreignId('id_componente')->constrained(
                table: 'componentes',
                column: 'id_componente'
            )->onDelete('cascade');
            $table->date('fecha_asignacion')->nullable();
            $table->date('fecha_retiro')->nullable();
            $table->timestamps();
        });
    }
     

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo__componente');
    }
};
