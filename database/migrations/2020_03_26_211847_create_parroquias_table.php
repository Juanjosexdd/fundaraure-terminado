<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParroquiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parroquias', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->string('nombre', 30);
            $table->string('abreviado', 10);
            $table->unsignedBigInteger('codmunicipio');
            $table->enum('estatus', ['Activo','Inactivo'])->defaul('Activo');


            $table->timestamps();


            /**
             * Relacion
             */
            $table->foreign('codmunicipio')
                  ->references('id')
                  ->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parroquias');
    }
}
