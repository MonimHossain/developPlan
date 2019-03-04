<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subsector;
use App\Sector;

class SubSectorController extends Controller
{
  public $commonclass;
   public function __construct(){
       $this->commonclass=app('CommonClass');

   }
    public function index()
    {

          $subsectors=SubSector::all();
          return view('subsector.index',compact('subsectors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $sectors=Sector::all();

        return view('subsector.create',compact('sectors'));
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
        //



        SubSector::create($validator= request()->validate([
            'keyword'=> "required|max:2|min:2|unique:subsectors,keyword,NULL,id,deleted_at,NULL",
            'sector_name'=>'required',
            'sub_sector_name'=>'required',
            'sub_sector_name_bn'=>'',
            'sub_sector_description'=>'nullable',



         ]));
        return redirect()->route('sub-sector.index')->with('success',Config('messages.1'));
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
        $subsector=SubSector::findOrFail($id);
        $sectors=Sector::all();

        return view('subsector.edit',compact('subsector','sectors'));
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
        //
        if(!$this->commonclass->check_privilege(1)){

            return back()->withErrors([config('messages.4')]);
        }

         SubSector::findOrFail($id)->update($validator= request()->validate([
           'keyword'=> "required|max:2|min:2|unique:subsectors,keyword,{$id},id,deleted_at,NULL",
           'sector_name'=>'required',
           'sub_sector_name'=>'required',
           'sub_sector_name_bn'=>'',
           'sub_sector_description'=>'nullable',


         ]));
         return redirect()->route('sub-sector.index')->with('success',Config('messages.2'));
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




        //
        SubSector::find($id)->delete();
        return redirect()->route('sub-sector.index')->with('success',Config('messages.3'));
    }

}
