<?php

namespace App\Http\Controllers;

use App\ppptargets;
use App\pppgole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Auth;

class PpptargetsController extends Controller
{

   public $commonclass;
    public function __construct(){
        $this->commonclass=app('CommonClass');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd('hhhh');
        $commonClass = $this->commonclass;
        $menuid=$request->mid;
        $ppptargets=ppptargets::all();
//        return $sdgstargets;
        return view('ppptargets.index',compact('ppptargets','menuid','commonClass'));
    }
    
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $commonClass = $this->commonclass;
        $pppgoles=pppgole::all();
        return view('ppptargets.create',compact('pppgoles','commonClass'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (!$this->commonclass->check_privilege(0)) {
            return back()->withErrors([config('messages.4')]);
        }

        $request->validate([
            'gole_id' => 'required',
            'targets' => 'required',
        ]);

        // $insert_to_ministry=new ministry();
        // $insert_to_ministry->ministry_name=$request->ministry_name;
        // $insert_to_ministry->ministry_description=$request->ministry_description;
        // $insert_to_ministry->status=$request->status;
        // $insert_to_ministry->save();
        if ($this->commonclass->create_custom('ppptargets', $request->all())) {
            return redirect('ppptargets')->with('success', config('messages.1'));
        }
        return redirect('ppptargets')->with(['errors', config('messages.5')]);
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
        $commonClass = $this->commonclass;
        $pppgoles=pppgole::all();
        $ppptargets=ppptargets::find($id);
        return view('ppptargets.edit',compact('ppptargets','pppgoles','commonClass'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        if (!$this->commonclass->check_privilege(1)) {
            return back()->withErrors([config('messages.4')]);
        }

        $request->validate([
            'gole_id' => 'required',
            'targets' => 'required',
        ]);

        if ($this->commonclass->update_custom('ppptargets', $id, $request->all())) {
            return redirect('ppptargets')->with('success', config('messages.2'));
        }
        return redirect('ppptargets')->with(['errors', config('messages.6')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (!$this->commonclass->check_privilege(2)) {
            return back()->withErrors([config('messages.4')]);
        }

        if ($this->commonclass->soft_delete_custom('ppptargets', $id)) {
            return redirect('ppptargets')->with('success', config('messages.3'));
        } else {
            return redirect('ppptargets')->with(['errors', config('messages.7')]);
        }
    }

}
