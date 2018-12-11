<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    //
    public function mostrarTodo()
    {
        return DB::table('productos')->get();

    }

}
