<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ministerialmeeting extends Model {
    
    protected $table = 'approved_project_info';
    protected $fillable = [
        'project_title',
        'project_tiltle_bn',
        'project_type',
        'ministry',
        'agency',
        'sector',
        'sub_sector',
        'objectives',
        'objectives_bn',
        'total',
        'gob',
        'fe',
        'pa',
        'rpa',
        'own_fund',
        'exchange_rate',
        'exchange_date',
        'date_of_commencement',
        'date_of_completion',
        'created_by',
        'updated_by',
        'status',
    ];

}
