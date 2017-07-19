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

Route::group(['prefix' => 'planoDeAula'], function() {
	Route::get('/getAll', 'PlanosDeAulaController@getAll');
	Route::get('/save', 'PlanosDeAulaController@adicionar');
});

Route::group(['prefix' => 'disciplina'], function() {
	Route::get('/getAll', 'DisciplinasController@getAll');
	Route::get('/save', 'DisciplinasController@adicionar');
});

Route::group(['prefix' => 'subdisciplina'], function() {
	Route::get('/getAll', 'SubdisciplinasController@getAll');
	Route::get('/save', 'SubdisciplinasController@adicionar');
});
