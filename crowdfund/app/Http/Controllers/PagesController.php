<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Show Homepage for the given user.
     *
     * @return homepage
     */
    public function getHome()
    {
        return view('pages.home');
    }
    /**
     * To log in page
     *
     * @return loginpage
     */
    public function getLogin()
    {
        return view('pages.login');
    }
    /**
     * To Sign up page
     *
     * @return signuppage
     */
    public function getSignup()
    {
        return view('pages.signup');
    }
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('');
    }

    /**
     * To About page
     *
     * @return aboutpage
     */
    public function getAbout()
    {
        return view('pages.about');
    }
    /**
     * To create project page
     *
     * @return create project page
     */
    public function getCreate()
    {
        return view('projects.create');
    }
}