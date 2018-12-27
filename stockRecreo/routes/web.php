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
Route::post('/BusquedaAvanzada','ProductoController@bAvanzada')->name('BusquedaAvanzada');

Route::post('/editarProducto','ProductoController@editar')->name('editar');
Route::post('/productoEditado','ProductoController@TerminarEdicion')->name('GuardarEdicion');

Route::get('/crearProducto',function(){
  return view('crearProducto');
})->name('crearProducto');
Route::post('/prods','ProductoController@GuardarProductoNuevo')->name('GuardarProductoNuevo');
Route::post('eliminarProducto','ProductoController@borrarProducto')->name('borrarProducto');

Route::post('/agregarPC', 'ProductoController@agregarCarrito')->name('agregarCarrito');
Route::get('/CarroCompra',function(){
	return view('CarroVenta');
})->name('desplegarCarro');
Route::get('cancelarVenta', 'ProductoController@cancelarVenta')->name('cancelarVenta');
Route::post('eliminarPC', 'ProductoController@eliminarProductoCarro')->name('eliminarProductoCarro');
Route::get('/ventaFinalizada', 'ProductoController@finalizarVenta')->name('finalizarVenta');


//proveedor//////////
Route::get('/proveedores', 'ProveedorController@desplegarProveedores')->name('proveedores');
Route::post('/proveedores', 'ProveedorController@buscar')->name('BusquedaProveedor');

Route::post('/editarProveedores', 'ProveedorController@editarProveedor')->name('editarProveedor');



Route::get('/crearProveedor',function(){
  return view('crearProveedor');
})->name('crearProveedor');

Route::post('/provs','ProveedorController@GuardarNuevoProveedor')->name('GuardarNuevoProveedor');

Route::post('/proveedorEditado','ProveedorController@TerminarEdicionprov')->name('GuardarEdicionProv');
Route::post('eliminarProveedor','ProveedorController@borrarProveedor')->name('borrarProveedor');