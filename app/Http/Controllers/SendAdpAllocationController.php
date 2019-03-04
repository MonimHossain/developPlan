<?php

namespace App\Http\Controllers;

use App\sendadpallocation;
use App\demand;
use App\Guideline;
use App\User;
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

class SendAdpAllocationController extends Controller {

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
        $user_id = Auth::user()->id;
        $backproj = array();
        $notaddproject = array();
        $checkerbackproj = array();
        $ministry = ministry::where('status', 1)->get();
        $agency = agency::where('status', 1)->get();
        $sector = Sector::where('status', 1)->get();
        $subsector = SubSector::where('status', 1)->get();
        DB::enableQueryLog();

        $projnot = 0;
        if ($user_group == 13 || $user_group == 15) {//Agency
            $child_user = User::where('parent_user', '=', $user_id)->pluck('id')->toArray();
            $backproj = sendadpallocation::select('project_id')->where('type', '=', 1)->where('is_back', '=', 1)->pluck('project_id')->toArray();

            $sbackproj = sendadpallocation::select('project_id')->where('type', '=', 1)->where('send_maker', '=', 1)->pluck('project_id')->toArray();
            $proj = sendadpallocation::select('project_id')->where('type', '=', 1)->where('is_forward', '=', 1)->pluck('project_id')->toArray();

            $project_demands = demand::whereIn('project_id', $sbackproj)->whereIn('demands.created_by', $child_user)->whereNotIn('project_id', $proj)->with('project_name')->with('demand_source')->join('approved_project_info', 'approved_project_info.unapprove_project_id', 'demands.project_id');
            if ($request->min != null) {
                $project_demands = $project_demands->where('approved_project_info.ministry', $request->min);
            }
            if ($request->agen != null) {
                $project_demands = $project_demands->where('approved_project_info.agency', $request->agen);
            }
            if ($request->sec != null) {
                $project_demands = $project_demands->where('approved_project_info.sector', $request->sec);
            }
            if ($request->sub_sec != null) {
                $project_demands = $project_demands->where('approved_project_info.sub_sector', $request->sub_sec);
            }



            $project_demands = $project_demands->select('demands.*')->get();
            ;
        } elseif ($user_group == 12 || $user_group == 14) {//Ministry
            $backproj = sendadpallocation::select('project_id')->where('type', '=', 2)->where('is_back', '=', 1)->pluck('project_id')->toArray();

            $proj = sendadpallocation::select('project_id')->where('type', '=', 1)->where('is_forward', '=', 1)->where('send_maker', '=', 1)->pluck('project_id')->toArray();
            $smproj = sendadpallocation::select('project_id')->where('type', '=', 2)->where('send_maker', '=', 1)->pluck('project_id')->toArray();
            $addproject = array_merge($proj, $smproj);
            $projnot = sendadpallocation::select('project_id')->where('type', '=', 2)->where('is_forward', '=', 1)->pluck('project_id')->toArray();

            $project_demands = demand::whereIn('project_id', $addproject)->whereNotIn('project_id', $projnot)->with('project_name')->with('demand_source')->join('approved_project_info', 'approved_project_info.unapprove_project_id', 'demands.project_id');
            if ($request->min != null) {
                $project_demands = $project_demands->where('approved_project_info.ministry', $request->min);
            }
            if ($request->agen != null) {
                $project_demands = $project_demands->where('approved_project_info.agency', $request->agen);
            }
            if ($request->sec != null) {
                $project_demands = $project_demands->where('approved_project_info.sector', $request->sec);
            }
            if ($request->sub_sec != null) {
                $project_demands = $project_demands->where('approved_project_info.sub_sector', $request->sub_sec);
            }



            $project_demands = $project_demands->select('demands.*')->get();
            ;
        } else if ($user_group == 11 || $user_group == 19) {//Sub Sector
            $backproj = sendadpallocation::select('project_id')->where('type', '=', 3)->where('is_back', '=', 1)->pluck('project_id')->toArray();

            $proj = sendadpallocation::select('project_id')->where('type', '=', 2)->where('is_forward', '=', 1)->where('send_maker', '=', 1)->pluck('project_id')->toArray();
            $smproj = sendadpallocation::select('project_id')->where('type', '=', 3)->where('send_maker', '=', 1)->pluck('project_id')->toArray();
            $addproject = array_merge($proj, $smproj);

            $projnot = sendadpallocation::select('project_id')->where('type', '=', 3)->where('is_forward', '=', 1)->pluck('project_id')->toArray();

            $project_demands = demand::whereIn('project_id', $addproject)->whereNotIn('project_id', $projnot)->with('project_name')->with('demand_source')->join('approved_project_info', 'approved_project_info.unapprove_project_id', 'demands.project_id');
            if ($request->min != null) {
                $project_demands = $project_demands->where('approved_project_info.ministry', $request->min);
            }
            if ($request->agen != null) {
                $project_demands = $project_demands->where('approved_project_info.agency', $request->agen);
            }
            if ($request->sec != null) {
                $project_demands = $project_demands->where('approved_project_info.sector', $request->sec);
            }
            if ($request->sub_sec != null) {
                $project_demands = $project_demands->where('approved_project_info.sub_sector', $request->sub_sec);
            }



            $project_demands = $project_demands->get();
            ;
        } else if ($user_group == 9 || $user_group == 10) {//Sector Divition
            $backproj = sendadpallocation::select('project_id')->where('type', '=', 4)->where('is_back', '=', 1)->pluck('project_id')->toArray();

            $proj = sendadpallocation::select('project_id')->where('is_forward', '=', 1)->where('send_maker', '=', 1)
                    ->where(function($q) {
                        $q->where('type', '=', 3)->orWhere('type', '=', 2);
                    })->pluck('project_id')->toArray();
            $smproj = sendadpallocation::select('project_id')->where('type', '=', 4)->where('send_maker', '=', 1)->pluck('project_id')->toArray();
            $addproject = array_merge($proj, $smproj);

            $projnot = sendadpallocation::select('project_id')->where('type', '=', 4)->where('is_forward', '=', 1)->pluck('project_id')->toArray();

            $project_demands = demand::whereIn('project_id', $addproject)->whereNotIn('project_id', $projnot)->with('project_name')->with('demand_source')->join('approved_project_info', 'approved_project_info.unapprove_project_id', 'demands.project_id');
            if ($request->min != null) {
                $project_demands = $project_demands->where('approved_project_info.ministry', $request->min);
            }
            if ($request->agen != null) {
                $project_demands = $project_demands->where('approved_project_info.agency', $request->agen);
            }
            if ($request->sec != null) {
                $project_demands = $project_demands->where('approved_project_info.sector', $request->sec);
            }
            if ($request->sub_sec != null) {
                $project_demands = $project_demands->where('approved_project_info.sub_sector', $request->sub_sec);
            }



            $project_demands = $project_demands->select('demands.*')->get();
            ;
        } else if ($user_group == 16) {//programming division
            $backproj = sendadpallocation::select('project_id')->where('type', '=', 5)->where('is_back', '=', 1)->pluck('project_id')->toArray();
            $proj = sendadpallocation::select('project_id')->where('type', '=', 4)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
            $projnot = sendadpallocation::select('project_id')->where('type', '=', 5)->where('is_forward', '=', 1)->pluck('project_id')->toArray();

            $project_demands = demand::whereIn('project_id', $proj)->whereNotIn('project_id', $projnot)->with('project_name')->with('demand_source')->join('approved_project_info', 'approved_project_info.unapprove_project_id', 'demands.project_id');
            if ($request->min != null) {
                $project_demands = $project_demands->where('approved_project_info.ministry', $request->min);
            }
            if ($request->agen != null) {
                $project_demands = $project_demands->where('approved_project_info.agency', $request->agen);
            }
            if ($request->sec != null) {
                $project_demands = $project_demands->where('approved_project_info.sector', $request->sec);
            }
            if ($request->sub_sec != null) {
                $project_demands = $project_demands->where('approved_project_info.sub_sector', $request->sub_sec);
            }



            $project_demands = $project_demands->select('demands.*')->get();
        } else {

            $project_demands = demand::with('project_name')->with('demand_source')->join('approved_project_info', 'approved_project_info.unapprove_project_id', 'demands.project_id');
            if ($request->min != null) {
                $project_demands = $project_demands->where('approved_project_info.ministry', $request->min);
            }
            if ($request->agen != null) {
                $project_demands = $project_demands->where('approved_project_info.agency', $request->agen);
            }
            if ($request->sec != null) {
                $project_demands = $project_demands->where('approved_project_info.sector', $request->sec);
            }
            if ($request->sub_sec != null) {
                $project_demands = $project_demands->where('approved_project_info.sub_sector', $request->sub_sec);
            }



            $project_demands = $project_demands->select('demands.*')->get();
            // $project_demands = demand::select('*')->get(); //->whereNotIn('id', $proj)
        }

