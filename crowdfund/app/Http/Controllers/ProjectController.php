<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use App\Project;
use App\Tag;
use Session;
use Image;
use Purifier;
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
        Session::flash('success', 'The project was successfully searched!');
        $search = \Request::get('search');
        // create a variable and store all the projects info in it from the database
        $projects = Project::where('pname', 'like', '%'.$search.'%')->orWhere('category', 'like', '%'.$search.'%')->paginate(4);
        // return a view and pass in the above variable
        return view('projects.index', compact('projects'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        // show the form for creating a new project
        return view('projects.create')->withTags($tags);
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
        $project->description = Purifier::clean($request->description);
        $file = Input::file('sample')->getRealPath();
        $img = Image::make($file);
        Response::make($img->encode('jpeg'));
        // $project->sample = $request->sample;
        $project->sample = $img;
        $project->category = $request->category;
        $project->enddate = $request->enddate . ' 00:00:00';
        $project->deadline = date('Y-m-d',strtotime($request->deadline)) . ' 00:00:00';
        $project->minfund = $request->minfund;
        $project->maxfund = $request->maxfund;
        $project->currentfund = 0;
        $project->issuccess = 0;
        $project->iscomplete = 0;
        $project->isreleased = 0;
        $project->user_uid = Auth::user()->uid;
        $project->save();
        $project->tag()->sync($request->tags, false);
        Session::flash('success', 'The project was successfully save!');
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
        session(['show'=>$project]);
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
        $project = Project::find($id);
        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->content;
        }
        return view('projects.edit')->withProject($project)->withTags($tags);
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
        $project = Project::find($id);
       // $project->description = Purifier::clean($request->input('description'));
        $project->pname = $request->pname;
        $project->description = Purifier::clean($request->description);
        $project->save();
        if (isset($request->tags)) {
            $project->tag()->sync($request->tags);
        } else {
            $project->tag()->sync(array());
        }
        Session::flash('success', 'This project was successfully saved.');
       
       return redirect()->route('project.show',$project->pid);
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