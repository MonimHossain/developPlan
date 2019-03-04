<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\demand;

class reAppropriationController extends Controller
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
        return view('reappropriation.index', compact('projects'));
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
    public function ReApproptiationData(Request $request)
    {
       $reAppropriation = array();
       $count = count($request->value);
       $i = 0 ;
       while($i < $count){
           if($request->value[$i][12] == 0){
               $reAppropriation["project_id"]= $request->value[$i][0];
               $reAppropriation["target_project_id"]= $request->value[$i][1];
               $reAppropriation["re_appro_total"]= $request->value[$i][2] ;
               $reAppropriation["re_appro_taka"]= $request->value[$i][3];
               $reAppropriation["re_appro_revenue"]= $request->value[$i][4];
               $reAppropriation["re_appropriation_capital"]= $request->value[$i][5];
               $reAppropriation["re_appropriation_capital_rpa"]= $request->value[$i][6];
               $reAppropriation["re_appropriation_capital_revenue"]= $request->value[$i][7];
               $reAppropriation["re_appropriation_cd_vat"]= $request->value[$i][8];
               $reAppropriation["re_appropriation_pa"]= $request->value[$i][9];
               $reAppropriation["re_appropriation_pa_rpa"]= $request->value[$i][10];
               $reAppropriation["re_appropriation_others"]= $request->value[$i][11];
               $reAppropriation["status"]= 0;
               $this->commonclass->create_custom('ReAppropriation', $reAppropriation);
               unset($reAppropriation);
           }
           $i++;
       }
   
       return 'Success';
}
}
