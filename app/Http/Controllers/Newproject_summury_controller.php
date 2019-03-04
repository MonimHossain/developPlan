<?php
namespace App\Http\Controllers;
use App\agency;
use App\ClaimateChangeGoal;
use App\ClimateChangeTarget;
use App\district;
use App\division;
use App\Guideline;
use App\ministry;
use App\PovertyGoal;
use App\PovertyTarget;
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
class Newproject_summury_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $commonclass;
    public function __construct(){
        $this->commonclass=app('CommonClass');

    }
    public function index() {
        $user_group = Auth::user()->user_group;
        $user_id = Auth::user()->id;
         $user_department=Auth::user()->department_id;
         $user_ministry=0;
//        $proj = newprojectlist::select('project_id')->where('type', '=', 1)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
        $unapproved_project_list = unapproved_project_info::where('isdraft',0)->with('unapproved_source_details')->with('unapproved_comments')->get(); //->whereNotIn('id', $proj)
        $ministry= ministry::where('status',1)->get();
        $agency= agency::where('status',1)->get();
        $sector= Sector::where('status',1)->get();
        $subsector= SubSector::where('status',1)->get();
        if ($user_group == 13 || $user_group == 15) {//Agency
        $ministry_select=agency::find($user_department);
            if($ministry_select){
                $user_ministry = $ministry_select->ministry_id;
            }else{
                $user_ministry=array();
            }
        }
     $agen=null;
     $min=null;
     $sec=null;
     $sub_sec=null;   
     
     return view('new_projects_summary.index',compact('agen','min','sec','sub_sec','user_ministry','user_department','agency','sector','subsector','unapproved_project_list','user_group','ministry'));
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
    
    public function summarysearch(Request $request)
    {
      
     $agen=$request->agen;
     $min=$request->min;
     $sec=$request->sec;
     $sub_sec=$request->sub_sec;
     
     $user_group = Auth::user()->user_group;
     $user_department=Auth::user()->department_id;
     $unapproved_project_list = unapproved_project_info::where('isdraft',0)->with('unapproved_source_details')->with('unapproved_comments');
     if($request->agen!='')
     {
       $unapproved_project_list=$unapproved_project_list->where('agency',$request->agen);  
     }
     if($request->min!='')
     {
       $unapproved_project_list=$unapproved_project_list->where('ministry',$request->min);  
     }
     if($request->sec!='')
     {
       $unapproved_project_list=$unapproved_project_list->where('sector',$request->sec);  
     }
     if($request->sub_sec!='')
     {
       $unapproved_project_list=$unapproved_project_list->where('sub_sector',$request->sub_sec);  
     }
     $unapproved_project_list=$unapproved_project_list->where('approval_status',$request->approval_status)->get();
        $ministry= ministry::where('status',1)->get();
        $agency= agency::where('status',1)->get();
        $sector= Sector::where('status',1)->get();
        $subsector= SubSector::where('status',1)->get();
        $user_ministry=0; 
        if ($user_group == 13 || $user_group == 15) {//Agency
        $ministry_select=agency::find($user_department);
       
        $user_ministry = $ministry_select->ministry_id;
        }
        
         
        
       
     
    return view('new_projects_summary.index',compact('agen','min','sec','sub_sec','user_ministry','user_department','agency','sector','subsector','unapproved_project_list','user_group','ministry'));
     
     }


    public function store(Request $request)
    {
        
        
   
         
//        return $request->all();
     //3
//       if($request->agen == '' && $request->sec=='' && $request->sub_sec=='')
//       {
//        $unapproved_project_list = unapproved_project_info::where('isdraft',0)->where('ministry',$request->min)->with('unapproved_source_details')->with('unapproved_comments')->get(); //->whereNotIn('id', $proj)
//        } 
//       elseif($request->min == '' && $request->sec=='' && $request->sub_sec=='')
//       {
//         $unapproved_project_list = unapproved_project_info::where('isdraft',0)->where('agency',$request->agen)->with('unapproved_source_details')->with('unapproved_comments')->get();    
//       }
//       elseif($request->min == '' && $request->agen=='' && $request->sub_sec=='')
//       {
//         $unapproved_project_list = unapproved_project_info::where('isdraft',0)->where('sector',$request->sec)->with('unapproved_source_details')->with('unapproved_comments')->get();    
//       }
//       elseif($request->min == '' && $request->agen=='' && $request->sec=='')
//       {
//         $unapproved_project_list = unapproved_project_info::where('isdraft',0)->where('sub_sector',$request->sub_sec)->with('unapproved_source_details')->with('unapproved_comments')->get();    
//       }
//       //2
//       elseif($request->min == '' && $request->agen=='')
//       {
//         $unapproved_project_list = unapproved_project_info::where('isdraft',0)->where('sector',$request->sec)->where('sub_sector',$request->sub_sec)->with('unapproved_source_details')->with('unapproved_comments')->get();    
//       }
//        elseif($request->min == '' && $request->sec=='')
//       {
//         $unapproved_project_list = unapproved_project_info::where('isdraft',0)->where('agency',$request->agen)->where('sub_sector',$request->sub_sec)->with('unapproved_source_details')->with('unapproved_comments')->get();    
//       }
//        elseif($request->min == '' && $request->sub_sec=='')
//       {
//         $unapproved_project_list = unapproved_project_info::where('isdraft',0)->where('agency',$request->agen)->where('sector',$request->sector)->with('unapproved_source_details')->with('unapproved_comments')->get();    
//       }
//       
//       return $unapproved_project_list ;
//        
//         
//         
//         
//         
//         $con1="";
//        if($request->min!=""){
//            $con1="->where('word_name',$request->f_word)";
//        }
//        if($request->agen!=""){
//            $con1.="->where('cc_name',$request->f_cc)";
//        }
//        if($request->sec!=""){
//            $con1.="->where('union_name',$request->f_union)";
//        }
//        if($request->sub_sec!=""){
//            $con1.="->where('union_name',$request->f_union)";
//        }
//            $con2="where('status',1)";
//            
           
        
            
//        $user_group = Auth::user()->user_group;
//        $user_id = Auth::user()->id;
//        $child_user = User::where('parent_user', '=', $user_id)->pluck('id')->toArray();
//        $proj = newprojectlist::select('project_id')->where('type', '=', 1)->where('is_forward', '=', 1)->pluck('project_id')->toArray();
//        $unapproved_project_list = unapproved_project_info::where('isdraft',0)->with('unapproved_source_details')->with('unapproved_comments')->get(); //->whereNotIn('id', $proj)
//        $pdf =View('new_projects_summary.index', compact('unapproved_project_list','backproj','checkerbackproj','user_group'));
////            return $pdf->stream('//);   
//        return $pdf;
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
