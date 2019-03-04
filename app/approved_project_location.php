<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class approved_project_location extends Model
{
   protected $fillable=[

'unapprove_project_id','approve_project_id','division','rmo','district','upazila','amount','created_by','updated_by',
   ];
}
