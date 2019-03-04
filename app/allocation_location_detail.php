<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class allocation_location_detail extends Model
{
protected $fillable=['allocation_id','project_code','division','district' ,'upazila' ,'district' ,'amount' ,'created_by' ,'updated_by' ,'status'];

}
