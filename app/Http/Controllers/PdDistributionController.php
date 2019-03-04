<?php

namespace App\Http\Controllers;

use App\Pd_distribution;
use Illuminate\Http\Request;
use App\Sector;
use App\SubSector;
use App\Ministry;
use App\programming_division_distribution_dtl;
use App\programming_division_distribution_mst;
use App\FinanceDivisionDistribution;
use App\Events\min_wise_details;
use App\fiscalYear;


class PdDistributionController extends Controller
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
    public function index(Request $request)
    {
        // if($request->fiscal_year==null)
        // {
        //     return back()->withErros(['please select fiscal year']);
        // }
        if($request->fiscal_year)
        {
            $ceiling_amount=FinanceDivisionDistribution::where('ceiling_for',$request->ceiling_for)->where('financial_year',$request->fiscal_year)->orderBy('id','desc')->get();
            if(count($ceiling_amount)>0)
            {
                 $ceiling_amount=$ceiling_amount->first()->ceiling_amount ? : 0;
            }
            else{
                 $ceiling_amount=0;
            }
           
        }
        else{
            $ceiling_amount=0;
        }
     
      $fiscalYear=fiscalYear::all();
      $sector_id=null;
      $subsector_id=null;
      $sector= Sector::where('status',1)->get();
      $subsector= SubSector::where('status',1)->get();
      if($request->sec!=null)
      {
       $ministry=Ministry::where('sector_id',$request->sec);
       $sector_id=$request->sec;
       if($request->sub_sec!=null)
           {
               $ministry=$ministry->where('subsector_id',$request->sub_sec);
               $subsector_id=$request->sub_sec;
           }
      $ministry=$ministry->get();
      }
      
      else
      {
        $ministry=[];
      }
      $selectedfiscalYear=$request->fiscal_year;
      $ceiling_for=$request->ceiling_for;

      return view('programmingDivision.index',compact('sector','subsector','ministry','sector_id','subsector_id','ceiling_amount','fiscalYear','selectedfiscalYear','ceiling_for'));
    }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create(Request $request)
    {
     $project_celling=programming_division_distribution_mst::with('allocated_ministry')->get();

      return view('programmingDivision.show',compact('project_celling'));
    }
  
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $master_id=$this->commonclass->create_custom('programming_division_distribution_mst',$request->all());
        if($master_id)
        {
            $data=['ministry_id'=>$request->ministry_id,'amount'=>$request->amount];
            if(!empty( (array) $request->ministry_id))
            {
                 event(new min_wise_details($data,$master_id));
            }
               
        }
            return back()->with('success',config('messages.1'));
       
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pd_distribution  $pd_distribution
     * @return \Illuminate\Http\Response
     */
    public function show(Pd_distribution $pd_distribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pd_distribution  $pd_distribution
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $allocated_ministry=programming_division_distribution_mst::with('allocated_ministry')->find($id);
        return view('programmingDivision.edit',compact('allocated_ministry'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pd_distribution  $pd_distribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //return $request->all();
        $logged_user_id = \Auth::user()->id;
        $celing_mst = programming_division_distribution_mst::find($id);

        $request->cailing_for;
        $celing_mst->ceiling_balance = $request->ceiling_balance;
        $celing_mst->ceiling_for = $request->ceiling_for;
        $celing_mst->ceiling_amount = $request->ceiling_amount;
        $celing_mst->created_by = $logged_user_id;
        $celing_mst->updated_by = $logged_user_id;
        $celing_mst->status = 1;
        $celing_mst->save();   
        $res = programming_division_distribution_dtl::where('master_id',$id)->delete();
         $celing_details=array();
                foreach ($request->ministry_id as $key => $v) {
                    $celing_details [] = [
                        'master_id' =>$id,
                        'ministry_id' =>$v,
                        'amount' => $request->amount[$key],
                        'created_by' => $logged_user_id,
                        'updated_by' => $logged_user_id,
                        'status' => 1,
                    ];
                }

                if(!empty($celing_details)){
                    programming_division_distribution_dtl::insert($celing_details);
                }
                return back()->with('success',config('messages.3'));
    }

     public function special_acount($id)
    {
    project_wise_ceiling_distribution_mst::where('id',$id)->update(['is_special_account'=>1]);
    return back()->with('success', 'Special Acount Created Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pd_distribution  $pd_distribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pd_distribution $pd_distribution)
    {
        //
    }
}
