<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('detalle_ventas', function($table){
        $table->engine='InnoDB';
        $table->charset='utf8';
        $table->collation='utf8_spanish_ci';

        $table->integer('id_venta')->unsigned();
        $table->integer('id_producto')->unsigned();
        $table->integer('precioProducto')->unsigned();
        $table->integer('cantidad')->unsigned();
        $table->primary(['id_venta','id_producto']);
      });
      Schema::table('detalle_ventas', function($table){
        $table->foreign('id_venta')->references('id')->on('ventas');
        $table->foreign('id_producto')->references('id')->on('productos');
      });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
}
