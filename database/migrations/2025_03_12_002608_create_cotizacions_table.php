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
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('ciudad');
            $table->string('tamano')->nullable(); // Ahora permite valores nulos
            $table->integer('cantidad')->nullable(); // Ahora permite valores nulos
            $table->string('tipo')->nullable(); // Ahora permite valores nulos
            $table->string('material')->nullable(); // Ahora permite valores nulos
            $table->text('informacion_adicional')->nullable();
            $table->integer('numero_cotizacion')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacions');
    }
};
