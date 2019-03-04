<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PovertyTarget extends Model
{
    //
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=['goal_name_id','target','target_description','status','created_by','updated_by'];
}
