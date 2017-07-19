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
	return response()->json([
			'msg' => 'teste'
		], 200);
});

Route::prefix('planoDeAula')->group(function() {
	Route::get('/getAll', 'PlanosDeAulaController@getAll');
	Route::get('/save', 'PlanosDeAulaController@adicionar');
	Route::get('/edit', 'PlanosDeAulaController@editar');
});

Route::prefix('disciplina')->group(function() {
	Route::get('/getAll', 'DisciplinasController@getAll');
	Route::get('/save', 'DisciplinasController@adicionar');
	Route::get('/edit', 'DisciplinasController@editar');
});

Route::prefix('subdisciplina')->group(function() {
	Route::get('/getAll', 'SubdisciplinasController@getAll');
	Route::get('/save', 'SubdisciplinasController@adicionar');
	Route::get('/edit', 'SubdisciplinasController@editar');
});

Route::prefix('professor')->group(function() {
	Route::get('/getAll', 'ProfessoresController@getAll');
	Route::get('/save', 'ProfessoresController@adicionar');
	Route::get('/edit', 'ProfessoresController@editar');
});

Route::prefix('momento')->group(function() {
	Route::get('/getAll', 'MomentosController@getAll');
	Route::get('/save', 'MomentosController@adicionar');
	Route::get('/edit', 'MomentosController@editar');
});

Route::prefix('recurso')->group(function() {
	Route::get('/getAll', 'RecursosController@getAll');
	Route::get('/save', 'RecursosController@adicionar');
	Route::get('/edit', 'RecursosController@editar');
});
