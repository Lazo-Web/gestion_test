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
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_origen_id')->nullable(); // columna para la clave foránea
            $table->foreign('cliente_origen_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->unsignedBigInteger('cliente_destino_id')->nullable(); // columna para la clave foránea
            $table->foreign('cliente_destino_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->unsignedBigInteger('fabrica_origen_id')->nullable(); // columna para la clave foránea
            $table->foreign('fabrica_origen_id')->references('id')->on('fabricas')->onDelete('cascade');
            $table->unsignedBigInteger('fabrica_destino_id')->nullable(); // columna para la clave foránea
            $table->foreign('fabrica_destino_id')->references('id')->on('fabricas')->onDelete('cascade');
            $table->unsignedBigInteger('equipo_id')->nullable(); // columna para la clave foránea
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->date('fecha_entrega');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entregas');
    }
};
