<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group([], function() {
	//Route::auth();
	Route::get('/instalacion', ['as' => 'install', 'uses' => 'InstallController@index']);
	Route::post('/instalacion', ['as' => 'makeInstall', 'uses' => 'InstallController@makeInstall']);
});

Route::group(['as' => 'auth::', 'namespace' => 'Auth'], function() {
	Route::get('/login', ['as' => 'showLoginForm', 'uses' => 'AuthController@showLoginForm']);
	Route::post('/login', ['as' => 'login', 'uses' => 'AuthController@login']);
	Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
});

Route::group(['middleware' => ['auth']], function() {
	// Home
	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
	
	// Administration
	Route::match(['get', 'post'], '/opciones/cambiar-contrasena', ['as' => 'changePassword', 'uses' => 'AdminController@changePassword']);
	
	// Militants
	Route::get('/militantes', ['as' => 'militants', 'uses' => 'MilitantController@index']);
	Route::get('/militantes/nuevo', ['as' => 'createMilitant', 'uses' => 'MilitantController@create']);
	Route::get('/militantes/editar/{id}', ['as' => 'editMilitant', 'uses' => 'MilitantController@edit']);
	Route::post('/militantes/guardar', ['as' => 'storeMilitant', 'uses' => 'MilitantController@store']);
	Route::get('/militantes/eliminar/{id}', ['as' => 'deleteMilitant', 'uses' => 'MilitantController@delete']);
	
	// Formats
	Route::get('/formatos/actas-sorteo', ['as' => 'listMinutesDraw', 'uses' => 'FormatController@listMinutesDraw']);
	Route::get('/formatos/actas-sorteo/nuevo', ['as' => 'createMinuteDraw', 'uses' => 'FormatController@createMinuteDraw']);
	Route::get('/formatos/actas-sorteo/editar/{id}', ['as' => 'editMinuteDraw', 'uses' => 'FormatController@editMinuteDraw']);
	Route::post('/formatos/actas-sorteo/guardar', ['as' => 'storeMinuteDraw', 'uses' => 'FormatController@storeMinuteDraw']);
	Route::get('/formatos/actas-sorteo/eliminar/{id}', ['as' => 'deleteMinuteDraw', 'uses' => 'FormatController@deleteMinuteDraw']);
	Route::get('/formatos/balance-cartillas', ['as' => 'listPassbooks', 'uses' => 'FormatController@listPassbooks']);
	Route::get('/formatos/balance-cartillas/nuevo', ['as' => 'createPassbook', 'uses' => 'FormatController@createPassbook']);
	Route::get('/formatos/balance-cartillas/editar/{id}', ['as' => 'editPassbook', 'uses' => 'FormatController@editPassbook']);
	Route::post('/formatos/balance-cartillas/guardar', ['as' => 'storePassbook', 'uses' => 'FormatController@storePassbook']);
	Route::get('/formatos/balance-cartillas/eliminar/{id}', ['as' => 'deletePassbook', 'uses' => 'FormatController@deletePassbook']);
	
	// Documents
	Route::get('/documentos/imprimir/cartilla/{id}', ['as' => 'printMilitaryId', 'uses' => 'DocumentController@printMilitaryId']);
	Route::get('/documentos/imprimir/actas-sorteo/{id}', ['as' => 'printMinuteDraw', 'uses' => 'DocumentController@printMinuteDraw']);
	Route::get('/documentos/imprimir/balance-cartillas/{id}', ['as' => 'printPassbook', 'uses' => 'DocumentController@printPassbook']);
	
});