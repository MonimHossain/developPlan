<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FiscalYear;
use App\Sector;
use App\ministry;
use App\demand;
use App\ForeignAidBudgetDetail;
use App\ForeignAidBudgetMaster;
use App\approved_project_info;
use DB;

class ForeignAidBudgetAndAccountsController extends Controller
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
    public function index()
    {


        //
    $fiscalyears=FiscalYear::all('id','start_date','end_date');
    $sectors=Sector::all('id','sector_name');

    return view('faBudgetAndAccounts.index',compact('fiscalyears','sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $fiscalyears=FiscalYear::all('id','start_date','end_date');
        $sectors=Sector::all('id','sector_name'); 
        return view('faBudgetAndAccounts.edit',compact('fiscalyears','sectors'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        // for checking the permission of save data()
       
            if(!$this->commonclass->check_privilege(0)){
                return back()->withErrors(['User does not have Save privilege']);
            }
        
           $rules=[
                    'allocation_for'=>'required',
                    'financial_year'=>'required',
                    'sector_id'=>'required',
                    'ministry_id'=>'required',
                    'file'=>'required|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel',
                    
                  ];

           //for set  attribute  custom name:) 
           $attr=[];
            

           if($request->has('project_id')){
            foreach($request->total_amount as $key=>$value){

                    //rules for validations manualy ---- :) 
                    $rules['project_id.'.$key]='required';
                    $rules['total_amount.'.$key]='required';
                    $rules['current_year_adp_pa.'.$key]='required';
                    $rules['current_year_adp_rpa.'.$key]='required';
                    $rules['current_year_radp_pa.'.$key]='required';
                    $rules['current_year_radp_rpa.'.$key]='required';
                    $rules['next_year_adp_pa.'.$key]='required';
                    $rules['next_year_adp_rpa.'.$key]='required';

                    // custom attribute set
                    $attr['total_amount.'.$key]='Total amount of row-'.$key;
                    $attr['current_year_adp_pa.'.$key]='Current year adp pa of row-'.$key;
                    $attr['current_year_adp_rpa.'.$key]='Current year adp rpa of row-'.$key;
                    $attr['current_year_radp_pa.'.$key]='Current year radp pa of row-'.$key;
                    $attr['current_year_radp_rpa.'.$key]='Current year radp rpa of row-'.$key;
                    $attr['next_year_adp_pa.'.$key]='Next year adp pa of row-'.$key;
                    $attr['next_year_adp_rpa.'.$key]='Next year adp rpa of row-'.$key;
           }

           }
           
                $validation=\Validator::make($request->all(),$rules,[],$attr)->validate();


                if($request->hasFile('file')&& $request->file('file')->isValid()){

                         $file=$request->file('file');
                    }
                     $master_table_data=$request->only('allocation_for','financial_year','sector_id','ministry_id')+['file'=>'dummy'];

                    DB::beginTransaction();

                    if( $ref_id=$this->commonclass->create_custom('ForeignAidBudgetMaster',$master_table_data)){

                    if($request->has('project_id') && !empty($request->project_id)){
                        foreach($request->project_id as $key=>$value){

                             $data[]=[
                                'master_id'=>$ref_id,
                                'project_id'=>$request->project_id[$key],
                                'total_amount'=>$request->total_amount[$key],
                                'current_year_adp_pa'=>$request->current_year_adp_pa[$key],
                                'current_year_adp_rpa'=>$request->current_year_adp_rpa[$key],
                                'current_year_radp_pa'=>$request->current_year_radp_pa[$key],
                                'current_year_radp_rpa'=>$request->current_year_radp_rpa[$key],
                                'next_year_adp_pa'=>$request->next_year_adp_pa[$key],
                                'next_year_adp_rpa'=>$request->next_year_adp_pa[$key],

                                'created_by' => auth()->id(),
                                'updated_by' => auth()->id(),
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                                'status' => 1,

                             ];

                        }

                         $success=ForeignAidBudgetDetail::insert($data);
                         if($success){
                    
                     //file upload and store path

                        if ($filepath = $this->commonclass->insert_attachement(6,$file,$ref_id,null,true)) {
                            ForeignAidBudgetMaster::find($ref_id)->update(['file' => $filepath]);
                         }
                        else{
                            ForeignAidBudgetMaster::find($ref_id)->update(['file' => ""]);
                        }

                        DB::commit();

                            return back()->with('success','inserted success');
                         }
                         else{
                            DB::rollback();
                            return back()->withErrors(['insertion failed']);
                         }

                    }
                    DB::rollback();
                    return back()->withErrors(['Can not insert because there have no Project!!!!']);

                 }


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
               //return $request->all();


                if(!$this->commonclass->check_privilege(1)){
                return back()->withErrors(['User does not have Save privilege']);
            }
        
           $rules=[
                    'allocation_for'=>'required',
                    'financial_year'=>'required',
                    'sector_id'=>'required',
                    'ministry_id'=>'required',
                    
                  ];

           //for set  attribute  custom name:) 
           $attr=[];
            

           if($request->has('project_id')){
            foreach($request->total_amount as $key=>$value){

                    //rules for validations manualy ---- :) 
                    $rules['project_id.'.$key]='required';
                    $rules['total_amount.'.$key]='required';
                    $rules['current_year_adp_pa.'.$key]='required';
                    $rules['current_year_adp_rpa.'.$key]='required';
                    $rules['current_year_radp_pa.'.$key]='required';
                    $rules['current_year_radp_rpa.'.$key]='required';
                    $rules['next_year_adp_pa.'.$key]='required';
                    $rules['next_year_adp_rpa.'.$key]='required';

                    // custom attribute set
                    $attr['total_amount.'.$key]='Total amount of row-'.$key;
                    $attr['current_year_adp_pa.'.$key]='Current year adp pa of row-'.$key;
                    $attr['current_year_adp_rpa.'.$key]='Current year adp rpa of row-'.$key;
                    $attr['current_year_radp_pa.'.$key]='Current year radp pa of row-'.$key;
                    $attr['current_year_radp_rpa.'.$key]='Current year radp rpa of row-'.$key;
                    $attr['next_year_adp_pa.'.$key]='Next year adp pa of row-'.$key;
                    $attr['next_year_adp_rpa.'.$key]='Next year adp rpa of row-'.$key;
           }

           }
           
             $validation=\Validator::make($request->all(),$rules,[],$attr)->validate();





       
        foreach($request->project_id as $key=>$row){
            
            $insert_data[]=[
                'master_id'=>$id,
                'project_id'=>$request->project_id[$key],
                'total_amount'=>$request->total_amount[$key],
                'current_year_adp_pa'=>$request->current_year_adp_pa[$key],
                'current_year_adp_rpa'=>$request->current_year_adp_rpa[$key],
                'current_year_radp_pa'=>$request->current_year_radp_pa[$key],
                'current_year_radp_rpa'=>$request->current_year_radp_rpa[$key],
                'next_year_adp_pa'=>$request->next_year_adp_pa[$key],
                'next_year_adp_rpa'=>$request->next_year_adp_pa[$key],
                'created_by' => auth()->id(),
                'updated_by' => auth()->id(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => 1,
            ];
        }
          $data=ForeignAidBudgetDetail::where('master_id',$id)->get();
          foreach($data as $get_id){
             $detail_id[]=$get_id->id;
          }

          DB::beginTransaction();
            if(ForeignAidBudgetDetail::whereIn('id',$detail_id)->forceDelete()){

                if($request->hasFile('file')&&$request->file('file')->isValid()){
                       $ref_id=$id;
                       $file=$request->file('file');
                    if ($filepath = $this->commonclass->insert_attachement(6,$file,$ref_id,null,true)) {

                            if(! ForeignAidBudgetMaster::find($ref_id)->update(['file' => $filepath])){
                                DB::rollback();
                                return redirect('fa-budget-accounts/create')->withErrors(['Update Not Successfully!Problem With File Upload.']);
                            }
                         }
                }
                if(ForeignAidBudgetMaster::find($id)->update(
                    [   'allocation_for'=>$request->allocation_for,
                        'financial_year'=>$request->financial_year
                    ]
                  )){


                    if(ForeignAidBudgetDetail::insert($insert_data)){

                    DB::commit();
                    return redirect()->route('fa-budget-accounts.create')->with('success','updated successfully');
            }
            
                    return redirect()->route('fa-budget-accounts.create')->withErrors(['Update is not successfull']);
                }
                else{
                    DB::rollback();
                }

    }
        else DB::rollback();
         return redirect()->route('fa-budget-accounts.create')->withErrors(['Update Not successfull']);

    
    
}



public function destroy($id)
    {
        //
    }
}
