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

Route::post('/editarProducto','ProductoController@editar')->name('editar');
Route::post('/productoEditado','ProductoController@TerminarEdicion')->name('GuardarEdicion');

Route::post('/agregarPC', 'ProductoController@agregarCarrito')->name('agregarCarrito');

Route::get('/CarroCompra',function(){
	return view('CarroVenta');
})->name('desplegarCarro');

Route::get('/crearProducto',function(){
  return view('crearProducto');
})->name('crearProducto');
