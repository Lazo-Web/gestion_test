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
        Schema::create('trailers', function (Blueprint $table) {
            $table->id();
            $table->string('matricula')->unique();
            $table->string('marca')->nullable();
            $table->string('vin')->unique();
            $table->date('fecha_matricula')->nullable();
            $table->date('fecha_itv')->nullable();
            $table->date('fecha_atp')->nullable();
            $table->integer('deposito_1')->nullable();
            $table->integer('deposito_2')->nullable();
            $table->integer('deposito_3')->nullable();
            $table->integer('deposito_4')->nullable();
            $table->integer('capacidad')->nullable();

            // $table->unsignedBigInteger('conductor_id')->nullable(); // columna para la clave foránea
            // $table->foreign('conductor_id')->references('id')->on('conductors')->onDelete('cascade'); // estableces la clave foránea
            // $table->unsignedBigInteger('tractora_id')->nullable(); // columna para la clave foránea
            // $table->foreign('tractora_id')->references('id')->on('tractoras')->onDelete('cascade'); // estableces la clave foránea
           
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trailers');
    }
};
