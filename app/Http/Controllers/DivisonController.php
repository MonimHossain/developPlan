<?php

namespace App\Http\Controllers;

use App\Classes\CommonClass;
use App\division;
use Illuminate\Http\Request;

class DivisonController extends Controller
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
    public function index(Request $request)
    {
        //
        $all_division=division::all();
        $commonclass=new CommonClass();

        return view('division_creation.index',compact('all_division','commonclass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('division_creation.create');
        //
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
          return back()->withErrors(['User does not have Save privilege']);
      }

        $request->validate([
            'division_name'=>'required',
            'division_description' => 'nullable',
            'status' => 'nullable',
        ]);

        $insert_to_division=new division();

        $insert_to_division->division_name=$request->division_name;
        $insert_to_division->division_name_bn=$request->division_name_bn;
        $insert_to_division->division_description=$request->division_description;
        $insert_to_division->status=$request->status;
        $insert_to_division->save();
        return redirect('division')->with('success',config('messages.1'));



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
        $show_edit_division=division::find($id);
      return view('division_creation.edit',compact('show_edit_division'));

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

      if(!app('CommonClass')->check_privilege(1)){
          return back()->withErrors(['User does not have Update privilege']);
      }
        $request->validate([
            'division_name'=>'required',
            'division_description' => 'nullable',
            'status' => 'nullable',
        ]);

        $updateIn_division = division::where('id',$id)->update([
            'division_name' => $request->division_name,
            'division_name_bn' => $request->division_name_bn,
            'division_description' => $request->division_description,
            'status' => $request->status,

        ]);

        return redirect('division')->with('success',config('messages.2'));

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
        $deletemin_division= division::find($id);
        $deletemin_division->delete();

        return redirect('division')->with('success',config('messages.2'));
        //
    }
}
