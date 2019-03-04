<?php

namespace App\Http\Controllers;

use App\demand;
use Illuminate\Http\Request;
use App\Adp_Allocation;
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
use App\allocation_location_detail;
use App\approved_project_info;
use DB;

class DemandController extends Controller
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
    public function index()
    {
       $projectList=approved_project_info::all();
       //return $projectList;
       return view('demand.index',compact('projectList'));
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
       if(!$this->commonclass->check_privilege(0)){
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
          'original_fiscal_year'=>'required',
          'original_total'=>'required',
          'original_taka'=>'required',
          'actual_total'=>'required',
          'actual_total_fe'=>'required',
          'actual_taka'=>'required',
          'cumulative_total'=>'required',
          'cumulative_taka'=>'required',
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
          'source_of_project_aid'=>'required',
          'source_amount'=>'required',
          'self_finance'=>'required',

        ]);
      DB::beginTransaction();

        if($demand_id=$this->commonclass->create_custom('demand',$request->all()))
          {

        if(!empty($request->division)){
         foreach ($request->division as $key => $v) {
            $data [] = [

                'demand_id'=> $demand_id,
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
         demand_location_detail::insert($data);
     }
          DB::commit();
          return back()->with('success',config('messages.10'));
        }
        else
        {
           DB::rollback();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function show(demand $demand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
       $project=approved_project_info::with('sectors')->with('sub_sectors')->with('ministries')->with('agencies')->with('unapproved_location')->find($id);

        $source=ProjectSource::where('status',1)->get();
        $ministry=ministry::where('status',1)->get();
        $agency=agency::where('status',1)->get();
        $divison=division::where('status',1)->get();
        $upazila=UpazilaLocation::where('status',1)->get();
        $sector=Sector::where('status',1)->get();
        $subsector=SubSector::where('status',1)->get();
        $financial_year=FiscalYear::get();



        return view('allocation.adp_allocation.edit',compact('source','ministry','agency','divison','upazila','sector','subsector','financial_year','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, demand $demand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function destroy(demand $demand)
    {
        //
    }
}
