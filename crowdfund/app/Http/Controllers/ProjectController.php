<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    // only authenticated user can see the project
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the projects info in it from the database
        $projects = Project::all();
        // return a view and pass in the above variable
        return view('projects.index')->withProject($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // show the form for creating a new project
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request, array(
            'pname' => 'required|max:255',
            'description' => '',
            'sample' => '',
            'category' => 'required',
            'enddate' => 'required|date',
            'deadline' => 'required|date|after:enddate',
            'minfund' => 'required|min:0',
            'maxfund' => 'required|min:minfund',
            ));
        //store the data
        $project = new Project;
        $project->pname = $request->pname;
        $project->description = $request->description;
        $project->sample = $request->sample;
        $project->category = $request->category;
        // $project->startdate = date('Y-m-d H:i:s');
        // $project->updatetime = date('Y-m-d H:i:s');
        $project->enddate = $request->enddate . ' 00:00:00';
        $project->deadline = date('Y-m-d',strtotime($request->deadline)) . ' 00:00:00';
        $project->minfund = $request->minfund;
        $project->maxfund = $request->maxfund;
        $project->currentfund = 0;
        $project->issuccess = 0;
        $project->iscomplete = 0;
        $project->isreleased = 0;
        $project->user_id = Auth::user()->uid;
        $project->save();
        //redirect to success page
        return redirect()->route('project.show', $project->pid);
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
        $project = Project::find($id);
        return view('projects.show')->withProject($project);
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
    public function destroy($id)
    {
        //
    }
}
