<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForeignAidBudgetMaster extends Model
{
	 use SoftDeletes;
    //

     protected $table='foreign_aid_budget_mst';
     protected $fillable=['allocation_for','financial_year','sector_id','ministry_id','file','created_by','updated_by','created_at','updated_at','status'];
     protected $dates = ['deleted_at'];

     public function detail(){
     	return $this->hasMany(ForeignAidBudgetDetail::class,'master_id','id');
     }
}
