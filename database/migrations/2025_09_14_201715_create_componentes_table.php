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
Schema::create('componentes', function (Blueprint $table) {
    $table->id('id_componente');
    $table->string('nombre',100)->nullable();
    $table->string('modelo', 100)->nullable();
    $table->string('serie', 100)->unique()->nullable();
    $table->foreignId('id_marca')->constrained(
        table: 'marcas',
        column: 'id_marca'
    )->onDelete('cascade');
    $table->string('estado', 500)->nullable();
    $table->timestamps();
});
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('componentes');
    }
};
