<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use Session;
use App\Like;
use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($pid){
    	//no need to validate

    	$like = new Like;
    	$user = Auth::user();
    	$project = Project::find($pid);
    	$like->user()->associate($user);

    	$project = Project::find($pid);
    	$like->project()->associate($project);

    	$like->save();
    	return redirect()->route('project.show',$pid);

    }

    public function destroy($pid){
    	$user = Auth::user();
    	$project = Project::find($pid);
    	$like = DB::table('likes')->where('user_uid','=',$user->uid)->where('project_pid','=',$pid);
    	$like->delete();
    	return redirect()->route('project.show',$pid);

    }

    public function ifLike($uid, $pid){

    }

    public function getLikes($uid){

    }


}