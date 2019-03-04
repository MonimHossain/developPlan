<?php

namespace App\Http\Controllers;

use App\PovertyTarget;
use Illuminate\Http\Request;
use App\PovertyGoal;

class PovertyTargetController extends Controller
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
          return view('povertytarget.index')->with(['povertytargets'=>PovertyTarget::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $povertygoals=PovertyGoal::all();

        return view('povertytarget.create',compact('povertygoals'));
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
                         'goal_name_id'=>'required',
                         'target'=>'required',
                         'target_description'=>'required',
                         'status'=>'required',
        ]);
      if(count($validator)>0){
        if($this->commonclass->create_custom('PovertyTarget',$validator)){
          return redirect('poverty-target')->with('success',config('messages.1'));
        }
        else{
          return redirect('poverty-target/create')->with('errors',[config('messages.5')]);
        }
      }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PovertyTarget  $povertyTarget
     * @return \Illuminate\Http\Response
     */
    public function show(PovertyTarget $povertyTarget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PovertyTarget  $povertyTarget
     * @return \Illuminate\Http\Response
     */
    public function edit(PovertyTarget $povertyTarget)
    {


        $povertygoals=PovertyGoal::all();
        return view('povertytarget.edit')->with(['povertytarget'=>$povertyTarget,'povertygoals'=>$povertygoals]);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PovertyTarget  $povertyTarget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PovertyTarget $povertyTarget)
    {
        //
        if(!$this->commonclass->check_privilege(1)){

            return back()->withErrors([config('messages.4')]);
        }

        $validator=  $request->validate([
                         'goal_name_id'=>'required',
                         'target'=>'required',
                         'target_description'=>'required',
                         'status'=>'required',
        ]);
      if(count($validator)>0){
        if($this->commonclass->update_custom('PovertyTarget',$povertyTarget->id,$validator)){
          return redirect('poverty-target')->with('success',config('messages.1'));
        }
        else{
          return redirect()->route('poverty-target.update')->with('errors',[config('messages.5')]);
        }
      }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PovertyTarget  $povertyTarget
     * @return \Illuminate\Http\Response
     */
    public function destroy(PovertyTarget $povertyTarget)
    {
        //



        if(!$this->commonclass->check_privilege(2)){
            return back()->withErrors([config('messages.4')]);
        }

          if($this->commonclass->soft_delete_custom('PovertyTarget',$povertyTarget->id))
          {
             return redirect('poverty-target')->with('success',config('messages.3'));
          }
          else
          {
              return redirect()->route(poverty-target.index)->with(['errors',config('messages.7')]);

          }
    }
}
