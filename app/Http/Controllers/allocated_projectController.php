<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\agency;
use App\division;
use App\ministry;
use App\ProjectSource;
use App\Sector;
use App\SubSector;
use App\UpazilaLocation;
use App\FiscalYear;
use App\unapproved_project_info;
use App\Allocation;
use App\demand;
use App\allocation_location_detail;
use App\demands_location_detail;
use App\demand_project_source_detail;
use App\sendadpallocation;
use DB;
use App\Guideline;
use App\approved_project_info;
use App\demand_mypip_detail;
use Illuminate\Support\Facades\Auth;


class allocated_projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $commonclass;
    public function __construct(){
      $this->commonclass=app('CommonClass');
    }
    public function index(Request $request)
    {
     
      $financial_year = Guideline::where('call_notice_type',0)->where('guideline_status', 1)->latest()->first()->fiscal_years;
      $user_group = Auth::user()->user_group;
      $user_id = Auth::user()->id;
      
      $backproj=array();
      $notaddproject=array();
      $checkerbackproj=array();
      $ministry= ministry::where('status',1)->get();
      $agency= agency::where('status',1)->get();
      $sector= Sector::where('status',1)->get();
      $subsector= SubSector::where('status',1)->get();
      
        if ($user_group == 13 || $user_group == 15) {//Agency
          
          $backproj = sendadpallocation::select('project_id')->where('type', '=', 1)->where('is_back', '=', 1)->pluck('project_id')->toArray();
          $checkerbackproj = sendadpallocation::select('project_id')->where('type', '=', 1)->where('back_checker', '=', 1)->pluck('project_id')->toArray();
          
          $proj = sendadpallocation::select('project_id')->where('type', '=', 1)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
          $projnot = sendadpallocation::select('project_id')->where('type', '=', 1)->where('send_maker', '=', 1)->pluck('project_id')->toArray();
          $notaddproject=  array_merge($proj,$projnot);
          
          $projectList = demand::where('demands.created_by', $user_id)->whereNotIn('demands.project_id', $notaddproject)->with('project_name')->with('project_name')->with('demand_source')->join('approved_project_info','approved_project_info.unapprove_project_id','demands.project_id');
          if($request->min!=null)
          {
            $projectList=$projectList->where('approved_project_info.ministry',$request->min);
          }
          if($request->agen!=null)
          {
            $projectList=$projectList->where('approved_project_info.agency',$request->agen);
          }
          if($request->sec!=null)
          {
            $projectList=$projectList->where('approved_project_info.sector',$request->sec);
          }
          if($request->sub_sec!=null)
          {
            $projectList=$projectList->where('approved_project_info.sub_sector',$request->sub_sec);
          }



          $projectList=$projectList->select('demands.*')->get();

        }elseif ($user_group == 12 || $user_group == 14 ) {//Ministry
          $backproj = sendadpallocation::select('project_id')->where('type', '=', 2)->where('is_back', '=', 1)->pluck('project_id')->toArray();
          $checkerbackproj = sendadpallocation::select('project_id')->where('type', '=', 2)->where('back_checker', '=', 1)->pluck('project_id')->toArray();
          $proj = sendadpallocation::select('project_id')->where('type', '=', 1)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
          $projnot = sendadpallocation::select('project_id')->where('type', '=', 2)->where(function($q){
            $q->where('is_forward', '=', 1)->orWhere('send_maker', '=', 1);
          })->pluck('project_id')->toArray();

          $projectList = demand::whereIn('demands.project_id', $proj)->whereNotIn('demands.project_id', $projnot)->with('project_name')->with('project_name')->with('demand_source')->join('approved_project_info','approved_project_info.unapprove_project_id','demands.project_id');
          if($request->min!=null)
          {
            $projectList=$projectList->where('approved_project_info.ministry',$request->min);
          }
          if($request->agen!=null)
          {
            $projectList=$projectList->where('approved_project_info.agency',$request->agen);
          }
          if($request->sec!=null)
          {
            $projectList=$projectList->where('approved_project_info.sector',$request->sec);
          }
          if($request->sub_sec!=null)
          {
            $projectList=$projectList->where('approved_project_info.sub_sector',$request->sub_sec);
          }



          $projectList=$projectList->select('demands.*')->get();
        }else if ($user_group == 11 || $user_group == 19) {//Sub Sector
          $backproj = sendadpallocation::select('project_id')->where('type', '=', 3)->where('is_back', '=', 1)->pluck('project_id')->toArray();
          $checkerbackproj = sendadpallocation::select('project_id')->where('type', '=', 3)->where('back_checker', '=', 1)->pluck('project_id')->toArray();
          
          $proj = sendadpallocation::select('project_id')->where('type', '=', 2)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
          $projnot = sendadpallocation::select('project_id')->where('type', '=', 3)->where(function($q){
            $q->where('is_forward', '=', 1)->orWhere('send_maker', '=', 1);
          })->pluck('project_id')->toArray();
          
          $projectList = demand::whereIn('demands.project_id', $proj)->whereNotIn('demands.project_id', $projnot)->with('project_name')->with('project_name')->with('demand_source')->join('approved_project_info','approved_project_info.unapprove_project_id','demands.project_id');
          if($request->min!=null)
          {
            $projectList=$projectList->where('approved_project_info.ministry',$request->min);
          }
          if($request->agen!=null)
          {
            $projectList=$projectList->where('approved_project_info.agency',$request->agen);
          }
          if($request->sec!=null)
          {
            $projectList=$projectList->where('approved_project_info.sector',$request->sec);
          }
          if($request->sub_sec!=null)
          {
            $projectList=$projectList->where('approved_project_info.sub_sector',$request->sub_sec);
          }



          $projectList=$projectList->select('demands.*')->get();
        }else if ( $user_group == 9 || $user_group == 10) {//Sector Divition
          $backproj = sendadpallocation::select('project_id')->where('type', '=', 4)->where('is_back', '=', 1)->pluck('project_id')->toArray();
          $checkerbackproj = sendadpallocation::select('project_id')->where('type', '=', 4)->where('back_checker', '=', 1)->pluck('project_id')->toArray();
          
          $proj = sendadpallocation::select('project_id')->where('is_forward', '=', 1)->where(function($q) {
                        $q->where('type', '=', 3)->orWhere('type', '=', 2);
                    })->pluck('project_id')->toArray();
          $projnot = sendadpallocation::select('project_id')->where('type', '=', 4)->where(function($q){
            $q->where('is_forward', '=', 1)->orWhere('send_maker', '=', 1);
          })->pluck('project_id')->toArray();
          
          $projectList = demand::whereIn('demands.project_id', $proj)->whereNotIn('demands.project_id', $projnot)->with('project_name')->with('demand_source')->join('approved_project_info','approved_project_info.unapprove_project_id','demands.project_id');
          if($request->min!=null)
          {
            $projectList=$projectList->where('approved_project_info.ministry',$request->min);
          }
          if($request->agen!=null)
          {
            $projectList=$projectList->where('approved_project_info.agency',$request->agen);
          }
          if($request->sec!=null)
          {
            $projectList=$projectList->where('approved_project_info.sector',$request->sec);
          }
          if($request->sub_sec!=null)
          {
            $projectList=$projectList->where('approved_project_info.sub_sector',$request->sub_sec);
          }



          $projectList=$projectList->select('demands.*')->get();
        }
        
        else{
         $projectList=demand::with('project_name')->with('demand_source')->join('approved_project_info','approved_project_info.unapprove_project_id','demands.project_id');
         if($request->min!=null)
         {
          $projectList=$projectList->where('approved_project_info.ministry',$request->min);
        }
        if($request->agen!=null)
        {
          $projectList=$projectList->where('approved_project_info.agency',$request->agen);
        }
        if($request->sec!=null)
        {
          $projectList=$projectList->where('approved_project_info.sector',$request->sec);
        }
        if($request->sub_sec!=null)
        {
          $projectList=$projectList->where('approved_project_info.sub_sector',$request->sub_sec);
        }



        $projectList=$projectList->select('demands.*')->get();
        
      }
      
      
      
      return view('allocation.allocated_project.index',compact('projectList','backproj','checkerbackproj','user_group','financial_year','ministry','agency','sector','subsector'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //return $id;
      
      $source=ProjectSource::where('status',1)->get();
      $ministry=ministry::where('status',1)->get();
      $agency=agency::where('status',1)->get();
      $divison=division::where('status',1)->get();
      $upazila=UpazilaLocation::where('status',1)->get();
      $sector=Sector::where('status',1)->get();
      $subsector=SubSector::where('status',1)->get();
        //$financial_year=FiscalYear::get();

      $project=demand::with('project_name')->with('demand_source')->with('demand_details')->with('fiscal_years')->leftJoin('approved_project_info','approved_project_info.unapprove_project_id','demands.project_id')->leftJoin('sectors','approved_project_info.sector','sectors.id')->leftJoin('subsectors','approved_project_info.sub_sector','subsectors.id')->leftJoin('ministries','approved_project_info.ministry','ministries.id')->leftJoin('agencies','approved_project_info.agency','agencies.id')->select('demands.*','sectors.sector_name as sector_name','subsectors.sub_sector_name','ministries.ministry_name','agencies.agency_name')->find($id);


      return view('allocation.adp_allocation.dynamic_view_modal',compact('source','ministry','agency','divison','upazila','sector','subsector','financial_year','project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $project=unapproved_project_info::with('sectors')->with('sub_sectors')->with('ministries')->with('agencies')->find($id);

      $source=ProjectSource::where('status',1)->get();
      $ministry=ministry::where('status',1)->get();
      $agency=agency::where('status',1)->get();
      $divison=division::where('status',1)->get();
      $upazila=UpazilaLocation::where('status',1)->get();
      $sector=Sector::where('status',1)->get();
      $subsector=SubSector::where('status',1)->get();
      $financial_year=Guideline::where('call_notice_type',0)->where('guideline_status',1)->latest()->first()->fiscal_year;

      $project=demand::with('project_name')->with('demand_source')->with('demand_pip')->with('fiscal_years')->with('demand_details')->leftJoin('approved_project_info','approved_project_info.unapprove_project_id','demands.project_id')->leftJoin('sectors','approved_project_info.sector','sectors.id')->leftJoin('subsectors','approved_project_info.sub_sector','subsectors.id')->leftJoin('ministries','approved_project_info.ministry','ministries.id')->leftJoin('agencies','approved_project_info.agency','agencies.id')->select('demands.*','sectors.sector_name as sector_name','subsectors.sub_sector_name','ministries.ministry_name','agencies.agency_name')->find($id);
      

      return view('allocation.allocated_project.edit',compact('source','ministry','agency','divison','upazila','sector','subsector','financial_year','project'));

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
       // return $request->all();
     if(!$this->commonclass->check_privilege(1)){
      return back()->withErrors([config('messages.4')]);
    }

    $request->validate([
      'demand_type'=>'required',
      'project_code'=>'required',
      'project_id'=>'required',
      'project_status'=>'required',
      'approved_status'=>'required',
      'project_cost_total'=>'required',
      'project_fe'=>'required',
      'project_aid'=>'required',
      'project_rpa'=>'required',
      'project_sf'=>'required',
          // 'original_fiscal_year'=>'required',
          // 'original_total'=>'required',
          // 'original_taka'=>'required',
      'actual_total'=>'required',
      'actual_total_fe'=>'required',
      'actual_taka'=>'required',
          // 'cumulative_total'=>'required',
          // 'cumulative_taka'=>'required',
      'allocation_total'=>'required',
      'allocation_taka'=>'required',
      'allocation_revenue'=>'required',
      'capital'=>'required',
      'capital_rpa'=>'required',
      'capital_revenue'=>'required',
      'cdvat'=>'required',
      'cdvat_pa'=>'required',
      'cdvat_rpa'=>'required',
      'cdvat_dpa'=>'required',
      'allocation_others'=>'required',

      'self_finance'=>'required',

    ]);
    DB::beginTransaction();

    if($this->commonclass->update_custom('demand',$id, $request->all()))
    {
     if(!empty($request->financing_source)){
       demand_project_source_detail::where('demand_id',$id)->delete();
       foreach ($request->financing_source as $key => $v) {
        $data [] = [

          'demand_id'=> $id,
          'project_code'=>$request->project_code,
          'financing_source' => $v,
          'amount' => $request->source_amount[$key],

          'created_by' => auth()->id(),
          'updated_by' => auth()->id(),
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'status' => 1
        ];
      }
      demand_project_source_detail::insert($data);
    }
    if(!empty($request->division)){
      demands_location_detail::where('demand_id',$id)->delete();
      foreach ($request->division as $key => $v) {
        $data [] = [

          'demand_id'=> $id,
          'project_code'=>$request->project_code,
          'division' => $v,
          'district' => $request->district[$key],
          'upazila_location' => $request->upazila[$key],
          'district' => 0,
          'amount' => $request->amount[$key],
          'created_by' => auth()->id(),
          'updated_by' => auth()->id(),
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'status' => 1
        ];
      }
      demands_location_detail::insert($data);
    }
    if(!is_null($request->nextYear))
    {

      demand_mypip_detail::where('demand_id',$id)->delete();
      $mypipdata[]=[
        'year'=>$request->nextYear,
        'pa'=>$request->nextYearPa,
        'gob'=>$request->nextYearGob,
        'project_id'=>$request->project_id,
        'demand_id'=>$id,
        'created_by'=>auth()->id(),
        'updated_by'=>auth()->id(),
        'updated_at'=>date('Y-m-d H:i:s'),
        'created_at'=>date('Y-m-d H:i:s')
      ];
      

      $mypipdata[]= [
        'year'=>$request->afterNextYear,
        'pa'=>$request->afterNextYearPa,
        'gob'=>$request->afterNextYearGob,
        'project_id'=>$request->project_id,
        'demand_id'=>$id,
        'created_by'=>auth()->id(),
        'updated_by'=>auth()->id(),
        'updated_at'=>date('Y-m-d H:i:s'),
        'created_at'=>date('Y-m-d H:i:s')
      ];

      demand_mypip_detail::insert($mypipdata);
      
    }
    DB::commit();
    return redirect('allocated_project')->with('success',config('messages.2'));
  }
  else
  {
   DB::rollback();
   return back();
 }


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

      if($this->commonclass->soft_delete_custom('Allocation',$id))
      {
       return redirect('allocated_project')->with('success',config('messages.3'));
     }
     else
     {
      return redirect('allocated_project')->with(['errors',config('messages.7')]);

    }
  }
  
  
  public function adpsendtochecker(Request $request){
    
    $request->validate([
      'chkproject' => 'required'
    ], [
      'chkproject.required' => 'Select At List One Project'
    ]);
    
    $user_group = Auth::user()->user_group;
    $logged_user_id = Auth::user()->id;
    
    if ($request->submitbutton == "send") {
      
            if ($user_group == 13 || $user_group == 15) {//Agency
              $type = 1;
            } elseif ($user_group == 12 || $user_group == 14) {//Ministry
              $type = 2;
            } elseif ($user_group == 11 || $user_group == 19) {//Sub Sector
              $type = 3;
            } elseif ($user_group == 9 || $user_group == 10) {//Sector Divition
              $type = 4;
            } elseif ($user_group == 16) {//programming division
              $type = 5;
            } else {
              $type = 1;
            }
            
            $flag=0;
            $idata = array();
            foreach ($request->chkproject as $key => $val) {
              if (sendadpallocation::where('type', '=', $type)->where('project_id', '=', $val)->exists()) {
                $data = [
                  'send_maker' => 1,
                  'back_checker' => null,
                  'send_maker_date' => date('Y-m-d'),
                  'created_by' => $logged_user_id,
                  'updated_by' => $logged_user_id,
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'status' => 1,
                ];

                sendadpallocation::where('type', '=', $type)->where('project_id', '=', $val)->update($data);
                $flag=1;
              }else {

                $idata [] = [
                  'type' => $type,
                  'project_id' => $val,
                  'send_maker' => 1,
                  'send_maker_date' => date('Y-m-d'),
                  'created_by' => $logged_user_id,
                  'updated_by' => $logged_user_id,
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'status' => 1,
                ];
              }
              
            }
            if (!empty($idata)) {
              sendadpallocation::insert($idata);
              $flag=1;
                //return back()->with('success', 'Send Successfully');
            }
            
            if($flag==1){
              return back()->with('success', 'Send Successfully');
            }else{
              return back()->with('success', 'Not Send Successfully');
            }
            
          }
          
        }

        
        
      }
