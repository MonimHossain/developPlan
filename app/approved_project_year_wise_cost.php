<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class approved_project_year_wise_cost extends Model
{
    protected $fillable=['project_id','fiscal_year','gob','gob_fe','pa_rpa','pa_dpa','own_fund','others','ownfund_fe','mention','created_by','updated_by','status'];
}

