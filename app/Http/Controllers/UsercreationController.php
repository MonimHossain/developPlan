<?php

namespace App\Http\Controllers;

use App\Classes\TimeFormatingClass;
use App\User;
use App\Usergroup;
use Carbon\Carbon;
use File;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Classes\CommonClass;
use App\Sector;
use App\Wings;

class UsercreationController extends Controller {

    public function __construct() {
        $this->middleware('language');
    }

    public function getMySqlTimeFormat($dateString) {
        try {
            return Carbon::createFromFormat('d-m-Y\TH:i:s.uT', $dateString);
        } catch (\Exception $ex) {
            try {
                //dd(Carbon::createFromFormat('Y-m-d', $dateString));
                return Carbon::createFromFormat('d-m-Y', $dateString);
            } catch (\Exception $ex) {
                
            }
        }
        return null;
    }

    public function index(Request $request) {
        // return Usergroup::pluck('group_name','id');
        $usergroups = Usergroup::all();
        $usercreation = User::all();
        $commonClass = new CommonClass();

        return view('usercreation.index', compact('commonClass', 'usercreation', 'usergroups'));
    }

    public function create() {
        $usergroups = Usergroup::all();
        $user = User::all();
        $commonClass = new CommonClass();
        return view('usercreation.create', compact('commonClass', 'usergroups', 'user'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_group' => 'required'
        ]);

        //$user_id=\Auth::user()->id;
        $logged_user_id = Auth::user()->id;

        if ($request->expiration_date == null)
            $expiration_date = null;
        else
            $expiration_date = $this->getMySqlTimeFormat($request->expiration_date);


        if ($request->parent_user == null)
            $parent_user = 0;
        else
            $parent_user = $request->parent_user;


        $user_image = $request->file('user_img_file');



        if ($user_image) {

            $image_url = app('CommonClass')->insert_attachement('user-images', $user_image);

            if ($image_url) {
                $insertInUserCreation = User::create([
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => bcrypt($request->password),
                            'admin' => 0,
                            'user_group' => $request->user_group,
                            'parent_user' => $parent_user,
                            'expiration_date' => $expiration_date,
                            'createdby' => $logged_user_id,
                            'user_image' => $image_url,
                            'department_id' => $request->department_id
                ]);
            } else {

                return redirect('usercreation')->withErrors(['Invalid file type.']);
            }
        } else {
            $insertInUserCreation = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                        'admin' => 0,
                        'user_group' => $request->user_group,
                        'parent_user' => $parent_user,
                        'expiration_date' => $expiration_date,
                        'createdby' => $logged_user_id,
                        'user_image' => null,
                        'department_id' => $request->department_id
            ]);
        }






        return redirect('/usercreation')->with('success', 'User has been added Successfully.');
    }

    public function show($id) {
        
    }

    public function edit($id) {
        $usergroups = Usergroup::all();
        $all_user = User::all();
        $user = User::find($id);
        $commonClass = new CommonClass();
        //$expiration_date = $this->getTimeFormatForUpdate($user->expiration_date);
        //dd(decrypt($user->password));
        //$decrypted = Crypt::decrypt($user->password);
        //dd($decrypted);

        return view('usercreation.edit', compact('user', 'usergroups', 'all_user', 'commonClass'));
    }

    public function update(Request $request, $id) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'user_group' => 'required'
        ]);

        $logged_user_id = Auth::user()->id;

        if ($request->expiration_date == null)
            $expiration_date = null;
        else
            $expiration_date = $this->getMySqlTimeFormat($request->expiration_date);

        if ($request->parent_user == null)
            $parent_user = 0;
        else
            $parent_user = $request->parent_user;


//.....................uplinkimage.......................//

        $user_Image = $request->file('user_img_file');

        $user = User::find($id);
        if ($user_Image) {
            //unlink($user->user_image);
        } else {
            
        }
//.....................endUplinkImage............................//

        if ($user_Image) {
            $imageFileType = $user_Image->getClientOriginalExtension();
            $imageName = $request->name . '.' . $imageFileType;
            $directory = 'user-images/';
            $imageUrl = $directory . $imageName;
            $user_Image->move($directory, $imageName);
        } else {
            $imageUrl = $request->hidden_img;
        }


        $updateInUserCreation = User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $request->password_old,
            'user_group' => $request->user_group,
            'parent_user' => $parent_user,
            'expiration_date' => $expiration_date,
            'modifiedby' => $logged_user_id,
            'user_image' => $imageUrl,
            'department_id' => $request->department_id
        ]);

        return redirect('/usercreation')->with('success', 'User has been Updated Successfully.');
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();

        return redirect('/usercreation')->with('success', 'User has been deleted Successfully.');
    }

    public function ajaxrequest(Request $request) {
        $group = $request->groupdata;

        switch ($group) {

            case 13:  //agency
                return response()->json(\App\agency::pluck('agency_name', 'id'));
                break;
            case 15:  //agency
                return response()->json(\App\agency::pluck('agency_name', 'id'));
                break;
            case 10:  //sector
                return response()->json(\App\Sector::pluck('sector_name', 'id'));
                break;
            case 9:  //sector
                return response()->json(\App\Sector::pluck('sector_name', 'id'));
                break;
            case 11:  //subsector
                return response()->json(\App\SubSector::pluck('sub_sector_name', 'id'));
                break;
            case 19:  //subsector
                return response()->json(\App\SubSector::pluck('sub_sector_name', 'id'));
                break;
            case 12:  //ministry
                return response()->json(\App\ministry::pluck('ministry_name', 'id'));
                break;
            case 14:  //ministry
                return response()->json(\App\ministry::pluck('ministry_name', 'id'));
                break;
            case 18:  //wings
                return response()->json(\App\Wings::pluck('wings_type', 'id'));
                break;
            default:
                return response()->json([]);
        }
    }

}
