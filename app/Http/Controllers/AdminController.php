<?php

namespace App\Http\Controllers;

use App\newprojectlist;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\UserPrivilege;

class AdminController extends Controller {

    public function login(Request $request) {
        /* if(!Seesion::has('id')){
          return redirect('/');
          } */
        $cart = array();
        if ($request->isMethod('post')) {
            $data = $request->input();
            
            if (Auth::Attempt(['email' => $data['email'], 'password' => $data['password']])) {

                $Privilege = DB::table('user_privileges')
                        ->where('user_group', '=', Auth::user()->user_group)
                        ->get();

                foreach ($Privilege as $p) {
                    $cart[$p->menu_id] = $p->actions;
                }
                
                if(empty($cart)){
                    Session::flush();
                    return redirect('/admin')->with('flash_message_success', 'You Have No Permission.');
                }else{
                    Session::put('privilege', $cart);
                }

                return redirect('/admin/dashboard');
            } else {
                return redirect('/admin')->with('flash_message_error', 'Invalid User Name or Password');
            }
        } else {
            return view('admin.adminlogin');
        }
    }

    public function dashboard() {
        if (!Auth::check()) {
            return redirect('/admin');
        } else {
            
            $user_group = Auth::user()->user_group;
            $user_id = Auth::user()->id;

            

            if($user_group==13 || $user_group==15){//Agency
                
                $newprojectlist = \DB::table('unapproved_project_infos')->where('created_by', $user_id)->get()->take(5)->reverse();
                $newprojectlistCounts = $newprojectlist->count();

                $draftplist = \DB::table('unapproved_project_infos')->where('isdraft', '=', 1)->where('created_by', $user_id)->get();
                $draftplistCount = $draftplist->count();

                $newplist = \DB::table('unapproved_project_infos')->where('project_status', '=', null)->where('created_by', $user_id)->get();
                $newprojectCount = $newplist->count();

                $totalProject = \DB::table('unapproved_project_infos')->where('created_by', $user_id)->get();
                $totalProjectCount = $totalProject->count();

                $appplist = \DB::table('unapproved_project_infos')->where('project_status', '=', 1)->where('created_by', $user_id)->get();
                $approveprojectCount = $appplist->count();

                $guidelinelist = \DB::table('guidelines')->where('guideline_status', '=', 1)->get();
                $guidelinelistCount = $guidelinelist->count();

                $demandslist = \DB::table('demands')->where('status', '=', 1)->where('created_by', $user_id)->get();
                $demandslistCount = $demandslist->count();
            
                return view('admin.agency_dashboard', compact('draftplistCount','newprojectCount','newprojectlist','totalProjectCount', 'approveprojectCount','guidelinelist', 'guidelinelistCount', 'demandslistCount'));
            }else{
                
                $newprojectlist = \DB::table('unapproved_project_infos')->get()->take(5)->reverse();
                $newprojectlistCounts = $newprojectlist->count();

                $draftplist = \DB::table('unapproved_project_infos')->where('isdraft', '=', 1)->get();
                $draftplistCount = $draftplist->count();

                $newplist = \DB::table('unapproved_project_infos')->where('project_status', '=', null)->get();
                $newprojectCount = $newplist->count();

                $totalProject = \DB::table('unapproved_project_infos')->get();
                $totalProjectCount = $totalProject->count();

                $appplist = \DB::table('unapproved_project_infos')->where('project_status', '=', 1)->get();
                $approveprojectCount = $appplist->count();

                $guidelinelist = \DB::table('guidelines')->where('guideline_status', '=', 1)->get();
                $guidelinelistCount = $guidelinelist->count();

                $demandslist = \DB::table('demands')->where('status', '=', 1)->get();
                $demandslistCount = $demandslist->count();
                
                return view('admin.agency_dashboard', compact('draftplistCount','newprojectCount','newprojectlist','totalProjectCount', 'approveprojectCount','guidelinelist', 'guidelinelistCount', 'demandslistCount'));
            }
            
        }
    }

    public function logout() {
        Session::flush();
        return redirect('/admin')->with('flash_message_success', 'Logout Successfully');
    }

    public function index(Request $request)
    {
        return view('admin.adminlogin');
    }
}
