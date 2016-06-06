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
});

/*Route::get('/', function () {
    return view('welcome');
});*/