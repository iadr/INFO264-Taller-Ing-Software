<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

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
  }
}
