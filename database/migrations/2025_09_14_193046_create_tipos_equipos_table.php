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
            $table->id('id_tipo_equipo');
            $table->string('nombre', 255)->unique();
            $table->foreignId('id_categoria')->nullable()->constrained(
                table: 'categorias',
                column: 'id_categoria'
            )->onDelete('set null');
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
