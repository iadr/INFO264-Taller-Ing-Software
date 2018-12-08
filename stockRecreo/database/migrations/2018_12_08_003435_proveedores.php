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
      Schema::enableForeignKeyConstraints();

      if (Schema::hasTable('proveedores')){
        Schema::drop('proveedores');
        Schema::dropIfExists('proveedor_producto');

      }
      Schema::create('proveedores', function($table){
        $table->engine='InnoDB';
        $table->charset='utf8';
        $table->collation='utf8_spanish_ci';

        $table->increments('id')->unsigned();;
        $table->string('nombre');
        $table->string('direccion');
        $table->string('representante');
        $table->string('telefono');
        $table->string('email');
        $table->dateTime('created_at');
        $table->dateTime('updated_at');
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
