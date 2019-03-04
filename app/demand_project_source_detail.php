<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class demand_project_source_detail extends Model
{
    protected $fillable=[
       'demand_id','project_code','amount','created_by','updated_by','created_at','updated_at','status'];
}
