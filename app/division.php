<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class division extends Model
{
    //
    use SoftDeletes;
    protected $table = 'divisions';
    protected $dates=['deleted_at'];
    protected $fillable = ['division_name', 'division_name_bn', 'division_description', 'status'];

}
