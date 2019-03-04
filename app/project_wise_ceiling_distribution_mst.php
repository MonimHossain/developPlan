<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project_wise_ceiling_distribution_mst extends Model
{
    //
     protected $fillable=['fiscal_year','is_special_account','created_by','updated_by','sector_id','subsector_id','ministry_id','ceiling_for','block_allocation','balance'];
}
