<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id('id_categoria');
            $table->string('nombre', 100)->unique();
            $table->text('descripcion')->nullable();
            $table->string('codigo', 20)->unique();
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            // Índices
            $table->index('codigo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};