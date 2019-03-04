<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sendadpallocation extends Model {

    protected $table = 'demands_status';
    protected $fillable = [
        'type',
        'project_id',
        'is_forward',
        'is_back',
        'forward_date',
        'back_date',
    ];

}