        //dd(DB::getQueryLog());

        return view('sendadpallocation.create', compact('project_demands', 'user_group', 'commonclass', 'backproj', 'checkerbackproj', 'user_group', 'ministry', 'agency', 'sector', 'subsector'));
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

        $guideline_date = Guideline::where('guideline_status', 1)->where('call_notice_type', 0)->first();

        if ($user_group == 13) {//Agency
            $guidelinedate = $guideline_date->agency_date;
        } elseif ($user_group == 12) {//Ministry
            $guidelinedate = $guideline_date->ministry_date;
        } elseif ($user_group == 11) {//Sub Sector
            $guidelinedate = $guideline_date->sector_division_date;
        } elseif ($user_group == 9 || $user_group == 10) {//Sector Divition
            $guidelinedate = $guideline_date->sector_division_date;
        } else {
            $guidelinedate = $guideline_date->sector_division_date;
        }

        $currentDate = date('Y-m-d');
        if ($guidelinedate >= $currentDate) {
            
        } else {
            //return back()->with('success', 'Guideline Date has been Expired ');
            return redirect('sendadpallocation/create')->withErrors(['Guideline Date has been Expired.']);
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
            $hisdata = array();
            foreach ($request->chkproject as $key => $val) {

                if (sendadpallocation::where('type', '=', $type)->where('project_id', '=', $val)->exists()) {
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

                    sendadpallocation::where('type', '=', $type)->where('project_id', '=', $val)->update($data);

                    $hdata = [
                        'type' => $type,
                        'user_group' => $user_group,
                        'project_id' => $val,
                        'is_forward' => 1,
                        'forward_date' => date('Y-m-d'),
                        'created_by' => $logged_user_id,
                        'updated_by' => $logged_user_id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'status' => 1,
                    ];
                    DB::table('demands_status_history')->insert($hdata);
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

                    $hisdata [] = [
                        'type' => $type,
                        'user_group' => $user_group,
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
                sendadpallocation::insert($idata);
                DB::table('demands_status_history')->insert($hisdata);
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

            $hisdata = array();
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

                sendadpallocation::where('type', '=', $backtype)->where('project_id', '=', $val)->update($data);

                foreach ($request->chkproject as $key => $val) {
                    $bdata = [
                        'send_maker' => null,
                        'created_by' => $logged_user_id,
                        'updated_by' => $logged_user_id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'status' => 1,
                    ];

                    sendadpallocation::where('type', '=', $type)->where('project_id', '=', $val)->update($bdata);
                }

                $hisdata [] = [
                    'type' => $type,
                    'user_group' => $user_group,
                    'project_id' => $val,
                    'is_back' => 1,
                    'back_date' => date('Y-m-d'),
                    'created_by' => $logged_user_id,
                    'updated_by' => $logged_user_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'status' => 1,
                ];
            }

            if (!empty($hisdata)) {
                DB::table('demands_status_history')->insert($hisdata);
            }
        } elseif ($request->submitbutton == "backtomaker") {

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

                sendadpallocation::where('type', '=', $backtype)->where('project_id', '=', $val)->update($data);
            }
        }

        return redirect('sendadpallocation/create')->with('success', 'Send Successfully');
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
