<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->string('nombre', 30);
            $table->string('abreviado', 10);
            $table->unsignedBigInteger('codestado');
            $table->enum('estatus', ['Activo','Inactivo'])->defaul('Activo');


            $table->timestamps();


            /**
             * Relacion
             */
            $table->foreign('codestado')
                  ->references('id')
                  ->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipios');
    }
}
