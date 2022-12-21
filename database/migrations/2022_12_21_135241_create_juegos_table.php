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
        Schema::create('juegos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->unsignedBigInteger('idParque');
            $table->string('tipojuego');
            $table->string('iluminacion');
            $table->string('material');
            $table->string('altura');
            $table->string('cerramiento');
            $table->string('reservable');
            $table->float('largo');
            $table->float('ancho');
            $table->float('area');
            $table->string('materialsuperficie');
            $table->string('descripcion');
            $table->string('estado');
            $table->foreign("idParque")
            ->references("id")
            ->on("parques")
            ->onDelete("cascade");
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
        Schema::dropIfExists('juegos');
    }
};
