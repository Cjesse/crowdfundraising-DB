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
	Route::get('/', 'PagesController@getHome');

	Route::get('about', "PagesController@getAbout");

	Route::get('login', "PagesController@getLogin");

	Route::get('signup', "PagesController@getSignup");

	Route::get('create', "PagesController@getCreate");

	Route::resource('user', 'LoginController');

	Route::resource('project', 'ProjectController');
});