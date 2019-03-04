<?php

namespace App\Http\Controllers;

use App\approved_project_component_wise_cost;
use App\approved_project_info;
use App\district;
use App\Ministry;
use App\SubSector;
use App\gender_goal;
use App\gender_goal_target;
use App\MultiyearTarget;
use App\MultiyearGoal;
use App\unapprove_project_linkages_and_target;
use App\unapproved_project_component_details;
use App\unapproved_project_locations;
use App\unapproved_project_source_details;
use App\User;
use App\ClaimateChangeGoal;
use App\ClimateChangeTarget;
use App\division;
use App\PovertyGoal;
use App\PovertyTarget;
use App\pppgole;
use App\ppptargets;
use App\ProjectSource;
use App\PaSource;
use App\rmo;
use App\sdgsgole;
use App\sdgstargets;
use App\unapproved_project_comment_details;
use App\unapproved_project_info;
use App\UpazilaLocation;
use App\FiscalYear;
use App\Usergroup;
use App\BudgetHead;
use App\approved_project_finance_type;
use App\approved_project_year_wise_cost;
use App\approved_project_location;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\demand;
use App\ForeignAidBudgetMaster;
use App\ForeignAidBudgetDetail;
use App\approval_setup;

class AjaxAllDataController extends Controller {

  //load common class
    public $commonclass;
        public function __construct(){
        $this->commonclass=app('CommonClass');

        }



//....................................get source info.................................................//
    public function get_source_data() {
        //$ward_value = $request->ward_value;
        //$all_candidates = DB::table('candidates')->get();
        $all_source = ProjectSource::all();
        if (count($all_source) > 0) {
            echo "<option></option>";
            foreach ($all_source as $source) {
                print"<option value=" . $source->id . ">" . $source->source_name . "</option>";
            }
        } else {
            echo"<option> No Sources Found </option>";
        }
    }

//....................................get division data.................................................//
    public function get_division_data() {
        $all_divison = division::all();
        if (count($all_divison) > 0) {
            echo '<option></option>';
            foreach ($all_divison as $a_divison) {
                print"<option value=" . $a_divison->id . ">" . $a_divison->division_name . "</option>";
            }
        } else {
            echo"<option> No Divison Found </option>";
        }
    }

    //....................................get district data.................................................//
    public function get_upazila_data() {
        $all_upazila = UpazilaLocation::all();
        if (count($all_upazila) > 0) {
            echo '<option></option>';
            foreach ($all_upazila as $a_upazila) {
                print"<option value=" . $a_upazila->id . ">" . $a_upazila->upazila_location_name . "</option>";
            }
        } else {
            echo"<option> No Upazila Found </option>";
        }
    }
    public function get_selected_upazila_data(Request $request) {
        $all_upazila = UpazilaLocation::where('status',1)->where('district_id',$request->id)->get();;
        if (count($all_upazila) > 0) {
            echo '<option></option>';
            foreach ($all_upazila as $a_upazila) {
                print"<option value=" . $a_upazila->id . ">" . $a_upazila->upazila_location_name . "</option>";
            }
        } else {
            echo"<option> No Upazila Found </option>";
        }
    }

    //....................................ADD & GET component Cart.................................................//
    public function get_component_data(Request $request) {
        $allcomponent = Cart::add([
                    'id' => $request->a,
                    'name' => $request->b,
                    'qty' => $request->c,
                    'price' => $request->d,
                    'options' => [
                        'ecost' => $request->e
                    ]
        ]);
        $abc = $allcomponentlist = Cart::content();
        $data = view('unapproved_project_creation.cart', compact('abc'));
        return $data;
    }

