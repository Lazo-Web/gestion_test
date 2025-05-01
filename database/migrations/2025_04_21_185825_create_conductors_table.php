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
        Schema::create('conductors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni')->unique();
            $table->string('direccion')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('provincia')->nullable();
            $table->string('cod_postal')->nullable();
            $table->string('telefono');
            $table->date('permiso_conducir_fecha')->nullable();
            $table->date('targeta_tacografo_vencimiento')->nullable();
            $table->date('capacitacion_vencimiento')->nullable();
            $table->date('fecha_nacimiento')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conductors');
    }
};
