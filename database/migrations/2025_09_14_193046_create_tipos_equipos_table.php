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
        Schema::create('tipos_equipos', function (Blueprint $table) {
             $table->bigIncrements('id_tipo_equipo');
            $table->string('nombre', 255)->unique();

            // Clave foránea hacia categorias
            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->foreign('id_categoria')
                  ->references('id_categoria')
                  ->on('categorias')
                  ->onDelete('set null'); // Si eliminas la categoría, se pone NULL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_equipos');
    }
};
