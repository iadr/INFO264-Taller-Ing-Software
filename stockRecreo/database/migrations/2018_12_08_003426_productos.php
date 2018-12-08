<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('productos')){
        Schema::drop('productos');
      }
      Schema::create('productos', function (Blueprint $table){
        $table->engine='InnoDB';
        $table->charset='utf8';
        $table->collation='utf8_spanish_ci';

        $table->increments('id');
        $table->integer('codigo');
        $table->string('nombre');
        $table->string('categoria');
        $table->integer('edadminima');
        $table->integer('precio');
        $table->integer('stock');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
