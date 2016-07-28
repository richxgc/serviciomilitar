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
	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
	// Administration
	Route::match(['get', 'post'], '/opciones/cambiar-contrasena', ['as' => 'changePassword', 'uses' => 'AdminController@changePassword']);
	// Militants
	Route::get('/militantes', ['as' => 'militants', 'uses' => 'MilitantController@index']);
	Route::get('/militantes/nuevo', ['as' => 'createMilitant', 'uses' => 'MilitantController@create']);
	Route::get('/militantes/editar/{id}', ['as' => 'editMilitant', 'uses' => 'MilitantController@edit']);
	Route::get('/militantes/eliminar/{id}', ['as' => 'deleteMilitant', 'uses' => 'MilitantController@delete']);
	Route::post('/militantes/guardar', ['as' => 'storeMilitant', 'uses' => 'MilitantController@store']);
	// Documents
	Route::get('/documento/cartilla/{id}', ['as' => 'printMilitaryId', 'uses' => 'DocumentController@printMilitaryId']);
});