<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
  public function mostrarTodo()
  {
      $producto = new Producto();
      $prod=$producto->mostrarTodo();
      return view('vistaBDproductos', compact('prod'));
  }
}
