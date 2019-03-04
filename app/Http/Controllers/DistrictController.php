<?php

namespace App\Http\Controllers;

use App\Classes\CommonClass;
use App\distric;
use App\district;
use Illuminate\Http\Request;

class DistrictController extends Controller
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
        $commonclass=new CommonClass();
        $district_all=district::all();
        return view('districtcreation.index',compact('district_all','commonclass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('districtcreation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->all();
if(!$this->commonclass->check_privilege(0)){

    return back()->withErrors([config('messages.4')]);
}

        $request->validate([
            'district_name'=>'required',
            'district_description'=>'nullable',
            'status'=>'nullable',
        ]);

        district::create([
            'district_name'=>$request->district_name,
            'district_name_bn'=>$request->district_name_bn,
            'district_description' =>$request->district_description,
            'status'=>$request->status,

        ]);
        return redirect()->route('district.index')->with('success',config('messages.1'));



//        return $request->all();
        //
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

        $district=district::find($id);


        return view('districtcreation.edit',compact('district'));

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
        //

        if(!$this->commonclass->check_privilege(1)){

            return back()->withErrors([config('messages.4')]);
        }

        $request->validate([
            'district_name'=>'required',
            'district_description'=>'nullable',
            'status'=>'nullable',
        ]);

        district::find($id)->update([
            'district_name'=>$request->district_name,
            'district_name_bn'=>$request->district_name_bn,
            'district_description' =>$request->district_description,
            'status'=>$request->status,

        ]);

        return redirect()->route('district.index')->with('success',config('messages.2'));




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

          if($this->commonclass->soft_delete_custom('district',$id))
          {
             return redirect('district')->with('success',config('messages.3'));
          }
          else
          {
              return redirect('district')->with(['errors',config('messages.7')]);

          }
    }
}
