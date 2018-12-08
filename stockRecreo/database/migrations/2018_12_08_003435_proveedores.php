<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proveedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('proveedores', function (Blueprint $table){
        $table->engine='InnoDB';
        $table->charset='utf8';
        $table->collation='utf8_spanish_ci';

        $table->increments('id');
        $table->string('nombre');
        $table->string('direccion');
        $table->string('representante');
        $table->string('telefono');
        $table->string('email');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