    //....................................delete component cart.................................................//
    public function cartdelete(Request $request) {
        $rowid = $request->rowid;
        Cart::remove($rowid);
        $abc = $allcomponentlist = Cart::content();
        $data = view('unapproved_project_creation.cart', compact('abc'));
        return $data;
    }
//...........................*updaeComponentCArt...................................//
    public function cartupdate(Request $request) {
        if ($request->name) {
            Cart::update($request->rowid, ['name' => $request->name]);
        } elseif ($request->qty) {
//            return $request->all();
            //Cart::update($request->rowid, ['qty' => $request->qty]);
            Cart::update($request->rowid, $request->qty);
        } elseif ($request->id) {
            //   return $request->all();
            Cart::update($request->rowid, ['id' => $request->id]);
        } elseif ($request->price) {
            //   return $request->all();
            Cart::update($request->rowid, ['price' => $request->price]);
            // Cart::update($request->rowid,  $request->price);
        }
        $abc = $allcomponentlist = Cart::content();
        $data = view('unapproved_project_creation.cart', compact('abc'));
        return $data;
    }
    //comment
    public function send_comment_data(Request $request) {
        $user_group = \Auth::user()->user_group;
        $logged_user_id = Auth::user()->id;

        if (Usergroup::where('sub_group', '=', null)->where('id', '=', $user_group)->exists()) {
            $user_group = \Auth::user()->user_group;
        }else{
            $user_groups=Usergroup::where('id', '=', $user_group)->get();
            foreach($user_groups as $user_groups){
                $user_group = $user_groups->sub_group;
            }
        }
        $res = unapproved_project_comment_details::where('project_id', Session::get('projectid'))->where('comment_level',$user_group)->delete();
        $data = array();
        $data['comments'] = $request->cmt;
        $data['comment_level'] = $user_group;
        $data['created_by'] = $logged_user_id;
        $data['updated_by'] = $logged_user_id;
        $data['project_id'] = Session::get('projectid');

        DB::table('unapproved_project_comment_details')->insert($data);
        $commment = unapproved_project_comment_details::where('project_id', Session::get('projectid'))->get();
        $data = view('unapproved_project_creation.comment', compact('commment'));
        return $data;
//    return $request->all();
    }
    public function send_edit_comment_data(Request $request) {
        $id = $request->id;
        $user_group = \Auth::user()->user_group;
        $logged_user_id = Auth::user()->id;

        if (Usergroup::where('sub_group', '=', null)->where('id', '=', $user_group)->exists()) {
            $user_group = \Auth::user()->user_group;
        }else{
            $user_groups=Usergroup::where('id', '=', $user_group)->get();
            foreach($user_groups as $user_groups){
                $user_group = $user_groups->sub_group;
            }
        }
        //return $user_group;
        $res = unapproved_project_comment_details::where('project_id',$id)->where('comment_level',$user_group)->delete();
        $data = array();
        $data['comments'] = $request->cmt;
        $data['comment_level'] = $user_group;
        $data['created_by'] = $logged_user_id;
        $data['updated_by'] = $logged_user_id;
        $data['project_id'] = $id;
        DB::table('unapproved_project_comment_details')->insert($data);
        $commment = unapproved_project_comment_details::where('project_id', $id)->get();
        $data = view('unapproved_project_creation.comment', compact('commment'));
        return $data;
    }

    public function send_modal_add_comment_data(Request $request) {
        $id = $request->id;
        $user_group = \Auth::user()->user_group;
        $logged_user_id = Auth::user()->id;

        if (Usergroup::where('sub_group', '=', null)->where('id', '=', $user_group)->exists()) {
            $user_group = \Auth::user()->user_group;
        }else{
            $user_groups=Usergroup::where('id', '=', $user_group)->get();
            foreach($user_groups as $user_groups){
                $user_group = $user_groups->sub_group;
            }
        }
        $res = unapproved_project_comment_details::where('project_id',$id)->where('comment_level',$user_group)->delete();
        $data = array();
        $data['comments'] = $request->cmt;
        $data['comment_level'] = $user_group;
        $data['created_by'] = $logged_user_id;
        $data['updated_by'] = $logged_user_id;
        $data['project_id'] = $id;
        DB::table('unapproved_project_comment_details')->insert($data);

        //$all_comment = unapproved_project_comment_details::where('project_id', $id)->get();

        //$data = view('unapproved_project_creation.modalcomment', compact('all_comment','id'));
        return $id;
    }



