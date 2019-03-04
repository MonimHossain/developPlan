<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UpazilaLocation;
use App\district;

class UpazilaLocationController extends Controller
{
    /**
     * Display a listing of the relocation.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

          $locations=UpazilaLocation::with('district_name:id,district_name')->get();
          return view('UpazilaLocation.index',compact('locations'));

    }

    /**
     * Show the form for creating a new relocation.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $district = district::all();
        return view('UpazilaLocation.create',compact('district'));
    }

    /**
     * Store a newly created relocation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //

        UpazilaLocation::create($validator= request()->validate([
            'upazila_location_name'=>'required',
            'upazila_location_name_bn'=>'',
            'upazila_location_description'=>'required',
            'district_id'=>'required',
            'status'=>'required'
         ]));
        return redirect()->route('upazila-location.index')->with('success','Upazila Location Added Successfully');
    }

    /**
     * Display the specified relocation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified relocation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $location=UpazilaLocation::with('district_name:id,district_name')->findOrFail($id);
        $district = district::all();
        return view('UpazilaLocation.edit',compact('location','district'));
    }

    /**
     * Update the specified relocation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         
         UpazilaLocation::findOrFail($id)->update($validator= request()->validate([
            'upazila_location_name'=>'required',
            'upazila_location_name_bn'=>'',
            'upazila_location_description'=>'required',
            'district_id'=>'required',
            'status'=>'required'


         ]));
         return redirect()->route('upazila-location.index')->with('success','Update Upazila Location Successfully');
    }

    /**
     * Remove the specified relocation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        UpazilaLocation::findOrFail($id)->delete();
        return redirect()->route('upazila-location.index')->with('success','Upazila Or Location Deleted Successfully');
    }
}
