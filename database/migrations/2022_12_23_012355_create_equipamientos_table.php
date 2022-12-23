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
        Schema::create('equipamiento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idparque');
            $table->string('modulo');
            $table->float('largo');
            $table->float('ancho');
            $table->float('area');
            $table->string('luz');
            $table->string('agua');
            $table->string('gas');
            $table->string('descripcion');
            $table->string('estado');
            $table->foreign("idparque")
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
        Schema::dropIfExists('equipamiento');
    }
};
