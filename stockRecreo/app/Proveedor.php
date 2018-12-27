<?php

namespace App;


use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proveedor extends Model
{

 public function mostrarTodo()
    {
        return DB::table('proveedores')->get();

    }

    public function busquedaProveedores($termino)
    {
    	return DB::table('proveedores')->where('nombre','like','%'.$termino.'%')
        	->orderBy('nombre')->get();
    }
    public function busquedaPorId($id)
    {
      return DB::table('proveedores')->where('id', '=',$id)->get();
    }
    public function editarProveedores($id,$nombre,$direccion,$representante,$telefono,$email){
      DB::table('proveedores')
              	->where('id', $id)
                ->update(['nombre'=>$nombre,'direccion'=>$direccion,'representante'=>$representante,'telefono'=>$telefono, 'email'=>$email,'updated_at'=>now()]);
    }
	public function crearProveedor($nombre,$direccion,$representante,$telefono,$email){
      DB::table('proveedores')->insert(
        ['nombre'=>$nombre,'direccion'=>$direccion,'representante'=>$representante,'telefono'=>$telefono, 'email'=>$email,'created_at'=>now(),'updated_at'=>now()]
      );
    }
 public function borrarProveedor($id){
      DB::table('proveedores')
                ->where('id',$id)
                ->delete();
    }
   
  
}
