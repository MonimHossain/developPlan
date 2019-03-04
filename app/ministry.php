<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ministry extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'ministries';
    protected $fillable = [
        'keyword',
        'ministry_name',
        'ministry_name_bn',
        'sector_id',
        'subsector_id',
        'ministry_description',
        'status',
        'created_by',
        'updated_by'
    ];


        

   

}
