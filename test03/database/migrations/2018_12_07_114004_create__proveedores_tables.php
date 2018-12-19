<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Proveedores',function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            $table->string('marca');
            $table->string('correo_electronico');
            $table->string('direccion');
            $table->string('fono');
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
