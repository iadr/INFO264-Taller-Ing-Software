<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proveedor extends Model
{
protected $table= 'proveedores';

 public function mostrarTodo()
    {
        return DB::table('proveedores')->where('activo', True)->get();

    }

    public function busquedaProveedores($termino)
    {
    	return DB::table('proveedores')->where('nombre','like','%'.$termino.'%')
      ->where('activo', True)
      ->orderBy('nombre')->get();
    }
    public function busquedaPorId($id)
    {
      return DB::table('proveedores')->where('id', '=',$id)
      ->where('activo', True)->get();
    }
    public function editarProveedores($id,$nombre,$direccion,$representante,$telefono,$email){
      DB::table('proveedores')
              	->where('id', $id)
                ->update(['nombre'=>$nombre,'direccion'=>$direccion,'representante'=>$representante,'telefono'=>$telefono, 'email'=>$email,'updated_at'=>now()]);
    }
	public function crearProveedor($nombre,$direccion,$representante,$telefono,$email){
      DB::table('proveedores')->insert(
        ['nombre'=>$nombre,'direccion'=>$direccion,'representante'=>$representante,'telefono'=>$telefono, 'email'=>$email,'activo'=>True, 'created_at'=>now(),'updated_at'=>now()]
      );
    }
 public function borrarProveedor($id){
      DB::table('proveedores')
                ->where('id',$id)
                ->update(['activo'=>False]);
    }
   
  
}
