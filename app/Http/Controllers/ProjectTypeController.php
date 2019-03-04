<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectType;

class ProjectTypeController extends Controller
{
    //
    public $commonclass;
     public function __construct(){
         $this->commonclass=app('CommonClass');

     }


    public function index()
    {
        //


        $projecttypes=ProjectType::all();




        return view('project_type.index',compact('projecttypes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //




        return view('project_type.create');
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
            'keyword'=> 'required|min:2|max:2|unique:project_types,keyword,NULL,id,deleted_at,NULL',
            'project_type'=>'required',
            'project_type_description' => 'required',
            'status' => 'required',
        ]);

        if($this->commonclass->create_custom('ProjectType',$request->all()))
        {

             return redirect('project-type')->with('success',config('messages.1'));
        }
         return redirect('project-type/create')->with(['errors',config('messages.5')]);

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

        $projecttype=ProjectType::find($id);

        return view('project_type.edit',compact('projecttype'));


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
          'keyword'=> "required|max:2|min:2|unique:project_types,keyword,{$id},id,deleted_at,NULL",
          'project_type'=>'required',
          'project_type_description' => 'required',
          'status' => 'required',
      ]);

      if($this->commonclass->update_custom('ProjectType',$id,$request->all()))
      {

           return redirect('project-type')->with('success',config('messages.1'));
      }
       return redirect('project-type/update')->with(['errors',config('messages.5')]);
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
         if($this->commonclass->soft_delete_custom('ProjectType',$id)){
           return redirect('project-type')->with('success',config('messages.3'));
         }


    }
}
