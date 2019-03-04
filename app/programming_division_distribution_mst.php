<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class programming_division_distribution_mst extends Model
{ protected $fillable=[

    	
    	'ceiling_for','ceiling_amount','ceiling_balance','fiscal_year','sector_id','subsector_id'
    
    ];

  public function allocated_ministry(){
  	return $this->hasMany(programming_division_distribution_dtl::class,'master_id','id');
  }

}
