<?php

namespace App\Http\Controllers;

use App\Adp_Allocation;
use Illuminate\Http\Request;
use App\demand;
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
use App\demands_location_detail;
use App\demand_project_source_detail;
use App\Guideline;
use App\demand_mypip_detail;
use DB;

class AdpAllocationController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $commonclass;

    public function __construct() {
        $this->commonclass = app('CommonClass');
    }

    public function index() {
        //$projectList=approved_project_info::all();

        $demandkproj = demand::select('project_id')->pluck('project_id')->toArray();

        $projectList = approved_project_info::where('final_submit', '=', 1)->where('pd_approval_status', '=', 1)->whereNotIn('unapprove_project_id', $demandkproj)->with('approved_project_source')->with('approved_project_comments')->get(); //->whereNotIn('id', $proj)
        return view('allocation.adp_allocation.index', compact('projectList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {


        $request->all();

        if (!$this->commonclass->check_privilege(0)) {
            return back()->withErrors([config('messages.4')]);
        }

        if (approved_project_info::where('unapprove_project_id', '=', $request->project_id)->where('approve_by', '=', NULL)->exists()) {
            return back()->withErrors(['This project administrative information not exist.']);
        }

        $insert = $request->validate([
            'demand_type' => 'required',
            'project_code' => 'required',
            'project_id' => 'required',
            'project_status' => 'required',
            'approved_status' => 'required',
            'project_cost_total' => 'required',
            'project_fe' => 'required',
            'project_aid' => 'required',
            'project_rpa' => 'required',
            'project_sf' => 'required',
            // 'original_fiscal_year' => 'required',
            // 'original_total' => 'required',
            // 'original_taka' => 'required',
            'actual_total' => 'required',
            'actual_total_fe' => 'required',
            'actual_taka' => 'required',
            'actual_capital' => 'required',
            'actual_capital_rpa' => 'required',
            'actual_capital_revenue' => 'required',
            'actual_cdvat' => 'required',
            'actual_cdvat_pa' => 'required',
            'actual_cdvat_rpa' => 'required',
            // 'cumulative_total' => 'required',
            // 'cumulative_taka' => 'required',
            'allocation_total' => 'required',
            'allocation_taka' => 'required',
            'allocation_revenue' => 'required',
            'capital' => 'required',
            'capital_rpa' => 'required',
            'capital_revenue' => 'required',
            'cdvat' => 'required',
            'cdvat_pa' => 'required',
            'cdvat_rpa' => 'required',
            'cdvat_dpa' => 'required',
            'allocation_others' => 'required',
            'self_finance' => 'required',
                ], [], [
            'self_finance' => 'Own Found'
        ]);
        DB::beginTransaction();

        if ($demand_id = $this->commonclass->create_custom('demand', $request->all())) {
            if (!empty($request->financing_source)) {

                foreach ($request->financing_source as $key => $v) {
                    $data [] = [

                        'demand_id' => $demand_id,
                        'project_code' => $request->project_code,
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
            if (!empty($request->division)) {


                foreach ($request->division as $key => $v) {
                    $locationdata [] = [

                        'demand_id' => $demand_id,
                        'project_code' => $request->project_code,
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

                demands_location_detail::insert($locationdata);
            }
            if (!is_null($request->nextYear)) {
                $mypipdata[] = [
                    'year' => $request->nextYear,
                    'pa' => $request->nextYearPa,
                    'gob' => $request->nextYearGob,
                    'project_id' => $request->project_id,
                    'demand_id' => $demand_id,
                    'created_by' => auth()->id(),
                    'updated_by' => auth()->id(),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s')
                ];


                $mypipdata[] = [
                    'year' => $request->afterNextYear,
                    'pa' => $request->afterNextYearPa,
                    'gob' => $request->afterNextYearGob,
                    'project_id' => $request->project_id,
                    'demand_id' => $demand_id,
                    'created_by' => auth()->id(),
                    'updated_by' => auth()->id(),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s')
                ];

                demand_mypip_detail::insert($mypipdata);
            }
            DB::commit();
            return back()->with('success', config('messages.10'));
        } else {
            DB::rollback();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Adp_Allocation  $adp_Allocation
     * @return \Illuminate\Http\Response
     */
    public function show(Adp_Allocation $adp_Allocation) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adp_Allocation  $adp_Allocation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id) {


        $project = approved_project_info::with('sectors')->with('approved_project_source')->with('sub_sectors')->with('ministries')->with('agencies')->with('approved_location')->where('unapprove_project_id', $id)->first();


        $source = ProjectSource::where('status', 1)->get();
        $ministry = ministry::where('status', 1)->get();
        $agency = agency::where('status', 1)->get();
        $divison = division::where('status', 1)->get();
        $upazila = UpazilaLocation::where('status', 1)->get();
        $sector = Sector::where('status', 1)->get();
        $subsector = SubSector::where('status', 1)->get();
        $financial_year = Guideline::where('call_notice_type', 0)->where('guideline_status', 1)->latest()->first()->fiscal_years;
        $guideline_month = Guideline::where('call_notice_type', 0)->where('guideline_status', 1)->latest()->first();




        return view('allocation.adp_allocation.edit', compact('source', 'ministry', 'agency', 'divison', 'upazila', 'sector', 'subsector', 'financial_year', 'project', 'guideline_month'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adp_Allocation  $adp_Allocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adp_Allocation $adp_Allocation) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adp_Allocation  $adp_Allocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adp_Allocation $adp_Allocation) {
        //
    }

}
