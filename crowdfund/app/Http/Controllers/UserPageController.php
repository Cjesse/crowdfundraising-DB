<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserPageController extends Controller {

	// only authenticated user can see the user index page
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'getShow']);
    }
	/**
     * Show Personal Homepage for the given user.
     *
     * @return homepage
     */
	public function getIndex() {
		return view('user.index');
	}
	/**
     * Show User page for other user.
     *
     * @return homepage
     */
	public function getShow($uid) {
		$user = User::find($uid);
		return view('user.show')->withUser($user);
	}
    /**
     * Show User profile for other user.
     *
     * @return homepage
     */
    public function getProfile() {
        return view('user.profile');
    }


}