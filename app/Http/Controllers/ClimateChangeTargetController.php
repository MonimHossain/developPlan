<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClimateChangeTarget;
use App\ClaimateChangeGoal;

class ClimateChangeTargetController extends Controller
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
         $climateChangeTarget = ClimateChangeTarget::with('goal_name')->get();
        return view('ClaimateChangeTarget.index', compact('climateChangeTarget'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $climateChangeGoal = ClaimateChangeGoal::all();
        return view('ClaimateChangeTarget.create',compact('climateChangeGoal'));
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
            'goal_id'=>'required',
            'targets' => 'required',
        ]);
        
        if($this->commonclass->create_custom('ClimateChangeTarget', $request->all())){
            return redirect('ClaimateChangeTarget')->with('success',config('messages.1'));
        }
        return redirect('ClaimateChangeTarget')->with(['errors',config('messages.5')]);
        
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
        $climateChangeGoal = ClaimateChangeGoal::all();
        $claimateChangeTargetValue = ClimateChangeTarget::find($id);
        return view('ClaimateChangeTarget.edit',compact('claimateChangeTargetValue','climateChangeGoal'));
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
       
        
        if($this->commonclass->update_custom('ClimateChangeTarget',$id,$request->all()))
       {
          return redirect('ClaimateChangeTarget')->with('success',config('messages.2'));
       }
        return redirect('ClaimateChangeTarget')->with(['errors',config('messages.6')]);
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
        if($this->commonclass->soft_delete_custom('ClimateChangeTarget',$id))
          {
             return redirect('ClaimateChangeTarget')->with('success',config('messages.3'));
          }
              return redirect('ClaimateChangeTarget')->with(['errors',config('messages.7')]);
        
        return $id;
    }
}