    public function show_comment_data(Request $request) {
        $commment = unapproved_project_comment_details::where('project_id', $request->id)->get();
        $data = view('unapproved_project_creation.comment', compact('commment'));
        return $data;
    }

    public function delcomment(Request $request) {
        $delete_cmt = unapproved_project_comment_details::find($request->id);
        $delete_cmt->delete();
        return $request->id;
//        $commment = unapproved_project_comment_details::where('project_id', Session::get('projectid'))->get();
//        $data = view('unapproved_project_creation.comment', compact('commment'));
//        return $data;
    }
    public function commentupdate(Request $request) {
        $updateIn_comment = unapproved_project_comment_details::where('id', $request->id)->update([
            'comments' => $request->cmt,
        ]);
//        $commment = unapproved_project_comment_details::where('project_id', Session::get('projectid'))->get();
//        $data = view('unapproved_project_creation.comment', compact('commment'));
//        return $data;


        return $request->id;
    }

    //endcomment

    public function getting_the_target(Request $request) {
        $target = sdgstargets::where('gole_id', $request->goal_id)->get();
        if (count($target) > 0) {
            echo '<option></option>';
            foreach ($target as $a_target) {
                print"<option value=" . $a_target->id . ">" . $a_target->targets . "</option>";
            }
        } else {
            echo"<option> Target not found </option>";
        }
    }

    public function get_sdgs_goal() {
        $all_goal = sdgsgole::where('status', 1)->get();
        if (count($all_goal) > 0) {
            echo "<option></option>";
            foreach ($all_goal as $a_goal) {
                print"<option value=" . $a_goal->id . ">" . $a_goal->gole_name . "</option>";
            }
        } else {
            echo"<option> No Goal Found </option>";
        }
    }

    public function showcomment(Request $request) {
        $id=$request->id;
        $all_comment = unapproved_project_comment_details::where('project_id', $request->id)->get();
        $data = view('unapproved_project_creation.modalcomment', compact('all_comment','id'));
        return $data;
    }
    
    public function administrative_info(Request $request) {
        $user_group = Auth::user()->user_group;
        $all_comment = unapproved_project_comment_details::where('project_id', $request->id)->get();
        //$project_data = unapproved_project_info::where('id', $request->id)->get();
        $project_data=unapproved_project_info::find($request->id);
        $all_user = User::where('user_group', $user_group)->get();
        $project_id=$request->id;
        $data = view('ministerialmeeting.administrativeinfo', compact('all_comment','all_user','project_id','project_data'));
        return $data;
    }
    
    public function add_yearwisecost(Request $request,$id) {
        $project_id=$id;
        $fiscalyears=FiscalYear::all();
        $data = view('approaved_projects.partials.yearwisecost', compact('fiscalyears','project_id'));
        return $data;
    }
    
    public function add_locationwisecost(Request $request,$project_id) {
        $divisions=division::all();
        $districts=district::all();
        $UpazilaLocations=UpazilaLocation::all();
        $rmos=rmo::all();
        $project_id=$project_id;
        $data = view('approaved_projects.partials.locationwisecost', compact('divisions','districts','UpazilaLocations','rmos','project_id'));
        return $data;
    }
    
    public function add_approval(Request $request,$project_id) {
        $project_id=$project_id;
        $user_group = Auth::user()->user_group;
        $approval_setup = approval_setup::where('status', 1)->get();
        $all_user = User::where('user_group', $user_group)->get();
        $data = view('approaved_projects.partials.administrativeinfo', compact('project_id','all_user','approval_setup'));
        return $data;
    }
    
    public function add_componentwisecost(Request $request,$project_id) {
        $budgetheads=BudgetHead::all();
        $project_id=$project_id;
        $data = view('approaved_projects.partials.componentwisecost', compact('budgetheads','project_id'));
        return $data;
    }
    
