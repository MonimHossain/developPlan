<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UpazilaLocation extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='upazila_locations';
    protected $guarded=["_token"];
    
    public function district_name(){
        
        return $this->hasOne(district::class,'id','district_id');
        
    }
    
}
