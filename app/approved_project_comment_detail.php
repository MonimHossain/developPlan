<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class approved_project_comment_detail extends Model
{
    protected $fillable=['unapprove_project_id','comment_level','comments','created_by','updated_by'];
}
