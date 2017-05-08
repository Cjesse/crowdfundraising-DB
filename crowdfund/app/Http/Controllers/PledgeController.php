<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Pledge;
use App\Project;
use Session;
use App\User;

class PledgeController extends Controller
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
        //find all the pledges by the user
        $pledges = Auth::user()->pledge();
        return view('pledges.index')->withPledge($pledges);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mycreate($pid)
    {
        $project = Project::find($pid);
        //find all the credit cards of the user
        $creditcard = Auth::user()->credit_cards;
        $numbers = array();
        foreach($creditcard as $card){
            $numbers[$card->CCN] = $card->CCN;
        }
        return view('pledges.mycreate')->withProject($project)->with('CCNs',$numbers);
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
            'amount' => 'required|min:0',
            'CCN' => '',
            ));
        //store to DB
        $pledge = new Pledge;
        $project = Project::find($request->pid);

        $pledge->amount = $request->amount;
        $pledge->CCN = $request->CCN;
        $pledge->charged = 0;

        $pledge->user()->associate(Auth::user());
        $pledge->project()->associate($project);

        $pledge->save();

        $project->currentfund += $request->amount;
        $project->save();
        //redirect
        Session::flash('success','You have pledged the project!');
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
