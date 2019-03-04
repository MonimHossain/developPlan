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
class NewProjectStatusSummaryController extends Controller
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
    public function index(Request $request) {
    

           
 
   
        // $user_group = Auth::user()->user_group;
        // $user_id = Auth::user()->id;
        //  $user_department=Auth::user()->department_id;
        //  $user_ministry=0;

        $ministry= ministry::where('status',1)->get();
        $agency= agency::where('status',1)->get();
        $sector= Sector::where('status',1)->get();
        $subsector= SubSector::where('status',1)->get();
        

        $agency_group=unapproved_project_info::select('agency');
         if($request->min!=null)
          {

            $agency_group=$agency_group->where('ministry',$request->min);
          }
          if($request->agen!=null)
          {

            $agency_group=$agency_group->where('agency',$request->agen);
          }
          if($request->sec!=null)
          {
            $agency_group=$agency_group->where('sector',$request->sec);
          }
          if($request->sub_sec!=null)
          {
            $agency_group=$agency_group->where('sub_sector',$request->sub_sec);
          }

       $agency_group=$agency_group->groupBy('agency')->get();
        







        
        // $approval_group=unapproved_project_info::groupBy('approval_status')->get();
        


        //    foreach($agency_group as $single_agency){
        //         $agency_data[]=$single_agency->agency;
        //    }

        //    foreach($approval_group as $single_group){
        //      $approval_data[]=$single_group->approval_status;
        //    }

        //     $new_approval_data=array_filter($approval_data,'is_int');
        //      $new_approval_status_data= array_values($new_approval_data);
            
        //      foreach($agency_data as $single_data){
        //               $data_all[]=unapproved_project_info::where('agency',$single_data)->get();


        //      }
             
        //         $data_to_view=[];
                
        //      foreach($data_all as  $key=>$single ){
                    
        //                 $data_to_view[$key]=$single->where('agency',$key+9);
        //                 $data_to_view[$key]=$data_to_view[$key]->where('ministry',17);
        //                 $data_to_view[$key]=$data_to_view[$key]->where('sector',1);
        //                 $data_to_view[$key]=$data_to_view[$key]->where('sub_sector',10);


        //                 foreach($new_approval_status_data as $a_key=>$value){
        //                      $data_to_view[$key][$a_key]=count($data_to_view[$key]->where('approval_status',$value));
        //                 }  

        //      }
            
        //       return $data_to_view;

            
              
  
        //       $all_approval=unapproved_project_info::where('approval_status',3)->where('agency',11)->where('ministry',16)->count();

           
          
            
   
        
 
        
            
                                 

               return view('new_project_status_summary.index',compact('agency','sector','subsector','ministry','agency_group')); 
           }
           

     
          

         
          




 
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
