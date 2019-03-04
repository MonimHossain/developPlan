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

class Approved_project_summary_controller extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //


        $user_group = Auth::user()->user_group;
        $user_id = Auth::user()->id;
        $user_department = Auth::user()->department_id;
        $user_ministry = 0;
        if ($user_group == 13 || $user_group == 15) {//Agency
            $ministry_select = agency::find($user_department);
            if ($ministry_select) {
                $user_ministry = $ministry_select->ministry_id;
            } else {
                $user_ministry = array();
            }
        }
        //
        $source = ProjectSource::where('status', 1)->get();
        $ministry = ministry::where('status', 1)->get();
        $agency = agency::where('status', 1)->get();
        $divison = division::where('status', 1)->get();
        $upazila = UpazilaLocation::where('status', 1)->get();
        $sector = Sector::where('status', 1)->get();
        $subsector = SubSector::where('status', 1)->get();
        //return view('unapproved_project_creation.create',
        //compact('source','ministry','agency','divison','upazila','sector','subsector'));
        $approved_project = approved_project_info::where('status', 1)->with('approved_project_source')->with('approved_project_comments')->get();
        return view('approved_project_summary.index', compact('approved_project', 'user_ministry', 'user_department', 'agency', 'sector', 'subsector', 'unapproved_project_list', 'user_group', 'ministry'));
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
        //
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

    public function a_summarysearch(Request $request) {
        $user_group = Auth::user()->user_group;
        $user_department = Auth::user()->department_id;
        $approved_project = approved_project_info::where('status', 1)->with('approved_project_source')->with('approved_project_comments');
        if ($request->agen != '') {
            $approved_project = $approved_project->where('agency', $request->agen);
        }
        if ($request->min != '') {
            $approved_project = $approved_project->where('ministry', $request->min);
        }
        if ($request->sec != '') {
            $approved_project = $approved_project->where('sector', $request->sec);
        }
        if ($request->sub_sec != '') {
            $approved_project = $approved_project->where('sub_sector', $request->sub_sec);
        }
        $approved_project = $approved_project->get();
        $ministry = ministry::where('status', 1)->get();
        $agency = agency::where('status', 1)->get();
        $sector = Sector::where('status', 1)->get();
        $subsector = SubSector::where('status', 1)->get();
        $user_ministry = 0;
        if ($user_group == 13 || $user_group == 15) {//Agency
            $ministry_select = agency::find($user_department);
            $user_ministry = $ministry_select->ministry_id;
        }




        return view('approved_project_summary.index', compact('approved_project', 'user_ministry', 'user_department', 'agency', 'sector', 'subsector', 'unapproved_project_list', 'user_group', 'ministry'));
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
