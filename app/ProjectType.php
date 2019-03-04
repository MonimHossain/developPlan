<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectType extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];
   protected $guarded=['_token'];
   protected $fillable=['keyword','project_type','project_type_bn','project_type_description','status','created_by',
   'updated_by'];
    //
}
