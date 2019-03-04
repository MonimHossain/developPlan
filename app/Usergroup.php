<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usergroup extends Model
{
      use SoftDeletes;
      protected $dates = ['deleted_at'];
      protected $table = 'usergroups';

      protected $fillable = [
        'company_id',
        'group_name',
        'sub_group',
        'description',
        'created_by',
        'updated_by',
        'isactive'
    ];
}
