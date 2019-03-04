<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\PovertyGoal;

class PovertyGoalController extends Controller
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
        //
        $povertygoals=PovertyGoal::all();
        return view('povertygoal.index',compact('povertygoals'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('povertygoal.create');
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

       $validator=  $request->validate([
                         'goal_no'=>'required',
                         'goal_name'=>'required',
                         'goal_description'=>'required',
                         'status'=>'required',
        ]);
      if(count($validator)>0){
        if($this->commonclass->create_custom('PovertyGoal',$validator)){
          return redirect('poverty-goal')->with('success',config('messages.1'));
        }
        else{
          return redirect('poverty-goal/create')->with('errors',[config('messages.5')]);
        }
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PovertyGoal  $povertyGoal
     * @return \Illuminate\Http\Response
     */
    public function show(PovertyGoal $povertyGoal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PovertyGoal  $povertyGoal
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $povertygoal=PovertyGoal::findOrFail($id);
        // dd($povertygoal);
        return view('povertygoal.edit')->with(['povertygoal'=>$povertygoal]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PovertyGoal  $povertyGoal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

      if(!$this->commonclass->check_privilege(1)){

          return back()->withErrors([config('messages.4')]);
      }
        //
        $validator=  $request->validate([
                          'goal_no'=>'required',
                          'goal_name'=>'required',
                          'goal_description'=>'required',
                          'status'=>'required',
         ]);

         if(count($validator)>0){
           if($this->commonclass->update_custom('PovertyGoal',$id,$validator)){
             return redirect('poverty-goal')->with('success',config('messages.2'));
           }
           else{
             return redirect()->route('poverty-goal.update')->with('errors',[config('messages.5')]);
           }
         }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PovertyGoal  $povertyGoal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(!$this->commonclass->check_privilege(2)){
            return back()->withErrors([config('messages.4')]);
        }

          if($this->commonclass->soft_delete_custom('PovertyGoal',$id))
          {
             return redirect('poverty-goal')->with('success',config('messages.3'));
          }
          else
          {
              return redirect()->route(poverty-goal.index)->with(['errors',config('messages.7')]);

          }

    }
}
