<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FiscalYear;
use DB;

class FiscalYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $date = date("Y-m-d");
        $menuid=$request->mid;
        $fiscalyears= DB::table('fiscal_years')
                      ->select(array('*'))
                      ->whereDate('end_date', '>', $date)
                      ->where('deleted_at', '=', Null)
                      ->where('year_status', '=', 1)
                      ->where('status', '=', 1)
                      ->get();
        
        DB::table('fiscal_years')
                ->whereDate('end_date', '<', $date)
                ->update(['status' => 0, 'year_status' => 0]);
        
        return view('fiscalyear.index',compact('fiscalyears','menuid'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//        $menuid=$request->mid;
//        Session::put('menuid', $menuid);
//        Session::get('menuid');

        //dd($menuid."===".Session::get('menuid'));

        //$routeArray = app('request')->route()->getAction();
        //$menulink = class_basename($routeArray['as']);
        //$menu = DB::table('menus')->where('link', $menulink)->first();
        //$menuid = $menu->id;
        //dd($menulink);

        return view('fiscalyear.create');
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

            $start_date= $this->commonclass->dateToMysql($request->start_date);
            $end_date= $this->commonclass->dateToMysql($request->end_date);
            $request->merge(['start_date'=>$start_date,'end_date'=>$end_date]);





       $valid= $request->validate([
            'start_date'=>'required|date',
            'end_date' => 'required|date',
            'year_status' => 'required',
//            'total_amount[]' => 'required',
            
        ]);





        // $insert_to_ministry=new ministry();

        // $insert_to_ministry->ministry_name=$request->ministry_name;
        // $insert_to_ministry->ministry_description=$request->ministry_description;
        // $insert_to_ministry->status=$request->status;
        // $insert_to_ministry->save();
        if($this->commonclass->create_custom('FiscalYear',$request->all()))
        {

             return redirect('fiscal-year')->with('success',config('messages.1'));
        }
         return redirect('fiscal-year')->with(['errors',config('messages.5')]);


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
        //
        $fiscalyear=FiscalYear::find($id);

        return view('fiscalyear.edit',compact('fiscalyear'));

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

            $start_date= $this->commonclass->dateToMysql($request->start_date);
            $end_date= $this->commonclass->dateToMysql($request->end_date);
            $request->merge(['start_date'=>$start_date,'end_date'=>$end_date]);
            $valid= $request->validate([
            'start_date'=>'required|date',
            'end_date' => 'required|date',
            'year_status' => 'required',
//            'status' => 'required',
        ]);



       if($this->commonclass->update_custom('FiscalYear',$id,$request->all()))
       {
          return redirect('fiscal-year')->with('success',config('messages.2'));
       }
        return redirect('fiscal-year')->with(['errors',config('messages.6')]);



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

          if($this->commonclass->soft_delete_custom('FiscalYear',$id))
          {
             return redirect('fiscal-year')->with('success',config('messages.3'));
          }
          else
          {
              return redirect('fiscal-year')->with(['errors',config('messages.7')]);

          }


    }
}