    public function add_type_of_finance(Request $request,$id) {
        $source=ProjectSource::where('status',1)->get();
        $paSource=PaSource::all();
        $project_id=$id;
        //return $fiscalyears;
        //$user_group = Auth::user()->user_group;
        //$all_comment = unapproved_project_comment_details::where('project_id', $request->id)->get();
        //$project_data = unapproved_project_info::where('id', $request->id)->get();
        //$project_data=unapproved_project_info::find($request->id);
        //$all_user = User::where('user_group', $user_group)->get();
        //$project_id=$request->id;
        $data = view('approaved_projects.partials.type_of_finance_modal', compact('source','paSource','project_id'));
        return $data;
    }
    public function edit_type_of_finance($id,$project_id)
    {
         $source=ProjectSource::where('status',1)->get();
        $paSource=PaSource::all();
        $project_id=$project_id;
        $type_of_finance=approved_project_finance_type::find($id);
         $data = view('approaved_projects.partials.type_of_finance_edit_modal', compact('type_of_finance','source','paSource','project_id'));
        return $data;

    }
    public function edit_component_wise_cost($id,$project_id)
    {
        $budgetheads=BudgetHead::all();
        $project_id=$project_id;
        $component_wise_cost=approved_project_component_wise_cost::find($id);
        $data = view('approaved_projects.partials.edit_componentwisecost', compact('budgetheads','project_id','component_wise_cost'));
        return $data;
    }

    public function edit_year_wise_cost($id,$project_id)
    {
       $project_id=$project_id;
        $fiscalyears=FiscalYear::all();
        $year_wise_cost=approved_project_year_wise_cost::find($id);
          $data = view('approaved_projects.partials.year_wise_cost_edit_modal', compact('year_wise_cost','fiscalyears','project_id'));
        return $data;
    }
     public function edit_locationwisecost($id,$project_id)
    {
       $project_id=$project_id;
          $divisions=division::all();
        $districts=district::all();
        $UpazilaLocations=UpazilaLocation::all();
        $rmos=rmo::all();
        $location_wise_cost=approved_project_location::find($id);
          $data = view('approaved_projects.partials.location_wise_cost_edit_modal', compact('divisions','districts','UpazilaLocations','rmos','project_id','location_wise_cost'));
          return $data;
    }

    public function get_climate_goal() {
        $all_climate_goal = ClaimateChangeGoal::where('status', 1)->get();
        if (count($all_climate_goal) > 0) {
            echo "<option></option>";
            foreach ($all_climate_goal as $a_goal) {
                print"<option value=" . $a_goal->id . ">" . $a_goal->goal_name . "</option>";
            }
        } else {
            echo"<option> No Goal Found </option>";
        }
    }
    public function getting_the_climate_target(Request $request) {
        $target = ClimateChangeTarget::where('goal_id', $request->goal_id)->get();
        if (count($target) > 0) {
            echo '<option></option>';
            foreach ($target as $a_target) {
                print"<option value=" . $a_target->id . ">" . $a_target->targets . "</option>";
            }
        } else {
            echo"<option> Target not found </option>";
        }
    }
    public function get_poverty_goal() {
        $all_poverty_goal = PovertyGoal::where('status', 1)->get();
        if (count($all_poverty_goal) > 0) {
            echo "<option></option>";
            foreach ($all_poverty_goal as $a_goal) {
                print"<option value=" . $a_goal->id . ">" . $a_goal->goal_name . "</option>";
            }
        } else {
            echo"<option> No Goal Found </option>";
        }
    }
    public function poverty_target(Request $request) {
        $target = PovertyTarget::where('goal_name_id', $request->goal_id)->get();
        if (count($target) > 0) {
            echo '<option></option>';
            foreach ($target as $a_target) {
                print"<option value=" . $a_target->id . ">" . $a_target->target . "</option>";
            }
        } else {
            echo"<option> Target not found </option>";
        }
    }
    public function get_ppp_goal() {
        $all_ppp_goal = pppgole::where('status', 1)->get();
        if (count($all_ppp_goal) > 0) {
            echo "<option></option>";
            foreach ($all_ppp_goal as $a_goal) {
                print"<option value=" . $a_goal->id . ">" . $a_goal->gole_name . "</option>";
            }
        } else {
            echo"<option> No Goal Found </option>";
        }
    }
    public function ppp_target(Request $request) {
        $target = ppptargets::where('gole_id', $request->goal_id)->get();
        if (count($target) > 0) {
            echo '<option></option>';
            foreach ($target as $a_target) {
                print"<option value=" . $a_target->id . ">" . $a_target->targets . "</option>";
            }
        } else {
            echo"<option> Target not found </option>";
        }
    }
    public function get_rmo_data(Request $request) {
        $rmo = rmo::all();
        if (count($rmo) > 0) {
            echo '<option></option>';
            foreach ($rmo as $a_rmo) {
                print"<option value=" . $a_rmo->id . ">" . $a_rmo->rmo_name . "</option>";
            }
        } else {
            echo"<option> rmo not found </option>";
        }
    }

