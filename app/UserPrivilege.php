<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPrivilege extends Model
{
    protected $table = 'user_privileges';
    protected $fillable = ['user_group', 'menu_id', 'actions', 'created_by', 'modified_by'];
}
