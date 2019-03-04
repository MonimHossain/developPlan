<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sdgstargets extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'sdgstargets';
    protected $fillable = [
        'gole_id',
        'targets',
        'description',
        'status',
        'created_by',
        'updated_by'
    ];

}
