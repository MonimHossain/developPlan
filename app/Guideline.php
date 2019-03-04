<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guideline extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
     protected $guarded=['_token'];
    public function fiscal_years()
    {
    	return $this->hasOne(FiscalYear::class,'id','fiscal_year');
    }
}
