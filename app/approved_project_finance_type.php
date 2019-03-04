<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class approved_project_finance_type extends Model
{
  protected $fillable=['project_id','source_mode','gob','gob_fe','pa','pa_rpa','ownfund','ownfund_fe','others','pa_source','others_mention','created_by','updated_by'];


}
