<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_prestamos', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->foreignId('id_prestamo')->constrained('prestamos', 'id_prestamo')->onDelete('cascade');
            $table->foreignId('id_equipo')->constrained('equipos', 'id_equipo');
            $table->enum('estado_equipo_salida', ['excelente', 'bueno', 'regular', 'malo']);
            $table->enum('estado_equipo_devolucion', ['excelente', 'bueno', 'regular', 'malo', 'danado', 'perdido'])->nullable();
            $table->text('observaciones')->nullable();
            
            // Índices
            $table->index('id_equipo');
            $table->unique(['id_prestamo', 'id_equipo']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_prestamos');
    }
};