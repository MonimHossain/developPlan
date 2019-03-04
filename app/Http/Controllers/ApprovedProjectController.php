<?php

namespace App\Http\Controllers;

use App\approved_project_info;
use App\agency;
use App\division;
use App\ministry;
use App\gender_goal;
use App\gender_goal_target;
use App\ProjectSource;
use App\Sector;
use App\SubSector;
use App\MultiyearGoal;
use App\MultiyearTarget;
use App\Events\project_source;
use App\UpazilaLocation;
use App\approved_project_date_detail;
use App\approved_project_estimated_cost;
use App\approved_project_comment_details;
use App\approved_project_finance_type;
use App\approved_project_year_wise_cost;
use App\approved_project_location;
use App\approved_project_linkages_and_targets;
use App\approval_setup;
use App\sdgsgole;
use App\sdgstargets;
use App\PovertyGoal;
use App\PovertyTarget;
use App\pppgole;
use App\ppptargets;
use App\ClaimateChangeGoal;
use App\ClimateChangeTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApprovedProjectController extends Controller {

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

        $user_group = Auth::user()->user_group;
        $department_id = Auth::user()->department_id;

        if ($user_group == 13 || $user_group == 15) {//Agency
            $approved_project = approved_project_info::where('status', 1)->where('final_submit', '=', null)->where('agency', '=', $department_id)->with('approved_project_source')->with('approved_project_comments')->get();
        } elseif ($user_group == 12 || $user_group == 14) {//Ministry
            $approved_project = approved_project_info::where('status', 1)->where('final_submit', '=', null)->where('ministry', '=', $department_id)->with('approved_project_source')->with('approved_project_comments')->get();
        } else if ($user_group == 11 || $user_group == 19) {//Sub Sector
            $approved_project = approved_project_info::where('status', 1)->where('final_submit', '=', null)->where('sub_sector', '=', $department_id)->with('approved_project_source')->with('approved_project_comments')->get();
        } else if ($user_group == 9 || $user_group == 10) {//Sector Divition
            $approved_project = approved_project_info::where('status', 1)->where('final_submit', '=', null)->where('sector', '=', $department_id)->with('approved_project_source')->with('approved_project_comments')->get();
        } else {
            $approved_project = approved_project_info::where('status', 1)->where('final_submit', '=', null)->with('approved_project_source')->with('approved_project_comments')->get();
        }
        
        //return $approved_project;

        return view('approaved_projects.index', compact('approved_project', 'user_group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        $source = ProjectSource::where('status', 1)->get();
        $ministry = ministry::where('status', 1)->get();
        $agency = agency::where('status', 1)->get();
        $divison = division::where('status', 1)->get();
        $upazila = UpazilaLocation::where('status', 1)->get();
        $sector = Sector::where('status', 1)->get();
        $subsector = SubSector::where('status', 1)->get();


        return view('unapproved_project_creation.create', compact('source', 'ministry', 'agency', 'divison', 'upazila', 'sector', 'subsector'));
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
            
            $data = ['final_submit' => 1];
            approved_project_info::where('unapprove_project_id', '=', $val)->update($data);
            
        }
        
        
        return back()->with('success',config('messages.1'));
        
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
        $approval_setup = approval_setup::where('status', 1)->get();

        $a_edit_mul_y = approved_project_linkages_and_targets::where('status', 1)->where('unapprove_project_id', $id)->where('type', 5)->get();


        $sdgsgoal = sdgsgole::where('status', 1)->get();
        $edit_sdgs = approved_project_linkages_and_targets::where('status', 1)->where('unapprove_project_id', $id)->where('type', 1)->get();

        $targets = sdgstargets::where('status', 1)->get();

        $climate_changes = ClaimateChangeGoal::where('status', 1)->get();
        $climate_target = ClimateChangeTarget::where('status', 1)->get();
        $a_edit_climate = approved_project_linkages_and_targets::where('status', 1)->where('unapprove_project_id', $id)->where('type', 2)->get();

        $proverty = PovertyGoal::where('status', 1)->get();
        $provery_target = PovertyTarget::where('status', 1)->get();
        $a_edit_poverty = approved_project_linkages_and_targets::where('status', 1)->where('unapprove_project_id', $id)->where('type', 3)->get();

        $project = approved_project_info::where('unapprove_project_id', $id)->with('date_details')->with('cost_details')->with('approved_project_source')->with('finance_type')->with('year_wise_cost')->with('approved_project_comments')->with('approved_location_cost')->with('component_wise_cost')->with('approval_history')->with('linkages_and_targets')->first();

        $pppgoal = pppgole::where('status', 1)->get();
        $ppp_target = ppptargets::where('status', 1)->get();
        $a_edit_ppp = approved_project_linkages_and_targets::where('status', 1)->where('unapprove_project_id', $id)->where('type', 4)->get();
        $a_edit_gender = approved_project_linkages_and_targets::where('status', 1)->where('unapprove_project_id', $id)->where('type', 6)->get();
        $m_goal = MultiyearGoal::where('status', 1)->get();
        $m_target = MultiyearTarget::where('status', 1)->get();
        $g_goal = gender_goal::where('status', 1)->get();
        $g_target = gender_goal_target::where('status', 1)->get();

        return view('approaved_projects.edit', compact('g_goal', 'g_target', 'a_edit_gender', 'm_goal', 'm_target', 'project', 'source', 'ministry', 'agency', 'divison', 'upazila', 'sector', 'subsector', 'sdgsgoal', 'targets', 'climate_changes', 'climate_target', 'proverty', 'provery_target', 'pppgoal', 'ppp_target', 'edit_sdgs', 'a_edit_climate', 'a_edit_poverty', 'a_edit_ppp', 'a_edit_mul_y','approval_setup'));
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


        if (approved_project_info::where('unapprove_project_id', '=', $id)->where('approve_by', '=', NULL)->exists()) {
            return redirect(url("approaved_project/$id/edit#tab1"))->withErrors(['This project administrative information not exist.']);
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
        return redirect(url("approaved_project/$id/edit#tab1"))->with('success', config('messages.2'));
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

    public function link_target(Request $request, $id) {

        $logged_user_id = Auth::user()->id;
        if ($request->linkage == 1) {
            //$res = approved_project_linkages_and_targets::where('unapprove_project_id', $id)->delete();
            if ($request->sdgs_rel == 1) {
                $res = approved_project_linkages_and_targets::where('unapprove_project_id', $id)->where('type', 1)->delete();
                $sdgsdata = array();
                foreach ($request->sdgsgoal as $key => $v) {
                    $sdgsdata [] = [
                        'unapprove_project_id' => $id,
                        'type' => 1,
                        'relaion' => 1,
                        'goal' => $v,
                        'target' => $request->sdgstarget[$key],
                        'created_by' => $logged_user_id,
                        'updated_by' => $logged_user_id,
                        'status' => 1,
                    ];
                }
                if (!empty($sdgsdata)) {
                    approved_project_linkages_and_targets::insert($sdgsdata);
                }
            } else {
                $res = approved_project_linkages_and_targets::where('unapprove_project_id', $id)->where('type', 1)->delete();
            }
            if ($request->climate_rel == 1) {
                $res = approved_project_linkages_and_targets::where('unapprove_project_id', $id)->where('type', 2)->delete();
                $clidata = array();
                foreach ($request->climategoal as $key => $v) {
                    $clidata [] = [
                        'unapprove_project_id' => $id,
                        'type' => 2,
                        'relaion' => 1,
                        'goal' => $v,
                        'target' => $request->climatetarget[$key],
                        'created_by' => $logged_user_id,
                        'updated_by' => $logged_user_id,
                        'status' => 1,
                    ];
                }
                if (!empty($clidata)) {
                    approved_project_linkages_and_targets::insert($clidata);
                }
            } else {
                $res = approved_project_linkages_and_targets::where('unapprove_project_id', $id)->where('type', 2)->delete();
            }
            if ($request->poverty_rel == 1) {
                $res = approved_project_linkages_and_targets::where('unapprove_project_id', $id)->where('type', 3)->delete();
                $provdata = array();
                foreach ($request->povertygoal as $key => $v) {
                    $provdata [] = [
                        'unapprove_project_id' => $id,
                        'type' => 3,
                        'relaion' => 1,
                        'goal' => $v,
                        'target' => $request->povertytarget[$key],
                        'created_by' => $logged_user_id,
                        'updated_by' => $logged_user_id,
                        'status' => 1,
                    ];
                }
                if (!empty($provdata)) {
                    approved_project_linkages_and_targets::insert($provdata);
                }
            } else {
                $res = approved_project_linkages_and_targets::where('unapprove_project_id', $id)->where('type', 3)->delete();
            }

            if ($request->ppp_rel == 1) {
                $res = approved_project_linkages_and_targets::where('unapprove_project_id', $id)->where('type', 4)->delete();
                $pppdata = array();
                $pppdata [] = [
                    'unapprove_project_id' => $id,
                    'type' => 4,
                    'relaion' => 1,
                    'goal' => 0,
                    'target' => 0,
                    'created_by' => $logged_user_id,
                    'updated_by' => $logged_user_id,
                    'status' => 1,
                ];
            } else {
                $res = approved_project_linkages_and_targets::where('unapprove_project_id', $id)->where('type', 4)->delete();
            }
            if (!empty($pppdata)) {
                approved_project_linkages_and_targets::insert($pppdata);
            }
            if ($request->multi_plan_rel == 1) {
                $res = approved_project_linkages_and_targets::where('unapprove_project_id', $id)->where('type', 5)->delete();
                $multi_ydata = array();
                foreach ($request->m_goals as $key => $v) {
                    $multi_ydata [] = [
                        'unapprove_project_id' => $id,
                        'type' => 5,
                        'relaion' => 1,
                        'goal' => $v,
                        'target' => $request->m_target[$key],
                        'created_by' => $logged_user_id,
                        'updated_by' => $logged_user_id,
                        'status' => 1,
                    ];
                }

                if (!empty($multi_ydata)) {
                    approved_project_linkages_and_targets::insert($multi_ydata);
                }
            } else {
                $res = approved_project_linkages_and_targets::where('unapprove_project_id', $id)->where('type', 5)->delete();
            }
            //gender
            if ($request->gender_rel == 1) {
                $res = approved_project_linkages_and_targets::where('unapprove_project_id', $id)->where('type', 6)->delete();
                $gender_data = array();
                foreach ($request->gendergoal as $key => $v) {
                    $gender_data [] = [
                        'unapprove_project_id' => $id,
                        'type' => 6,
                        'relaion' => 1,
                        'goal' => $v,
                        'target' => $request->gendertarget[$key],
                        'scale' => $request->scale[$key],
                        'created_by' => $logged_user_id,
                        'updated_by' => $logged_user_id,
                        'status' => 1,
                    ];
                }

                if (!empty($gender_data)) {
                    approved_project_linkages_and_targets::insert($gender_data);
                }
            } else {
                $res = approved_project_linkages_and_targets::where('unapprove_project_id', $id)->where('type', 6)->delete();
            }
        }
        return redirect(url("approaved_project"))->with('success', config('messages.2'));
    }

    public function add_finance(Request $request) {

        $this->commonclass->create_custom('approved_project_finance_type', $request->all());
        return redirect(url("approaved_project/$request->project_id/edit#tab2"))->with('success', config('messages.1'));
    }

    public function delete_type_of_finance($id, $project_id) {

        if ($this->commonclass->soft_delete_custom('approved_project_finance_type', $id)) {
            return redirect(url("approaved_project/$project_id/edit#tab2"))->with('success', config('messages.3'));
        }
    }

    public function update_finance_type(Request $request, $id) {
        if ($this->commonclass->update_custom('approved_project_finance_type', $id, $request->except(['_token', '_method', 'project_id']))) {
            return redirect(url("approaved_project/$request->project_id/edit#tab2"))->with('success', config('messages.2'));
        }
    }

    public function update_year_wise_cost(Request $request, $id) {
        if ($this->commonclass->update_custom('approved_project_year_wise_cost', $id, $request->except(['_token', '_method', 'project_id']))) {
            return redirect(url("approaved_project/$request->project_id/edit#tab3"))->with('success', config('messages.2'));
        }
    }

    public function update_component_wise_cost(Request $request, $id) {

        if ($this->commonclass->update_custom('approved_project_component_wise_cost', $id, $request->except(['_token', '_method', 'project_id']))) {
            return redirect(url("approaved_project/$request->project_id/edit#tab5"))->with('success', config('messages.2'));
        }
    }

    public function update_location_wise_cost(Request $request, $id) {
        if ($this->commonclass->update_custom('approved_project_location', $id, $request->except(['_token', '_method', 'project_id']))) {
            return redirect(url("approaved_project/$request->project_id/edit#tab4"))->with('success', config('messages.2'));
        }
    }

    public function add_year_wise_cost(Request $request) {
        if ($this->commonclass->create_custom('approved_project_year_wise_cost', $request->all())) {
            return redirect(url("approaved_project/$request->project_id/edit#tab3"))->with('success', config('messages.1'));
        }
    }

    public function add_component_wise_cost(Request $request) {

        if ($request->save_componnent == 1) {
            if ($this->commonclass->create_custom('approved_project_component_wise_cost', $request->all())) {
                return redirect(url("approaved_project/$request->project_id/edit#tab5"))->with('success', config('messages.1'));
            }
        }
    }

    public function add_location_wise_cost(Request $request) {
        if ($this->commonclass->create_custom('approved_project_location', $request->all())) {
            return redirect(url("approaved_project/$request->unapprove_project_id/edit#tab4"))->with('success', config('messages.1'));
        }
    }

    public function add_comments_to_approve_project(Request $request) {
        $user_level = ['comment_level' => auth()->user()->user_group];
        $request->merge($user_level);

        if ($this->commonclass->create_custom('approved_project_comment_detail', $request->all())) {
            return redirect(url("approaved_project/$request->unapprove_project_id/edit#tab6"))->with('success', config('messages.1'));
        }
    }

    public function add_approval_status(Request $request) {
        $user_group = Auth::user()->user_group;
        $logged_user_id = Auth::user()->id;

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
        if ($filepath = $this->commonclass->insert_attachement(1, $file, $request->unapprove_project_id, $request->unapprove_project_id, TRUE)) {
            $filepath = $filepath;
        } else {
            $filepath = "";
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

        approved_project_info::where('unapprove_project_id', '=', $request->unapprove_project_id)->update($udata);

        $collection = collect($udata);
        $merged = $collection->merge(['project_id' => $request->unapprove_project_id, 'action_date' => date('Y-m-d')]);
        DB::table('approval_history')->insert($merged->all());

        return redirect(url("approaved_project/$request->unapprove_project_id/edit#tab7"))->with('success', config('messages.1'));
    }

}
