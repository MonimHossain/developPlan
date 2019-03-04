<?php

namespace App\Http\Controllers;

use App\approved_project_list;
use App\approved_project_info;
use App\agency;
use App\division;
use App\ministry;
use App\ProjectSource;
use App\Sector;
use App\SubSector;
use App\Events\project_source;
use App\UpazilaLocation;
use App\approved_project_date_detail;
use App\approved_project_estimated_cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovedProjectListController extends Controller {

    private $commonclass;

    public function __construct() {
        $this->commonclass = app('CommonClass');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //$approved_project=approved_project_info::where('status',1)->get();
        //return view('approaved_projects.index',compact('approved_project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $user_group = Auth::user()->user_group;
        $department_id = Auth::user()->department_id;
        
        $source = ProjectSource::where('status', 1)->get();
        $ministry = ministry::where('status', 1)->get();
        $agency = agency::where('status', 1)->get();
        $divison = division::where('status', 1)->get();
        $upazila = UpazilaLocation::where('status', 1)->get();
        $sector = Sector::where('status', 1)->get();
        $subsector = SubSector::where('status', 1)->get();
        
        if ($user_group == 13 || $user_group == 15) {//Agency
            $approved_project = approved_project_info::where('status', 1)->where('final_submit', '=', 1)->where('pd_approval_status', '=', null)->where('agency', '=', $department_id)->with('approved_project_source')->with('approved_project_comments')->get();
        } elseif ($user_group == 12 || $user_group == 14) {//Ministry
            $approved_project = approved_project_info::where('status', 1)->where('final_submit', '=', 1)->where('pd_approval_status', '=', null)->where('ministry', '=', $department_id)->with('approved_project_source')->with('approved_project_comments')->get();
        } else if ($user_group == 11 || $user_group == 19) {//Sub Sector
            $approved_project = approved_project_info::where('status', 1)->where('final_submit', '=', 1)->where('pd_approval_status', '=', null)->where('sub_sector', '=', $department_id)->with('approved_project_source')->with('approved_project_comments')->get();
        } else if ($user_group == 9 || $user_group == 10) {//Sector Divition
            $approved_project = approved_project_info::where('status', 1)->where('final_submit', '=', 1)->where('pd_approval_status', '=', null)->where('sector', '=', $department_id)->with('approved_project_source')->with('approved_project_comments')->get();
        } else {
            $approved_project = approved_project_info::where('status', 1)->where('final_submit', '=', 1)->where('pd_approval_status', '=', null)->with('approved_project_source')->with('approved_project_comments')->get();
        }

        //$approved_project = approved_project_info::where('status', 1)->where('final_submit', '=', 1)->where('pd_approval_status', '=', null)->with('approved_project_source')->with('approved_project_comments')->get();
        
        return view('approved_project_list.create', compact('approved_project', 'user_group'));
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
        
        foreach ($request->chkproject as $key => $val) {
            
            if (approved_project_info::where('unapprove_project_id', '=', $val)->where('approve_by', '=', NULL)->exists()) {
                return back()->withErrors(['This project administrative information not exist.']);
            }
            
            $data = ['pd_approval_status' => 1];
            approved_project_info::where('unapprove_project_id', '=', $val)->update($data);
            
        }
        
        
        return back()->with('success',config('messages.9'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $source = ProjectSource::where('status', 1)->get();
        $ministry = ministry::where('status', 1)->get();
        $agency = agency::where('status', 1)->get();
        $divison = division::where('status', 1)->get();
        $upazila = UpazilaLocation::where('status', 1)->get();
        $sector = Sector::where('status', 1)->get();
        $subsector = SubSector::where('status', 1)->get();
        $project = approved_project_info::where('unapprove_project_id', $id)->with('date_details')->with('cost_details')->with('approved_project_source')->first();

        return view('approaved_projects.edit', compact('project', 'source', 'ministry', 'agency', 'divison', 'upazila', 'sector', 'subsector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if ($request->hasFile('attachment')) {
            $files = $request->attachment;

            foreach ($files as $file) {

                if (!$this->commonclass->insert_attachement(2, $file, $id, $id, true)) {
                    return back()->withErrors(['Invalid file type']);
                }
            }
        }


        $ad = approved_project_date_detail::where('project_id', $id)->get()->last();

        if ($request->date_of_completion != null) {
            if (!check_date_equality($request->date_of_completion, $ad->date_of_completion)) {
                approved_project_date_detail::create(['project_id' => $id, 'date_of_commencement' => $ad->date_of_commencement, 'date_of_completion' => $this->commonclass->dateTomysql($request->date_of_completion), 'version' => $ad->version + 1, 'revision' => $request->revision, 'go_type' => $request->go_type, 'go_number' => $request->go_number]);
            }
        }

        $aec = approved_project_estimated_cost::where('project_id', $id)->get()->last();
        if ($aec->total != $request->total || $aec->gob != $request->gob || $aec->fe != $request->fe || $aec->pa != $request->pa || $aec->rpa != $request->rpa || $aec->own_fund != $request->own_fund || $aec->exchange_rate != $request->exchange_rate || $aec->exchange_date != $this->commonclass->dateTomysql($request->exchange_date) || $aec->other != $request->other) {

            $data = [
                'version' => $aec->version + 1,
                'project_id' => $id,
                'total' => $request->total,
                'gob' => $request->gob,
                'fe' => $request->fe,
                'pa' => $request->pa,
                'rpa' => $request->rpa,
                'own_fund' => $request->own_fund,
                'exchange_rate' => $request->exchange_rate,
                'exchange_date' => $this->commonclass->dateTomysql($request->exchange_date)
            ];

            $this->commonclass->create_custom('approved_project_estimated_cost', $data);
        }



        approved_project_info::where('unapprove_project_id', $id)->update($request->except(['_token', '_method', 'source', 'amount', 'date_of_completion', 'total', 'gob', 'fe', 'pa', 'rpa', 'own_fund', 'exchange_rate', 'exchange_date', 'attachment', 'revision', 'go_type', 'go_number']));

        if (!is_null($request->source[0])) {

            $data = ['source' => $request->source, 'amount' => $request->amount];
            event(new project_source($data, $id));
        }
        return back();
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
