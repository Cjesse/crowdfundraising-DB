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

Route::group(['middleware' => ['web']], function () {
	// Authentication Routes
	Route::get('auth/login', 'Auth\LoginController@showLoginForm');
	Route::post('auth/login', 'Auth\LoginController@login');
	Route::get('auth/logout', 'Auth\LoginController@logout');

	// Registration Routes
	Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
	Route::post('auth/register', 'Auth\RegisterController@register');


	Route::get('about', 'PagesController@getAbout');
	Route::get('/', 'PagesController@getIndex');


	Route::get('create', "PagesController@getCreate");
	Route::resource('project', 'ProjectController');
});
