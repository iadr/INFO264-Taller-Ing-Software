<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    //
    public function mostrarTodo()
    {
        return DB::table('productos')->get();

    }

    public function busquedaProductos($termino)
    {
    	return DB::table('productos')->where('nombre','like','%'.$termino.'%')
        	->orderBy('nombre')->get();
    }
    public function busquedaPorId($id)
    {
      return DB::table('productos')->where('id', '=',$id)->get();
    }
}
