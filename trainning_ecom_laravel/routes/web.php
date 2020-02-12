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


Route::get('/usuarios', 'UsuariosController@listar');
Route::get('/usuarios/filtros', 'UsuariosController@listarComFiltros');

Route::get('/pessoas', 'PessoasController@listar');
Route::get('/pessoas/filtros', 'UsuariosController@listarComFiltros');

Route::get('/perfis', 'PerfisController@index');
Route::get('/perfis/create', 'PerfisController@create');