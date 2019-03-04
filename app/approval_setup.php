<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class approval_setup extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = ['_token'];
    protected $fillable = ['approved_by','approved_by_bn','description','status','created_by','updated_by'];

}
