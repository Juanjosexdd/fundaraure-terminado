<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('codtipocliente');
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->unsignedBigInteger('codnacionalidad');
            $table->string('cedula',20)->nullable();
            $table->string('direccion',70)->nullable();
            $table->string('telefono',20)->nullable();
            $table->string('email',50)->nullable();
            $table->timestamps();

            $table->foreign('codtipocliente')
                  ->references('id')
                  ->on('tipoclientes');
            $table->foreign('codnacionalidad')
                  ->references('id')
                  ->on('nacionalidads');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
