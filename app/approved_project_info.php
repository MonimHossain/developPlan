<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class approved_project_info extends Model {

    protected $table = 'approved_project_info';

    public function sectors() {
        return $this->hasOne(Sector::class, 'id', 'sector');
    }

    public function sub_sectors() {
        return $this->hasOne(Subsector::class, 'id', 'sub_sector');
    }

    public function ministries() {
        return $this->hasOne(ministry::class, 'id', 'ministry');
    }

    public function agencies() {
        return $this->hasOne(agency::class, 'id', 'agency');
    }

    public function approved_location() {
        return $this->hasMany('App\approved_project_location', 'unapprove_project_id','unapprove_project_id');
    }
     public function approved_project_source() {
        return $this->hasMany('App\approved_project_source_detail', 'unapprove_project_id','unapprove_project_id');
    }
    
     public function approved_project_comments() {
        return $this->hasMany('App\approved_project_comment_detail', 'unapprove_project_id','unapprove_project_id');
    }
    public function date_details(){
        return $this->hasMany(approved_project_date_detail::class,'project_id','unapprove_project_id');
    }
    public function cost_details(){
        return $this->hasMany(approved_project_estimated_cost::class,'project_id','unapprove_project_id');
    }
    public function finance_type(){
        return $this->hasMany(approved_project_finance_type::class,'project_id','unapprove_project_id');
    } 
    public function year_wise_cost(){
        return $this->hasMany(approved_project_year_wise_cost::class,'project_id','unapprove_project_id');
    }
    public function component_wise_cost(){
        return $this->hasMany(approved_project_component_wise_cost::class,'project_id','unapprove_project_id');
    }
    
    public function approved_location_cost(){
        return $this->hasMany(approved_project_location::class,'unapprove_project_id','unapprove_project_id');
    }
    public function linkages_and_targets(){
        return $this->hasMany(approved_project_linkages_and_targets::class,'unapprove_project_id','unapprove_project_id');
    }
    
    public function approval_history(){
        return $this->hasMany(approval_history::class,'project_id','unapprove_project_id');
    }

}
