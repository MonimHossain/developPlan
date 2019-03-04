<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class unapproved_project_info extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'project_title',
        'project_tiltle_bn',
        'project_type',
        'ministry',
        'agency',
        'sector',
        'sub_sector',
        'objectives',
        'objectives_bn',
        'total',
        'gob',
        'fe',
        'pa',
        'rpa',
        'own_fund',
        'exchange_currency',
        'exchange_rate',
        'exchange_date',
        'date_of_commencement',
        'date_of_completion',
        'availability_of_foreign_aid',
        'project_code_pd',
        'project_code_fd',
        'created_by',
        'updated_by',
        'status',
    ];
    
    
    public function project_list()
    {
        return $this->hasMany('App\newprojectlist','project_id')->where('is_forward', 0)->where('is_back', 1);
    }
    public function sectors(){
      return $this->hasOne(Sector::class,'id','sector');
    }
     public function sub_sectors(){
        return $this->hasOne(Subsector::class,'id','sub_sector');
    }
     public function ministries(){
        return $this->hasOne(ministry::class,'id','ministry');
    }
     public function agencies(){
        return $this->hasOne(agency::class,'id','agency');
    }
     public function unapproved_location()
    {
        return $this->hasMany('App\unapproved_project_locations','project_id');
    } public function unapproved_source_details()
    {
        return $this->hasMany('App\unapproved_project_source_details','project_id');
    } public function unapproved_comments()
    {
        return $this->hasMany('App\unapproved_project_comment_details','project_id');
    }
    


}
