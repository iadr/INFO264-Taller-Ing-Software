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

  public function GuardarProductoNuevo(Request $request)
  {
    $codigo=$request->input('codigo');
    $nombre=$request->input('nombre');
    $categoria=$request->input('categoria');
    $edad=$request->input('edadminima');
    $precio=$request->input('precio');
    $stock=$request->input('stock');
    $prod=new Producto;
    $prod->crearProducto($codigo,$nombre,$categoria,$edad,$precio,$stock);
    return redirect()->route('productos');

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

	public function cancelarVenta()
	{
  		Cart::destroy();
  		return redirect('/productos');
	}

	public function finalizarVenta()
  	{
  		$prod=new Producto;
  		foreach (Cart::content() as $prodCarrito) {
  			$nombre = $prodCarrito->name;
  			$cantidad = $prodCarrito->qty;
  			$prod->descontarStock($nombre,$cantidad);
  		}
  		Cart::destroy();
    	return $this->despliega();
  	}
    public function eliminarProductoCarro(request $request){
    $rowId =$request->input('identificador');
    Cart::remove($rowId);
    return redirect('/CarroCompra');
    }

}
