<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserPageController extends Controller {

	/**
     * Show Personal Homepage for the given user.
     *
     * @return homepage
     */
	public function getIndex() {
		return view('user.index');
	}


}