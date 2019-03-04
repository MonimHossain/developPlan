<?php

namespace App\Http\Controllers;

use App\Classes\CommonClass;
use Auth;
use App\rmo;
use Illuminate\Http\Request;

class rmo_controller extends Controller
{
  public $commonclass;
   public function __construct(){
       $this->commonclass=app('CommonClass');

   }


    public function index()
    {
        //
        $commonclass=new CommonClass();
        $rmo_all = rmo::all();
        return view('rmo.index', compact('rmo_all','commonclass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rmo.create');
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

        $user_id = Auth::user()->id;
        
        rmo::create([
            'rmo_name'=>$request->rmo_name,
            'rmo_name_bn'=>$request->rmo_name_bn,
            'rmo_description'=>$request->rmo_description,
            'status'=>$request->status,
            'created_by'=>$user_id,
        ]);

        return redirect('rmo_setup')->with('success',config('messages.1'));
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
        $rmoVal = rmo::find($id);
        return view('rmo.edit', compact('rmoVal'));
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


        $user_id = Auth::user()->id;

        rmo::find($id)->update([
            'rmo_name'=>$request->rmo_name,
            'rmo_name_bn'=>$request->rmo_name_bn,
            'rmo_description'=>$request->rmo_description,
            'status'=>$request->status,
            'updated_by'=>$user_id,
        ]);

        return redirect('rmo_setup')->with('success',config('messages.2'));
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

        $rmo = rmo::find($id);
        $rmo->delete();
        return redirect('rmo_setup')->with('success',config('messages.3'));
    }
}
