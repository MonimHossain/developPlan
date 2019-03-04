<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\approved_project_info;
use Auth;
use App\ministry;
use App\sector;
use App\subsector;
use App\agency;


class approved_project_approval extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $commonclass;

    public function __construct() {
        $this->commonclass = app('CommonClass');
    }


    public function index(Request $request)
    {



//         $mg=[];
//         $dff=0;
//         $notdff=0;
//         $pdff=0;
//          $ministry_array=\App\unapproved_project_info::all();
//          $ministry_array_common=\App\unapproved_project_info::groupBy('ministry_id')->
         
//          foreach ($ministry_array as $value) {
           
//               if($value->approval_status==1)
//               {
//                 $dff++;

//               }
//               if($value->approval_status==2)
//               {
//                 $notdff++;

//               }
//               if($value->approval_status==3)
//               {
//                 $pdff++;

//               }
//             $mg[$value->ministry]=['dff'=>$dff,'notdff'=>$notdff,'pdff'=>$pdff];
//          }
// print_r($mg);
// return;
        $user_group=Auth::user()->user_group;
        $ministry= ministry::where('status',1)->get();
        $agency= agency::where('status',1)->get();
        $sector= Sector::where('status',1)->get();
        $subsector= subSector::where('status',1)->get();
        $approved_project = approved_project_info::where('status', 1)->where('approve_by','!=',null);
         if($request->min!=null)
          {
            $approved_project=$approved_project->where('ministry',$request->min);
          }
          if($request->agen!=null)
          {
            $approved_project=$approved_project->where('agency',$request->agen);
          }
          if($request->sec!=null)
          {
            $approved_project=$approved_project->where('sector',$request->sec);
          }
          if($request->sub_sec!=null)
          {
            $approved_project=$approved_project->where('sub_sector',$request->sub_sec);
          }
       $approved_project=$approved_project->latest()->get();
        return view('approve_project_approval.index', compact('approved_project','user_group','ministry','agency','sector','subsector'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
