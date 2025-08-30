<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id('id_mantenimiento');
            $table->foreignId('id_equipo')->constrained('equipos', 'id_equipo');
            $table->foreignId('id_usuario')->constrained('users', 'id');
            $table->enum('tipo', ['preventivo', 'correctivo', 'emergencia']);
            $table->date('fecha_mantenimiento');
            $table->text('descripcion_trabajo');
            $table->text('observaciones')->nullable();
            $table->enum('estado', ['programado', 'en_proceso', 'completado', 'cancelado'])->default('programado');
            $table->decimal('costo', 8, 2)->default(0.00);
            $table->foreignId('id_tecnico')->nullable()->constrained('users', 'id');
            $table->timestamps();
            $table->softDeletes();
            
            // Índices
            $table->index('fecha_mantenimiento');
            $table->index('estado');
            $table->index('id_equipo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};