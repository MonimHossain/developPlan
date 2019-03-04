<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class approved_project_date_detail extends Model
{
   protected $fillable=['project_id','version','date_of_commencement','date_of_completion','revision','go_type','go_number'];
}
