<?php

namespace App\Classes;

use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CommonClass {

    public $PrivilegesSession;

//    public $operation_msg = array();

    public function __construct() {
        $this->PrivilegesSession = Session::get('privilege');

    }
   //$id is use for which id you are looking for and model is model name and filed is column name//
    public function getValue($id, $model,$field=null,$model_id='id') {
        if(file_exists(app_path().'\\'.$model.'.'.'php')){
            $model='\App\\' .$model;
           $result = $model::where($model_id, $id)->first();

            if($result){
            if(isset($field)){
                if($result->$field){
                   return $result->$field;
                }
                else{
                    return 'wrong table field is given';
                }


            }
            else return $result;
        }
        return null;
        }
        return 'Given model name is not correct';
    }

    //guideline file

    public function guideline_array($arr_name) {
      $data = array();
      $data['guideline_for'] = array(0 => 'ADP', 1 => 'RADP');

      if (array_key_exists($arr_name, $data)) {
          return $data[$arr_name];
      } else {
          return $data[$arr_name] = array();
      }
  }

//date to year
public function datetoyear($date_string){

  if(is_null($date_string)){
      return null;
  }
  if(is_string($date_string)){
    $date=new \Carbon\Carbon($date_string);
     return $date->format("Y");
  }
  else{
    return null;
  }


}
//dateToMysql
public function dateToMysql($date_string){

  if(is_null($date_string)){
      return null;
  }

  $date=new \Carbon\Carbon($date_string);
   return $date->format("Y-m-d");
}
//date to view
public function dateToview($date_string){
  if(is_null($date_string)){
      return null;
  }
  $date=new \Carbon\Carbon($date_string);
   return $date->format("d-m-Y");
}




//    public function getSubRootMenu($id, $table) {
//        $result = DB::table($table)->where('root_menu','=', $id)
//            ->where('sub_root_menu', '=',0)->get();
//        if($result){
//            return $result;
//        }
//    }
//
//    public function getSubSubRootMenu($id, $table) {
//        $result = DB::table($table)->where('sub_root_menu','=', $id)->get();
//        if($result){
//            return $result;
//        }
//    }

    public function common_Array($arr_name) {
        $data = array();
        $data['status'] = array(0 => 'Inactive', 1 => 'Active');

        if (array_key_exists($arr_name, $data)) {
            return $data[$arr_name];
        } else {
            return $data[$arr_name] = array();
        }
    }

//..........................coomonclass_agency............................//
    public function common_Array_agency($arr_name) {
        $data = array();
        $data['status'] = array(0 => 'Inactive', 1 => 'Active');

        if (array_key_exists($arr_name, $data)) {
            return $data[$arr_name];
        } else {
            return $data[$arr_name] = array();
        }
    }

//........................EndAgency.......................................//





    public function getTimeFormat($dateString)
    {
        try{
            $myDateTime = DateTime::createFromFormat('Y-m-d', $dateString);
            if ($myDateTime)
            {
                $newDateString = $myDateTime->format('d-m-Y');
                return $newDateString;
            }
        }
        catch(\Exception $ex){

        }
        return null;
    }

    public static function get_menu_tree($parent_id)
    {
        //return $parent_id;
        
        $menu = "";
        $sqlquery = DB::table('menus')
                ->where('status', '=',1)
                ->where('parent_menu','=',$parent_id)->get();

        foreach($sqlquery as $row)
        {
            $item = DB::table('menus')
                ->where('status', '=',1)
                ->where('parent_menu','=',$row->id)->first();
            $spaces = "&nbsp;";
            if($item)
            {
                $menu .="<li><input type='checkbox' id='user_menu_".$row->id."' name='user_menu[]' value='".$row->id."'>".$spaces.$row->name."";
            }
            else
            {
                $menu .= "<li>
                         <input  class='user_menu_check' id='user_menu_".$row->id."' type='checkbox' name='user_menu[]' value='".$row->id."'>".$spaces.$row->name."$spaces
                         <input id='user_save_".$row->id."' type='checkbox' name='chk_save_".$row->id."[]' value='0'> Save".$spaces.
                         "<input id='user_edit_".$row->id."' type='checkbox' name='chk_edit_".$row->id."[]' value='1'> Edit".$spaces.
                         "<input id='user_delete_".$row->id."' type='checkbox' name='chk_delete_".$row->id."[]'value='2'> Delete".$spaces.
                         "<input id='user_approve_".$row->id."' type='checkbox' name='chk_approve_".$row->id."[]' value='3'> Approve";
            }

            $menu .= "<ul>".CommonClass::get_menu_tree($row->id)."</ul>"; //call  recursively
            $menu .= "</li>";
        }

        return $menu;
        mysqli_close($con);
    }

    public static function get_left_menu_tree($parent_id)
    {
        
        //return $parent_id;
        
        $value = $request->session()->get('locale');

        DB::enableQueryLog();

        $user_group = Auth::user()->user_group;//actions

        $sqlquery = DB::table('menus')
            ->join('user_privileges', 'menus.id', '=', 'user_privileges.menu_id')
            ->select('menus.id','menus.name','menus.name_bangla','menus.link','menus.parent_menu','menus.status','user_privileges.actions')
            ->where('user_privileges.user_group', '=', $user_group)
            ->where('menus.status', '=',1)
            ->where('menus.parent_menu','=',$parent_id)
            ->orderBy('menus.sequence')
            ->get();
        //dd(DB::getQueryLog());
        //dd($user_group);

        $menu = "";

        foreach($sqlquery as $row)
        {
            if($row->link!=""){
                $link=route($row->link,array('mid' => $row->id));
            }  else {
                $link="#";
            }

            $item = DB::table('menus')
                ->where('status', '=',1)
                ->where('parent_menu','=',$row->id)->get();

            if(count($item)>0){
                $menuclass="submenu";
                $menucount="<span class='label label-important'> ".count($item)." </span>";
            }  else {
                $menuclass="";
                $menucount="";
            }

            $menu .='<li class="'. $menuclass .'"> <a href='. $link . '><i class="icon icon-th-list"></i> <span> '.$row->name .' </span> '. $menucount .' </a>';

            $menu .= "<ul>".CommonClass::get_left_menu_tree($row->id)."</ul>"; //call  recursively
            $menu .= "</li>";
        }

        return $menu;
        mysqli_close($con);
    }

    public function get_menu_id() {
        $routeArray = app('request')->route()->getAction();
        $menulink = class_basename($routeArray['as']);
        $menulinkarr=explode(".",$menulink);
        $menu = DB::table('menus')->where('link','like', $menulinkarr[0]."%")->first();
        $menuid = $menu->id;
        return $menuid;
    }

    public function str_to_array($string, $delimiter = ',') {
        if (!is_array($string)) {
            return explode($delimiter, $string);
        }
        return $string;
    }
/*----------------------Aceess button start---------------*/
    public function access_button($type, $button_name = null, $link = null) {
        if(array_key_exists($this->get_menu_id(), Session::get('privilege'))){
        $permission = Session::get('privilege')[$this->get_menu_id()];
        if (!is_null($permission)) {
            if ($type == '0' && in_array($type, $this->str_to_array($permission))) {
                echo "<button type='submit' class='btn btn-success'>" . $button_name . "</button>";
            } elseif ($type == '1' && in_array($type, $this->str_to_array($permission))) {
                echo "<a href=" . $link . " class='btn btn-success pull-left'><i class='icon-edit'></i>" . $button_name . "</a>";
            } elseif ($type == '2' && in_array($type, $this->str_to_array($permission))) {
                echo "<form action=" . $link . " method='post'>";
                echo csrf_field();
                echo "<input type='hidden' name='_method' value='DELETE'>";
                echo "<button class='btn btn-danger pull-left delete' type='submit'> <i class='icon-trash'></i> $button_name </button>
                                </form>";
            } elseif ($type == 3 && in_array($type, $this->str_to_array($permission))) {
                echo "<button type='submit' class='btn btn-success'>" . $button_name . "</button>";
            }
        } else {
            return "";
        }
    }

    }
    /*----------------------Aceess button end---------------*/
    public function check_privilege($type = null)
    {
        $returndata = FALSE;
        $permission = Session::get('privilege')[$this->get_menu_id()];
        if (!is_null($permission) && !is_null($type)) {
            if (!in_array($type, $this->str_to_array($permission))) {
                $returndata = FALSE;
            } else {
                $returndata = TRUE;
            }
        } else {
            $returndata = FALSE;
        }
        return $returndata;
    }
/*--------------------------common insert attachment start-----------------------------------*/
public function insert_attachement($attachement_type, $file, $ref_id = null, $project_id = null, $multi = null) {

        $attachement_type_array = attachement_type_array();
        $folder_name = "";
        if ($attachement_type != "") {
            $folder_name = $attachement_type_array[$attachement_type];
        }
        if ($file) {
            $valid_file_type = array('jpeg', 'jpg', 'png', 'doc', 'docx', 'pdf','xlsx','xls','xlw','csv');
            if (in_array(strtolower($file->getClientOriginalExtension()), $valid_file_type)) {

                $file_name = $folder_name . '_' . md5(time()) . '.' . $file->getClientOriginalExtension();
                $directory = 'uploaded_files/' . $folder_name . '/';
                $file_path = $directory . $file_name;
                $file->move($directory, $file_name);
                if ($multi != null) {
                    
                      \App\attachment_detail::create(['ref_id' => $ref_id, 'project_id' => $project_id, 'attachment_type' => $attachement_type, 'attachment_path' => $file_path,'created_by'=>auth()->id(),'updated_by'=>auth()->id()]);
                }
                return $file_path;
            } else {

                return false;
            }
        } else {

            return false;
        }
    }

    /*--------------------------common insert attachment end-----------------------------------*/
   /*--------------------------common add function start-----------------------------------*/
    public function create_custom($model_name, $array, $all = false)
    {
        if ($array != null)
        {
            $pushArr = array('created_by' => auth()->id(), 'updated_by' => auth()->id());
            $array = array_merge($array, $pushArr);
        }
        $model_name = '\App\\' . $model_name;
        $all_column = $model_name::create($array);
        if ($all_column)
        {
            if ($all == true)
            {
                return $all_column;
            }
             return $all_column->id;
        }
        return false;
    }
    /*--------------------------common add function end-----------------------------------*/
    /*--------------------------common soft delete function start-----------------------------------*/
     public function soft_delete_custom($model_name, $id)
    {

        $model_name = '\App\\' . $model_name;
        if($model_name::find($id)->delete()){
            return true;
        }
        return false;


    }


    /*--------------------------common soft delete function end-----------------------------------*/

    public function update_custom($model_name,$id, $array)
    {
        if ($array != null)
        {
            $pushArr = array('updated_by' => auth()->id());
            $array = array_merge($array, $pushArr);
        }
        $model_name = '\App\\' . $model_name;
        if($model_name::find($id)->update($array)){
            return true;
        }


    }
    public function php_alert()
    {
        return "<script>
        alert('There are no fields to generate a report');
        window.location.href='admin/ahm/panel';
        </script>";
    }


    public function count_approval_project_via_agency($agency_id, $approval_status) {

        return \App\unapproved_project_info::where('agency', $agency_id)->where('approval_status', $approval_status)->count()??0;
    }

    public function go_type_array()
    {
        return [


            '1'=> 'ECNEC',
            '2'=>'Planning Minister',
            '3'=>'Minister of Concern Ministry',
        ];
    }

}
