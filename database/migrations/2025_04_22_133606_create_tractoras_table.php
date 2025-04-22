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
        Schema::create('tractoras', function (Blueprint $table) {
            $table->id();
            $table->string('matricula')->unique();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('vin')->unique();
            $table->date('fecha_matricula')->nullable();
            $table->date('fecha_itv')->nullable();
            $table->date('fecha_tacografo')->nullable();
            // $table->unsignedBigInteger('conductor_id')->nullable(); // columna para la clave foránea
            // $table->foreign('conductor_id')->references('id')->on('conductors')->onDelete('cascade'); // estableces la clave foránea
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tractoras');
    }
};
