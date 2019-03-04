<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class approved_project_estimated_cost extends Model
{
    protected $table='approved_project_estimated_cost';
    protected $fillable=[
    'project_id',
    'total',
    'gob',
    'fe',
    'pa',
    'rpa',
    'own_fund',
    'exchange_rate',
    'exchange_date',
    'version',
    'created_by',
    'updated_by'
    ];
    
}
