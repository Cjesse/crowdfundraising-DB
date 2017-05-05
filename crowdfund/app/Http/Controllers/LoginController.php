<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data
        $this->validate($request, array(
            'uname' => 'required|max:255',
            'email' => 'required',
            'password' => 'required'
            ));
        // store the data
        $user = new User;

        $user->uname = $request->uname;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        // storing session via request
        // $request->session()->put($user->uid, $user->uid);
        Session::put('uid', $user->uid);
        // redirect
        return redirect()->route('user.show', $user->uid);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('pages.user')->withUser($user);
    }

    /**
     * Display the specified resource for other user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOtherUser($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * User Log out.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logOut(Request $request, $id)
    {

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // delete this session
        Session::flush();
        // redirect to home page
        return view('pages.home');
    }
}
