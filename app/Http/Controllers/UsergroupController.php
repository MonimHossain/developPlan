<?php

namespace App\Http\Controllers;

use App\Classes\CommonClass;
use Illuminate\Http\Request;
use App\Usergroup;

class UsergroupController extends Controller
{
  public $commonclass;
    public function __construct()
    {
        $this->commonclass=app('CommonClass');
        $this->middleware('language');

    }

    public function index(Request $request)
    {
            //  return Usergroup::onlyTrashed()->get()->each(function($data){
            //   $data->restore();
            // });
          

        $commonClass = new CommonClass();
        $usergroup = Usergroup::all();
        return view('usergroup.index', compact('usergroup','commonClass'));
    }

    public function create()
    {
        $usergroups = Usergroup::all();
        return view('usergroup.create',compact('usergroups'));
    }

    public function store(Request $request)
    {

      if(!$this->commonclass->check_privilege(0)){
          return back()->withErrors([config('messages.4')]);
      }
        $request->validate([
            'group_name'=>'required'
        ]);

        if ($request->sub_group==null)
            $sub_group = 0;
        else
            $sub_group = $request->sub_group;

        $user_id=\Auth::user()->id;
          $group = new Usergroup([
            'company_id' => 0,
            'group_name' => $request->get('group_name'),
            'sub_group' => $sub_group,
            'description'=> $request->get('description'),
            'created_by'=> $user_id,
            'updated_by'=> 0,
            'isactive'=> 1
          ]);
          $group->save();
          return redirect('/usergroup')->with('success', 'User group has been added Successfully.');
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

    public function edit($id)
    {
        $usergroups = Usergroup::all();
        $usergroup = Usergroup::find($id);

        return view('usergroup.edit', compact('usergroup','usergroups'));
    }

    public function update(Request $request, $id)
    {

      if(!$this->commonclass->check_privilege(1)){
          return back()->withErrors([config('messages.4')]);
      }
        $user_id=\Auth::user()->id;

        $request->validate([
            'group_name'=>'required'
          ]);

        if ($request->sub_group==null)
            $sub_group = 0;
        else
            $sub_group = $request->sub_group;

        $group = Usergroup::find($id);
        $group->group_name = $request->get('group_name');
        $group->sub_group = $sub_group;
        $group->description = $request->get('description');
        $group->updated_by = $user_id;
        $group->save();

        return redirect('/usergroup')->with('success', 'User group has been updated Successfully.');
    }

    public function destroy($id)
    {
      if(!$this->commonclass->check_privilege(2)){
          return back()->withErrors([config('messages.4')]);
      }

        if($this->commonclass->soft_delete_custom('Usergroup',$id))
        {
           return redirect('usergroup')->with('success',config('messages.3'));
        }
        else
        {
            return redirect('usergroup')->with(['errors',config('messages.7')]);

        }
    }
  }
