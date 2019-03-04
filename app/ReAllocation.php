<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReAllocation extends Model
{
    use SoftDeletes;
    protected $table = "re_allocation";
    protected $fillable=[
           'project_id','re_allocation_total','re_allocation_taka','re_allocation_taka_revenue',
           're_allocation_capital','re_allocation_capital_rpa','re_allocation_revenue',
           're_allocation_cd_vat','re_allocation_pa','re_allocation_pa_rpa',
           're_allocation_others','created_by','updated_by','status'
    ];

}
