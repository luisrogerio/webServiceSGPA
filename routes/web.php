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
	Route::post('/save', 'PlanosDeAulaController@adicionar');
	Route::post('/edit/{id}', 'PlanosDeAulaController@editar');
	Route::post('/show/{id}', 'PlanosDeAulaController@visualizar');
});

Route::prefix('momento')->group(function() {
	Route::get('/getAll', 'MomentosController@getAll');
	Route::post('/save/{planoDeAulaId}', 'MomentosController@adicionar');
	Route::post('/edit/{id}', 'MomentosController@editar');
});

Route::prefix('recurso')->group(function() {
	Route::get('/getAll', 'RecursosController@getAll');
	Route::post('/save', 'RecursosController@adicionar');
	Route::post('/edit/{id}', 'RecursosController@editar');
});
