<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MultiyearTarget extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'multiyear_targets';
    protected $fillable = [
        'gole_id',
        'targets',
        'description',
        'status',
        'created_by',
        'updated_by'
    ];

}
