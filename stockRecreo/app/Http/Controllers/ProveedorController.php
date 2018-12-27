<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class ProveedorController extends Controller
{
   public function desplegarProveedores()
  {
      $proveedor = new Proveedor();
      $prov=$proveedor->mostrarTodo();
      return view('vistaBDproveedores', compact('prov'));
  } //

  public function buscar()
  {
  		$termino = \Request::get('busqueda');
  		$proveedor = new Proveedor();
    	$prov=$proveedor->busquedaProveedores($termino);
    	return view('vistaBDproveedores', compact('prov'));
  }

  public function editarProveedor(Request $request)
  {
    $id = $request->input('idProducto');
    $prov=new Proveedor;
    $resultado=$prov->busquedaPorId($id);
    // return $resultado;
    return view('editarProveedor',compact('resultado'));

  }

  public function TerminarEdicionprov(Request $request){
    $id=$request->input('idProveedor');
    $nombre=$request->input('nombre');
    $direccion=$request->input('direccion');
    $representante=$request->input('representante');
    $telefono=$request->input('telefono');
    $email=$request->input('email');
    $prov=new Proveedor;
    $prov->editarProveedores($id,$nombre,$direccion,$representante,$telefono,$email);
    return $this->desplegarProveedores();
  }

public function GuardarNuevoProveedor(Request $request)
  {
    $nombre=$request->input('nombre');
    $direccion=$request->input('direccion');
    $representante=$request->input('representante');
    $telefono=$request->input('telefono');
    $email=$request->input('email');

    $prov=new Proveedor;
    $prov->crearProveedor($nombre,$direccion,$representante,$telefono,$email);
    return redirect()->route('proveedores');

  }

  public function borrarProveedor(Request $request){
    $id=$request->input('idProveedor');
    $prod=new Proveedor;
    $prod->borrarProveedor($id);
    return redirect()->route('proveedores');

  }

	

}
