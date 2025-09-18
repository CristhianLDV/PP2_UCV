<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('auditorias', function (Blueprint $table) {
            $table->id('id_auditoria');
            $table->foreignId('id_usuario')->constrained('users', 'id');
            $table->string('tabla_afectada', 100);
            $table->enum('accion', ['INSERT', 'UPDATE', 'DELETE']);
            $table->json('datos_anteriores')->nullable();
            $table->json('datos_nuevos')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamp('timestamp')->useCurrent();
            
            // Índices
            $table->index(['tabla_afectada', 'accion']);
            $table->index('timestamp');
            $table->index('id_usuario');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('auditorias');
    }
};