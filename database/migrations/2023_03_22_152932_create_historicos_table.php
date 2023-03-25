<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('historicos', function (Blueprint $table) {
            $table->id();
            $table->string("nombreHistorico");
            $table->unsignedBigInteger("id_usuario");
            $table->integer("id_record");
            $table->string("tabla");
            $table->string("accion");
            $table->string("campos");
            $table->string("resultado");
            $table->string("descripcion");
            $table->foreign("id_usuario")
                ->references("id")
                ->on("users")
                ->onDelete("cascade");
            $table->timestamps(false);
        });
        DB::statement("ALTER TABLE historicos MODIFY created_at TIMESTAMP NULL DEFAULT NULL");
        DB::statement("ALTER TABLE historicos MODIFY updated_at TIMESTAMP NULL DEFAULT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historicos');
    }
};
