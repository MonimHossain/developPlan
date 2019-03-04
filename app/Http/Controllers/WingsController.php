<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wings;

class WingsController extends Controller
{
    //
    public $commonclass;
     public function __construct(){
         $this->commonclass=app('CommonClass');

     }


    public function index()
    {
        $projecttypes=Wings::all();
        return view('wings.index',compact('projecttypes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!app('CommonClass')->check_privilege(0)){
            return back()->withErrors(['User does not have Save privilege']);
        }
        $request->validate([
            'wings_type'=>'required',
            'wings_type_description' => 'required',
            'status' => 'required',
        ]);
        if($this->commonclass->create_custom('wings',$request->all()))
        {

             return redirect('wings')->with('success',config('messages.1'));
        }
         return redirect('wings/create')->with(['errors',config('messages.5')]);
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
        $wingstype=Wings::find($id);
        return view('wings.edit',compact('wingstype'));
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
      if(!app('CommonClass')->check_privilege(1)){
          return back()->withErrors(['User does not have Save privilege']);
      }
      $request->validate([
          'wings_type'=>'required',
          'wings_type_description' => 'required',
          'status' => 'required',
      ]);
      if($this->commonclass->update_custom('wings',$id,$request->all()))
      {

           return redirect('wings')->with('success',config('messages.1'));
      }
       return redirect('wings/update')->with(['errors',config('messages.5')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!app('CommonClass')->check_privilege(2)){
            return back()->withErrors(['User does not have Delete privilege']);
        }
         if($this->commonclass->soft_delete_custom('wings',$id)){
           return redirect('wings')->with('success',config('messages.3'));
         }
    }
}
