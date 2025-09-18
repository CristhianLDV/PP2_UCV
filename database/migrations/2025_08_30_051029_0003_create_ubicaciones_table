<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->id('id_ubicacion');
            $table->string('nombre', 100)->unique();
            $table->text('descripcion')->nullable();
            $table->string('codigo_aula', 20)->unique();
            $table->integer('capacidad')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            // Índices
            $table->index('codigo_aula');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ubicaciones');
    }
};