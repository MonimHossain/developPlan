<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class gender_goal extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ['_token'];
    protected $fillable = ['goal_no', 'goal_name', 'description',
        'status', 'created_by', 'updated_by'];

}
