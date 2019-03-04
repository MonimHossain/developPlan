<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guideline;
use App\FiscalYear;
use File;

class GuidelineController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $guidelines = Guideline::all();
        return view('guideline.index', compact('guidelines', 'menuid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
//        $menuid=$request->mid;
//        Session::put('menuid', $menuid);
//        Session::get('menuid');
        //dd($menuid."===".Session::get('menuid'));
        //$routeArray = app('request')->route()->getAction();
        //$menulink = class_basename($routeArray['as']);
        //$menu = DB::table('menus')->where('link', $menulink)->first();
        //$menuid = $menu->id;
        //dd($menulink);
        $fiscalyears = FiscalYear::all();

        return view('guideline.create', compact('fiscalyears'));
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

        if ($request->hasFile('file_name')) {
            $file = $request->file_name;
        }

        $agency_date = $this->commonclass->dateToMysql($request->agency_date);
        $ministry_date = $this->commonclass->dateToMysql($request->ministry_date);
        $sector_division_date = $this->commonclass->dateToMysql($request->sector_division_date);
        $request->merge(['agency_date' => $agency_date, 'ministry_date' => $ministry_date, 'sector_division_date' => $sector_division_date]);

        $all = $request->validate([
            'guideline_for' => 'required',
            'fiscal_year' => 'required',
            'call_notice_type' => 'required',
            'agency_date' => 'required|date',
            'ministry_date' => 'required|date',
            'sector_division_date' => 'required|date',
            'comment' => 'nullable',
            'file_name' => 'required',
            'status' => 'required',
        ]);
        $filename = ['file_name' => ''];
        array_merge($all, $filename);

        //change  the guideline status if same guideline exits
        $guidelinestatus = Guideline::where('guideline_for', $request->guideline_for)
                ->where('call_notice_type', $request->call_notice_type)
                ->where('fiscal_year', $request->fiscal_year)
                ->get();

        if ($guidelinestatus) {
            if ($guidelinestatus->count() > 0) {
                foreach ($guidelinestatus as $singleguidelinestatus) {
                    $singleguidelinestatus->guideline_status = 0;
                    $singleguidelinestatus->save();
                }
            }
        }

        if ($ref_id = $this->commonclass->create_custom('Guideline', $all+['from_month'=>$request->from_month,'to_month'=>$request->to_month])) {
            if ($filepath = $this->commonclass->insert_attachement(5,$file,$ref_id,null,true)) {
                Guideline::find($ref_id)->update(['file_name' => $filepath]);
            } else {
                Guideline::find($ref_id)->update(['file_name' => ""]);
            }

            return redirect('guideline')->with('success', config('messages.1'));
        }
        return redirect('guideline/create')->with(['errors', config('messages.5')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //

        $guideline = Guideline::find($id);


        return view('guideline.showguideline', compact('guideline'));
    }

    public function showAll() {

        $guidelines = Guideline::all();
        return view('guideline.show', compact('guidelines'));
    }

    public function download($id) {

        $download = Guideline::find($id)->file_name;

        return response()->download($download);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        $fiscalyears = \App\FiscalYear::all();
        $guideline = Guideline::find($id);

        return view('guideline.edit', compact('guideline', 'fiscalyears'));
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


        $guideline = Guideline::find($id);




        $agency_date = $this->commonclass->dateToMysql($request->agency_date);
        $ministry_date = $this->commonclass->dateToMysql($request->ministry_date);
        $sector_division_date = $this->commonclass->dateToMysql($request->sector_division_date);
        $request->merge(['agency_date' => $agency_date, 'ministry_date' => $ministry_date, 'sector_division_date' => $sector_division_date]);

        $request->validate([
            'guideline_for' => 'required',
            'fiscal_year' => 'required',
            'agency_date' => 'required|date',
            'ministry_date' => 'required|date',
            'sector_division_date' => 'required|date',
            'comment' => 'nullable',
            'status' => 'required',
        ]);

        if ($request->hasFile('file_name')) {
            $file = $request->file_name;






            if ($filepath = $this->commonclass->insert_attachement('guideline', $file)) {

                $path = ['file_name' => $filepath];
                $all = array_merge($request->all(), $path);
            }
        } else {
            $filepath = $guideline->file_name;
            $path = ['file_name' => $filepath];
            $all = array_merge($request->all(), $path);
        }








        // $insert_to_ministry=new ministry();
        // $insert_to_ministry->ministry_name=$request->ministry_name;
        // $insert_to_ministry->ministry_description=$request->ministry_description;
        // $insert_to_ministry->status=$request->status;
        // $insert_to_ministry->save();
        if ($this->commonclass->update_custom('Guideline', $id, $all+['from_month'=>$request->from_month,'to_month'=>$request->to_month])) {

            return redirect('guideline')->with('success', config('messages.2'));
        }
        return redirect('guideline/update')->with(['errors', config('messages.5')]);
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

        if ($this->commonclass->soft_delete_custom('Guideline', $id)) {
            return redirect('guideline')->with('success', config('messages.3'));
        } else {
            return redirect('guideline')->with(['errors', config('messages.7')]);
        }
    }

}
