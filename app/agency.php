<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class agency extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'agencies';
    protected $fillable = [


        'keyword',
        'agency_name',
        'agency_name_bn',
        'ministry_id',
        'agency_description',
        'status',
        'created_by',
        'updated_by'


    ];



}
