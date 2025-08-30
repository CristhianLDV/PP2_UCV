<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('componentes', function (Blueprint $table) {
            $table->id('id_componente');
            $table->string('codigo', 50)->unique();
            $table->string('nombre', 150);
            $table->text('descripcion')->nullable();
            $table->string('marca', 100)->nullable();
            $table->string('modelo', 100)->nullable();
            $table->enum('tipo', ['procesador', 'memoria', 'disco', 'tarjeta', 'cable', 'accesorio']);
            $table->enum('estado', ['excelente', 'bueno', 'regular', 'malo', 'inoperativo'])->default('bueno');
            $table->integer('stock_actual')->default(0);
            $table->integer('stock_minimo')->default(0);
            $table->decimal('precio_unitario', 8, 2)->nullable();
            $table->foreignId('id_categoria')->constrained('categorias', 'id_categoria');
            $table->foreignId('id_proveedor')->nullable()->constrained('proveedores', 'id_proveedor');
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            // Índices
            $table->index('codigo');
            $table->index('tipo');
            $table->index(['stock_actual', 'stock_minimo']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('componentes');
    }
};