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
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_juego')->nullable();
            $table->unsignedBigInteger('id_cancha')->nullable();
            $table->unsignedBigInteger('id_escenario')->nullable();
            $table->unsignedBigInteger('id_mobiliario')->nullable();
            $table->unsignedBigInteger('id_equipamiento')->nullable();
            $table->string('tipoRecurso');
            $table->text('descripcion');
            $table->date('fecha');
            $table->string('estado');
            $table->text('observaciones');
            $table->string('acciones');
            $table->timestamps();
            $table->foreign('id_juego')->references('id')->on('juegos')->onDelete("cascade");
            $table->foreign('id_cancha')->references('id')->on('cancha_deportivas')->onDelete("cascade");
            $table->foreign('id_escenario')->references('id')->on('escenarios')->onDelete("cascade");
            $table->foreign('id_mobiliario')->references('id')->on('mobiliarios')->onDelete("cascade");
            $table->foreign('id_equipamiento')->references('id')->on('equipamientos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnosticos');
    }
};
