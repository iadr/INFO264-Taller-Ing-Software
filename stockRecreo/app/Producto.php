<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    //
    public function mostrarTodo()
    {
        return DB::table('productos')->where('activo', True)->get();

    }

    public function busquedaProductos($termino)
    {
    	return DB::table('productos')->where('nombre','like','%'.$termino.'%')
          ->where('activo', True)
        	->orderBy('nombre')->get();
    }
    public function busquedaPorId($id)
    {
      return DB::table('productos')->where('id', '=',$id)->get();
    }
    public function busquedaPorCodigo($codigo)
    {
      return DB::table('productos')->where('codigo', '=',$codigo)->get();
    }
    public function busquedaPorCampos($array)
    {
      return DB::table('productos')
              ->where('categoria', 'like','%'.$array['categoria'].'%')
              ->where('precio', '<=',$array['precio'])
              ->where('edadminima', '>=',$array['edad'])
              ->get();
    }

    public function editarProducto($id,$nombre,$categoria,$precio,$stock){
      DB::table('productos')
              	->where('id', $id)
                ->update(['nombre'=>$nombre,'categoria'=>$categoria,'precio'=>$precio,'stock'=>$stock]);
    }

    public function crearProducto($codigo,$nombre,$categoria,$edad,$precio,$stock){
      DB::table('productos')->insert(
        ['codigo'=>$codigo,'nombre'=>$nombre,'categoria'=>$categoria,'edadminima'=>$edad,'precio'=>$precio,'stock'=>$stock]
      );
    }

    public function borrarProducto($id){
      DB::table('productos')
                ->where('id',$id)
                ->update(['activo'=>False]);
    }

    public function descontarStock ($nombre, $cantidad)
    {
      DB::table('productos')
      	->where('nombre', '=', $nombre)->decrement('stock', $cantidad);
    }
}
