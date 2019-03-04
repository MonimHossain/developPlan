<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class rmo extends Model
{
    //
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=['rmo_name','rmo_name_bn','rmo_description','status','created_by','updated_by'];
}
