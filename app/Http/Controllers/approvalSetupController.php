<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\approval_setup;

class approvalSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $commonclass;

    public function __construct() {
        $this->commonclass = app('CommonClass');
    }

    public function index()
    {
        $approval_info = approval_setup::all();
        return view('approval_setup.index',compact('approval_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('approval_setup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->commonclass->check_privilege(0)){
            return back()->withErrors([config('messages.4')]);
        }
        
        $request->validate([
            'approved_by'=>'required',
        ]);
        
        if ($this->commonclass->create_custom('approval_setup', $request->all())) {
            return redirect('approval-setup')->with('success', config('messages.1'));
        }
        return redirect('approval-setup')->with(['errors', config('messages.5')]);
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
        $approval_info = approval_setup::find($id);
        return view('approval_setup.edit', compact('approval_info'));
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
        if(!$this->commonclass->check_privilege(1)){
                return back()->withErrors([config('messages.4')]);
        }
        
        $request->validate([
            'approved_by' => 'required',
        ]);

        if ($this->commonclass->update_custom('approval_setup', $id, $request->all())) {
            return redirect('approval-setup')->with('success', config('messages.2'));
        }
        return redirect('approval-setup')->with(['errors', config('messages.6')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$this->commonclass->check_privilege(2)){
            return back()->withErrors([config('messages.4')]);
        }
        if($this->commonclass->soft_delete_custom('approval_setup',$id))
          {
             return redirect('approval-setup')->with('success',config('messages.3'));
          }
          else
          {
              return redirect('approval-setup')->with(['errors',config('messages.7')]);

          }
        
        return $id;
    }
}
