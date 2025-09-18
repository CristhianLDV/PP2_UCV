<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id('id_prestamo');
            $table->foreignId('id_usuario_solicitante')->constrained('users', 'id');
            $table->foreignId('id_usuario_autoriza')->constrained('users', 'id');
            $table->timestamp('fecha_prestamo')->useCurrent();
            $table->timestamp('fecha_devolucion_programada')->nullable();
            $table->timestamp('fecha_devolucion_real')->nullable();
            $table->enum('estado', ['activo', 'devuelto', 'vencido', 'perdido'])->default('activo');
            $table->text('observaciones_salida')->nullable();
            $table->text('observaciones_devolucion')->nullable();
            $table->softDeletes();
            
            // Índices
            $table->index('estado');
            $table->index('fecha_devolucion_programada');
            $table->index('id_usuario_solicitante');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};