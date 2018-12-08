<?php

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

/*
Route::get('/vistaBDproductos', function () {

	// $productos = 
	$productos = DB::table('productos')->get();


	//return view('vistaBD');
	return view('vistaBDproductos', compact('productos'));
})->name('BDproductos');
*/

Route::get('/vistaBDproductos', 'controladorBD@mostrarTodo')->name('BDproductos');
