<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class approval_history extends Model
{
    protected $table = 'approval_history';
    
   protected $fillable=[
'project_id','approve_by','approve_date','approval_go_no','approval_level','administrative_by','administrative_date','administrative_go_no','administrative_level',
   ];
}
