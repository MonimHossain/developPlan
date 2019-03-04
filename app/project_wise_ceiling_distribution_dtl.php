<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project_wise_ceiling_distribution_dtl extends Model
{
    //
    
    protected $fillable=['master_id','project_id','amount','created_by','updated_by','status'];
}
