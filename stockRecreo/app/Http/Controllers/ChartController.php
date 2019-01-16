<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
  public function graf1()
    {

      $gg =DB::table('ventas')->select(DB::raw('DATE(created_at) as fecha, SUM(monto) as monto'))->groupBy('fecha')->get();

//4 productos mas vendidos
     $v=DB::table('ventas')->join('detalle_ventas','ventas.id','=','detalle_ventas.id_venta')->join('productos','productos.id','=','detalle_ventas.id_producto')->select(DB::raw('productos.nombre as nombre, SUM( detalle_ventas.cantidad)as num_prod'))->groupBy('nombre')->orderBy('num_prod','DESC')->LIMIT('5')->get();

     $g=DB::table('ventas')->select(DB::raw('sum(monto) as total_vendido'))->whereBetween('created_at', array('2019-01-10' , '2019-01-12 23:59:59'))->get();
      return view('vistaDeEstadisticas',['g'=> $g,'gg'=>$gg, 'v'=>$v]);

    }








public function graf2(Request $request){

    	$fechaInicio = $request->input('desde');
    	$fechaTermino = $request->input('hasta');

    	$gg = DB::table('ventas')->select(DB::raw('DATE(created_at) as fecha',' monto'))->where('created_at', '>',$fechaInicio)->get();
    //	  $g = DB::table('productos')->select('nombre','stock')->where('categoria','circo')->where('activo', True)->get();

      $g =DB::table('ventas')->select(DB::raw('DATE(created_at) as fecha, SUM(monto) as monto'))->groupBy('fecha')->get();

//4 productos mas vendidos
     $v=DB::table('ventas')->join('detalle_ventas','ventas.id','=','detalle_ventas.id_venta')->join('productos','productos.id','=','detalle_ventas.id_producto')->select(DB::raw('productos.nombre as nombre, SUM( detalle_ventas.cantidad)as num_prod'))->groupBy('nombre')->orderBy('num_prod','DESC')->LIMIT('4')->get();

//$vd=DB::table('ventas')->select(DB::raw('sum(monto) as total_vendido'))->whereBetween('created_at', '2019-01-10 AND 2019-01-13')->get();

      return view('vistaDeEstadisticas',['g'=> $g,'gg'=>$gg, 'v'=>$v]);

    }
}
