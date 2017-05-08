<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Project;
use Session;
use App\Follow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class FollowController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($uid){
    	//no need to validate
    	$follow = new Follow;
        $follow->follower = Auth::user()->uid;
        $follow->followee = $uid;
    	$follow->save();
        $user = User::find($uid);
    	return view('user.show')->withUser($user);
    }

    public function destroy($uid){
    	DB::table('follows')->where('follower','=', Auth::user()->uid)->where('followee','=', $uid)->delete();
    	// return redirect()->route('user.show', $user);
        $user = User::find($uid);
        return view('user.show')->withUser($user);
    }
}