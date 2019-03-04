<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BudgetHead;

class BudgetHeadController extends Controller
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
        $budgetheads=BudgetHead::all();
        return view('budgethead.index',compact('budgetheads','menuid'));
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
        
        return view('budgethead.create');
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
            'budget_head_name'=>'required',
            'budget_head_description' => 'required',
            'status' => 'required',
        ]);


        // $insert_to_ministry=new ministry();

        // $insert_to_ministry->ministry_name=$request->ministry_name;
        // $insert_to_ministry->ministry_description=$request->ministry_description;
        // $insert_to_ministry->status=$request->status;
        // $insert_to_ministry->save();
        if($this->commonclass->create_custom('BudgetHead',$request->all()))
        {

             return redirect('budget-head')->with('success',config('messages.1'));
        }
         return redirect('budget-head')->with(['errors',config('messages.5')]);
       

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
        $budgethead=BudgetHead::find($id);

        return view('budgethead.edit',compact('budgethead'));

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
           'budget_head_name'=>'required',
            'budget_head_description' => 'required',
            'status' => 'required',
        ]);

       if($this->commonclass->update_custom('BudgetHead',$id,$request->all()))
       {
          return redirect('budget-head')->with('success',config('messages.2'));
       }
        return redirect('budget-head')->with(['errors',config('messages.6')]);
        
       

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
        
          if($this->commonclass->soft_delete_custom('BudgetHead',$id))
          {
             return redirect('budget-head')->with('success',config('messages.3'));
          }
          else
          {
              return redirect('budget-head')->with(['errors',config('messages.7')]);

          }

        
    }
}
