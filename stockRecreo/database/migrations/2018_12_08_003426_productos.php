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
      Schema::enableForeignKeyConstraints();

      Schema::create('productos', function ($table){
        $table->engine='InnoDB';
        $table->charset='utf8';
        $table->collation='utf8_spanish_ci';

        $table->increments('id')->unsigned();
        $table->string('codigo');
        $table->string('nombre');
        $table->string('categoria');
        $table->integer('edadminima');
        $table->integer('precio');
        $table->integer('stock');
        $table->boolean('activo');
        $table->dateTime('created_at')->useCurrent();
        $table->dateTime('updated_at')->useCurrent();
      });
      // Schema::create('categorias',function($table){
      //   $table->engine='InnoDB';
      //   $table->charset='utf8';
      //   $table->collation='utf8_spanish_ci';
      //
      //   $table->increments('id')->unsigned();
      //   $table->string('categoria');
      //   $table->string('descripcion')->nullable();
      // });
      // Schema::create('categoria_producto',function($table){
      //   $table->engine='InnoDB';
      //   $table->charset='utf8';
      //   $table->collation='utf8_spanish_ci';
      //
      //   $table->integer('id_producto')->unsigned();
      //   $table->integer('id_categoria')->unsigned();
      //   $table->primary(['id_categoria','id_producto']);
      // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('categoria_producto');
      Schema::dropIfExists('categorias');
      Schema::dropIfExists('productos');
    }
}
