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
            $table->unsignedBigInteger('id_parque');
            $table->integer('id_recurso');
            $table->string('tipoRecurso');
            $table->text('descripcion');
            $table->date('fecha');
            $table->string('estado');
            $table->text('observaciones');
            $table->string('acciones');
            $table->timestamps();
            $table->foreign('id_parque')->references('id')->on('parques');
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
