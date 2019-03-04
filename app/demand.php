<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class demand extends Model
{
	 use SoftDeletes;
    protected $fillable=[
   'demand_type','project_code','project_id','project_status','approved_status','project_cost_total','project_fe','project_aid','project_rpa','project_sf','original_fiscal_year','original_total','original_taka','actual_total','actual_total_fe','actual_taka','cumulative_total','cumulative_taka','allocation_total','allocation_taka','allocation_revenue','capital','capital_rpa','capital_revenue','cdvat','cdvat_pa','cdvat_rpa','cdvat_dpa','allocation_others','self_finance','created_by','updated_by','created_at','updated_at','status','actual_capital','actual_capital_rpa','actual_capital_revenue','actual_cdvat','actual_cdvat_pa','actual_cdvat_rpa'

    ];
		// public function approved_project_source() {
		// 	 return $this->hasMany('App\approved_project_source_detail', 'unapprove_project_id','unapprove_project_id');
	 // }
	 //
		// public function approved_project_comments() {
		// 	 return $this->hasMany('App\approved_project_comment_detail', 'unapprove_project_id','unapprove_project_id');
	 // }

    public function project_name()
    {
    	return $this->hasOne(approved_project_info::class,'unapprove_project_id','project_id');
    }
    

    

    

    public function demand_details(){
    	return $this->hasMany(demands_location_detail::class);
    }
    public function demand_source(){
        return $this->hasMany(demand_project_source_detail::class);
    }
     public function demand_pip(){
        return $this->hasMany(demand_mypip_detail::class);
    }

    public function fiscal_years(){
        return $this->hasOne(FiscalYear::class,'id','original_fiscal_year');
    }

    public function sourceName(){
        return $this->hasManyThrough(ProjectSource::class,demand_project_source_detail::class,'financing_source','id','id','financing_source');
    }

}
