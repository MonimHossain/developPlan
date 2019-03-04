<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sector;
use App\SubSector;
use App\project_wise_ceiling_distribution_dtl;
use App\project_wise_ceiling_distribution_mst;
use App\programming_division_distribution_dtl;
use App\Ministry;
use App\FiscalYear;
use App\unapproved_project_info;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Guideline;

class Project_wise_celings_distribution extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $sector = Sector::where('status', 1)->get();
        $subsector = SubSector::where('status', 1)->get();
        $ministry = Ministry::where('status', 1)->get();
        $fiscal = fiscalYear::where('status', 1)->get();
        //$fiscalyears = FiscalYear::all();
        $project = [];
        $min = 0;
        $sub_sec = 0;
        $sec = 0;
        $fiscal_year = 0;
        $celling_for = 0;
        $min_amount = 0;
        return view('project_wise_celings.create', compact('celling_for', 'fiscal_year', 'fiscal', 'min_amount', 'min', 'sub_sec', 'sec', 'sector', 'subsector', 'ministry', 'project'));
        //
    }

    public function project_Serach(Request $request) {
        //return $request->all();
        //$fcyear=$request->fiscal_year;
        $min = $request->ministry_id? : 0;
        $sub_sec = $request->subsector_id? : 0;
        $sec = $request->sector_id? : 0;
        $fiscal_year = $request->fiscal_year? : 0;
        $celling_for = $request->celling_for? : 0;
        $sector = Sector::where('status', 1)->get();
        $subsector = SubSector::where('status', 1)->get();
        $ministry = Ministry::where('status', 1)->get();
        $fiscal = fiscalYear::where('status', 1)->get();
        $min_amount = DB::table('programming_division_distribution_msts')
                        ->join('programming_division_distribution_dtls', 'programming_division_distribution_msts.id', '=', 'programming_division_distribution_dtls.master_id')
                        ->where('fiscal_year', $request->fiscal_year)->where('ceiling_for', $request->celling_for)->where('ministry_id', $request->ministry_id)->pluck('amount');
        if ($request->ministry_id != null) {
//    $project=unapproved_project_info::where('ministry',$request->ministry_id);
            $project = DB::table('demands')
                    ->join('approved_project_info', 'demands.project_id', '=', 'approved_project_info.unapprove_project_id')
                    ->where('ministry', $request->ministry_id);
            if ($request->subsector_id != null) {
                $project = $project->where('sub_sector', $request->subsector_id);
            }
            if ($request->sector_id != null) {
                $project = $project->where('sector', $request->sector_id);
            }
            $project = $project->select('approved_project_info.project_title', 'approved_project_info.unapprove_project_id')
                    ->get();
        } else {
            $project = [];
        }
        return view('project_wise_celings.create', compact('fiscal_year', 'celling_for', 'fiscal', 'min_amount', 'min', 'sub_sec', 'sec', 'sector', 'sector', 'subsector', 'ministry', 'project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
       
        'balance' => 'required',
    ]);
        $checkGuideline = true;
        $user_group = auth()->user()->user_group;
        if ($user_group == 13 || $user_group == 15) {//Agency
            $date = Guideline::where('fiscal_year', $request->fiscal_year)->where('guideline_for', $request->celling_for)->where('call_notice_type', 1)->latest()->first()->agency_date ?? null;

            if ($date < date('Y-m-d')) {
                $checkGuideline = false;
            } else {
                $checkGuideline = true;
            }
        } elseif ($user_group == 12 || $user_group == 14) {//Ministry
            $date = Guideline::where('fiscal_year', $request->fiscal_year)->where('guideline_for', $request->celling_for)->where('call_notice_type', 1)->latest()->first()->ministry_date ?? null;

            if ($date < date('Y-m-d')) {
                $checkGuideline = false;
            } else {
                $checkGuideline = true;
            }
        } elseif ($user_group == 9 || $user_group == 10) {//Sector Divition
            $date = Guideline::where('fiscal_year', $request->fiscal_year)->where('guideline_for', $request->celling_for)->where('call_notice_type', 1)->latest()->first()->sector_division_date ?? null;

            if ($date < date('Y-m-d')) {
                $checkGuideline = false;
            } else {
                $checkGuideline = true;
            }
        } else {
            $checkGuideline = true;
        }

        if (!$checkGuideline) {
            return back()->withErrors(['Guideline date expired!!']);
        }


        $logged_user_id = Auth::user()->id;
        $verify = project_wise_ceiling_distribution_mst::where('ministry_id', $request->ministry_id)->get();
        if (count($verify) > 0) {
            return back()->withErrors(['This Ministry celings distribution data already exist please update this from edit section!!']);
        }
        $celing_mst = new project_wise_ceiling_distribution_mst();
        $celing_mst->sector_id = $request->sector_id;
        $celing_mst->subsector_id = $request->subsector_id;
        $celing_mst->ministry_id = $request->ministry_id;
        $celing_mst->balance = $request->balance;
        $celing_mst->fiscal_year = $request->fiscal_year;
        $celing_mst->ceiling_for = $request->celling_for;
        $celing_mst->block_allocation = $request->block_allocation;
        $celing_mst->created_by = $logged_user_id;
        $celing_mst->updated_by = $logged_user_id;
        $celing_mst->status = 1;
        $celing_mst->save();
        $celing_details = array();
        foreach ($request->project_id as $key => $v) {
            $celing_details [] = [
                'master_id' => $celing_mst->id,
                'project_id' => $v,
                'amount' => $request->distribution[$key],
                'created_by' => $logged_user_id,
                'updated_by' => $logged_user_id,
                'status' => 1,
            ];
        }
        if (!empty($celing_details)) {
            project_wise_ceiling_distribution_dtl::insert($celing_details);
        }

//                return $celing_details ;    
        return redirect('project_celings/66')->with('success', 'Saved Successfully');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $project_celling = project_wise_ceiling_distribution_mst::where('status', 1)->get();
        return view('project_wise_celings.show', compact('project_celling'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
//     $project = DB::table('project_wise_ceiling_distribution_msts')
//                    ->join('project_wise_ceiling_distribution_dtls', 'project_wise_ceiling_distribution_msts.id', '=', 'project_wise_ceiling_distribution_dtls.master_id')
//                    ->where('id',$id)->get();  
        $celling_mst = project_wise_ceiling_distribution_mst::find($id);
        $celing_dtls = project_wise_ceiling_distribution_dtl::where('master_id', 1)->get();
        $fiscal = fiscalYear::where('status', 1)->get();
        //return $celing_dtls ;
        $sector = Sector::where('status', 1)->get();
        $subsector = SubSector::where('status', 1)->get();
        $ministry = Ministry::where('status', 1)->get();
        $project = [];
        $min = 0;
        $sub_sec = 0;
        $sec = 0;
        return view('project_wise_celings.edit', compact('fiscal', 'celling_mst', 'celing_dtls', 'min', 'sub_sec', 'sec', 'sector', 'subsector', 'ministry', 'project'));
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
        $checkGuideline = true;
        $user_group = auth()->user()->user_group;
        if ($user_group == 13 || $user_group == 15) {//Agency
            $date = Guideline::where('fiscal_year', $request->fiscal_year)->where('guideline_for', $request->celling_for)->where('call_notice_type', 1)->latest()->first()->agency_date ?? null;

            if ($date < date('Y-m-d')) {
                $checkGuideline = false;
            } else {
                $checkGuideline = true;
            }
        } elseif ($user_group == 12 || $user_group == 14) {//Ministry
            $date = Guideline::where('fiscal_year', $request->fiscal_year)->where('guideline_for', $request->celling_for)->where('call_notice_type', 1)->latest()->first()->ministry_date ?? null;

            if ($date < date('Y-m-d')) {
                $checkGuideline = false;
            } else {
                $checkGuideline = true;
            }
        } elseif ($user_group == 9 || $user_group == 10) {//Sector Divition
            $date = Guideline::where('fiscal_year', $request->fiscal_year)->where('guideline_for', $request->celling_for)->where('call_notice_type', 1)->latest()->first()->sector_division_date ?? null;

            if ($date < date('Y-m-d')) {
                $checkGuideline = false;
            } else {
                $checkGuideline = true;
            }
        } else {
            $checkGuideline = true;
        }

        if (!$checkGuideline) {
            return back()->withErrors(['Guideline date expired!!']);
        }
        $logged_user_id = Auth::user()->id;
        $celing_mst = project_wise_ceiling_distribution_mst::find($id);
        $celing_mst->sector_id = $request->sector_id;
        $celing_mst->subsector_id = $request->subsector_id;
        $celing_mst->ministry_id = $request->ministry_id;
        $celing_mst->balance = $request->balance;
        $celing_mst->ceiling_for = $request->celling_for;
        $celing_mst->fiscal_year = $request->fiscal_year;
        $celing_mst->block_allocation = $request->block_allocation;
        $celing_mst->created_by = $logged_user_id;
        $celing_mst->updated_by = $logged_user_id;
        $celing_mst->status = 1;
        $celing_mst->update();
        $res = project_wise_ceiling_distribution_dtl::where('master_id', $id)->delete();
        $celing_details = array();
        foreach ($request->project_id as $key => $v) {
            $celing_details [] = [
                'master_id' => $celing_mst->id,
                'project_id' => $v,
                'amount' => $request->distribution[$key],
                'created_by' => $logged_user_id,
                'updated_by' => $logged_user_id,
                'status' => 1,
            ];
        }

        if (!empty($celing_details)) {
            project_wise_ceiling_distribution_dtl::insert($celing_details);
        }

//                return $celing_details ;


        return redirect('project_celings/66')->with('success', 'Update Successfully');

        //
    }

    public function special_acount($id) {
        project_wise_ceiling_distribution_mst::where('id', $id)->update(['is_special_account' => 1]);
        return back()->with('success', 'Special Acount Created Succesfully');
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
