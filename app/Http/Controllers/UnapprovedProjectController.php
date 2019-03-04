<?php

namespace App\Http\Controllers;

use App\agency;
use App\ClaimateChangeGoal;
use App\ClimateChangeTarget;
use App\district;
use App\division;
use App\Guideline;
use App\ministry;
use App\gender_goal;
use App\gender_goal_target;
use App\PovertyGoal;
use App\MultiyearGoal;
use App\PovertyTarget;
use App\MultiyearTarget;
use App\pppgole;
use App\ppptargets;
use App\ProjectSource;
use App\ProjectType;
use App\rmo;
use App\sdgsgole;
use App\sdgstargets;
use App\Sector;
use App\SubSector;
use App\unapprove_project_linkages_and_target;
use App\unapproved_project_comment_details;
use App\unapproved_project_component_details;
use App\unapproved_project_info;
use App\unapproved_project_locations;
use App\unapproved_project_source_details;
use App\UpazilaLocation;
use App\newprojectlist;
use Carbon\Carbon;
use Cart;
use http\Client\Curl\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnapprovedProjectController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     *
     */
    public $commonclass;

    public function __construct() {
        $this->commonclass = app('CommonClass');
    }

    public function index() {
        $user_group = Auth::user()->user_group;
        $user_id = Auth::user()->id;
        $department_id = Auth::user()->department_id;

        //$child_user = User::where('parent_user', '=', $user_id)->pluck('id')->toArray();
        $backproj = array();
        $notaddproject = array();
        $checkerbackproj = array();

        if ($user_group == 13 || $user_group == 15) {//Agency
            $backproj = newprojectlist::select('project_id')->where('type', '=', 1)->where('is_back', '=', 1)->pluck('project_id')->toArray();
            $checkerbackproj = newprojectlist::select('project_id')->where('type', '=', 1)->where('back_checker', '=', 1)->pluck('project_id')->toArray();
            $proj = newprojectlist::select('project_id')->where('type', '=', 1)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $projnot = newprojectlist::select('project_id')->where('type', '=', 1)->where('send_maker', '=', 1)->pluck('project_id')->toArray();
            $notaddproject = array_merge($proj, $projnot);

            $unapproved_project_list = unapproved_project_info::where('unapproved_project_infos.created_by', $user_id)->where('agency', '=', $department_id)->whereNotIn('unapproved_project_infos.id', $notaddproject)->with('unapproved_source_details')->with('unapproved_comments')->get();
        } elseif ($user_group == 12 || $user_group == 14) {//Ministry
            $backproj = newprojectlist::select('project_id')->where('type', '=', 2)->where('is_back', '=', 1)->pluck('project_id')->toArray();
            $checkerbackproj = newprojectlist::select('project_id')->where('type', '=', 2)->where('back_checker', '=', 1)->pluck('project_id')->toArray();
            $proj = newprojectlist::select('project_id')->where('type', '=', 1)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $projnot = newprojectlist::select('project_id')->where('type', '=', 2)->where(function($q) {
                        $q->where('is_forward', '=', 1)->orWhere('send_maker', '=', 1);
                    })->pluck('project_id')->toArray();

            $unapproved_project_list = unapproved_project_info::where('ministry', '=', $department_id)->whereIn('unapproved_project_infos.id', $proj)->whereNotIn('unapproved_project_infos.id', $projnot)->with('unapproved_source_details')->with('unapproved_comments')->get();
        } else if ($user_group == 11 || $user_group == 19) {//Sub Sector
            $backproj = newprojectlist::select('project_id')->where('type', '=', 3)->where('is_back', '=', 1)->pluck('project_id')->toArray();
            $checkerbackproj = newprojectlist::select('project_id')->where('type', '=', 3)->where('back_checker', '=', 1)->pluck('project_id')->toArray();
            $proj = newprojectlist::select('project_id')->where('type', '=', 2)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $projnot = newprojectlist::select('project_id')->where('type', '=', 3)->where(function($q) {
                        $q->where('is_forward', '=', 1)->orWhere('send_maker', '=', 1);
                    })->pluck('project_id')->toArray();

            $unapproved_project_list = unapproved_project_info::where('sub_sector', '=', $department_id)->whereIn('id', $proj)->whereNotIn('id', $projnot)->with('unapproved_source_details')->with('unapproved_comments')->get();
        } else if ($user_group == 9 || $user_group == 10) {//Sector Divition
            $backproj = newprojectlist::select('project_id')->where('type', '=', 4)->where('is_back', '=', 1)->pluck('project_id')->toArray();
            $checkerbackproj = newprojectlist::select('project_id')->where('type', '=', 4)->where('back_checker', '=', 1)->pluck('project_id')->toArray();
            $proj = newprojectlist::select('project_id')->where('is_forward', '=', 1)->where(function($q) {
                        $q->where('type', '=', 3)->orWhere('type', '=', 2);
                    })->pluck('project_id')->toArray();
            $projnot = newprojectlist::select('project_id')->where('type', '=', 4)->where(function($q) {
                        $q->where('is_forward', '=', 1)->orWhere('send_maker', '=', 1);
                    })->pluck('project_id')->toArray();

            $unapproved_project_list = unapproved_project_info::where('sector', '=', $department_id)->whereIn('id', $proj)->whereNotIn('id', $projnot)->with('unapproved_source_details')->with('unapproved_comments')->get();
        } else if ($user_group == 16) {//programming division
            $backproj = newprojectlist::select('project_id')->where('type', '=', 5)->where('is_back', '=', 1)->pluck('project_id')->toArray();
            $checkerbackproj = newprojectlist::select('project_id')->where('type', '=', 5)->where('back_checker', '=', 1)->pluck('project_id')->toArray();
            $proj = newprojectlist::select('project_id')->where('type', '=', 4)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $projnot = newprojectlist::select('project_id')->where('type', '=', 5)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $unapproved_project_list = unapproved_project_info::whereIn('id', $proj)->whereNotIn('id', $projnot)->with('unapproved_source_details')->with('unapproved_comments')->get();
        } else {
            $proj = newprojectlist::select('project_id')->where('type', '=', 1)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $unapproved_project_list = unapproved_project_info::with('unapproved_source_details')->with('unapproved_comments')->get(); //->whereNotIn('id', $proj)
        }

        return view('unapproved_project_creation.index', compact('unapproved_project_list', 'backproj', 'checkerbackproj', 'user_group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $is_user_department = Auth::user()->department_id;
        $user_group = Auth::user()->user_group;

        if ($is_user_department == null) {
            $parent = Auth::user()->parent_user;
            $user = \App\User::find($parent);
            $user_department = $user->department_id;
        } else {
            $user_department = $is_user_department;
        }

        $end_date = Guideline::where('guideline_status', 1)->where('call_notice_type', 0)->first();
        if ($user_group == 13 || $user_group == 15) {//Agency
            $guidelinedate = $end_date->agency_date;
            $ministry_select = agency::find($user_department);
            $user_ministry = $ministry_select->ministry_id;
        } elseif ($user_group == 12 || $user_group == 14) {//Ministry
            $guidelinedate = $end_date->ministry_date;
            $user_ministry = 0;
        } elseif ($user_group == 11) {//Sub Sector
            $guidelinedate = $end_date->sector_division_date;
            $user_ministry = 0;
        } elseif ($user_group == 10) {//Sector Divition
            $guidelinedate = $end_date->sector_division_date;
            $user_ministry = 0;
        } else {
            $guidelinedate = $end_date->sector_division_date;
            $user_ministry = 0;
        }

        $currentDate = date('Y-m-d');
        if ($guidelinedate >= $currentDate) {
            
        } else {
            return back()->withErrors(['Guideline Date has been Expired.']);
            //return redirect('newprojectlist/create')->withErrors(['Guideline Date has been Expired.']);
        }
        $source = ProjectSource::where('status', 1)->get();
        $ministry = ministry::where('status', 1)->get();
        $agency = agency::where('status', 1)->get();
        $divison = division::where('status', 1)->get();
        $upazila = UpazilaLocation::where('status', 1)->get();
        $sector = Sector::where('status', 1)->get();
        $subsector = SubSector::where('status', 1)->get();
        $sdgsgoal = sdgsgole::where('status', 1)->get();
        $targets = sdgstargets::where('status', 1)->get();
        $projecttype = ProjectType::where('status', 1)->get();
        $climate_changes = ClaimateChangeGoal::where('status', 1)->get();
        $climate_target = ClimateChangeTarget::where('status', 1)->get();
        $proverty = PovertyGoal::where('status', 1)->get();
        $provery_target = PovertyTarget::where('status', 1)->get();
        $pppgoal = pppgole::where('status', 1)->get();
        $ppp_target = ppptargets::where('status', 1)->get();
        $rmo = rmo::where('status', 1)->get();
        $district = district::where('status', 1)->get();
        $m_goal = MultiyearGoal::where('status', 1)->get();
        $m_target = MultiyearTarget::where('status', 1)->get();
        $g_goal = gender_goal::where('status', 1)->get();
        $g_target = gender_goal_target::where('status', 1)->get();
//        return $user_department;
        return view('unapproved_project_creation.create', compact('g_goal', 'g_target', 'm_goal', 'm_target', 'user_group', 'source', 'ministry', 'agency', 'divison', 'upazila', 'sector', 'subsector', 'sdgsgoal', 'targets', 'projecttype', 'climate_changes', 'climate_target', 'proverty', 'provery_target', 'pppgoal', 'ppp_target', 'rmo', 'district', 'user_department', 'user_ministry'));


        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $logged_user_id = Auth::user()->id;
        if ($request->division) {
//            return $request->all();
            $input = $request->all();
            $rules = [];
            foreach ($input['division'] as $key => $val) {
                $rules['division.' . $key] = 'required|distinct|min:1';
//                $rules['rmo.'.$key] = 'required|distinct|min:1';
                $rules['district.' . $key] = 'required|distinct|min:1';
                $rules['upazila.' . $key] = 'required|distinct|min:1';
            }
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return redirect(url("newproject/create#tab2"))->withErrors(['At Least One Location Should Be Added']);
            }
            $this->project_location_wise_cost_info($request);
            return redirect(url("newproject/create#tab3"))->with('success', config('messages.1'));
        } elseif ($request->savebtn) {
            $location = unapproved_project_locations::where('project_id', Session::get('projectid'))->get();
            if (count($location) >= 1) {
                unapproved_project_info::where('id', Session::get('projectid'))->update(['isdraft' => 0]);
                Session::forget('projectid');
                Session::forget('decode');
                return redirect('newproject')->with('success', 'Saved Successfully');
            } else {
                return redirect(url("newproject/create#tab2"))->withErrors(['At Least One Location Should Be Added']);
            }
        } elseif ($request->savegoal == 2) {
            if ($request->sdgs_rel == 1) {
                $sdgsdata = array();
                foreach ($request->sdgsgoal as $key => $v) {
                    $sdgsdata [] = [
                        'project_id' => Session::get('projectid'),
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
                    unapprove_project_linkages_and_target::insert($sdgsdata);
                }
            }

            if ($request->climate_rel == 1) {
                $clidata = array();
                foreach ($request->climategoal as $key => $v) {
                    $clidata [] = [
                        'project_id' => Session::get('projectid'),
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
                    unapprove_project_linkages_and_target::insert($clidata);
                }
            }
            if ($request->poverty_rel == 1) {
                $provdata = array();
                foreach ($request->povertygoal as $key => $v) {
                    $provdata [] = [

                        'project_id' => Session::get('projectid'),
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
                    unapprove_project_linkages_and_target::insert($provdata);
                }
            }
            if ($request->ppp_rel == 1) {
                $pppdata = array();
                $pppdata [] = [
                    'project_id' => Session::get('projectid'),
                    'type' => 4,
                    'relaion' => 1,
                    'goal' => 0,
                    'target' => 0,
                    'created_by' => $logged_user_id,
                    'updated_by' => $logged_user_id,
                    'status' => 1,
                ];
            }
            if (!empty($pppdata)) {
                unapprove_project_linkages_and_target::insert($pppdata);
            }
            if ($request->multi_plan_rel == 1) {
                $multi_ydata = array();
                foreach ($request->m_goals as $key => $v) {
                    $multi_ydata [] = [
                        'project_id' => Session::get('projectid'),
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
                    unapprove_project_linkages_and_target::insert($multi_ydata);
                }
            }
            if ($request->gender_rel == 1) {
                $gender_data = array();
                foreach ($request->gendergoal as $key => $v) {
                    $gender_data [] = [
                        'project_id' => Session::get('projectid'),
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
                    unapprove_project_linkages_and_target::insert($gender_data);
                }
            }



            return redirect(url("newproject/create#tab4"))->with('success', config('messages.1'));
        } elseif ($request->savebasic == 1) {
//            return $request->all();
            $request->validate([
                'project_title' => 'required',
                'project_type' => 'required',
                'project_tiltle_bn' => 'required',
                'objectives' => 'required',
                'objectives_bn' => 'required',
                'total' => 'required',
                'gob' => 'required',
                'fe' => 'required',
                'pa' => 'required',
                'rpa' => 'required',
                'own_fund' => 'required',
                'exchange_rate' => 'required',
                'exchange_date' => 'required',
                'date_of_commencement' => 'required',
                'date_of_completion' => 'required',
                'ministry' => 'required',
                'agency' => 'required',
                'sector' => 'required',
                'sub_sector' => 'required',
                'exchange_currency' => 'required',
                'availability_of_foreign_aid' => 'required',
                'approval_status' => 'required',
            ]);
            //key generate
            $year = 2019;
            $sec = Sector::find($request->sector);
            $sec_key = $sec->keyword;
            $subsec = SubSector::find($request->sub_sector);
            $subsec_key = $subsec->keyword;
            $min = ministry::find($request->ministry);
            $min_key = $min->keyword;
            $agen = agency::find($request->agency);
            $agen_key = $agen->keyword;
            $ptype = ProjectType::find($request->project_type);
            $ptype_key = $ptype->keyword;
            $keyid = unapproved_project_info::orderBy('id', 'desc')->pluck('id')->first();
            $key_id = $keyid + 1;
            $key_s = sprintf("%02s", $sec_key);
            $key_sub_s = sprintf("%02s", $subsec_key);
            $key_m = sprintf("%02s", $min_key);
            $key_ag = sprintf("%02s", $agen_key);
            $key_p_t = sprintf("%02s", $ptype_key);
            $key_i_d = sprintf("%03d", $key_id);
            $dcode = $year . '_' . $key_s . '_' . $key_sub_s . '_' . $key_m . '_' . $key_ag . '_' . $key_p_t . '_' . $key_i_d;
//endgenerate
            $exchange_date = $this->getMySqlTimeFormat($request->exchange_date);
            $date_of_commencement = $this->getMySqlTimeFormat($request->date_of_commencement);
            $date_of_completion = $this->getMySqlTimeFormat($request->date_of_completion);
            $unapproved_project = new unapproved_project_info();
            $unapproved_project->project_title = $request->project_title;
            $unapproved_project->project_type = $request->project_type;
            $unapproved_project->project_code_pd = $dcode;

            $unapproved_project->project_tiltle_bn = $request->project_tiltle_bn;
            $unapproved_project->ministry = $request->ministry;
            $unapproved_project->agency = $request->agency;
            $unapproved_project->sector = $request->sector;
            $unapproved_project->sub_sector = $request->sub_sector;
            $unapproved_project->objectives = $request->objectives;
            $unapproved_project->objectives_bn = $request->objectives_bn;
            $unapproved_project->total = $request->total;
            $unapproved_project->gob = $request->gob;
            $unapproved_project->fe = $request->fe;
            $unapproved_project->pa = $request->pa;
            $unapproved_project->rpa = $request->rpa;
            $unapproved_project->own_fund = $request->own_fund;
            $unapproved_project->exchange_currency = $request->exchange_currency;
            $unapproved_project->exchange_rate = $request->exchange_rate;
            $unapproved_project->availability_of_foreign_aid = $request->availability_of_foreign_aid;
            $unapproved_project->approval_status = $request->approval_status;
            $unapproved_project->exchange_date = $exchange_date;
            $unapproved_project->date_of_commencement = $date_of_commencement;
            $unapproved_project->date_of_completion = $date_of_completion;
            $unapproved_project->created_by = $logged_user_id;
            $unapproved_project->updated_by = $logged_user_id;
            $unapproved_project->status = 1;
            $unapproved_project->save();
            Session::put('projectid', $unapproved_project->id);
            Session::put('decode', $dcode);
            foreach ($request->source as $key => $v) {
                $data [] = [
                    'project_id' => $unapproved_project->id,
                    'finanacing_source' => $v,
                    'amount' => $request->amount[$key],
                    'created_by' => $logged_user_id,
                    'updated_by' => $logged_user_id,
                    'status' => 1,
                ];
            }
            unapproved_project_source_details::insert($data);
            $cartcomponents = Cart::content();
            foreach ($cartcomponents as $cartcomponents) {
                $componentdetails = new unapproved_project_component_details();
                $componentdetails->project_id = $unapproved_project->id;
                $componentdetails->serial_number = $cartcomponents->id;
                $componentdetails->components_name = $cartcomponents->name;
                $componentdetails->unit_cost = $cartcomponents->price;
                $componentdetails->quantity = $cartcomponents->qty;
                $componentdetails->estimated_cost = $cartcomponents->options->ecost;
                $componentdetails->created_by = $logged_user_id;
                $componentdetails->updated_by = $logged_user_id;
                $componentdetails->status = 1;
                $componentdetails->save();
                Cart::destroy();
            }
//            return redirect('newproject/create')->with('success', 'Saved Successfully');

            return redirect(url("newproject/create#tab2"))->with('success', config('messages.1'));
        }
    }

    public function getMySqlTimeFormat($dateString) {
        try {
            return Carbon::createFromFormat('d-m-Y\TH:i:s.uT', $dateString);
        } catch (\Exception $ex) {
            try {
                //dd(Carbon::createFromFormat('Y-m-d', $dateString));
                return Carbon::createFromFormat('d-m-Y', $dateString);
            } catch (\Exception $ex) {
                
            }
        }
        return null;
    }

    public function project_location_wise_cost_info($request) {
        $logged_user_id = Auth::user()->id;
        foreach ($request->division as $key => $v) {
            $data [] = [
                'project_id' => Session::get('projectid'),
                'division' => $v,
//                'rmo' => $request->rmo[$key],
                'rmo' => 0,
                'district' => $request->district[$key],
                'upazila' => $request->upazila[$key],
                'amount' => $request->amount[$key],
                'created_by' => $logged_user_id,
                'updated_by' => $logged_user_id,
                'status' => 1,
            ];
        }

        unapproved_project_locations::insert($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $un_project = unapproved_project_info::find($id);

        $project_source = unapproved_project_source_details::where('project_id', $id)->get();

        $component_list = unapproved_project_component_details::where('project_id', $id)->get();

        $location_cost = unapproved_project_locations::where('project_id', $id)->get();

        $comments = unapproved_project_comment_details::where('project_id', $id)->get();

        $sdgs = unapprove_project_linkages_and_target::where('project_id', $id)->where('type', 1)->get();

        // return $component_list;
        //
        return view('unapproved_project_creation.show_unappeoved_project', compact('un_project', 'project_source', 'component_list', 'location_cost', 'comments', 'sdgs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //$show_editministry=ministry::find($id);
        $project = unapproved_project_info::find($id);
        $projecttype = ProjectType::where('status', 1)->get();
        $edit_source = unapproved_project_source_details::where('status', 1)->where('project_id', $id)->get();
        $editcomponent = unapproved_project_component_details::where('status', 1)->where('project_id', $id)->get();
        $edit_location = unapproved_project_locations::where('status', 1)->where('project_id', $id)->get();
        $edit_sdgs = unapprove_project_linkages_and_target::where('status', 1)->where('project_id', $id)->where('type', 1)->get();
        $a_edit_climate = unapprove_project_linkages_and_target::where('status', 1)->where('project_id', $id)->where('type', 2)->get();
        $a_edit_poverty = unapprove_project_linkages_and_target::where('status', 1)->where('project_id', $id)->where('type', 3)->get();
        $a_edit_ppp = unapprove_project_linkages_and_target::where('status', 1)->where('project_id', $id)->where('type', 4)->get();
        $a_edit_mul_y = unapprove_project_linkages_and_target::where('status', 1)->where('project_id', $id)->where('type', 5)->get();
        $a_edit_gender = unapprove_project_linkages_and_target::where('status', 1)->where('project_id', $id)->where('type', 6)->get();
        $rmo = rmo::where('status', 1)->get();
        $sdgsgoal = sdgsgole::where('status', 1)->get();
        $targets = sdgstargets::where('status', 1)->get();
        $projecttype = ProjectType::where('status', 1)->get();
        $climate_changes = ClaimateChangeGoal::where('status', 1)->get();
        $climate_target = ClimateChangeTarget::where('status', 1)->get();
        $proverty = PovertyGoal::where('status', 1)->get();
        $provery_target = PovertyTarget::where('status', 1)->get();
        $pppgoal = pppgole::where('status', 1)->get();
        $ppp_target = ppptargets::where('status', 1)->get();
        //return $edit_source;
        $source = ProjectSource::where('status', 1)->get();
        $ministry = ministry::where('status', 1)->get();
        $agency = agency::where('status', 1)->get();
        $divison = division::where('status', 1)->get();
        $upazila = UpazilaLocation::where('status', 1)->get();
        $sector = Sector::where('status', 1)->get();
        $subsector = SubSector::where('status', 1)->get();
        $sdgsgoal = sdgsgole::where('status', 1)->get();
        $district = district::where('status', 1)->get();
        $district2 = district::where('status', 1)->get();
        $m_goal = MultiyearGoal::where('status', 1)->get();
        $m_target = MultiyearTarget::where('status', 1)->get();
        $g_goal = gender_goal::where('status', 1)->get();
        $g_target = gender_goal_target::where('status', 1)->get();
        return view('unapproved_project_creation.edit', compact('g_goal', 'g_target', 'a_edit_gender', 'm_goal', 'm_target', 'source', 'ministry', 'agency', 'divison', 'upazila', 'sector', 'subsector', 'sdgsgoal', 'project', 'edit_source', 'editcomponent', 'edit_location', 'rmo', 'edit_sdgs', 'sdgsgoal', 'targets', 'projecttype', 'climate_changes', 'climate_target', 'proverty', 'provery_target', 'a_edit_mul_y', 'pppgoal', 'ppp_target', 'a_edit_climate', 'a_edit_poverty', 'a_edit_ppp', 'district', 'projecttype'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // return $unapproved_project;
        $logged_user_id = Auth::user()->id;
        if ($request->division) {
//            return $request->all();
            $res = unapproved_project_locations::where('project_id', $id)->delete();
            foreach ($request->division as $key => $v) {
                $data [] = [
                    'project_id' => $id,
                    'division' => $v,
//                    'rmo' => $request->rmo[$key],
                    'rmo' => 0,
                    'district' => $request->district[$key],
                    'upazila' => $request->upazila[$key],
                    'amount' => $request->amount[$key],
                    'created_by' => $logged_user_id,
                    'updated_by' => $logged_user_id,
                    'status' => 1,
                ];
            }
            unapproved_project_locations::insert($data);
            // $this->project_location_wise_cost_info($request);
            return redirect(url("/newproject/$id/edit#tab3"))->with('success', config('messages.2'));
        } elseif ($request->savebtn) {
            unapproved_project_info::where('id', $id)->update(['isdraft' => 0]);
            Session::forget('projectid');
            return redirect(url("/newproject"))->with('success', config('messages.2'));
        } elseif ($request->linkage == 1) {
            //  $res = unapprove_project_linkages_and_target::where('project_id', $id)->delete();
            if ($request->sdgs_rel == 1) {
                $res = unapprove_project_linkages_and_target::where('project_id', $id)->where('type', 1)->delete();
                $sdgsdata = array();
                foreach ($request->sdgsgoal as $key => $v) {
                    $sdgsdata [] = [
                        'project_id' => $id,
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
                    unapprove_project_linkages_and_target::insert($sdgsdata);
                }
            } else {
                $res = unapprove_project_linkages_and_target::where('project_id', $id)->where('type', 1)->delete();
            }

            if ($request->climate_rel == 1) {
                $res = unapprove_project_linkages_and_target::where('project_id', $id)->where('type', 2)->delete();
                $clidata = array();
                foreach ($request->climategoal as $key => $v) {
                    $clidata [] = [
                        'project_id' => $id,
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
                    unapprove_project_linkages_and_target::insert($clidata);
                }
            } else {
                $res = unapprove_project_linkages_and_target::where('project_id', $id)->where('type', 2)->delete();
            }
            if ($request->poverty_rel == 1) {
                $res = unapprove_project_linkages_and_target::where('project_id', $id)->where('type', 3)->delete();
                $provdata = array();
                foreach ($request->povertygoal as $key => $v) {
                    $provdata [] = [
                        'project_id' => $id,
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
                    unapprove_project_linkages_and_target::insert($provdata);
                }
            } else {
                $res = unapprove_project_linkages_and_target::where('project_id', $id)->where('type', 3)->delete();
            }

            if ($request->ppp_rel == 1) {
                $res = unapprove_project_linkages_and_target::where('project_id', $id)->where('type', 4)->delete();
                $pppdata = array();
                $pppdata [] = [
                    'project_id' => $id,
                    'type' => 4,
                    'relaion' => 1,
                    'goal' => 0,
                    'target' => 0,
                    'created_by' => $logged_user_id,
                    'updated_by' => $logged_user_id,
                    'status' => 1,
                ];
            } else {
                $res = unapprove_project_linkages_and_target::where('project_id', $id)->where('type', 4)->delete();
            }
            if (!empty($pppdata)) {
                unapprove_project_linkages_and_target::insert($pppdata);
            }
            if ($request->multi_plan_rel == 1) {
                $res = unapprove_project_linkages_and_target::where('project_id', $id)->where('type', 5)->delete();

                $multi_ydata = array();
                foreach ($request->m_goals as $key => $v) {
                    $multi_ydata [] = [
                        'project_id' => $id,
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
                    unapprove_project_linkages_and_target::insert($multi_ydata);
                }
            } else {
                $res = unapprove_project_linkages_and_target::where('project_id', $id)->where('type', 5)->delete();
            }

            //gender
            if ($request->gender_rel == 1) {
                $res = unapprove_project_linkages_and_target::where('project_id', $id)->where('type', 6)->delete();
                $gender_data = array();
                foreach ($request->gendergoal as $key => $v) {
                    $gender_data [] = [
                        'project_id' => $id,
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
                    unapprove_project_linkages_and_target::insert($gender_data);
                }
            } else {
                $res = unapprove_project_linkages_and_target::where('project_id', $id)->where('type', 6)->delete();
            }

            return redirect(url("/newproject/$id/edit#tab4"))->with('success', config('messages.2'));
        } elseif ($request->updatebasic == 1) {

            $request->validate([
                'project_title' => 'required',
                'project_type' => 'required',
                'project_tiltle_bn' => 'required',
                'objectives' => 'required',
                'objectives_bn' => 'required',
                'total' => 'required',
                'gob' => 'required',
                'fe' => 'required',
                'pa' => 'required',
                'rpa' => 'required',
                'own_fund' => 'required',
                'exchange_rate' => 'required',
                'exchange_date' => 'required',
                'date_of_commencement' => 'required',
                'date_of_completion' => 'required',
                'approval_status' => 'required',
            ]);

            $year = 2019;
            $mininstry = sprintf("%02d", $request->ministry);
            $agency = sprintf("%02d", $request->agency);
            $sector = sprintf("%02d", $request->sector);
            $pt = 'pt';

            $dcode = $year . $mininstry . $agency . $sector . $pt;
            $exchange_date = $this->getMySqlTimeFormat($request->exchange_date);
            $date_of_commencement = $this->getMySqlTimeFormat($request->date_of_commencement);
            $date_of_completion = $this->getMySqlTimeFormat($request->date_of_completion);
            $unapproved_project = unapproved_project_info::find($id);
            $unapproved_project->project_title = $request->project_title;
            $unapproved_project->project_type = $request->project_type;
            $unapproved_project->project_code_pd = $dcode;

            $unapproved_project->project_tiltle_bn = $request->project_tiltle_bn;
            $unapproved_project->ministry = $request->ministry;
            $unapproved_project->agency = $request->agency;
            $unapproved_project->sector = $request->sector;
            $unapproved_project->sub_sector = $request->sub_sector;
            $unapproved_project->objectives = $request->objectives;
            $unapproved_project->objectives_bn = $request->objectives_bn;
            $unapproved_project->total = $request->total;
            $unapproved_project->gob = $request->gob;
            $unapproved_project->fe = $request->fe;
            $unapproved_project->pa = $request->pa;
            $unapproved_project->rpa = $request->rpa;
            $unapproved_project->own_fund = $request->own_fund;
            $unapproved_project->exchange_currency = $request->exchange_currency;
            $unapproved_project->exchange_rate = $request->exchange_rate;
            $unapproved_project->exchange_date = $exchange_date;
            $unapproved_project->date_of_commencement = $date_of_commencement;
            $unapproved_project->date_of_completion = $date_of_completion;
            $unapproved_project->availability_of_foreign_aid = $request->availability_of_foreign_aid;
            $unapproved_project->approval_status = $request->approval_status;
            $unapproved_project->created_by = $logged_user_id;
            $unapproved_project->updated_by = $logged_user_id;
            $unapproved_project->status = 1;
            $unapproved_project->update();
            $res = unapproved_project_source_details::where('project_id', $id)->delete();

            if ($request->source == !null) {
                foreach ($request->source as $key => $v) {
                    $data [] = [

                        'project_id' => $id,
                        'finanacing_source' => $v,
                        'amount' => $request->amount[$key],
                        'created_by' => $logged_user_id,
                        'updated_by' => $logged_user_id,
                        'status' => 1,
                    ];
                }

                unapproved_project_source_details::insert($data);
            }
            $del_component = unapproved_project_component_details::where('project_id', $id)->delete();
            if ($request->components_name == !null) {
                foreach ($request->components_name as $key => $v) {
                    $compodata = array();
                    $compodata [] = [
                        'project_id' => $id,
                        'serial_number' => 1,
                        'components_name' => $v,
                        'quantity' => $request->quantity[$key],
                        'unit_cost' => $request->unit_cost[$key],
                        'estimated_cost' => $request->estimated_cost[$key],
                        'created_by' => $logged_user_id,
                        'updated_by' => $logged_user_id,
                        'status' => 1,
                    ];

                    if (!empty($compodata)) {
                        unapproved_project_component_details::insert($compodata);
                    }
                }
                return redirect(url("/newproject/$id/edit#tab2"))->with('success', config('messages.2'));
            }

//            return back()->with('success', 'update Successfully');
            return redirect(url("/newproject/$id/edit#tab2"))->with('success', config('messages.2'));
        }
    }

    public function sendtochecker(Request $request) {

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

            $flag = 0;
            $idata = array();
            foreach ($request->chkproject as $key => $val) {
                if (newprojectlist::where('type', '=', $type)->where('project_id', '=', $val)->exists()) {
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

                    newprojectlist::where('type', '=', $type)->where('project_id', '=', $val)->update($data);
                    $flag = 1;
                } else {

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
                newprojectlist::insert($idata);
                $flag = 1;
                //return back()->with('success', 'Send Successfully');
            }

            if ($flag == 1) {
                return back()->with('success', 'Send Successfully');
            } else {
                return back()->with('success', 'Not Send Successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (!$this->commonclass->check_privilege(2)) {
            return back()->withErrors([config('messages.4')]);
        }
        if ($this->commonclass->soft_delete_custom('unapproved_project_info', $id)) {
            return redirect('newproject?mid=9')->with('success', config('messages.3'));
        } else {
            return redirect('newproject?mid=9')->with(['errors', config('messages.7')]);
        }
        return $id;

    }

    public function delete_source($pid, $sid) {
        $res = unapproved_project_source_details::where('project_id', $pid)->where('id', $sid)->delete();
        return back()->with('success', 'delete Successfully');
    }

}
