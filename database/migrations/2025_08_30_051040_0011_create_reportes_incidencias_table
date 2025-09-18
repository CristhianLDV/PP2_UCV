<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reportes_incidencias', function (Blueprint $table) {
            $table->id('id_incidencia');
            $table->foreignId('id_equipo')->constrained('equipos', 'id_equipo');
            $table->foreignId('id_usuario_reporta')->constrained('users', 'id');
            $table->foreignId('id_usuario_asignado')->nullable()->constrained('users', 'id');
            $table->string('titulo', 255);
            $table->text('descripcion');
            $table->enum('prioridad', ['baja', 'media', 'alta', 'critica'])->default('media');
            $table->enum('estado', ['abierto', 'en_proceso', 'resuelto', 'cerrado'])->default('abierto');
            $table->timestamp('fecha_reporte')->useCurrent();
            $table->timestamp('fecha_resolucion')->nullable();
            $table->text('solucion')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            // Índices
            $table->index('estado');
            $table->index('prioridad');
            $table->index('fecha_reporte');
            $table->index('id_equipo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reportes_incidencias');
    }
};