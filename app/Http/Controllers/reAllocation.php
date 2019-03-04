<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\demand;

class reAllocation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $commonclass;

    public function __construct() {
        $this->commonclass = app('CommonClass');
    }
    
    public function index()
    {
        $projects = demand::with('project_name:id,unapprove_project_id,project_title,date_of_commencement,date_of_completion')->get();
        return view('reAllocation.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function ReAllocationData(Request $request)
    {
       $reAllocData = array();
       $count = count($request->value);
       $i = 0 ;
       while($i < $count){
           if($request->value[$i][11] == 0){
               $reAllocData["project_id"]= $request->value[$i][0];
               $reAllocData["re_allocation_total"]= $request->value[$i][1] ;
               $reAllocData["re_allocation_taka"]= $request->value[$i][2];
               $reAllocData["re_allocation_taka_revenue"]= $request->value[$i][3];
               $reAllocData["re_allocation_capital"]= $request->value[$i][4];
               $reAllocData["re_allocation_capital_rpa"]= $request->value[$i][5];
               $reAllocData["re_allocation_revenue"]= $request->value[$i][6];
               $reAllocData["re_allocation_cd_vat"]= $request->value[$i][7];
               $reAllocData["re_allocation_pa"]= $request->value[$i][8];
               $reAllocData["re_allocation_pa_rpa"]= $request->value[$i][9];
               $reAllocData["re_allocation_others"]= $request->value[$i][10];
               $reAllocData["status"]= 0;
               $this->commonclass->create_custom('ReAllocation', $reAllocData);
               unset($reAllocData);
           }
           $i++;
       }
   
       return 'Success';
}
}
    

