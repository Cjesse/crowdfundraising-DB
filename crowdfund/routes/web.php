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

	// pages
	Route::get('about', 'PagesController@getAbout');
	Route::get('/', 'PagesController@getIndex');
	// projects
	Route::resource('project', 'ProjectController');

	// Creditcards
	Route::resource('creditcard','CreditCardController');

	// user page
	Route::get('user/index', 'UserPageController@getIndex');
	Route::get('user/{uid}', ['uses' => 'UserPageController@getShow', 'as' => 'user.show']);

	//like
	Route::get('project/{project}/like',['uses'=>'LikesController@create', 'as' => 'like.create']);
	Route::get('project/{project}/unlike',['uses'=>'LikesController@destroy', 'as' => 'like.destroy']);

	// comment
	Route::post('comment/{project_pid}/{user_uid}', ['uses' => 'CommentController@store', 'as' => 'comment.store']);
	Route::get('comment/{id}/edit', ['uses' => 'CommentController@edit', 'as' => 'comment.edit']);
	Route::put('comment/{id}', ['uses' => 'CommentController@update', 'as' => 'comment.update']);
	Route::delete('comment/{user_uid}/{project_pid}/{created_at}', ['uses' => 'CommentController@destroy', 'as' => 'comment.destroy']);

	// follow
	Route::get('follow/{user_uid}/follow', ['uses' => 'FollowController@store', 'as' => 'follow.store']);
	Route::delete('follow/{user_uid}/unfollow', ['uses' => 'FollowController@destroy', 'as' => 'follow.destroy']);
	
	//Pledge
	Route::resource('pledge','PledgeController',['except' => 'create']);
	Route::get('pledge/project/{pid}',['uses'=>'PledgeController@mycreate','as'=>'pledge.mycreate']);

});
