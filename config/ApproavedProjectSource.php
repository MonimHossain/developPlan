<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectSource;
use App\Classes;

class ProjectSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        //
       // return 'hi';

          $sources=ProjectSource::all();


          return view('projectsource.index',compact('sources'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projectsource.create');
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


        ProjectSource::create($validator= request()->validate([
            'source_name'=>'required',
            'source_description'=>'required',
            'status'=>'required'


         ]));
        return redirect()->route('project-source.index')->with('success','Project Source Added Successfully');
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
        $source=ProjectSource::findOrFail($id);

        return view('projectsource.edit',compact('source'));
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
        //

         projectSource::findOrFail($id)->update($validator= request()->validate([
            'source_name'=>'required',
            'source_description'=>'required',
            'status'=>'required'


         ]));
         return redirect()->route('project-source.index')->with('success','Update Project Source Successfully');
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
        ProjectSource::findOrFail($id)->delete();
        return redirect()->route('project-source.index')->with('success','Source Deleted Successfully');
    }
}
