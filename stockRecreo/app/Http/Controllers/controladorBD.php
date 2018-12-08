<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class controladorBD extends Controller
{
    public function mostrarTodo()
    {
        $productos = DB::table('productos')->get();

        return view('vistaBDproductos', compact('productos'));
    }
}
