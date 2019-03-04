<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class FinanceDivisionDistribution extends Model
{
    //
    use SoftDeletes;
    protected $table='finance_division_distribution';

     protected $dates = ['deleted_at'];
   
    protected $fillable=['ceiling_for','financial_year','ceiling_amount',
        'status','created_by','updated_by'];


    public function financeyear(){
    	 return $this->hasOne(FiscalYear::class,'id','financial_year');
    }
}
