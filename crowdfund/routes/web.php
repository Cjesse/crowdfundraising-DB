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
	// Route::post('project/index', ['uses' => 'ProjectController@getIndex', 'as' => 'project.getIndex']);
	Route::resource('project', 'ProjectController');

	// Creditcards
	Route::resource('creditcard','CreditCardController');

	// user page
	Route::get('user/index', 'UserPageController@getIndex');
	Route::get('user/pro', 'UserPageController@getProfile');
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

	//tag
	Route::resource('tag','TagController',['except'=>'create']);

	//rate
	Route::resource('rate','RateController',['except' => 'create']);
	Route::get('rate/project/{pid}',['uses'=>'RateController@mycreate','as'=>'rate.mycreate']);

<<<<<<< Updated upstream
=======
	//img
	Route::get('project/{pid}/image', function($pid)
	{
    $projects = App\Project::find($pid);
    $pic = Image::make($projects->sample);
    // $response = Response::make($projects->sample, 200);
    $response = Response::make($pic->encode('jpeg'));
    $response->header('Content-Type', 'image/jpeg');
    return $response;
	});
	// return response()->make($projects->sample, 200, array('Content-Type' => (new finfo(FILEINFO_MIME))->buffer($projects->sample)));
	// });
>>>>>>> Stashed changes
});
