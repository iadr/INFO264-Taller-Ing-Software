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


Route::get('/vistaBDproductos', 'ProductoController@despliega')->name('BDproductos');

Route::get('/resultadosBusqueda', 'ProductoController@buscar')->name('Busqueda');
//Route::get('/vistaBDproductos', 'ProductoController@buscar')->name('Busqueda');