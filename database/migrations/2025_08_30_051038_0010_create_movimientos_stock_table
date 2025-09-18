<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movimientos_stock', function (Blueprint $table) {
            $table->id('id_movimiento');
            $table->foreignId('id_componente')->constrained('componentes', 'id_componente');
            $table->foreignId('id_usuario')->constrained('users', 'id');
            $table->enum('tipo_movimiento', ['entrada', 'salida', 'ajuste', 'perdida', 'dano']);
            $table->integer('cantidad');
            $table->integer('stock_anterior');
            $table->integer('stock_nuevo');
            $table->decimal('precio_unitario', 8, 2)->nullable();
            $table->string('motivo', 255)->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamp('fecha_movimiento')->useCurrent();
            
            // Índices
            $table->index('fecha_movimiento');
            $table->index('tipo_movimiento');
            $table->index('id_componente');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimientos_stock');
    }
};