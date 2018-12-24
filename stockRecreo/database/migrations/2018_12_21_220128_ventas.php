<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ventas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas',function($table){
          $table->engine='InnoDB';
          $table->charset='utf8';
          $table->collation='utf8_spanish_ci';

          $table->increments('id_venta')->unsigned();
          $table->integer('monto')->unsigned();
          $table->integer('cantidadProductos')->unsigned();
          $table->string('nombreVendedor');
          $table->dateTime('created_at')->useCurrent();
        } );
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
