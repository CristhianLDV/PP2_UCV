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
       Schema::create('compras', function (Blueprint $table) {
            $table->id('id_compra');
            $table->foreignId('id_proveedor')->constrained(
                table: 'proveedores',
                column: 'id_proveedor'
            )->onDelete('cascade');
            $table->foreignId('id_equipo')->constrained(
                table: 'equipos',
                column: 'id_equipo'
            )->onDelete('cascade');
            $table->date('fecha_compra');
            $table->decimal('costo', 10, 2);
            $table->string('documento_referencia', 255)->nullable();
            $table->string('garantia', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
