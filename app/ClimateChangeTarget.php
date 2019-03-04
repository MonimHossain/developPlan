<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//designed by monim hossain
class ClimateChangeTarget extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded=['_token'];
    protected $fillable=['goal_id','targets','description',
        'status','created_by','updated_by'];
    
    
    public function goal_name(){
        return $this->hasOne(ClaimateChangeGoal::class,'id','goal_id');
    }
}
