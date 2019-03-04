<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gender_goal;
use App\gender_goal_target;

class genderGoalTarget extends Controller
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
        $genderTarget = gender_goal_target::with('goal_name')->get();
        return view('gender_goal_target.index', compact('genderTarget'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genderTarget = gender_goal::all();
        return view('gender_goal_target.create', compact('genderTarget'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$this->commonclass->check_privilege(0)) {
            return back()->withErrors([config('messages.4')]);
        }

        $request->validate([
            'goal_id' => 'required',
            'targets' => 'required',
        ]);

        if ($this->commonclass->create_custom('gender_goal_target', $request->all())) {
            return redirect('genderGoalTarget')->with('success', config('messages.1'));
        }
        return redirect('genderGoalTarget')->with(['errors', config('messages.5')]);
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
        $genderGoal = gender_goal::all();
        $genderTarget = gender_goal_target::find($id);
        return view('gender_goal_target.edit', compact('genderGoal', 'genderTarget'));
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
        if (!$this->commonclass->check_privilege(1)) {
            return back()->withErrors([config('messages.4')]);
        }


        if ($this->commonclass->update_custom('gender_goal_target', $id, $request->all())) {
            return redirect('genderGoalTarget')->with('success', config('messages.2'));
        }
        return redirect('genderGoalTarget')->with(['errors', config('messages.6')]);
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
        if($this->commonclass->soft_delete_custom('gender_goal_target',$id))
          {
             return redirect('genderGoalTarget')->with('success',config('messages.3'));
          }
              return redirect('genderGoalTarget')->with(['errors',config('messages.7')]);
        
        return $id;
    }
}
