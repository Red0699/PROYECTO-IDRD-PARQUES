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
        Schema::create('mobiliarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idparque');
            $table->string('tipomobiliario');
            $table->string('material');
            $table->float('longitud');
            $table->string('estado');
            $table->string('ubicacion');
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
        Schema::dropIfExists('mobiliarios');
    }
};
