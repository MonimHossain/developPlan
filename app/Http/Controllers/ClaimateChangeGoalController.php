<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClaimateChangeGoal;

class ClaimateChangeGoalController extends Controller
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
        $claimateChangeGoal = ClaimateChangeGoal::all();

        return view('ClaimateChangeGoal.index', compact('claimateChangeGoal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ClaimateChangeGoal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(!$this->commonclass->check_privilege(0)){
            return back()->withErrors([config('messages.4')]);
        }
        
        $request->validate([
            'goal_no'=>'required',
            'goal_name' => 'required',
        ]);
       
        if($this->commonclass->create_custom('ClaimateChangeGoal', $request->all())){
            return redirect('ClaimateChangeGoal')->with('success',config('messages.1'));
        }
        return redirect('ClaimateChangeGoal')->with(['errors',config('messages.5')]);
        
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
        $claimateChangeValue = ClaimateChangeGoal::find($id);
        return view('ClaimateChangeGoal.edit',compact('claimateChangeValue'));
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
        
        if($this->commonclass->update_custom('ClaimateChangeGoal',$id,$request->all()))
       {
          return redirect('ClaimateChangeGoal')->with('success',config('messages.2'));
       }
        return redirect('ClaimateChangeGoal')->with(['errors',config('messages.6')]);
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
        if(!$this->commonclass->check_privilege(2)){
            return back()->withErrors([config('messages.4')]);
        }
        
        if($this->commonclass->soft_delete_custom('ClaimateChangeGoal',$id))
          {
             return redirect('ClaimateChangeGoal')->with('success',config('messages.3'));
          }
          else
          {
              return redirect('ClaimateChangeGoal')->with(['errors',config('messages.7')]);

          }
        
        return $id;
    }
}
