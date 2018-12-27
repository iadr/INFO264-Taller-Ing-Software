<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Venta extends Model
{
    //public function crearVenta($total, $cantidadProductos)
    public function crearVenta($total, $cantidadProductos, $nombreVendedor)
    {
    	/*
    	$id = DB::table('ventas')
    		->insertGetId(['monto' => $total, 'cantidadProductos' => $cantidadProductos, 
    			'created_at' => now(), 'nombreVendedor' => 'Sebita']);
		*/
    	
    	$id = DB::table('ventas')
    		->insert(['monto' => $total, 'cantidadProductos' => $cantidadProductos, 
    			'created_at' => now(), 'nombreVendedor' => $nombreVendedor]);
    	
    		return $id;
    }

    public function asociarVenta($idVenta,$idProducto,$precio,$cantidad)
    {
    	DB::table('detalle_ventas')
    		->insert(['id_venta' => $idVenta, 'id_producto' => $idProducto, 
    			'precioProducto' => $precio, 'cantidad' => $cantidad]);
    }
}
