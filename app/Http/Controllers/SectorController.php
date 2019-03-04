<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sector;

class SectorController extends Controller
{
  public $commonclass;
   public function __construct(){
       $this->commonclass=app('CommonClass');

   }

    public function index()
    {
        //
          $sectors=Sector::all();
          return view('sector.index',compact('sectors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sector.create');
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


        Sector::create($validator= request()->validate([
            'keyword'=> "required|max:2|min:2|unique:sectors,keyword,NULL,id,deleted_at,NULL",
            'sector_name'=>'required',
            'sector_name_bn'=>'',
            'sector_description'=>'nullable',



         ]));
        return redirect()->route('sector.index')->with('success',config('messages.1',['attribute'=>'Sectors']));
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
        $sector=Sector::findOrFail($id);

        return view('sector.edit',compact('sector'));
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
        if(!$this->commonclass->check_privilege(1)){

            return back()->withErrors([config('messages.4')]);
        }

         Sector::findOrFail($id)->update($validator= request()->validate([
             'keyword'=> "required|max:2|min:2|unique:sectors,keyword,{$id},id,deleted_at,NULL",
            'sector_name'=>'required',
            'sector_name_bn'=>'',
            'sector_description'=>'nullable',



         ]));
         return redirect()->route('sector.index')->with('success',config('messages.2'));
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
        Sector::find($id)->delete();
        return redirect()->route('sector.index')->with('success',config('messages.3'));
    }
}
