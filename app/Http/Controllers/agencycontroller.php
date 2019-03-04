<?php

namespace App\Http\Controllers;

use App\agency;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;
use App\ministry;

class agencycontroller extends Controller
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
             
               

          $showagency=agency::get();
      // return response()->download(public_path().'/images/backend_images/bd-flag.png','myfile'.'.png');

        return response()->view('agencycreation.index',compact('showagency'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //



        $ministry=ministry::all();
        return view('agencycreation.create',compact('ministry'));
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


        $all=$request->validate([
            'agency_name'=>'required',
            'keyword'=> 'required|max:2|min:2|unique:agencies,keyword,NULL,id,deleted_at,NULL',
            // "keyword"=>['required','max:2','min:2','regex:/^(a|A)\d$/'],
            'ministry_id'=>'nullable',
            'agency_description' => 'nullable',
            'status' => 'nullable',
        ],


        ['agency_name.required'=>'This :Attribute field must required','keyword.regex'=>':attribute msut start with a or A and end with any single charecter'],
        ['keyword'=>'Agency Keyword','agency_name'=>'Agency Name','ministry_id'=>'Ministry Name','agency_description'=>'Agency Description']
        );





        if($this->commonclass->create_custom('agency',$request->all()))
        {

             return redirect('agency')->with('success',config('messages.1'));
        }
         return redirect('agency/create')->with(['errors',config('messages.5')]);



        // $insert_to_agency=new agency();
        //
        // $insert_to_agency->agency_name=$request->agency_name;
        // $insert_to_agency->agency_description=$request->agency_description;
        // $insert_to_agency->status=$request->status;
        // $insert_to_agency->save();
        // return redirect('agency');

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

        $edit_agency=agency::find($id);
        $ministry=ministry::all();

        return view('agencycreation.edit',compact('edit_agency','ministry'));


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
        
        $all=$request->validate([
            'keyword'=> 'required|max:2|min:2|unique:agencies,keyword,'.$id.',id,deleted_at,NULL',
            'agency_name'=>'required',
            'ministry_id'=>'nullable',
            'agency_description' => 'nullable',
            'status' => 'nullable',
        ],

        ['agency_name.required'=>'This :Attribute field must required'],
        ['agency_name'=>'Agency Name','ministry_id'=>'Ministry Name','agency_description'=>'Agency Description']
        );

        // $updateInministry = agency::where('id',$id)->update([
        //     'agency_name' => $request->agency_name,
        //     'agency_description' => $request->agency_description,
        //     'status' => $request->status,
        //
        // ]);
        //
        // return redirect('agency');
        if($this->commonclass->update_custom('agency',$id,$request->all()))
        {

             return redirect('agency')->with('success',config('messages.2'));
        }
         return redirect('agency/update')->with(['errors',config('messages.5')]);




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

        if($this->commonclass->soft_delete_custom('agency',$id))
        {
           return redirect('agency')->with('success',config('messages.3'));
        }
        else
        {
            return redirect('agency')->with(['errors',config('messages.7')]);

        }

    }
}
