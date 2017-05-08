<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Project;
use App\User;
use Session;
use DB;

class CommentController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $project_pid, $user_uid)
    {
        //validate data
        $this->validate($request, array(
            'content' => 'required'
            ));
        $project = Project::find($project_pid);
        $user = User::find($user_uid);
        //store the data
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->project()->associate($project);
        $comment->user()->associate($user);
        $comment->save();
        //redirect to success page
        
        return redirect()->route('project.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_uid, $project_pid, $created_at)
    {
        // delete comments
        DB::table('comments')->where('user_uid', '=', $user_uid)
                ->where('project_pid', '=', $project_pid)
                ->where('created_at', '=', $created_at)
                ->delete();

        Session::flash('success', 'Deleted Comment');

        return redirect()->route('project.show', $project_pid);
    }
}