    public function get_district_data(Request $request) {
        $district = district::where('status',1)->get();
        if (count($district) > 0) {
            echo '<option></option>';
            foreach ($district as $a_district) {
                print"<option value=" . $a_district->id . ">" . $a_district->district_name . "</option>";
            }
        } else {
            echo"<option> District not found </option>";
        }
    }

    public function show_unapproved_project(Request $request)
    {$un_project = unapproved_project_info::find($request->id);
        $project_source = unapproved_project_source_details::where('project_id', $request->id)->get();
        $component_list = unapproved_project_component_details::where('project_id', $request->id)->get();
        $location_cost = unapproved_project_locations::where('project_id', $request->id)->get();
        $comments = unapproved_project_comment_details::where('project_id', $request->id)->get();
        $sdgs = unapprove_project_linkages_and_target::where('project_id', $request->id)->where('type',1)->get();
        $climate = unapprove_project_linkages_and_target::where('project_id', $request->id)->where('type',2)->get();
        $poverty = unapprove_project_linkages_and_target::where('project_id', $request->id)->where('type',3)->get();
        $ppp = unapprove_project_linkages_and_target::where('project_id', $request->id)->where('type',4)->get();
        $mul= unapprove_project_linkages_and_target::where('project_id', $request->id)->where('type',5)->get();
        // return $component_list;
        $data= view('unapproved_project_creation.show_unappeoved_project',
            compact('mul','un_project', 'project_source', 'component_list', 'location_cost', 'comments','sdgs','climate','poverty','ppp'));
        return $data;
    }

    public function show_approved_project(Request $request)
    {
//        $un_project = unapproved_project_info::find($request->id);
//
//        $project_source = unapproved_project_source_details::where('project_id', $request->id)->get();
//
//        $component_list = unapproved_project_component_details::where('project_id', $request->id)->get();
//
//        $location_cost = unapproved_project_locations::where('project_id', $request->id)->get();
//
//        $comments = unapproved_project_comment_details::where('project_id', $request->id)->get();
        $project=approved_project_info::where('unapprove_project_id',$request->id)->with('date_details')->with('cost_details')->with('approved_project_source')->with('finance_type')->with('year_wise_cost')->with('approved_project_comments')->with('approved_location_cost')->with('component_wise_cost')->first();
        // return $component_list;
        $data= view('approaved_projects.show_approved_project', compact('project'));
        return $data;
    }
    
//------------------------------Get Demand Data---------------------------------------
    public function get_demand_data(Request $request){
        $demand = demand :: with('project_name')->where('project_id',$request->id)->first();
        return $demand;
    }

