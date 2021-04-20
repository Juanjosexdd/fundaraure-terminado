<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->string('nombre', 30);
            $table->string('abreviado', 10);
            $table->unsignedBigInteger('codpais');
            $table->enum('estatus', ['Activo','Inactivo'])->defaul('Activo');


            $table->timestamps();


            /**
             * Relacion
             */
            $table->foreign('codpais')
                  ->references('id')
                  ->on('pais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
}
