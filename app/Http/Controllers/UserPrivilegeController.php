<?php

namespace App\Http\Controllers;

use App\Classes\CommonClass;
use App\Menu;
use App\Usergroup;
use App\UserPrivilege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserPrivilegeController extends Controller
{
    public function __construct()
    {
        $this->middleware('language');
    }

    public function index(Request $request)
    {
        $usergroups = Usergroup::all();
        $commonClass = new CommonClass();
        $menu = new Menu();
        $menu_data = $menu->multiLabelMenu();

        return view('userprivilege.create', compact('commonClass','usergroups','menu_data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_group'=>'required',
        ]);

        $logged_user_id = Auth::user()->id;

        DB::table('user_privileges')
            ->where('user_group',$request->user_group)
            ->delete();

        //dd($request->all());
        $action_val=array();
        if (isset($request->user_menu))
        {
            foreach ($request->user_menu as $key => $value) {
                $chk_save_name = 'chk_save_'.$value;
                $chk_edit_name = 'chk_edit_'.$value;
                $chk_delete_name = 'chk_delete_'.$value;
                $chk_approve_name = 'chk_approve_'.$value;

                $chk_save_value = $request->$chk_save_name;
                $chk_edit_value = $request->$chk_edit_name;
                $chk_delete_value = $request->$chk_delete_name;
                $chk_approve_value = $request->$chk_approve_name;

                if(!empty($chk_save_value)){
                    foreach ($chk_save_value as $val){
                        $action_val[$value][]=$val;
                    }
                }
                if(!empty($chk_edit_value)){
                    foreach ($chk_edit_value as $val){
                        $action_val[$value][]=$val;
                    }
                }
                if(!empty($chk_delete_value)){
                    foreach ($chk_delete_value as $val){
                        $action_val[$value][]=$val;
                    }
                }
                if(!empty($chk_approve_value)){
                    foreach ($chk_approve_value as $val){
                        $action_val[$value][]=$val;
                    }
                }
                if(!(empty($action_val[$value])))
                {
                    $action=implode(',',$action_val[$value]);
                }
                else
                    $action ="";

                $insertInUserPrivilege = UserPrivilege::create([
                    'user_group' => $request->user_group,
                    'menu_id' => $value,
                    'actions' => $action,
                    'created_by' => $logged_user_id,
                ]);
            }
        }
         $Privilege = DB::table('user_privileges')
                        ->where('user_group','=',Auth::user()->user_group)
                        ->get();
                
                foreach ($Privilege as $p) {
                    $cart[$p->menu_id] = $p->actions;
                }
                
                \Session::put('privilege', $cart);

        return redirect('/userprivilege')->with('success', 'User Privilege Menu has been added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $user_group = $request->user_group;

        $userMenus = DB::table('user_privileges')
            ->where('user_group','=',$user_group)
            ->get();

        return response()->json($userMenus);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
