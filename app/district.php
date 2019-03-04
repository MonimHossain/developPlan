<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class district extends Model
{
    //
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=['district_name','district_name_bn','district_description','status'];

}
