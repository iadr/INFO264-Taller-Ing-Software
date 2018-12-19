<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProveedorProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('proveedor_producto', function($table){
        $table->engine='InnoDB';
        $table->charset='utf8';
        $table->collation='utf8_spanish_ci';

        $table->integer('id_producto')->unsigned();
        $table->integer('id_proveedor')->unsigned();
        $table->primary(['id_producto','id_proveedor']);
      });
      Schema::table('proveedor_producto', function($table){
        $table->foreign('id_producto')->references('id')->on('productos');
        $table->foreign('id_proveedor')->references('id')->on('proveedores');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedor_producto');
    }
}
