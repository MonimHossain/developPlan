<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attachment_detail extends Model
{
 protected $fillable=['ref_id','project_id','attachment_type','attachment_path','created_by','updated_by'];
}
