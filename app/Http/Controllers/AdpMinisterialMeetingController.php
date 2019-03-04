<?php

namespace App\Http\Controllers;

use App\sendadpallocation;
use App\demand;
use App\Guideline;
use App\ministerialmeeting;
use App\unapproved_project_info;
use App\newprojectlist;
use Carbon\Carbon;
use Cart;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\agency;
use App\division;
use App\ministry;
use App\Sector;
use App\SubSector;

class AdpMinisterialMeetingController extends Controller {

    public $commonclass;

    public function __construct() {
        $this->commonclass = app('CommonClass');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        $user_group = Auth::user()->user_group;
       
      
      
        $backproj=array();
        $notaddproject=array();
        $checkerbackproj=array();
        $ministry= ministry::where('status',1)->get();
        $agency= agency::where('status',1)->get();
        $sector= Sector::where('status',1)->get();
        $subsector= SubSector::where('status',1)->get();
        
         if ($user_group == 16) {//programming division
            $proj = sendadpallocation::select('project_id')->where('type', '=', 5)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $project_demands = demand::whereIn('project_id', $proj)->with('project_name')->with('demand_source')->join('approved_project_info','approved_project_info.unapprove_project_id','demands.project_id');
            if($request->min!=null)
            {
              $project_demands=$project_demands->where('approved_project_info.ministry',$request->min);
          }
          if($request->agen!=null)
          {
              $project_demands=$project_demands->where('approved_project_info.agency',$request->agen);
          }
          if($request->sec!=null)
          {
              $project_demands=$project_demands->where('approved_project_info.sector',$request->sec);
          }
          if($request->sub_sec!=null)
          {
              $project_demands=$project_demands->where('approved_project_info.sub_sector',$request->sub_sec);
          }




            $project_demands=$project_demands->select('demands.*')->get(); //->whereNotIn('id', $projnot)
        } else {
            $proj = sendadpallocation::select('project_id')->where('type', '=', 1)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $project_demands = demand::select('*')->whereIn('project_id', $proj)->with('project_name')->with('demand_source')->join('approved_project_info','approved_project_info.unapprove_project_id','demands.project_id');
            if($request->min!=null)
            {
              $project_demands=$project_demands->where('approved_project_info.ministry',$request->min);
          }
          if($request->agen!=null)
          {
              $project_demands=$project_demands->where('approved_project_info.agency',$request->agen);
          }
          if($request->sec!=null)
          {
              $project_demands=$project_demands->where('approved_project_info.sector',$request->sec);
          }
          if($request->sub_sec!=null)
          {
              $project_demands=$project_demands->where('approved_project_info.sub_sector',$request->sub_sec);
          }




            $project_demands=$project_demands->select('demands.*')->get(); //->whereNotIn('id', $projnot)
        }

        //dd(DB::getQueryLog());

        return view('adpministerialmeeting.create', compact('project_demands', 'user_group','ministry','agency','sector','subsector'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $request->validate([
            'chkproject' => 'required'
                ], [
            'chkproject.required' => 'Select At List One Project'
        ]);
        
        $user_group = Auth::user()->user_group;
        $logged_user_id = Auth::user()->id;

        foreach ($request->chkproject as $key => $val) {
            $udata = [
                'demand_status' => 1,
            ];
            demand::where('project_id', '=', $val)->update($udata);
        }

        return redirect('adpministerialmeeting/create')->with('success', 'Demand Approve Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
