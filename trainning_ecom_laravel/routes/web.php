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


// CRIOU APELIDOS PARA AS ROTAS -->NAME
Route::get ('/perfis'       , 'PerfisController@index')->name('listar_perfis');
Route::get ('/perfis/create', 'PerfisController@create')->name('criar_perfil');
Route::post('/perfis/create', 'PerfisController@store');
Route::delete('/perfis/{id}', 'PerfisController@destroy');


Route::get ('/funcionarios'         , 'FuncionariosController@index')->name('listar_funcionarios');
Route::get ('/funcionarios/create'  , 'FuncionariosController@create')->name('criar_funcionarios');
Route::post('/funcionarios/create'  , 'FuncionariosController@store');
Route::delete('/funcionarios/{id}'  , 'FuncionariosController@destroy');



// Capturado de: https://laravel.com/docs/6.x/controllers
// Actions Handled By Resource Controller  ( Padrão Sugerido )
// Verb	    URI	                    Action	Route Name
// ------------------------------------------------------
// GET	    /photos	                index	photos.index
// GET	    /photos/create	        create	photos.create
// POST	    /photos	                store	photos.store
// GET	    /photos/{photo}	        show	photos.show
// GET      /photos/{photo}/edit	edit	photos.edit
// PUT      /PATCH/photos/{photo}	update	photos.update
// DELETE	/photos/{photo}	        destroy	photos.destroy

// Ou instalar a LARAVEL ARTISAN  e use:F1 digita... rout list  ou  Make...



