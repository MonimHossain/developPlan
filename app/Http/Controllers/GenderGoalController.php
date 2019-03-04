<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gender_goal;

class GenderGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $commonclass;
    public function __construct(){
        $this->commonclass=app('CommonClass');

    }
    
    public function index()
    {
        $genderGoal = gender_goal::all();
        return view('gender_goal.index',compact('genderGoal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gender_goal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->commonclass->check_privilege(0)){
            return back()->withErrors([config('messages.4')]);
        }
        
        $request->validate([
            'goal_no'=>'required',
            'goal_name' => 'required',
        ]);
        
        if ($this->commonclass->create_custom('gender_goal', $request->all())) {
            return redirect('genderGoal')->with('success', config('messages.1'));
        }
        return redirect('genderGoal')->with(['errors', config('messages.5')]);
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
        $genderGoal = gender_goal::find($id);
        return view('gender_goal.edit',compact('genderGoal'));
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
        if(!$this->commonclass->check_privilege(1)){
            return back()->withErrors([config('messages.4')]);
        }
        
        $request->validate([
            'goal_no'=>'required',
            'goal_name' => 'required',
        ]);
        
        if($this->commonclass->update_custom('gender_goal',$id,$request->all()))
       {
          return redirect('genderGoal')->with('success',config('messages.2'));
       }
        return redirect('genderGoal')->with(['errors',config('messages.6')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if(!$this->commonclass->check_privilege(2)){
            return back()->withErrors([config('messages.4')]);
        }
        
        if($this->commonclass->soft_delete_custom('gender_goal',$id))
          {
             return redirect('genderGoal')->with('success',config('messages.3'));
          }
          else
          {
              return redirect('genderGoal')->with(['errors',config('messages.7')]);

          }
        
        return $id;
    }
}
