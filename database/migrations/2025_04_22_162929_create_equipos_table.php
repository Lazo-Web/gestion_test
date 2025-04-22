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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger('conductor_id')->nullable(); // columna para la clave foránea
            $table->foreign('conductor_id')->references('id')->on('conductors')->onDelete('cascade'); // estableces la clave foránea
            $table->unsignedBigInteger('tractora_id')->nullable(); // columna para la clave foránea
            $table->foreign('tractora_id')->references('id')->on('tractoras')->onDelete('cascade')->onUpdate('cascade'); // estableces la clave foránea
            $table->unsignedBigInteger('trailer_id')->nullable(); // columna para la clave foránea
            $table->foreign('trailer_id')->references('id')->on('trailers')->onDelete('cascade')->onUpdate('cascade'); // estableces la clave foránea
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
