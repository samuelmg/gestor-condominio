<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condominios', function (Blueprint $table) {
            $table->id();
            $table->string('condominio');
            $table->foreignId('pais_id')->constrained('paises');
            $table->foreignId('estado_id')->constrained();
            $table->foreignId('municipio_id')->constrained();
            $table->string('localidad');
            $table->string('colonia');
            $table->string('calle');
            $table->string('numero');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condominios');
    }
};
