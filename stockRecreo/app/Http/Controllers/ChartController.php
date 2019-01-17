<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
  public function graf1()
    {
    	$fechaactual= date('Y-m-d');
    	$fecha_30_Dias_antes=date('Y-m-d', strtotime('-30 days'));

  
    $ventas_del_dia = DB::table('ventas')->select(DB::raw('created_at as fecha, monto'))->whereBetween('created_at', array($fechaactual, $fechaactual.' 23:59:59'))->orderBy('created_at','DESC')->get();

   $ventas_totales_por_dias =DB::table('ventas')->select(DB::raw('DATE(created_at) as fecha, SUM(monto) as monto'))->whereBetween('created_at', array($fecha_30_Dias_antes , $fechaactual.' 23:59:59'))->groupBy('fecha')->get();


//4 productos mas vendidos
    $top_mas_vendidos=DB::table('ventas')->join('detalle_ventas','ventas.id','=','detalle_ventas.id_venta')->join('productos','productos.id','=','detalle_ventas.id_producto')->select(DB::raw('productos.nombre as nombre, SUM( detalle_ventas.cantidad)as num_prod'))->whereBetween('ventas.created_at', array($fecha_30_Dias_antes , $fechaactual.' 23:59:59'))->groupBy('nombre')->orderBy('num_prod','DESC')->LIMIT('5')->get(); 

	$total_ventas_30_dias=DB::table('ventas')->select(DB::raw('sum(monto) as total_vendido'))->whereBetween('created_at', array($fecha_30_Dias_antes , $fechaactual.' 23:59:59'))->get();

	$prod_vendidos_en_periodo= DB::table('ventas')->select(DB::raw('DATE(created_at) as fecha, count(*) as Ventas'))->whereBetween('created_at', array($fecha_30_Dias_antes , $fechaactual.' 23:59:59'))->groupBy('fecha')->orderBy('fecha','DESC')->get();


return view('vistaDeEstadisticas',['vd'=> $ventas_del_dia,'vpd'=>$ventas_totales_por_dias, 'top'=>$top_mas_vendidos, 'total'=>$total_ventas_30_dias, 'CatProd'=>$prod_vendidos_en_periodo]);



    }



  public function graf2(Request $request)
  	{



    $fechaInicio = $request->input('desde');
    $fechaTermino = $request->input('hasta');




     $ventas_del_dia = DB::table('ventas')->select(DB::raw('created_at as fecha, monto'))->whereBetween('created_at', array($fechaInicio.' 00:00:01',$fechaTermino.' 23:59:59'))->orderBy('created_at','asc')->get();

   $ventas_totales_por_dias =DB::table('ventas')->select(DB::raw('DATE(created_at) as fecha, SUM(monto) as monto'))->whereBetween('created_at', array($fechaInicio ,  $fechaTermino.' 23:59:59'))->groupBy('fecha')->get();

//4 productos mas vendidos
    $top_mas_vendidos=DB::table('ventas')->join('detalle_ventas','ventas.id','=','detalle_ventas.id_venta')->join('productos','productos.id','=','detalle_ventas.id_producto')->select(DB::raw('productos.nombre as nombre, SUM( detalle_ventas.cantidad)as num_prod'))->whereBetween('ventas.created_at', array($fechaInicio, $fechaTermino.' 23:59:59'))->groupBy('nombre')->orderBy('num_prod','DESC')->LIMIT('5')->get(); 

	$total_ventas_30_dias=DB::table('ventas')->select(DB::raw('sum(monto) as total_vendido'))->whereBetween('created_at', array( $fechaInicio,$fechaTermino.' 23:59:59'))->get();

	$prod_vendidos_en_periodo= DB::table('ventas')->select(DB::raw('DATE(created_at) as fecha, count(*) as Ventas'))->whereBetween('created_at', array($fechaInicio  ,$fechaTermino.' 23:59:59'))->groupBy('fecha')->orderBy('fecha','asc')->get();


	return view('vistaDeEstadisticas',['vd'=> $ventas_del_dia,'vpd'=>$ventas_totales_por_dias, 'top'=>$top_mas_vendidos, 'total'=>$total_ventas_30_dias, 'CatProd'=>$prod_vendidos_en_periodo]);




    }

}
