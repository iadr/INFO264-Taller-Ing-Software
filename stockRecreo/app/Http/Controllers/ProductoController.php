<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Venta;
use Cart;

class ProductoController extends Controller
{
  public function despliega()
  {
   		$producto = new Producto();
    	$prod=$producto->mostrarTodo();
    	return view('Producto.vistaBDproductos', compact('prod'));
  }

  public function buscar(Request $request)
  {
  		$termino = $request->input('busqueda');
  		$producto = new Producto();
    	$prod=$producto->busquedaProductos($termino);
    	return view('Producto.vistaBDproductos', compact('prod'));
  }

  public function bAvanzada(Request $req){
    $producto=new Producto;
    $array = array('precio' => 999999,'categoria' => '','edad' => 1);
    if ($req->filled('codigo')) {
      $cod=$req->input('codigo');
      $prod=$producto->busquedaPorCodigo($cod);
      return view('Producto.vistaBDproductos', compact('prod'));
    }
    if ($req->filled('precio')) {
      $array['precio']=$req->input('precio') ;
    }
    if ($req->filled('edad')) {
      $array['edad']=$req->input('edad');
    }
    if ($req->filled('categoria')) {
      $array['categoria']=$req->input('categoria');
    }
    $prod=$producto->busquedaPorCampos($array);
    return view('Producto.vistaBDproductos', compact('prod'));
  }

  public function editar(Request $request)
  {
    $id = $request->input('idProducto');
    $prod=new Producto;
    $resultado=$prod->busquedaPorId($id);
    // return $resultado;
    return view('Producto.editarProducto',compact('resultado'));
  }

  public function TerminarEdicion(Request $request){
    $id=$request->input('idProducto');
    $nombre=$request->input('nombre');
    $categoria=$request->input('categoria');
    $precio=$request->input('precio');
    $stock=$request->input('stock');
    $prod=new Producto;
    $prod->editarProducto($id,$nombre,$categoria,$precio,$stock);
    return redirect()->route('productos') ;
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
  public function borrarProducto(Request $request){
    $id=$request->input('idProducto');
    $prod=new Producto;
    $prod->borrarProducto($id);
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

	//public function finalizarVenta()
	public function finalizarVenta(request $request)
  	{
  		$prod = new Producto;
  		$venta = new Venta;
  		$cantidadProductos = Cart::count();
  		$totalRaw = Cart::total();
  		$total = str_replace('.','', $totalRaw); //para quitar los puntos
  		$nombreVendedor = $request->input('vendedor');

  		//$venta->crearVenta($total,$cantidadProductos);
  		//$idVenta = $venta->crearVenta($total,$cantidadProductos);
  		$idVenta = $venta->crearVenta($total,$cantidadProductos,$nombreVendedor);
  		//$venta->creaVenta($total,$cantidadProductos,$nombreVendedor);


  		foreach (Cart::content() as $prodCarrito) {
  			//$nombre = $prodCarrito->name;
  			$idProducto = $prodCarrito->id;
  			$cantidad = $prodCarrito->qty;
  			$precio = $prodCarrito->price;
  			$venta->asociarVenta($idVenta,$idProducto,$precio,$cantidad);
  			$prod->descontarStock($idProducto,$cantidad);
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
