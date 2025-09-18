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
        Schema::create('licencias', function (Blueprint $table) {
             $table->id('id_licencia');
            $table->string('nombre', 255);
            $table->foreignId('id_equipo')->constrained(
                table: 'equipos',
                column: 'id_equipo'
            )->onDelete('cascade');
            $table->string('clave', 255)->nullable();
            $table->date('fecha_compra')->nullable();
            $table->date('fecha_expiracion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licencias');
    }
};
