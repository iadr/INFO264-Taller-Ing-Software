<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Producto extends Model
{
    //
    public function mostrarTodo()
    {
        return DB::table('productos')
          ->where('activo', True)
          ->where('stock','>',0)
          ->orderBy('nombre')
          ->get();
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
      return DB::table('productos')->where('codigo', 'like','%'.$codigo)->get();
    }
    public function busquedaPorCampos($array)
    {
      return DB::table('productos')
              ->where('categoria', 'like','%'.$array['categoria'].'%')
              ->where('precio', '<=',$array['precio'])
              ->whereBetween('edadminima',array($array['edadMin'],$array['edadMax']))
              ->get();
    }

    public function editarProducto($id,$nombre,$categoria,$precio,$stock){
      DB::table('productos')
              	->where('id', $id)
                ->update(['nombre'=>$nombre,'categoria'=>$categoria,'precio'=>$precio,'stock'=>$stock,'updated_at'=>now()]);
    }

    public function crearProducto($codigo,$nombre,$categoria,$edad,$precio,$stock,$proveedor){
      $idProducto=DB::table('productos')->insertGetId(
        ['codigo'=>$codigo,'nombre'=>$nombre,'categoria'=>$categoria,'edadminima'=>$edad,'precio'=>$precio,'stock'=>$stock,'activo'=>True,'created_at'=>now(),'updated_at'=>now()]
      );
      DB::table('proveedor_producto')->insert(['id_producto'=>$idProducto,'id_proveedor'=>$proveedor]);
    }

    public function borrarProducto($id){
      DB::table('productos')
                ->where('id',$id)
                ->update(['activo'=>False]);
    }

    public function descontarStock ($idProducto, $cantidad)
    {
      DB::table('productos')
      	->where('id', '=', $idProducto)->decrement('stock', $cantidad);
    }
}
