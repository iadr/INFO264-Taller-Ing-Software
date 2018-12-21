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
    public function editarProducto($id,$nombre,$categoria,$precio,$stock){
      DB::table('productos')
              	->where('id', $id)
                ->update(['nombre'=>$nombre,'categoria'=>$categoria,'precio'=>$precio,'stock'=>$stock]);
    }

    public function descontarStock ($nombre, $cantidad)
    {
    	//$stock = DB::table('productos')
    	//		->select('stock')
    	//		->where('nombre', $nombre)->get();

    	/*$stock = DB::table('productos')
    			->where('nombre', $nombre)
    			->pluck('stock');

    	$nuevoStock = $stock - $cantidad;
    	DB::table('productos')
    			->where('nombre', $nombre)
                ->update(['stock'=> $nuevoStock]);*/
        DB::table('productos')
        	->where('nombre', '=', $nombre)->decrement('stock', $cantidad);
    }
}
