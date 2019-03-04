<?php

namespace App\Http\Controllers;

use App\ministerialmeeting;
use App\unapproved_project_info;
use App\newprojectlist;
use Carbon\Carbon;
use Cart;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class MinisterialMeetingController extends Controller {

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
    public function create() {
        $user_group = Auth::user()->user_group;
        $department_id = Auth::user()->department_id;
        DB::enableQueryLog();
        //return $user_group;
        //dd(sprintf("%02d", 8));

        if ($user_group == 16) {//programming division
            $proj = newprojectlist::select('project_id')->where('type', '=', 5)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $projnot = unapproved_project_info::select('id')->where('project_status', '=', 1)->pluck('id')->toArray();
            $unapproved_project = unapproved_project_info::select('*')->whereIn('id', $proj)->whereNotIn('id', $projnot)->get();
        } elseif ($user_group == 13 || $user_group == 15) {//Agency
            $proj = newprojectlist::select('project_id')->where('type', '=', 5)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $projnot = unapproved_project_info::select('id')->where('project_status', '=', 1)->pluck('id')->toArray();
            $unapproved_project = unapproved_project_info::select('*')->where('agency', '=', $department_id)->whereIn('id', $proj)->whereNotIn('id', $projnot)->get();
        } elseif ($user_group == 12 || $user_group == 14) {//Ministry
            $proj = newprojectlist::select('project_id')->where('type', '=', 5)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $projnot = unapproved_project_info::select('id')->where('project_status', '=', 1)->pluck('id')->toArray();
            $unapproved_project = unapproved_project_info::select('*')->where('ministry', '=', $department_id)->whereIn('id', $proj)->whereNotIn('id', $projnot)->get();
        } else if ($user_group == 11 || $user_group == 19) {//Sub Sector
            $proj = newprojectlist::select('project_id')->where('type', '=', 5)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $projnot = unapproved_project_info::select('id')->where('project_status', '=', 1)->pluck('id')->toArray();
            $unapproved_project = unapproved_project_info::select('*')->where('sub_sector', '=', $department_id)->whereIn('id', $proj)->whereNotIn('id', $projnot)->get();
        } else if ($user_group == 9 || $user_group == 10) {//Sector Divition
            $proj = newprojectlist::select('project_id')->where('type', '=', 5)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $projnot = unapproved_project_info::select('id')->where('project_status', '=', 1)->pluck('id')->toArray();
            $unapproved_project = unapproved_project_info::select('*')->where('sector', '=', $department_id)->whereIn('id', $proj)->whereNotIn('id', $projnot)->get();
        } else {
            $proj = newprojectlist::select('project_id')->where('type', '=', 1)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $unapproved_project = unapproved_project_info::select('*')->get(); //->whereNotIn('id', $proj)
        }

        //dd(DB::getQueryLog());

        return view('ministerialmeeting.create', compact('unapproved_project', 'user_group', 'commonclass'));
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

        DB::beginTransaction();

        $idata = array();
        $sdata = array();
        $ldata = array();
        $cdata = array();
        $linkdata = array();
        foreach ($request->chkproject as $key => $val) {

//            if (unapproved_project_info::where('id', '=', $val)->where('approve_by', '=', NULL)->exists()) {
//                return redirect('ministerialmeeting/create')->withErrors(['This project administrative information not exist.']);
//            }

            if (ministerialmeeting::where('unapprove_project_id', '=', $val)->exists()) {
                return redirect('ministerialmeeting/create')->withErrors(['This Project Already Approved.']);
            }

            $pdata = unapproved_project_info::where('id', '=', $val)->get();
            $pdata = $pdata[0];

            $idata [] = [
                'unapprove_project_id' => $pdata->id,
                'project_title' => $pdata->project_title,
                'project_tiltle_bn' => $pdata->project_tiltle_bn,
                'project_type' => $pdata->project_type,
                'project_code' => $pdata->project_code_pd,
                'project_code_fd' => $pdata->project_code_fd,
                'ministry' => $pdata->ministry,
                'agency' => $pdata->agency,
                'sector' => $pdata->sector,
                'sub_sector' => $pdata->sub_sector,
                'objectives' => $pdata->objectives,
                'objectives_bn' => $pdata->objectives_bn,
                'date_of_commencement' => $pdata->date_of_commencement,
                'date_of_completion' => $pdata->date_of_completion,
                'total' => $pdata->total,
                'gob' => $pdata->gob,
                'fe' => $pdata->fe,
                'pa' => $pdata->pa,
                'rpa' => $pdata->rpa,
                'own_fund' => $pdata->own_fund,
                'exchange_rate' => $pdata->exchange_rate,
                'exchange_date' => $pdata->exchange_date,
                'approve_by' => $pdata->approve_by,
                'approve_date' => $pdata->approve_date,
                'approval_go_no' => $pdata->approval_go_no,
                'approval_level' => $pdata->approval_level,
                'administrative_by' => $pdata->administrative_by,
                'administrative_date' => $pdata->administrative_date,
                'administrative_go_no' => $pdata->administrative_go_no,
                'administrative_level' => $pdata->administrative_level,
                'file_name' => $pdata->file_name,
                'created_by' => $logged_user_id,
                'updated_by' => $logged_user_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => 1,
            ];

            $udata = [
                'project_status' => 1,
            ];
            unapproved_project_info::where('id', '=', $val)->update($udata);

            $varsiondata [] = [
                'project_id' => $pdata->id,
                'version' => 1,
                'date_of_commencement' => $pdata->date_of_commencement,
                'date_of_completion' => $pdata->date_of_completion,
                'created_by' => $logged_user_id,
                'updated_by' => $logged_user_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => 1,
            ];

            $EstimatedCostdata [] = [
                'project_id' => $pdata->id,
                'version' => 1,
                'total' => $pdata->total,
                'gob' => $pdata->gob,
                'fe' => $pdata->fe,
                'pa' => $pdata->pa,
                'rpa' => $pdata->rpa,
                'own_fund' => $pdata->own_fund,
                'exchange_rate' => $pdata->exchange_rate,
                'exchange_date' => $pdata->exchange_date,
                'created_by' => $logged_user_id,
                'updated_by' => $logged_user_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => 1,
            ];

            $source_details = DB::table('unapproved_project_source_details')->where('project_id', $val)->get();
            foreach ($source_details as $source_details) {
                $sdata [] = [
                    'unapprove_project_id' => $source_details->project_id,
                    'finanacing_source' => $source_details->finanacing_source,
                    'amount' => $source_details->amount,
                    'created_by' => $logged_user_id,
                    'updated_by' => $logged_user_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1,
                ];
            }

            $location_cost = DB::table('unapproved_project_locations')->where('project_id', $val)->get();
            foreach ($location_cost as $location_cost) {
                $ldata [] = [
                    'unapprove_project_id' => $location_cost->project_id,
                    'division' => $location_cost->division,
                    'rmo' => $location_cost->rmo,
                    'district' => $location_cost->district,
                    'upazila' => $location_cost->upazila,
                    'amount' => $location_cost->amount,
                    'created_by' => $logged_user_id,
                    'updated_by' => $logged_user_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1,
                ];
            }

            $project_comment = DB::table('unapproved_project_comment_details')->where('project_id', $val)->get();
            foreach ($project_comment as $project_comment) {
                $cdata [] = [
                    'unapprove_project_id' => $project_comment->project_id,
                    'comment_level' => $project_comment->comment_level,
                    'comments' => $project_comment->comments,
                    'created_by' => $logged_user_id,
                    'updated_by' => $logged_user_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1,
                ];
            }

            $project_linkages = DB::table('unapprove_project_linkages_and_targets')->where('project_id', $val)->get();
            foreach ($project_linkages as $project_linkages) {
                $linkdata [] = [
                    'unapprove_project_id' => $project_linkages->project_id,
                    'type' => $project_linkages->type,
                    'relaion' => $project_linkages->relaion,
                    'goal' => $project_linkages->goal,
                    'target' => $project_linkages->target,
                    'created_by' => $logged_user_id,
                    'updated_by' => $logged_user_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1,
                ];
            }
        }

        if (!empty($idata)) {

            ministerialmeeting::insert($idata);


            if (!empty($varsiondata)) {
                DB::table('approved_project_date_details')->insert($varsiondata);
            }

            if (!empty($EstimatedCostdata)) {
                DB::table('approved_project_estimated_cost')->insert($EstimatedCostdata);
            }

            if (!empty($sdata)) {
                DB::table('approved_project_source_details')->insert($sdata);
            }

            if (!empty($ldata)) {
                DB::table('approved_project_locations')->insert($ldata);
            }
            if (!empty($cdata)) {
                DB::table('approved_project_comment_details')->insert($cdata);
            }
            if (!empty($linkdata)) {
                DB::table('approved_project_linkages_and_targets')->insert($linkdata);
            }

            DB::commit();

            return redirect('ministerialmeeting/create')->with('success', 'Project Approve Successfully');
        } else {
            DB::rollback();
            //return back();
            return redirect('ministerialmeeting/create')->withErrors(['Project Approve Not Successfully.']);
        }
    }

    public function admin_store(Request $request) {
        $user_group = Auth::user()->user_group;
        $logged_user_id = Auth::user()->id;

        if (!unapproved_project_info::where('id', '=', $request->project_id)->exists()) {
            return redirect('ministerialmeeting/create')->withErrors(['This Project Not Exist.']);
        }

        $request->validate([
            'approve_by' => 'required',
            'approve_date' => 'required',
            'approval_go_no' => 'required',
            'administrative_date' => 'required',
            'administrative_go_no' => 'required'
        ]);

        $file = "";
        if ($request->hasFile('file_name')) {
            $file = $request->file_name;
        }

        $attachement_type_array = attachement_type_array();
        $filepath = "";
        if ($filepath = $this->commonclass->insert_attachement(1, $file, $request->project_id, $request->project_id, TRUE)) {
            $filepath = $filepath;
            //$path = ['file_name' => $filepath];
            //$all = array_merge($request->all(), $path);
        } else {
            $filepath = "";
            //$path = ['file_name' => ''];
            //$all = array_merge($request->all(), $path);
        }

        $udata = [
            'approve_by' => $request->approve_by,
            'approve_date' => $this->commonclass->dateToMysql($request->approve_date),
            'approval_go_no' => $request->approval_go_no,
            'approval_level' => $user_group,
            'administrative_by' => $request->approve_by,
            'administrative_date' => $this->commonclass->dateToMysql($request->administrative_date),
            'administrative_go_no' => $request->administrative_go_no,
            'administrative_level' => $user_group,
            'file_name' => $filepath
        ];
        unapproved_project_info::where('id', '=', $request->project_id)->update($udata);



        return redirect('ministerialmeeting/create')->with('success', 'Administrative Information Successfully Added');
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
