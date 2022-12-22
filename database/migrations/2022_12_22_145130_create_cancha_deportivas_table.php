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
        Schema::create('cancha_deportivas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_parque');
            $table->string('tipocancha');
            $table->float('ancho');
            $table->float('largo');
            $table->float('area');
            $table->string('material');
            $table->string('iluminacion');
            $table->string('cerramiento');
            $table->string('camerino');
            $table->string('descripcion');
            $table->string('estado');
            $table->foreign("id_parque")
            ->references("id")
            ->on("parques")
            ->onDelete("cascade");
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancha_deportivas');
    }
};
