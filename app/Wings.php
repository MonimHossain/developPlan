<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wings extends Model
{
  use SoftDeletes;
  protected $table = 'wings';
  protected $dates = ['deleted_at'];
   protected $guarded=['_token'];
   protected $fillable=['wings_type','wings_type_bn','wings_type_description','status','created_by',
   'updated_by'];
    //
}
