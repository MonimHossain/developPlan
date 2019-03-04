<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReAppropriation extends Model
{
    use SoftDeletes;
    protected $table = "re_appropriation";
    protected $fillable=[
           'target_project_id','project_id','re_appro_total','re_appro_taka','re_appro_revenue',
           're_appropriation_capital', 're_appropriation_capital_rpa',
           're_appropriation_capital_revenue', 're_appropriation_cd_vat','re_appropriation_pa',
           're_appropriation_pa_rpa','re_appropriation_others', 'created_by','updated_by','status'
    ];

}
