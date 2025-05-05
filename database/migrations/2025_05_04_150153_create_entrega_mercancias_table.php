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
        Schema::create('entrega_mercancias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entrega_id')->nullable(); // columna para la clave foránea
            $table->foreign('entrega_id')->references('id')->on('entregas')->onDelete('cascade');
            $table->unsignedBigInteger('mercancia_id')->nullable(); // columna para la clave foránea
            $table->foreign('mercancia_id')->references('id')->on('mercancias')->onDelete('set null');
            $table->string('nombre_mercancia');
            $table->integer('litros');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega_mercancias');
    }
};
