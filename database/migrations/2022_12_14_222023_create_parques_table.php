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
        Schema::create('parques', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('nombreParque');
            $table->string('localidad');
            $table->integer('area');
            $table->string('escala');
            $table->integer('estrato');
            $table->string('direccion');
            $table->string('foto')->nullable();
            $table->decimal('latitud', 10, 7)->nullable();
            $table->decimal('longitud', 10, 7)->nullable();
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
        Schema::dropIfExists('parques');
    }
};
