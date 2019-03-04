<?php

namespace App\Http\Controllers;

use App\ministry;
use App\Sector;
use App\SubSector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Auth;

class MinistryController extends Controller {

    public $commonclass;

    public function __construct() {
        $this->commonclass = app('CommonClass');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $menuid = $request->mid;
        $showministry = ministry::all();
        return view('ministrycreation.index', compact('commonclass', 'showministry', 'menuid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        $sector = Sector::where('status', 1)->get();
        $subsector = SubSector::where('status', 1)->get();

        return view('ministrycreation.create', compact('commonclass', 'sector', 'subsector'));
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
            'keyword' => 'required|min:2|max:2|unique:ministries,keyword,NULL,id,deleted_at,NULL',
            'ministry_name' => 'required',
            'status' => 'required',
        ]);


        if ($this->commonclass->create_custom('ministry', $request->all())) {
            return redirect('ministry')->with('success', config('messages.1'));
        }
        return redirect('ministry')->with(['errors', config('messages.5')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $sector = Sector::where('status', 1)->get();
        $subsector = SubSector::where('status', 1)->get();
        $show_editministry = ministry::find($id);

        return view('ministrycreation.edit', compact('commonclass', 'show_editministry', 'sector', 'subsector'));
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
            'keyword' => 'required|min:2|max:2|unique:ministries,keyword,' . $id . ',id,deleted_at,NULL',
            'ministry_name' => 'required',
            'status' => 'required',
        ]);

        if ($this->commonclass->update_custom('ministry', $id, $request->all())) {
            return redirect('ministry')->with('success', config('messages.2'));
        }
        return redirect('ministry')->with(['errors', config('messages.6')]);
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

        if ($this->commonclass->soft_delete_custom('ministry', $id)) {
            return redirect('ministry')->with('success', config('messages.3'));
        } else {
            return redirect('ministry')->with(['errors', config('messages.7')]);
        }
    }

}
