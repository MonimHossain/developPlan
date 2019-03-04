<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Allocation extends Model
{
	 use SoftDeletes;
    protected $fillable=[
   'allocation_type','project_code','project_id','project_status','approved_status','project_cost_total','project_fe','project_aid','project_rpa','project_sf','original_fiscal_year','original_total','original_taka','actual_total','actual_total_fe','actual_taka','cumulative_total','cumulative_taka','allocation_total','allocation_taka','allocation_revenue','capital','capital_rpa','capital_revenue','cdvat','cdvat_pa','cdvat_rpa','cdvat_dpa','allocation_others','self_finance','created_by','updated_by','created_at','updated_at','status'

    ];

    public function project_name()
    {
    	return $this->hasOne(approved_project_info::class,'unapprove_project_id','project_id');
    }


    public function allocation_details(){
    	return $this->hasMany(allocation_location_detail::class);
    }

    public function allocation_revised(){
        return $this->hasOne(demand::class,'project_id','project_id');
    } 
   

}
