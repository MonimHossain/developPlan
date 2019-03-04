<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SubSector extends Model
{
    //
      use SoftDeletes;
      protected $dates = ['deleted_at'];
     protected $table='subsectors';
      protected $guarded =['_token'];
}
