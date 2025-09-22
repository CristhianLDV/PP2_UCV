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
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id('id_asignacion');

             // Polimórfico: puede ser equipo o componente
            $table->unsignedBigInteger('asignable_id');
            $table->string('asignable_type'); // 'App\Models\Equipo' o 'App\Models\Componente'

            // Usuario asignado

            $table->foreignId('id_usuario')->constrained(
                table: 'users',
                column: 'id'
            )->onDelete('cascade');

               // Relación con área (si se asigna a un área)
            $table->unsignedBigInteger('id_area')->nullable();
            $table->foreign('id_area')->references('id_area')->on('areas')->onDelete('set null');

            // Relación con ubicación física
            $table->unsignedBigInteger('id_ubicacion')->nullable();
            $table->foreign('id_ubicacion')->references('id_ubicacion')->on('ubicaciones')->onDelete('set null');
   


             // Fechas de control
            $table->date('fecha_asignacion');
            $table->date('fecha_devolucion')->nullable();

            $table->enum('estado', ['asignado', 'devuelto', 'retrasado', 'perdido'])->default('asignado');
            $table->text('observacion')->nullable();
            $table->timestamps();

            // Índices para mejorar consultas polimórficas
            $table->index(['asignable_id', 'asignable_type']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaciones');
    }
};
