<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaSource;

class PaSourceController extends Controller
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
   
        $menuid=$request->mid;
        $pasources=PaSource::all();
        return view('pasource.index',compact('pasources','menuid'));
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
        
        return view('pasource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



         $start_date= $this->commonclass->dateToMysql($request->start_date);
         $end_date= $this->commonclass->dateToMysql($request->end_date);
         $request->start_date=$start_date;
         $request->end_date=$end_date;
       
        if(!$this->commonclass->check_privilege(0)){
           
            return back()->withErrors([config('messages.4')]);
        }

        $request->validate([
            'pa_source_name'=>'required',
            'pa_source_description' => 'required',
            'status' => 'required',
        ]);


        // $insert_to_ministry=new ministry();

        // $insert_to_ministry->ministry_name=$request->ministry_name;
        // $insert_to_ministry->ministry_description=$request->ministry_description;
        // $insert_to_ministry->status=$request->status;
        // $insert_to_ministry->save();
        if($this->commonclass->create_custom('PaSource',$request->all()))
        {

             return redirect('pa-source')->with('success',config('messages.1'));
        }
         return redirect('pa-source')->with(['errors',config('messages.5')]);
       

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
        $pasource=PaSource::find($id);

        return view('pasource.edit',compact('pasource'));

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
           'pa_source_name'=>'required',
            'pa_source_description' => 'required',
            'status' => 'required',
        ]);

       if($this->commonclass->update_custom('PaSource',$id,$request->all()))
       {
          return redirect('pa-source')->with('success',config('messages.2'));
       }
        return redirect('pa-source')->with(['errors',config('messages.6')]);
        
       

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
        
          if($this->commonclass->soft_delete_custom('PaSource',$id))
          {
             return redirect('pa-source')->with('success',config('messages.3'));
          }
          else
          {
              return redirect('pa-source')->with(['errors',config('messages.7')]);

          }

        
    }
}
