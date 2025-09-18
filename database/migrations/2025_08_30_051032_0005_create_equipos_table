<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id('id_equipo');
            $table->string('codigo_inventario', 50)->unique();
            $table->string('nombre', 150);
            $table->string('marca', 100)->nullable();
            $table->string('modelo', 100)->nullable();
            $table->string('numero_serie', 150)->unique()->nullable();
            $table->text('especificaciones')->nullable();
            $table->enum('estado', ['excelente', 'bueno', 'regular', 'malo', 'inoperativo'])->default('bueno');
            $table->decimal('valor_compra', 10, 2)->nullable();
            $table->date('fecha_compra')->nullable();
            $table->date('fecha_garantia')->nullable();
            $table->text('observaciones')->nullable();
            $table->foreignId('id_categoria')->constrained('categorias', 'id_categoria');
            $table->foreignId('id_ubicacion')->constrained('ubicaciones', 'id_ubicacion');
            $table->foreignId('id_proveedor')->nullable()->constrained('proveedores', 'id_proveedor');
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            // Índices
            $table->index('codigo_inventario');
            $table->index('numero_serie');
            $table->index('estado');
            $table->index('id_categoria');
            $table->index('id_ubicacion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};