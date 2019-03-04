<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForeignAidBudgetDetail extends Model
{
    //

    use SoftDeletes;
    //

     protected $table='foreign_aid_budget_dtls';
     protected $fillable=['master_id','project_id','total_amount','current_year_adp_pa','current_year_adp_rpa','current_year_radp_pa','current_year_radp_rpa','next_year_adp_pa',
     	'next_year_adp_rpa','updated_by','created_at','updated_at','status'];
     protected $dates = ['deleted_at'];

     public function master(){
     	return $this->belongsTo(ForeignAidBudgetMaster::class,'master_id','id');
     }




    
}
