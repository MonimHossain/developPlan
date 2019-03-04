<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class approved_project_linkages_and_targets extends Model
{

    protected $guarded = ['_token'];
    protected $fillable=['unapprove_project_id','type','relaion','goal','target'];
}
