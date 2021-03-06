<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MultiyearGoal extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'multiyear_goals';
    protected $fillable = [
        'gole_no',
        'gole_name',
        'description',
        'status',
        'created_by',
        'updated_by'
    ];

}
