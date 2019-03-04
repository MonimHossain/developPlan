<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sdgsgole extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'sdgsgole';
    protected $fillable = [
        'gole_no',
        'gole_name',
        'description',
        'status',
        'created_by',
        'updated_by'
    ];

}
