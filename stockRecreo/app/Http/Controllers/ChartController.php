<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
  public function graf1()
    {
      $g = DB::table('productos')->select('nombre','stock')->where('categoria','circo')
          ->where('activo', True)->get();
      return view('vistaDeEstadisticas',['g'=> $g]);    
    }
}
