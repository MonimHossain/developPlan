<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class approved_project_component_wise_cost extends Model
{
    //

    protected $table = 'approved_project_component_wise_cost';
    protected $fillable=[
        'project_id',
        'budget_head',
        'economic_code',
        'component_description',
        'economic_subcode',
        'unit',
        'quantity',
        'unit_cost',
        'total_cost',
        'gob',
        'gob_fe',
        'rpa_through_gob',
        'special_acount',
        'dpa_through_pd',
        'dpa_through_dp',
        'ownfund',
        'ownfund_fe',
        'others',
        'status',
        'created_by',
        'updated_by'
    ];



}
