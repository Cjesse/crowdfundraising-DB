<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Pledge;
use App\Project;
use Session;
use App\User;
use App\Rate;
class RateController extends Controller
{
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
        $rates = Auth::user()->rate();
        return view('rates.index')->withRate($pledges);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    public function mycreate($pid)
    {
        $project = Project::find($pid);
        $count = 0;
        $sum = 0;
        $ratings = $project->rate();
        $averating = 0;
        foreach ($ratings as $rating) {
            $count = $count+1;
            $sum = $sum + $rating->level;
        }
        
        if($count == 0){
            $averating = 0;
        }else{
            $averating = $sum/$count;
        }
        return view('rates.mycreate')->withProject($project)->withAverating($averating);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'level' => 'required'
            ));
        $rate = new Rate;
        $rate->level = (int)($request->level);
        $project = Project::find($request->pid);
        $rate->project()->associate($project);
        $rate->user()->associate(Auth::user());
        $rate->save();
        Session::flash('success','You have rated the project!');
        return redirect()->route('project.show',$project->pid);
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
    public function destroy($id)
    {
        //
    }
}