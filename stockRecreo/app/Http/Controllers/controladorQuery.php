<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class controladorQuery extends Controller
{
    
	public function buscar()
	{
    	$termino = \Request::get('busqueda'); //<-- we use global request to get the param of URI
 
    	$productos = DB::table('productos')->where('nombre','like','%'.$termino.'%')
        	->orderBy('nombre')->get();
 
    	return view('resultadosBusqueda',compact('productos'));
	}
}
