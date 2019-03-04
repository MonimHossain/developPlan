<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectSource extends Model
{
    //

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='project_sources';
    protected $guarded=["_token"];
}
