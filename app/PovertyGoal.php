<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PovertyGoal extends Model
{
    //
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable=['goal_no','goal_name','goal_description','status','created_by','updated_by'];
}