    //--------------------------Get Sub Sector-----------------------------------------
    public function getting_sub_sector(Request $request)
    {
        $subsector = SubSector::where('status',1)->where('sector_name',$request->id)->get();
        if (count($subsector) > 0) {
            echo '<option></option>';
            foreach ($subsector as $a_subsector) {
                print"<option value=" . $a_subsector->id . ">" . $a_subsector->sub_sector_name . "</option>";
            }
        } else {
            echo"<option> Sub Sector not found </option>";
        }
    }
    public function getting_ministry(Request $request)
    {
        $ministry =ministry::where('status',1)->where('sector_id',$request->id)->get();
        if (count($ministry) > 0) {
           echo '<option></option>';
            foreach ($ministry as $a_ministry) {
                print"<option value=".$a_ministry->id.">".$a_ministry->ministry_name."</option>";
            }
        } else {
            echo"<option> Ministry not found</option>";
        }
    }



    public function getting_ministry_to_project(Request $request){
        $ministry_id=$request->ministry_id;
        $allocation_for=$request->allocation_for;
        $financial_year=$request->financial_year;

         $id=ForeignAidBudgetMaster::where('ministry_id',$ministry_id)->where('allocation_for',$allocation_for)->where('financial_year',$financial_year)->get();

            if($id->count()>0){

             $request->session()->flash('fa-error','Already Inserted data for project under this ministry');

              return 'reload-page';
         }
        $project_info=demand::whereHas('project_name',function($q) use ($ministry_id){
        $q->where('ministry','=',$ministry_id);
        })->with('project_name')->with('demand_source')->get();

        $data=view('faBudgetAndAccounts.financial_aid_details',compact('project_info'));
        return $data;

        }

        //geting ministry to project edit

        public function getting_ministry_to_project_edit(Request $request){

            $ministry_id=$request->ministry_id;
            $allocation_for=$request->allocation_for;
            $financial_year=$request->financial_year;

            $joindata=ForeignAidBudgetMaster::whereHas('detail')->with('detail')->where('ministry_id',$ministry_id)->where('allocation_for',$allocation_for)->where('financial_year',$financial_year)->first();

              if(! $joindata){
                $request->session()->flash('fa-error-edit','No data inserted yet');
                 return "reload-page";
              }
                $master_id=$joindata;

               $project_info=demand::whereHas('project_name',function($q) use ($ministry_id){
            $q->where('ministry','=',$ministry_id);
            })->with('project_name')->with('demand_source')->get();

        $data=view('faBudgetAndAccounts.financial_aid_details_edit',compact('project_info','joindata','master_id'));
        return $data;

                    }


       //getting multiyear  target
       public function get_m_target(Request $request)
       {
//           return $request->goal_id;   
         $m_target =MultiyearTarget::where('status',1)->where('gole_id',$request->goal_id)->get();
        if (count($m_target) > 0) {
            echo '<option></option>';
            foreach ($m_target as $m_target) {
                print"<option value=" . $m_target->id . ">" . $m_target->targets . "</option>";
            }
        } else {
            echo"<option> No Target not found </option>";
        }
           
       }
       
        public function get_m_goal(Request $request) {
        $all_goal =MultiyearGoal::where('status', 1)->get();
        if (count($all_goal) > 0) {
            echo "<option></option>";
            foreach ($all_goal as $a_goal) {
                print"<option value=" . $a_goal->id . ">" . $a_goal->gole_name . "</option>";
            }
        } else {
            echo"<option> No Goal Found </option>";
        }
    }
    
       
   //gender                 
 public function get_gender_target(Request $request)
       {
//           return $request->goal_id;   
         $gender_target = gender_goal_target::where('status',1)->where('goal_id',$request->goal_id)->get();
        if (count($gender_target) > 0) {
            echo '<option></option>';
            foreach ($gender_target as $gender_target) {
                print"<option value=" . $gender_target->id . ">" . $gender_target->targets . "</option>";
            }
        } else {
            echo"<option> No Target not found </option>";
        }
           
       }
public function gendergoal(Request $request) {
        $all_goal = gender_goal::where('status', 1)->get();
        if (count($all_goal) > 0) {
            echo "<option></option>";
            foreach ($all_goal as $a_goal) {
                print"<option value=" . $a_goal->id . ">" . $a_goal->goal_name . "</option>";
            }
        } else {
            echo"<option> No Goal Found </option>";
        }
    }


    


    }
