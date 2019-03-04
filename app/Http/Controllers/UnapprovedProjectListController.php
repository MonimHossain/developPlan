<?php

namespace App\Http\Controllers;

use App\unapproved_project_info;
use App\newprojectlist;
use App\Guideline;
use App\User;
use Carbon\Carbon;
use Cart;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class UnapprovedProjectListController extends Controller {

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
        $user_id = Auth::user()->id;
        $department_id = Auth::user()->department_id;
        DB::enableQueryLog();

        $backproj=array();
        $addproject=array();
        $notaddproject=array();
        if ($user_group == 13 || $user_group == 15) {//Agency//->whereIn('created_by', $child_user)
            
            //$child_user = User::where('parent_user', '=', $user_id)->pluck('id')->toArray();
            
            $backproj = newprojectlist::select('project_id')->where('type', '=', 1)->where('is_back', '=', 1)->pluck('project_id')->toArray();
            $sbackproj = newprojectlist::select('project_id')->where('type', '=', 1)->where('send_maker', '=', 1)->pluck('project_id')->toArray();
            $proj = newprojectlist::select('project_id')->where('type', '=', 1)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $unapproved_project = unapproved_project_info::where('agency', '=', $department_id)->where('isdraft', '=', 0)->whereIn('id', $sbackproj)->whereNotIn('id', $proj)->with('unapproved_source_details')->with('unapproved_comments')->get();
            
        } elseif ($user_group == 12 || $user_group == 14 ) {//Ministry
            $backproj = newprojectlist::select('project_id')->where('type', '=', 2)->where('is_back', '=', 1)->pluck('project_id')->toArray();
            
            $proj = newprojectlist::select('project_id')->where('type', '=', 1)->where('is_forward', '=', 1)->where('send_maker', '=', 1)->pluck('project_id')->toArray();
            $smproj = newprojectlist::select('project_id')->where('type', '=', 2)->where('send_maker', '=', 1)->pluck('project_id')->toArray();
            $addproject=  array_merge($proj,$smproj);
            
            $projnot = newprojectlist::select('project_id')->where('type', '=', 2)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            
            $unapproved_project = unapproved_project_info::where('ministry', '=', $department_id)->whereIn('id', $addproject)->whereNotIn('id', $projnot)->with('unapproved_source_details')->with('unapproved_comments')->get();
        } else if ($user_group == 11 || $user_group == 19) {//Sub Sector
            $backproj = newprojectlist::select('project_id')->where('type', '=', 3)->where('is_back', '=', 1)->pluck('project_id')->toArray();
            
            $proj = newprojectlist::select('project_id')->where('type', '=', 2)->where('is_forward', '=', 1)->where('send_maker', '=', 1)->pluck('project_id')->toArray();
            $smproj = newprojectlist::select('project_id')->where('type', '=', 3)->where('send_maker', '=', 1)->pluck('project_id')->toArray();
            $addproject=  array_merge($proj,$smproj);
            
            $projnot = newprojectlist::select('project_id')->where('type', '=', 3)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            
            $unapproved_project = unapproved_project_info::where('sub_sector', '=', $department_id)->whereIn('id', $addproject)->whereNotIn('id', $projnot)->with('unapproved_source_details')->with('unapproved_comments')->get();
        } else if ($user_group == 9 || $user_group == 10) {//Sector Divition
            $backproj = newprojectlist::select('project_id')->where('type', '=', 4)->where('is_back', '=', 1)->pluck('project_id')->toArray();
            
            $proj = newprojectlist::select('project_id')->where('is_forward', '=', 1)->where('send_maker', '=', 1)->where(function($q) {
                        $q->where('type', '=', 3)->orWhere('type', '=', 2);
                    })->pluck('project_id')->toArray();
            $smproj = newprojectlist::select('project_id')->where('type', '=', 4)->where('send_maker', '=', 1)->pluck('project_id')->toArray();
            $addproject=  array_merge($proj,$smproj);
            
            $projnot = newprojectlist::select('project_id')->where('type', '=', 4)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
          
            $unapproved_project = unapproved_project_info::where('sector', '=', $department_id)->whereIn('id', $addproject)->whereNotIn('id', $projnot)->with('unapproved_source_details')->with('unapproved_comments')->get();
        } else if ($user_group == 16) {//programming division
            $backproj = newprojectlist::select('project_id')->where('type', '=', 5)->where('is_back', '=', 1)->pluck('project_id')->toArray();
            $proj = newprojectlist::select('project_id')->where('type', '=', 4)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $projnot = newprojectlist::select('project_id')->where('type', '=', 5)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $unapproved_project = unapproved_project_info::whereIn('id', $proj)->whereNotIn('id', $projnot)->with('unapproved_source_details')->with('unapproved_comments')->get();
        } else {
            $proj = newprojectlist::select('project_id')->where('type', '=', 1)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $unapproved_project = unapproved_project_info::with('unapproved_source_details')->with('unapproved_comments')->get(); //->whereNotIn('id', $proj)
        }
        
        //return $unapproved_project;
        //return $backproj;

        //dd(DB::getQueryLog());

        return view('newprojectlist.create', compact('unapproved_project','backproj', 'user_group', 'commonclass'));
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
        
        $agency_end_date = Guideline::where('guideline_status', 1)->where('call_notice_type', 0)->first();
        
        if ($user_group == 13) {//Agency
            $guidelinedate = $agency_end_date->agency_date;
        } elseif ($user_group == 12) {//Ministry
            $guidelinedate = $agency_end_date->ministry_date;
        } elseif ($user_group == 11) {//Sub Sector
            $guidelinedate = $agency_end_date->sector_division_date;
        } elseif ($user_group == 9 || $user_group == 10) {//Sector Divition
            $guidelinedate = $agency_end_date->sector_division_date;
        }else{
            $guidelinedate = $agency_end_date->sector_division_date;
        }
           
           
        $currentDate = date('Y-m-d');
        if ($guidelinedate >= $currentDate) {
            
        } else {
            //return back()->with('success', 'Guideline Date has been Expired ');
            return redirect('newprojectlist/create')->withErrors(['Guideline Date has been Expired.']);
        }

        if ($request->submitbutton == "send") {

            if ($user_group == 13) {//Agency
                $type = 1;
            } elseif ($user_group == 12) {//Ministry
                $type = 2;
            } elseif ($user_group == 11) {//Sub Sector
                $type = 3;
            } elseif ($user_group == 9 || $user_group == 10) {//Sector Divition
                $type = 4;
            } elseif ($user_group == 16) {//programming division
                $type = 5;
            } else {
                $type = 1;
            }
            $idata = array();
            foreach ($request->chkproject as $key => $val) {

                if (newprojectlist::where('type', '=', $type)->where('project_id', '=', $val)->exists()) {
                    // user found
                    $data = [
                        'is_forward' => 1,
                        'is_back' => null,
                        'send_maker' => null,
                        'forward_date' => date('Y-m-d'),
                        'created_by' => $logged_user_id,
                        'updated_by' => $logged_user_id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'status' => 1,
                    ];

                    newprojectlist::where('type', '=', $type)->where('project_id', '=', $val)->update($data);
                } else {

                    $idata [] = [
                        'type' => $type,
                        'project_id' => $val,
                        'is_forward' => 1,
                        'forward_date' => date('Y-m-d'),
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
            }
        } elseif ($request->submitbutton == "back") {
            
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

            if ($user_group == 13 || $user_group == 15) {//Agency
                $backtype = 1;
            } elseif ($user_group == 12 || $user_group == 14) {//Ministry
                $backtype = 1;
            } elseif ($user_group == 11 || $user_group == 19) {//Sub Sector
                $backtype = 2;
            } elseif ($user_group == 9 || $user_group == 10) {//Sector Divition
                $backtype = 2;
            } elseif ($user_group == 16) {//programming division
                $backtype = 4;
            } else {
                $backtype = 0;
            }
            foreach ($request->chkproject as $key => $val) {
                $data = [
                    'is_forward' => 0,
                    'is_back' => 1,
                    'back_date' => date('Y-m-d'),
                    'created_by' => $logged_user_id,
                    'updated_by' => $logged_user_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1,
                ];

                newprojectlist::where('type', '=', $backtype)->where('project_id', '=', $val)->update($data);
            }
            
            foreach ($request->chkproject as $key => $val) {
                $bdata = [
                    'send_maker' => null,
                    'created_by' => $logged_user_id,
                    'updated_by' => $logged_user_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1,
                ];

                newprojectlist::where('type', '=', $type)->where('project_id', '=', $val)->update($bdata);
            }
            
        }elseif($request->submitbutton == "backtomaker"){
            
            if ($user_group == 13 || $user_group == 15) {//Agency
                $backtype = 1;
            } elseif ($user_group == 12 || $user_group == 14) {//Ministry
                $backtype = 2;
            } elseif ($user_group == 11 || $user_group == 19) {//Sub Sector
                $backtype = 3;
            } elseif ($user_group == 9 || $user_group == 10) {//Sector Divition
                $backtype = 4;
            } elseif ($user_group == 16) {//programming division
                $backtype = 5;
            } else {
                $backtype = 0;
            }
            
            foreach ($request->chkproject as $key => $val) {
                $data = [
                    'send_maker' => null,
                    'back_checker' => 1,
                    'back_checker_date' => date('Y-m-d'),
                    'created_by' => $logged_user_id,
                    'updated_by' => $logged_user_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1,
                ];

                newprojectlist::where('type', '=', $backtype)->where('project_id', '=', $val)->update($data);
            }
            
        }

        return redirect('newprojectlist/create')->with('success', 'Send Successfully');
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
