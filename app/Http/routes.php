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
	Route::get('/formatos/lista-sorteo', ['as' => 'listInitialLists', 'uses' => 'FormatController@listInitialLists']);
	Route::get('/formatos/lista-sorteo/nuevo', ['as' => 'createInitialList', 'uses' => 'FormatController@createInitialList']);
	Route::get('/formatos/lista-sorteo/editar/{id}', ['as' => 'editInitialList', 'uses' => 'FormatController@editInitialList']);
	Route::post('/formatos/lista-sorteo/guardar', ['as' => 'storeInitialList', 'uses' => 'FormatController@storeInitialList']);
	Route::get('/formatos/lista-sorteo/eliminar/{id}', ['as' => 'deleteInitialList', 'uses' => 'FormatController@deleteInitialList']);
	Route::get('/formatos/inutilizacion-extravio', ['as' => 'listDisabledLost', 'uses' => 'FormatController@listDisabledLost']);
	Route::get('/formatos/inutilizacion-extravio/nuevo', ['as' => 'createDisabledLost', 'uses' => 'FormatController@createDisabledLost']);
	Route::get('/formatos/inutilizacion-extravio/editar/{id}', ['as' => 'editDisabledLost', 'uses' => 'FormatController@editDisabledLost']);
	Route::post('/formatos/inutilizacion-extravio/guardar', ['as' => 'storeDisabledLost', 'uses' => 'FormatController@storeDisabledLost']);
	Route::get('/formatos/inutilizacion-extravio/eliminar/{id}', ['as' => 'deleteDisabledLost', 'uses' => 'FormatController@deleteDisabledLost']);
	Route::get('/formatos/libro-registro', ['as' => 'listRegisterBooks', 'uses' => 'FormatController@listRegisterBooks']);
	Route::get('/formatos/libro-registro/nuevo', ['as' => 'createRegisterBook', 'uses' => 'FormatController@createRegisterBook']);
	Route::get('/formatos/libro-registro/editar/{id}', ['as' => 'editRegisterBook', 'uses' => 'FormatController@editRegisterBook']);
	Route::post('/formatos/libro-registro/guardar', ['as' => 'storeRegisterBook', 'uses' => 'FormatController@storeRegisterBook']);
	Route::get('/formatos/libro-registro/eliminar/{id}', ['as' => 'deleteRegisterBook', 'uses' => 'FormatController@deleteRegisterBook']);
	
	// Documents
	Route::get('/documentos/imprimir/cartilla/{id}', ['as' => 'printMilitaryId', 'uses' => 'DocumentController@printMilitaryId']);
	Route::get('/documentos/imprimir/actas-sorteo/{id}', ['as' => 'printMinuteDraw', 'uses' => 'DocumentController@printMinuteDraw']);
	Route::get('/documentos/imprimir/balance-cartillas/{id}', ['as' => 'printPassbook', 'uses' => 'DocumentController@printPassbook']);
	Route::get('/documentos/imprimir/lista-inicial/{id}', ['as' => 'printInitialList', 'uses' => 'DocumentController@printInitialList']);
	Route::get('/documentos/imprimir/lista-uno/{id}', ['as' => 'printOneList', 'uses' => 'DocumentController@printOneList']);
	Route::get('/documentos/imprimir/lista-dos/{id}', ['as' => 'printTwoList', 'uses' => 'DocumentController@printTwoList']);
	Route::get('/documentos/imprimir/lista-tres/{id}', ['as' => 'printThreeList', 'uses' => 'DocumentController@printThreeList']);
	Route::get('/documentos/imprimir/inutilizacion/{id}', ['as' => 'printDisabled', 'uses' => 'DocumentController@printDisabled']);
	Route::get('/documentos/imprimir/extravio/{id}', ['as' => 'printLost', 'uses' => 'DocumentController@printLost']);
	Route::get('/documentos/imprimir/libro-registro/{id}', ['as' => 'printRegisterBook', 'uses' => 'DocumentController@printRegisterBook']);


});