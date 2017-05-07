<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class PagesController extends Controller {

	/**
     * Show Homepage for the given user.
     *
     * @return homepage
     */
	public function getIndex() {
		return view('pages.home');
	}

	/**
     * To About page
     *
     * @return aboutpage
     */
	public function getAbout() {
		return view('pages.about');
	}


}