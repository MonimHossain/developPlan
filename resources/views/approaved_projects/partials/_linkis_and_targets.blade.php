<?php
$urll = route('add_approval', $project->unapprove_project_id);
?>

{{-- <div class="clearfix">
    <span class="pull-right"> <a onclick='open_modal_custom("{{$urll}}", "approval_divshow", "AdministrativeModalshow")' class="btn btn-success"><i class="icon-plus"></i> @lang('Add Approval Info')</a> </span>
</div> --}}

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>@lang("Linkages & Targets") </h5>
    </div>
    <div class="widget-content nopadding">
        <form action="{{url('link_target_approve_project',$project->unapprove_project_id)}}" method="post" class="form-horizontal">
            @csrf
            <div class="row-fluid">
                <div class="span12">
                    <hr/>
                </div>
            </div>
            <!--           //multi year plan     -->
            <div class="row-fluid">
                <div class="span12">
                    <h4 style="padding-left: 5px">@lang('Fiver Year Plan')</h4>
                    <hr/>
                </div>
            </div>
              @if(count($a_edit_mul_y)>=1)
			<div class="row-fluid">
                <div  class="span4 m-wrap">
                    <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                    <div class=""  style="padding-left: 25px">
                        <select name="multi_plan_rel">   
                            <option value="0" > @lang('NO')</option>
                            <option value="1" selected> @lang('YES')</option>        		   
                        </select>
                    </div>
                </div>
            </div>
			<div class="span11 m-wrap">
                    <table id="m_table" class="table table-striped table-bordered dt-responsive table-hover" >
                        <thead>
                            <tr>
                                <th style=" width: 30%; ">@lang('Goal') </th>
                                <th>@lang('Targets') </th>
                                <th >@lang('Action')</th>
                            </tr>
                        </thead>
						
                        <tbody id="m_table_body">
                       @foreach($a_edit_mul_y as $a_edit_mul_y)                          
						  <tr id="tr_1">
						
                                <td>
                                    <select name="m_goals[]" id="m_goal"  onchange="show_m_target(this)">
                                        <option></option>
                                        @foreach($m_goal as $a_m_goal)
                                        <option value="{{$a_m_goal->id}}" {{selected($a_m_goal->id,$a_edit_mul_y->goal)}}> {{$a_m_goal->gole_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="m_target[]" id="m_target">
                                        <option></option>
                                        @foreach($m_target as $a_m_target)
                                        <option value="{{$a_m_target->id}}" {{selected($a_m_target->id,$a_edit_mul_y->target)}}> {{$a_m_target->targets}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="text-align: center">
                                    <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row_multiyear(1);"><i class="icon-plus" ></i></a>
                                    <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row(1);"><i class="icon-minus" ></i> </a>
                                </td>
                            </tr>
							@endforeach
                        </tbody>
						
                    </table>
                </div>
				@else
				<div class="row-fluid">
                <div  class="span4 m-wrap">
                    <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                    <div class=""  style="padding-left: 25px">
                        <select name="multi_plan_rel" onchange="multiyear_relation(this)">   
                            <option value="0" selected> @lang('NO')</option>
                            <option value="1" > @lang('YES')</option>        		   
                        </select>
                    </div>
                </div>
            </div>
			<div class="span11 m-wrap" id="multi_year">
                    <table id="m_table" class="table table-striped table-bordered dt-responsive table-hover" >
                        <thead>
                            <tr>
                                <th style=" width: 30%; ">@lang('Goal') </th>
                                <th>@lang('Targets') </th>
                                <th >@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody id="m_table_body">
                            <tr id="tr_1">
                                <td>
                                    <select name="m_goals[]" id="m_goal"  onchange="show_m_target(this)">
                                        <option></option>
                                        @foreach($m_goal as $a_m_goal)
                                        <option value="{{$a_m_goal->id}}"> {{$a_m_goal->gole_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="m_target[]" id="m_target">
                                        <option></option>
                                        @foreach($m_target as $a_m_target)
                                        <option value="{{$a_m_target->id}}"> {{$a_m_target->targets}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="text-align: center">
                                    <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row_multiyear(1);"><i class="icon-plus" ></i></a>
                                    <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row(1);"><i class="icon-minus" ></i> </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>	
				@endif	
            <hr/>

            {{--//..................................................................sdgs_goal_start.............................................//--}}
            <div class="row-fluid">
                <div class="span12">
                    <h4 style="padding-left: 5px">@lang('SDGS Goal')</h4>
                    <hr/>
                </div>
            </div>
            @if(count($edit_sdgs)==0)
            <div class="row-fluid">
            <div  class="span4 m-wrap">
                    <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                    <div class=""  style="padding-left: 25px">
                        <select id="hide_sdgs" name="sdgs_rel" onchange="sdgd_relation(this)""> 
                            <option></option>
                            <option selected value="0"> @lang('NO')</option>
                            <option value="1"> @lang('YES')</option>
                        </select>
                    </div>
                </div>
                </div>
            
            <div class="span11 m-wrap" id="sd">
                <table id="sdgs_goal_table" class="table table-striped table-bordered dt-responsive table-hover" >
                    <thead>
                        <tr>
                            <th style=" width: 30%; ">@lang('Goal') </th>
                            <th>@lang('Targets') </th>
                            <th >@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody id="sdgs_table_body">
                        <tr id="tr_1">
                            <td>
                                <select name="sdgsgoal[]" id="sdgs_goal"  onchange="showsdgsgoalstarget(this)">
                                    <option value="0"></option>
                                    @foreach($sdgsgoal as $a_sdgsgoal)
                                    <option value="{{$a_sdgsgoal->id}}"> {{$a_sdgsgoal->gole_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="sdgstarget[]" id="target">
                                    <option> </option>
                                    @foreach($targets as $a_targets)
                                    <option value="{{$a_targets->id}}"> {{$a_targets->targets}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="text-align: center">
                                <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row(1);"><i class="icon-plus" ></i></a>
                                <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row(1);"><i class="icon-minus" ></i> </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr/>
            </div>
            @else 
            <div class="row-fluid">
            <div  class="span4 m-wrap">
                    <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                    <div class=""  style="padding-left: 25px">
                        <select name="sdgs_rel">                 
                            <option></option>
                            <option value="0"> @lang('NO')</option>
                            <option value="1" selected=""> @lang('YES')</option>              
                        </select>
                    </div>
                </div>
                </div>
            <div class="span11 m-wrap" id="showgoal">
                <table id="sdgs_goal_table" class="table table-striped table-bordered dt-responsive table-hover" >
                    <thead>
                        <tr>
                            <th style=" width: 30%; ">@lang('Goal') </th>
                            <th>@lang('Targets') </th>

                            <th >@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody id="sdgs_table_body">
                        @foreach($edit_sdgs as $a_edit_sdgs)
                        <tr id="tr_1">
                            <td>
                                <select name="sdgsgoal[]" id="sdgs_goal"  onchange="showsdgsgoalstarget(this)">
                                    <option></option>
                                    @foreach($sdgsgoal as $a_sdgsgoal)
                                    <option value="{{$a_sdgsgoal->id}}" @if($a_sdgsgoal->id==$a_edit_sdgs->goal) selected @endif>{{$a_sdgsgoal->gole_name}} </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="sdgstarget[]" id="target">
                                    <option></option>
                                    @foreach($targets as $a_targets)
                                    <option value="{{$a_targets->id}}" @if($a_targets->id==$a_edit_sdgs->target) selected @endif > {{$a_targets->targets}}</option>
                                    @endforeach
                                </select>
                            </td>

                            <td style="text-align: center">
                                <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row(1);"><i class="icon-plus" ></i></a>
                                <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row(1);"><i class="icon-minus" ></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr/>
            </div>
            @endif
			<hr/>
                {{--//.................climate change start...............//--}}
            <div class="row-fluid">
                <div class="span12">
                    <h4 style="padding-left: 5px">@lang('Climate Change')</h4>
                    <hr/>
                </div>
            </div>
            @if(count($a_edit_climate)==0)
            <div class="row-fluid">
            <div  class="span4 m-wrap">
                    <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                    <div class=""  style="padding-left: 25px">
                        <select name="climate_rel" onchange="climate_relation(this)"> 
                            <option></option>
                            <option selected value="0"> @lang('NO')</option>
                            <option value="1"> @lang('YES')</option>
                        </select>
                    </div>
                </div>
                </div>
            <div class="span11 m-wrap" id="climate" >
                <table id="climate_goal_table" class="table table-striped table-bordered dt-responsive table-hover" >
                    <thead>
                        <tr>
                            <th style=" width: 30%; ">@lang('Goal') </th>
                            <th>@lang('Targets') </th>
                            <th >@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody id="climate_table_body">
                        <tr id="tr_1">
                            <td>
                                <select name="climategoal[]"   onchange="climate_target(this)">
                                    <option></option>
                                    @foreach($climate_changes as $a_climate_changes)
                                    <option value="{{$a_climate_changes->id}}"> {{$a_climate_changes->goal_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="climatetarget[]" id="climatetarget">
                                    <option></option>

                                    @foreach($climate_target as $a_climate_target)

                                    <option value="{{$a_climate_target->id}}"> {{$a_climate_target->targets}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="text-align: center">
                                <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_climate_row(1);"><i class="icon-plus" ></i></a>
                                <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_climate_row(1);"><i class="icon-minus" ></i> </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr/>
            </div>
            @else
            <div class="row-fluid">
            <div  class="span4 m-wrap">
                    <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                    <div class=""  style="padding-left: 25px">
                        <select name="climate_rel"> 
                            <option></option>
                            <option  value="0"> @lang('NO')</option>
                            <option selected value="1"> @lang('YES')</option>
                        </select>
                    </div>
                </div>
                </div>
            <div class="span11 m-wrap" id="">
                <table id="climate_goal_table" class="table table-striped table-bordered dt-responsive table-hover" >
                    <thead>
                        <tr>
                            <th style=" width: 30%; " class="span4">@lang('Goal')  </th>
                            <th class="span6">@lang('Targets') </th>
                            <th class="span4" >@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody id="climate_table_body">
                        @foreach($a_edit_climate as $a_edit_climate)
                        <tr id="tr_1">
                            <td>
                                <select name="climategoal[]"   onchange="climate_target(this)">
                                    <option></option>
                                    @foreach($climate_changes as $a_climate_changes)
                                    <option value="{{$a_climate_changes->id}}"  @if($a_climate_changes->id==$a_edit_climate->goal) selected @endif > {{$a_climate_changes->goal_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="climatetarget[]" id="climatetarget">
                                    <option></option>
                                    @foreach($climate_target as $a_climate_target)
                                    <option value="{{$a_climate_target->id}}" @if($a_climate_target->id==$a_edit_climate->target) selected @endif> {{$a_climate_target->targets}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="text-align: center">
                                <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_climate_row(1);"><i class="icon-plus" ></i></a>
                                <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_climate_row(1);"><i class="icon-minus" ></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr/>
            </div>
            @endif
			<hr/>
            {{--//..................................................................Poverty_start.............................................//--}}
            <div class="row-fluid">
                <div class="span12">
                    <h4 style="padding-left: 5px">@lang('Poverty')</h4>
                    <hr/>
                </div>
            </div>
            @if(count($a_edit_poverty)==0)
            <div class="row-fluid">
            <div  class="span4 m-wrap">
                    <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                    <div class=""  style="padding-left: 25px">
                        <select name="poverty_rel" onchange="poverty_relation(this)"> 
                            <option></option>
                            <option selected value="0"> @lang('NO')</option>
                            <option  value="1"> @lang('YES')</option>
                        </select>
                    </div>
                </div>
                </div>
            
            <div class="span11 m-wrap" id="poverty">
                <table id="proverty_table" class="table table-striped table-bordered dt-responsive table-hover" >
                    <thead>
                        <tr>
                            <th style=" width: 30%; ">@lang('Goal') </th>
                            <th>@lang('Targets') </th>
                            <th >@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody id="poverty_table_body">
                        <tr id="tr_1">
                            <td>
                                <select name="povertygoal[]"   onchange="poverty_target(this)">
                                    <option></option>
                                    @foreach($proverty as $a_proverty)
                                    <option value="{{$a_proverty->id}}"> {{$a_proverty->goal_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="povertytarget[]" id="povertytarget">
                                    <option></option>
                                    @foreach($provery_target as $a_provery_target)
                                    <option value="{{$a_provery_target->id}}"> {{$a_provery_target->target}} </option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="text-align: center">
                                <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_poverty_row(1);"><i class="icon-plus" ></i></a>
                                <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_poverty_row(1);"><i class="icon-minus" ></i> </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr/>
            </div>
            @else
            <div class="row-fluid">
            <div  class="span4 m-wrap">
                    <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                    <div class=""  style="padding-left: 25px">
                        <select name="poverty_rel"> 
                            <option></option>
                            <option  value="0"> @lang('NO')</option>
                            <option selected value="1"> @lang('YES')</option>
                        </select>
                    </div>
                </div>
                </div>
            <div class="span11 m-wrap" id="show_poverty">
                <table id="proverty_table" class="table table-striped table-bordered dt-responsive table-hover" >
                    <thead>
                        <tr>
                            <th style=" width: 30%; ">@lang('Goal') </th>
                            <th>@lang('Targets') </th>
                            <th >@lang('Action')</th>
                        </tr>
                    </thead>
                   
                    <tbody id="poverty_table_body">

                        @foreach($a_edit_poverty as $a_edit_poverty)
                        <tr id="tr_1">
                            <td>
                                <select name="povertygoal[]"   onchange="poverty_target(this)">
                                    <option></option>
                                    @foreach($proverty as $a_proverty)
                                    <option value="{{$a_proverty->id}}" @if($a_proverty->id==$a_edit_poverty->goal) selected @endif> {{$a_proverty->goal_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="povertytarget[]" id="povertytarget">
                                    <option></option>
                                    @foreach($provery_target as $a_provery_target)
                                    <option value="{{$a_provery_target->id}}"@if($a_provery_target->id==$a_edit_poverty->target) selected @endif> {{$a_provery_target->target}} </option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="text-align: center">
                                <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_poverty_row(1);"><i class="icon-plus" ></i></a>
                                <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_poverty_row(1);"><i class="icon-minus" ></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr/>
            </div>
            @endif
            <hr/>
            {{--//..................................................................ppp_start.............................................//--}}
            <div class="row-fluid">
                <div class="span12">
                    <h4 style="padding-left: 5px">@lang('PPP')</h4>
                    <hr/>
                </div>
            </div>
            <div class="row-fluid">
                <div  class="span4 m-wrap">
                    <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                    <div class=""  style="padding-left: 25px">
                        <select name="ppp_rel">
                            @if(count($a_edit_ppp)>=1)
                            <option value="0" > @lang('NO')</option>
                            <option value="1" selected> @lang('YES')</option>
                            @else
                            <option></option>
                            <option selected value="0"> @lang('NO')</option>
                            <option value="1"> @lang('YES')</option>
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <hr/>
	  {{--//..................................................................gender_start.............................................//--}}	
           
			<div class="row-fluid">
                    <div class="span12">
                        <h4 style="padding-left: 5px">@lang('Gender')</h4>
                        <hr/>
                    </div>
                </div>	  
		 @if(count( $a_edit_gender)==0)	
          <div class="row-fluid">
                    <div  class="span4 m-wrap">
                        <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                        <div class=""  style="padding-left: 25px">
                        <select  name="gender_rel"  onchange="gender_relation(this)">
                                <option value="0" selected> @lang('NO')</option>
                                <option value="1"> @lang('YES')</option>
                            </select>
                        </div>
                    </div>
           </div>			 
	     <div class="span11 m-wrap" id="gender">
            <table id="gender_table" class="table table-striped table-bordered dt-responsive table-hover" >
                <thead>
                    <tr>
                        <th style=" width: 30%; ">@lang('Goal') </th>
                        <th>@lang('Targets') </th>  
                        <th >@lang('Scale')</th>
                         <th >@lang('Action')</th>
                    </tr>
                </thead>
                <tbody id="gender_table_body">
                    <tr id="tr_1">
                        <td>
                            <select name="gendergoal[]" id="gendergoal"  onchange="gender_target(this)">
                                <option></option>
                                @foreach($g_goal as $a_g_goal)
                                <option value="{{$a_g_goal->id}}"> {{$a_g_goal->goal_name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="gendertarget[]" id="gendertarget">
                                <option></option>
                                @foreach($g_target as $a_g_target)
                                <option value="{{$a_g_target->id}}"> {{$a_g_target->targets}} </option>
                                @endforeach
                            </select>
                        </td>
                         <td>
                            <select name="scale[]" id="scale">
                                <option></option>
                                <option value="0-20">0-20 %</option>
                                <option value="21-40">21-40 %</option>
                                <option value="41-60">41-60 %</option>
                                <option value="61-80">61-80 %</option>
                                <option value="81-100">81-100 %</option>
                            </select>
                        </td>
                        <td style="text-align: center">
                            <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_gender_row(1);"><i class="icon-plus" ></i></a>
                            <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_gender(1);"><i class="icon-minus" ></i> </a>
                        </td>
                    </tr>
                </tbody>
            </table>
             <hr/>
        </div>		 
	     @else
	     <div class="row-fluid">
                    <div  class="span4 m-wrap">
                        <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                        <div class=""  style="padding-left: 25px">
                        <select  name="gender_rel"  onchange="gender_relation(this)">
                                <option value="0" > @lang('NO')</option>
                                <option value="1" selected> @lang('YES')</option>
                            </select>
                        </div>
                    </div>
           </div>			 
	     <div class="span11 m-wrap" >
            <table id="gender_table" class="table table-striped table-bordered dt-responsive table-hover" >
                <thead>
                    <tr>
                        <th style=" width: 30%; ">@lang('Goal') </th>
                        <th>@lang('Targets') </th>  
                        <th >@lang('Scale')</th>
                         <th >@lang('Action')</th>
                    </tr>
                </thead>
                <tbody id="gender_table_body">
                    
					@foreach($a_edit_gender as $a_edit_gender)
					<tr id="tr_1">
                        <td>
                            <select name="gendergoal[]" id="gendergoal"  onchange="gender_target(this)">
                                <option></option>
                                @foreach($g_goal as $a_g_goal)
                                <option value="{{$a_g_goal->id}}" {{selected($a_g_goal->id,$a_edit_gender->goal)}}> {{$a_g_goal->goal_name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="gendertarget[]" id="gendertarget">
                                <option></option>
                                @foreach($g_target as $a_g_target)
                                <option value="{{$a_g_target->id}}"{{selected($a_g_target->id,$a_edit_gender->target)}}> {{$a_g_target->targets}} </option>
                                @endforeach
                            </select>
                        </td>
                         <td>
                            <select name="scale[]" id="scale">
                                <option></option>
                                <option value="0-20" {{selected('0-20',$a_edit_gender->scale)}} >0-20 %</option>
                                <option value="21-40"{{selected('21-40',$a_edit_gender->scale)}} >21-40 %</option>
                                <option value="41-60"{{selected('41-60',$a_edit_gender->scale)}} >41-60 %</option>
                                <option value="61-80"{{selected('61-80',$a_edit_gender->scale)}}>61-80 %</option>
                                <option value="81-100"{{selected('81-100',$a_edit_gender->scale)}}>81-100 %</option>
                            </select>
                        </td>
                        <td style="text-align: center">
                            <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_gender_row(1);"><i class="icon-plus" ></i></a>
                            <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_gender(1);"><i class="icon-minus" ></i> </a>
                        </td>
                    </tr>
					@endforeach
                </tbody>
            </table>
             <hr/>
        </div>		 
         @endif			 
            <div class="form-actions">
                    <button style="float: right" type="submit" name="linkage" value="1" class="btn btn-success ">@lang("Update & Next")</button>
                {{--<a href=" " class="btn btn-danger ">@lang("Next")</a>--}}
            </div>
        </form>
    </div>
</div>

<script>

    </script>