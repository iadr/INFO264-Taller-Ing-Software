<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Cart;

class ProductoController extends Controller
{
  public function despliega()
  {
   		$producto = new Producto();
    	$prod=$producto->mostrarTodo();
    	return view('vistaBDproductos', compact('prod'));
  }

  public function buscar()
  {
  		$termino = \Request::get('busqueda');
  		$producto = new Producto();
    	$prod=$producto->busquedaProductos($termino);
    	return view('vistaBDproductos', compact('prod'));
  }

  public function editar(Request $request)
  {
    $id = $request->input('idProducto');
    $prod=new Producto;
    $resultado=$prod->busquedaPorId($id);
    // return $resultado;
    return view('editarProducto',compact('resultado'));
  }
  public function TerminarEdicion(Request $request){
    $id=$request->input('idProducto');
    $nombre=$request->input('nombre');
    $categoria=$request->input('categoria');
    $precio=$request->input('precio');
    $stock=$request->input('stock');
    $prod=new Producto;
    $prod->editarProducto($id,$nombre,$categoria,$precio,$stock);
    return $this->despliega();
  }

public function agregarCarrito(Request $request)
  {
  $id = $request->input('identificador');
  $nombre = $request->input('nombre');
  $precio = $request->input('precio');
  $cantidad = $request->input('cantidad');
  Cart::add( $id , $nombre , $cantidad ,$precio );
  return redirect('/productos');
  }


}
