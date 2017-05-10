<?php
<<<<<<< Updated upstream

namespace App\Http\Controllers;

=======
namespace App\Http\Controllers;
>>>>>>> Stashed changes
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Pledge;
use App\Project;
use Session;
use App\User;
use App\Rate;
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream

        return view('rates.mycreate')->withProject($project)->withAverating($averating);
    }

=======
        return view('rates.mycreate')->withProject($project)->withAverating($averating);
    }
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream

        $project = Project::find($request->pid);
        $rate->project()->associate($project);
        $rate->user()->associate(Auth::user());

        $rate->save();

        Session::flash('success','You have rated the project!');
        return redirect()->route('project.show',$project->pid);
    }

=======
        $project = Project::find($request->pid);
        $rate->project()->associate($project);
        $rate->user()->associate(Auth::user());
        $rate->save();
        Session::flash('success','You have rated the project!');
        return redirect()->route('project.show',$project->pid);
    }
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
}
=======
}
>>>>>>> Stashed changes
