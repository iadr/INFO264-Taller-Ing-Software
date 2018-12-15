<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/productos', 'ProductoController@despliega')->name('productos');

Route::post('/productos', 'ProductoController@buscar')->name('Busqueda');
Route::post('/editarProducto',function(Request $request){
  return view('edit',['ex'=>$identificador]);
})->name('editar');
// Route::post('/editarProducto','ProductoController@editar')->name('editar');
// Route::get('/productos','ProductoController@TerminarEdicion')->name('GuardarEdicion');
