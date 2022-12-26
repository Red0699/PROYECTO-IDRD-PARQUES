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
        Schema::create('escenarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_parque');
            $table->string('tipoescenariodeportivo');
            $table->float('largo');
            $table->float('ancho');
            $table->float('area');
            $table->string('luz');
            $table->string('agua');
            $table->string('gas');
            $table->string('cerramiento');
            $table->string('camerinos');
            $table->integer('nbaños');
            $table->string('estado');
            $table->string('descripcion');
            $table->foreign("id_parque")
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
        Schema::dropIfExists('escenarios');
    }
};
