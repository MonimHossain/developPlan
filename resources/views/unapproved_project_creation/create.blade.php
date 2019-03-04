    @extends('layouts.adminLayout.admin_design')
    @section('content')
    <div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a></div>
    </div>
    <!--End-breadcrumbs-->
    <div class="container-fluid">
    <div class="row-fluid">
    <div class="span12">
    <div class="widget-box">
    <div class="widget-title">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">@lang('Project Summary')</a></li>
            {{--@if(Session::get('projectid'))--}}
            <li><a data-toggle="tab" href="#tab2">@lang('Project Locations')</a></li>
            <li><a data-toggle="tab" href="#tab3">@lang('Linkages & Targets')</a></li>
            <li><a data-toggle="tab" href="#tab4">@lang('Comments')</a></li>
            {{--@else--}}
            {{--@endif--}}
        </ul>
    </div>
        <div class="widget-content tab-content">
        {{--//...............................................tab one start...........................................//--}}
<div id="tab1" class="tab-pane active">

<div class="widget-box">
<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
    <h5>@lang("Unapproved Project") </h5>
</div>
<div class="widget-content nopadding">
    <form action="{{route('newproject.store')}}" method="post" class="form-horizontal" id="basicinfo">
        @csrf
        {{--..............................................project infomation section............................................--}}
        <div class="row-fluid">
            <div class="span12">
                <h4 style="">@lang('Project Information')</h4>
                <hr/>
                <hr/>
            </div>
        </div>
        <div class="row-fluid">
            <div  class="span6 m-wrap">
                <label  class="control-label">@lang('Project Type') : {{required()}}</label>
                <div class="controls">
                    <select name="project_type">
                        <option></option>
                        @foreach($projecttype as $a_projecttype)
                        <option value="{{$a_projecttype->id}}" {{selected($a_projecttype->id,old('project_type'))}}> {{$a_projecttype->project_type}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div  class="span6 m-wrap">
                <label class="control-label"> @lang("Project Code(PD)") :</label>
                <div class="controls">
                    <input type="text" name="project_code_pd" value="{{Session::get('decode')}}" class="span11"  placeholder=" @lang("Project Code(PD)")" readonly/>
                </div>
            </div>
        </div>
        
<!--         <div class="row-fluid">
            <div  class="span6 m-wrap">
                <input type="hidden">
            </div>
            <div  class="span6 m-wrap">
                <label class="control-label"> @lang("Project Code(FD)") : {{required()}}</label>
                <div class="controls">
                    <input type="text" name="project_code_fd"  class="span11"  placeholder="@lang("Project Code(FD)")" />
                </div>
            </div>
        </div>-->
        
        
        
        <div class="row-fluid">
            <div  class="span6 m-wrap">
                <label class="control-label"> @lang("Project Title(English)") : {{required()}}</label>
                <div class="controls">
                    <input type="text" value="{{old('project_title')}}" name="project_title" class="span11" placeholder=" @lang("Project Title English")" />
                </div>
            </div>
            <div  class="span6 m-wrap">
                <label class="control-label"> @lang("Project Title(Bangla)") : {{required()}}</label>
                <div class="controls">
                    <input type="text" value="{{old('project_tiltle_bn')}}" name="project_tiltle_bn" class="span11"  placeholder=" @lang("Project Title Bangla")" />
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div  class="span6 m-wrap">
                <label  class="control-label">@lang('Ministry/Division') : {{required()}}</label>
                <div class="controls">
                    <select name="ministry">
                        <option></option>
                        @if($user_group == 12 || $user_group == 14)
                            @foreach($ministry as $aministry)
                                <option value="{{$aministry->id}}"@if( $user_department==$aministry->id) selected @endif> {{$aministry->ministry_name}}</option>
                            @endforeach
                        @else
                            @foreach($ministry as $aministry)
                                <option value="{{$aministry->id}}"@if( $user_ministry==$aministry->id) selected @endif> {{$aministry->ministry_name}}</option>
                            @endforeach

                        @endif

                    </select>
                </div>
            </div>
            <div  class="span6 m-wrap">
                <label  class="control-label">@lang('Agency') : {{required()}}</label>
                <div class="controls">
                    <select name="agency">
                        <option></option>
                        @if($user_group == 13 || $user_group == 15)
                        @foreach($agency as $a_agency)
                        <option value="{{$a_agency->id}}" @if($user_department==$a_agency->id) selected @endif>{{$a_agency->agency_name}}</option>
                        @endforeach
                         @else
                         @foreach($agency as $a_agency)
                         <option value="{{$a_agency->id}}">{{$a_agency->agency_name}}</option>
                         @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div  class="span6 m-wrap">
                <label  class="control-label">@lang('Sector') : {{required()}}</label>
                <div class="controls">
                    <select name="sector" onchange="sector_to_subsector(this)">
                        <option></option>

                        @if($user_group == 9 || $user_group == 10)
                        @foreach($sector as $asector)
                        <option value="{{$asector->id}}"@if($user_department==$asector->id) selected @endif> {{$asector->sector_name}}</option>
                        @endforeach
                        @else
                         @foreach($sector as $asector)
                        <option value="{{$asector->id}}"> {{$asector->sector_name}}</option>
                         @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div  class="span6 m-wrap">
                <label  class="control-label">@lang('Sub Sector') : {{required()}}</label>
                <div class="controls">
                    <select name="sub_sector" id="sub_sector">
                        <option></option>
                        @if($user_group == 19 || $user_group == 11)
                        @foreach($subsector as $a_subsector)
                        <option value="{{$a_subsector->id}}" @if($user_department==$a_subsector->id) selected @endif> {{$a_subsector->sub_sector_name}}</option>
                        @endforeach
                         @else
                         @foreach($subsector as $a_subsector)
                         <option value="{{$a_subsector->id}}"> {{$a_subsector->sub_sector_name}}</option>
                         @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div  class="span6 m-wrap">
                <label class="control-label"> @lang("Objectives(English)") : {{required()}}</label>
                <div class="controls">
                    <textarea type="text"  name="objectives" class="span11" placeholder=" @lang("Objectives(English)")">{{old('objectives')}}</textarea>
                </div>
            </div>
            <div  class="span6 m-wrap">
                <label class="control-label"> @lang("Objectives(Bangla)") : {{required()}}</label>
                <div class="controls">
                    <textarea type="text"  name="objectives_bn" class="span11" placeholder=" @lang("Objectives(Bangla)")">{{old('objectives_bn')}}</textarea>
                </div>
            </div>
        </div>
        {{--...................................Estimated Cost of the Project(In Lakh Taka) section....................................--}}

        <div class="row-fluid">
            <div class="span12">
                <h4 style="">@lang('Estimated Cost of the Project(In Lakh Taka)') </h4>
                <hr/>
                <hr/>
            </div>
        </div>
        <div class="row-fluid">
            <div  class="span4 m-wrap">
                <label class="control-label"> @lang("Total") : {{required()}}</label>
                <div class="controls">
                    <input value="{{old('total')}}" onblur="checkFEval()" id="total" type="number" name="total"  placeholder=" @lang("Total")" />
                </div>
            </div>
            <div  class="span4 m-wrap">
                <label class="control-label"> @lang("GOB") : {{required()}}</label>
                <div class="controls">
                    <input value="{{old('gob')}}" onblur="checkFEval()" id="gob" type="number" name="gob"  placeholder=" @lang("GOB")" />
                </div>
            </div>
            <div  class="span4 m-wrap">
                <label class="control-label"> @lang("FE") : {{required()}}</label>
                <div class="controls">
                    <input value="{{old('fe')}}" id="fe" type="number" name="fe" class="span11" placeholder=" @lang("FE")"> </input>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div  class="span4 m-wrap">
                <label class="control-label"> @lang("PA") : {{required()}}</label>
                <div class="controls">
                    <input value="{{old('pa')}}" onblur="checkFEval()" id="pa" type="number" name="pa"  placeholder=" @lang("PA")" />
                </div>
            </div>
            <div  class="span4 m-wrap">
                <label class="control-label"> @lang("RPA") : {{required()}}</label>
                <div class="controls">
                    <input value="{{old('rpa')}}" onblur="checkFEval()" id="rpa" type="number" name="rpa"  placeholder=" @lang("RPA")" />
                </div>
            </div>
            <div  class="span4 m-wrap">
                <label class="control-label"> @lang("Own Fund") : {{required()}}</label>
                <div class="controls">
                    <input id="own_fund" value="{{old('own_fund')}}"  type="number" name="own_fund" class="span11"  placeholder=" @lang("Own Fund")">
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div  class="span4 m-wrap">
                <label class="control-label"> @lang("Exchange Currency") : {{required()}}</label>
                <div class="controls  ">
                    {{--<input type="number" name="exchange_currency"  placeholder="@lang("Exchange Currency")" />--}}
                    <select name="exchange_currency" class="span12">
                        <option></option>
                            <option value="1" {{selected(1,old('exchange_currency'))}}>USD</option>
                            <option value="2" {{selected(2,old('exchange_currency'))}}>BDT</option>
                    </select>
                </div>
            </div>
            {{--<div  class="span6 m-wrap">--}}
                {{--<label  class="control-label">@lang('Ministry') : {{required()}}</label>--}}
                {{--<div class="controls">--}}
                    {{--<select name="ministry">--}}
                        {{--<option> @lang('Select One')</option>--}}

                        {{--@foreach($ministry as $aministry)--}}

                            {{--<option value="{{$aministry->id}}"> {{$aministry->ministry_name}}</option>--}}

                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div  class="span4 m-wrap">
                <label class="control-label"> @lang("Exchange Rate") : {{required()}}</label>
                <div class="controls">
                    <input type="number" value="{{old('exchange_rate')}}" name="exchange_rate"  placeholder=" @lang("Exchange Rate")" />
                </div>
            </div>
            <div  class="span4 m-wrap">
                <label class="control-label"> @lang("Exchange Date") : {{required()}}</label>
                <div class="controls">
                    <input type="text" value="{{old('exchange_date')}}" id="datepicker" name="exchange_date" class="span11 datepicker"  placeholder=" @lang("Exchange Date")"  >
                </div>
            </div>
        </div>
        {{--//.............................................................source_start....................................................//--}}
        <hr/>
        <div class="span7 m-wrap">
            <table id="source_table" class="table table-striped table-bordered dt-responsive table-hover" >
                <thead>
                    <tr>
                        <th style=" width: 30%; ">@lang('PA Source') {{required()}} </th>
                        <th>@lang('Amount') {{required()}} </th>
                        <th>@lang('Action')</th>
                    </tr>
                </thead>
                <tbody id="table_body">
                    <tr id="tr_1">
                        <td>
                            <select name="source[]" id="source_id_1" >
                                <option></option>
                                @foreach($source as $asource)
                                <option value="{{$asource->id}}"> {{$asource->source_name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number"  name="amount[]" id="amount_1" class="span11"  placeholder=" @lang("Amount")">
                        </td>
                        <td>
                            <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row_source(1);"><i class="icon-plus" ></i></a>
                            <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_source(1);"><i class="icon-minus" ></i> </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{--......................................................Components section............................................--}}
        <div >
            <div class="row-fluid">
                <div class="span12">
                    <hr/>
                    <h4 style="">@lang('Components')</h4>
                    <hr/>

                </div>
            </div>
            <input type="hidden" id="sno" name="serial_number" value="1"  placeholder=" @lang("Serial Number")" />

                   <div class="row-fluid">
                {{--<div  class="span6 m-wrap">--}}
                {{--<label class="control-label"> @lang("Serial Number") :</label>--}}
                {{--<div class="controls">--}}

                {{--<input type="number" id="sno" name="serial_number"  placeholder=" @lang("Serial Number")" />--}}
                {{--</div>--}}
                {{--</div>--}}
                <div  class="span6 m-wrap">
                    <label class="control-label"> @lang("Component Name") : </label>
                    <div class="controls">
                        <input id="c_name" type="text" name="components_name"  placeholder=" @lang("Component Name")" />
                    </div>
                </div>
                <div  class="span6 m-wrap">
                    <label class="control-label"> @lang("Quantity") : </label>
                    <div class="controls">
                        <input type="number" id="qty"  onkeyup="sum_val();" name="quantity"  placeholder=" @lang("Quantity")" />
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div  class="span6 m-wrap">
                    <label class="control-label"> @lang("Unit Cost") : </label>
                    <div class="controls">
                        <input type="number" id="u_cost" onkeyup="sum_val();" name="unit_cost"  placeholder=" @lang("Unit Cost")" />
                    </div>
                </div>
                <div  class="span6 m-wrap">
                    <label class="control-label"> @lang("Estimated Cost") : </label>
                    <div class="controls">
                        <input type="number" id="estimate_cost" name="estimated_cost"  placeholder=" @lang("Estimated Cost")" />
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div  class="span11 m-wrap" style="text-align: right">
                    <div class="controls">
                        <input class="btn-warning" type="button" id="btnSendData" name="btnSendData" value="@lang('Add More')"  />
                    </div>
                </div>
            </div>
        </div>
        {{--//....................................................cart*start........................................................--}}
        <div class="widget-box">
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table" >
                    <thead>
                        <tr id="component_id_">
                            <th>@lang('SL NO')</th>
                            <th>@lang("Component Name")</th>
                            <th>@lang('Quantity')</th>
                            <th>@lang('Unit Cost')</th>
                            <th>@lang('Estimated Cost')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <hr/>
        {{--......................................................Project Implementation Preiod section............................................--}}
        <div class="row-fluid">
            <div class="span12">
                <h4 style="">@lang('Project Implementation Preiod')</h4>
                <hr/>
                <hr/>
            </div>
        </div>
        <div class="row-fluid">
            <div  class="span6 m-wrap">
                <label class="control-label"> @lang("Date OF Commencement"): {{required()}}</label>
                <div class="controls">
                    <input type="text" value="{{old('date_of_commencement')}}" id="datepicker" class="span11 datepicker" onblur="checkdatevalidation()"  name="date_of_commencement" placeholder=" @lang("Date of Commencement")" />
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div  class="span6 m-wrap">
                <label class="control-label"> @lang("Date OF Completion"): {{required()}}</label>
                <div class="controls">
                    <input type="text" value="{{old('date_of_completion')}}" id="datepicker" class="span11 datepicker" onblur="checkdatevalidation()" placeholder=" @lang("Date of Completion")" name="date_of_completion"  />
                </div>
            </div>
        </div>
        <div class="row-fluid" >
            <hr/>
            <hr/>
            <div  class="span12 m-wrap" >
                <label style="text-align: center" class="control-label "> @lang("Availability of Foreign Aid") :{{required()}}</label>
                <div class="controls">
                    <textarea  type="text"  class="span11" placeholder="@lang("Availability of Foreign Aid")" name="availability_of_foreign_aid">{{old('availability_of_foreign_aid')}} </textarea>
                </div>
            </div>
        </div>
      <div class="row-fluid" >
            <hr/>
            <div  class="span5 m-wrap" >
                <label style="text-align: center" class="control-label "> @lang("Approval Status") : {{required()}}</label>
                <div class="controls">
                    <select name="approval_status">
                              <option></option>
                               @foreach ($new_project_status as $key => $v) 
                              <option value="{{$key}}" {{selected($key,old('approval_status'))}}>{{__($v)}}</option>
                              @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div style="float: right" class="form-actions">
            <button type="submit" class="btn btn-success btnNext" id="savebasic" name="savebasic" value="1">@lang("Save & Next")</button>
            {{--<a href="" class="btn btn-danger btnNext">@lang("Next")</a>--}}
        </div>
    </form>
</div>
</div>
</div>
        {{--//.................................tab2 start ............................................--}}
<div id="tab2" class="tab-pane">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>@lang("Location Wise Cost") </h5>
        </div>
        <div class="widget-content nopadding">
            <form action="{{route('newproject.store')}}" method="post" class="form-horizontal">
                @csrf
                <div class="row-fluid">
                    <div class="span12">
                        <h4 style="">@lang('Location Wise Cost Breakdown')</h4>
                        <hr/>
                        <hr/>
                    </div>
                </div>
                <table id="location_table" class="table table-striped table-bordered dt-responsive table-hover" >
                    <thead>
                        <tr>
                            <th> @lang('SL NO') </th>
                            <th  style=" width: 20%;">@lang('Division') </th>
<!--                            <th>@lang('Rmo')</th>-->
                            <th>@lang('City Corp./District')</th>
                            <th>@lang('Upazila/Thana')</th>
                            {{--<th>@lang('Amount')  {{required()}}</th>--}}
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody id="table_body_location">
                        <tr id="tr_1">
                    <div class="row-fluid">
                        <td>1</td>
                        <td>
                            <select name="division[]" id="division_id_1">
                                <option></option>
                                @foreach($divison as $a_divison)
                                <option value="{{$a_divison->id}}"> {{$a_divison->division_name}}</option>
                                @endforeach
                            </select>
                        </td>
<!--                        <td>
                            <select name="rmo[]">
                                <option></option>
                                @foreach($rmo as $a_rmo)
                                <option value="{{$a_rmo->id}}"> {{$a_rmo->rmo_name}}</option>
                                    @endforeach
                            </select>
                        </td>-->
                        <td>
                            <select name="district[]" onchange="get_selected_upazila(this,1)">
                                <option></option>
                                @foreach($district as $a_district)
                                <option value="{{$a_district->id}}" id="district_1"> {{$a_district->district_name}}</option>
                                    @endforeach
                            </select>
                        </td>
                    </div>
                    {{--<div class="row-fluid">--}}
                    <td>
                        <select name="upazila[]" id="upazila_id_1">
                            <option></option>
                            @foreach($upazila as $a_upazila)
                            <option value="{{$a_upazila->id}}"> {{$a_upazila->upazila_location_name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row_location(1);"><i class="icon-plus" ></i></a>
                        <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_location(1);"><i class="icon-minus" ></i> </a>
                    </td>
                    </tr>
                    </tbody>
                </table>


                <div class="form-actions">
                    <button style="float: right" type="submit" class="btn btn-success">@lang("Save & Next")</button>
                    {{--<a href=" " class="btn btn-danger btnNext">@lang("Next")</a>--}}
                </div>
            </form>
        </div>
    </div>
</div>
        {{--//.......................................................tab3 start.............................................................//--}}
<div id="tab3" class="tab-pane">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>@lang("Linkages & Targets") </h5>
        </div>
        <div class="widget-content nopadding">
            <form action="{{route('newproject.store')}}" method="post" class="form-horizontal">
                @csrf
                <div class="row-fluid">
                    <div class="span12">
                        <hr/>
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
               <div class="row-fluid">
                    <div  class="span4 m-wrap">
                        <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                        <div class=""  style="padding-left: 25px">
                        <select  name="multi_plan_rel"  onchange="multiyear_relation(this)">
                                <option value="0" > @lang('NO')</option>
                                <option value="1"> @lang('YES')</option>
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
 <hr/>
                
                {{--//..................................................................sdgs_goal_start.............................................//--}}
                <div class="row-fluid">
                    <div class="span12">
                        <h4 style="padding-left: 5px">@lang('SDGS Goal')</h4>
                        <hr/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div  class="span4 m-wrap">
                        <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                        <div class=""  style="padding-left: 25px">
                            <select   name="sdgs_rel"   onchange="sdgs_relation(this)">
                                <option value="0" > @lang('NO')</option>
                                <option value="1"> @lang('YES')</option>
                            </select>
                        </div>
                    </div>
                </div>
               
                {{--///...............table start...................//--}}
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
                            <tr id="tr_1">
                                <td>
                                    <select name="sdgsgoal[]" id="sdgs_goal"  onchange="showsdgsgoalstarget(this)">
                                        <option></option>
                                        @foreach($sdgsgoal as $a_sdgsgoal)
                                        <option value="{{$a_sdgsgoal->id}}"> {{$a_sdgsgoal->gole_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="sdgstarget[]" id="target">
                                        <option></option>
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
                </div>
                 <hr/>
{{--//..................................................................climate chage_start.............................................//--}}
                <div class="row-fluid">
                    <div class="span12">
                        <h4 style="padding-left: 5px">@lang('Climate Change')</h4>
                        <hr/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div  class="span4 m-wrap">
                        <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                        <div class=""  style="padding-left: 25px">
                            <select  name="climate_rel"  onchange="climate_relationn(this)">
                                <option value="0" > @lang('NO')</option>
                                <option value="1"> @lang('YES')</option>
                            </select>
                        </div>
                    </div>
                </div>
                
               
                {{--///...............table start...................//--}}
                <div class="span11 m-wrap" id="showgoalclimategoal">
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
                </div>
                 <hr/>
                {{--//..................................................................Poverty_start.............................................//--}}
                <div class="row-fluid">
                    <div class="span12">
                        <h4 style="padding-left: 5px">@lang('Poverty')</h4>
                        <hr/>
                    </div>
                </div>
                <div class="row-fluid">
                    <div  class="span4 m-wrap">
                        <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                        <div class=""  style="padding-left: 25px">
                            <select  name="poverty_rel"  onchange="poverty_relationn(this)">
                                <option value="0" > @lang('NO')</option>
                                <option value="1"> @lang('YES')</option>
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
                </div>
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
                        <select  name="ppp_rel"  onchange="ppp_relation(this)">
                                <option value="0" > @lang('NO')</option>
                                <option value="1"> @lang('YES')</option>
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
                  <div class="row-fluid">
                    <div  class="span4 m-wrap">
                        <label  class="" style="padding-left: 25px"> @lang('Relation') :</label>
                        <div class=""  style="padding-left: 25px">
                        <select  name="gender_rel"  onchange="gender_relation(this)">
                                <option value="0"> @lang('NO')</option>
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
                <div class="form-actions">
                    <button style="float: right" type="submit" name="savegoal" value="2" class="btn btn-success ">@lang("Save & Next")</button>
                    {{--<a href=" " class="btn btn-danger ">@lang("Next")</a>--}}
                </div>
            </form>
        </div>
    </div>
</div>

        {{--//..................................................Tab4........................................................//                         --}}

<div id="tab4" class="tab-pane">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>@lang("Comments")  </h5>
        </div>
        <div class="widget-content nopadding">
            <form action="{{route('newproject.store')}}" method="post" class="form-horizontal">
                @csrf
                <div class="row-fluid">
                    <div class="span12">
                        <h4 style="text-align: center">@lang('Comments')</h4>
                        <hr/>
                        <hr/>
                    </div>
                </div>
                <div class="row-fluid">
                </div>
                <div class="row-fluid">
                    <div  class="span10 m-wrap">
                        <label  class="control-label">@lang('Comments') : {{required()}}</label>
                        <div class="controls">
                            <textarea type="text" name="comment" id="cmt" class="span11" placeholder=" @lang("Comments")"></textarea>
                        </div>
                    </div>
                    <div >
                        <div class="controls">
                            <input type="button" class="btn btn-success "  id="addcomment" value="@lang('Add')">
                        </div>
                    </div>
                </div>
                <table id="comment_id" class="table table-striped table-bordered dt-responsive table-hover" >
                    <thead>
                        <tr>
                            <th >@lang('Comments By') </th>
                            <th >@lang('Comments Group') </th>

                            <th>@lang('Comments')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                </table>
                <div  style="padding-left: 22%" class="row-fluid">
                    <hr/>
                    <div style="" class="span1 m-wrap">
                        <div class="controls">
                            <!--<input  class="btn btn-success " name="savebtn"  type="submit" value="@lang('Save')">-->
                        </div>
                    </div>
                    <div  class="span1 m-wrap">

                        <div class="controls">
                            <input href="newproject" name="savebtn"   class="btn btn-success "  type="submit" value="@lang('FINAL SUBMIT')">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

@section('additionalJS')

  {{--//.....................................Next***Button.........................//--}}
    <script>
    $('.btnNext').click(function(){
    $('.nav-tabs > .active').next('li').find('a').trigger('click');
    });
    $('.btnPrevious').click(function(){
    $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });</script>

    {{--//.....................................cart***here.........................//--}}
    <script  type="text/javascript">
        
    function get_selected_upazila(val,row){
      var district = val.value;
      $.ajax({
        url: "{{url('get_selected_upazila_data')}}",
            type: "get",
            data : {id:district},
            success: function (data)
            {
                console.log("Success");
                $("#upazila_id_"+row).html(data);
                
            },
    });  
    }
    
    function add_row_source(i)
    {

    var rowCount = $('#table_body tr').length;
    if(!checkValueOfAmo(rowCount)){
    alert("Value can't be greater than summation of PA");
    return;
    }
    //alert($('#source_id_' + rowCount).val())

    if ($('#source_id_' + rowCount).val() == "")
    {
    alert('Source Field Can not be empty.');
    $('#source_id_' + rowCount).focus();
    }
    else if ($('#amount_' + rowCount).val() == "")
    {
    alert('Amount Field Can not be empty.');
    $('#amount_' + rowCount).focus();
    }
    else
    {
    rowCount++;
    $('#source_table').append(
    '<tr id="tr_' + rowCount + '">'
    + '<td><select name="source[]" id="source_id_' + rowCount + '" >'

    + '<option></option>'

    + '</select></td>'

    + '<td><input type="number" name="amount[]" id="amount_' + rowCount + '" class="span11" placeholder="@lang('amount')"  /></td>'

    + '<td>\n\
        <a class="btn btn-success" id="add_' + rowCount + '" title="@lang('Add')" onclick="add_row_source(' + rowCount + ');"><i class="icon-plus" ></i></a>\n\
        <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_source(' + rowCount + ');"><i class="icon-minus" ></i> </a>\n\
    </td>'
    + '</tr>'

    );
    get_source_data(rowCount);
    $("select").select2({
    placeholder: "Select One",
    allowClear: true
    });
    }
    }
    //..........................................getsource*******data.....................................//
    function get_source_data(rowCount)
    {
    $.ajax({
    url: "{{ route('source_data') }}",
    type: "get",
    success: function (data)
    {
        $('#source_id_' + rowCount).html("");
        $('#source_id_' + rowCount).html(data);
    },
    });
    }
    function checkValueOfAmo(rowCount){

    var i;
    var pa  = $('#pa').val();
    var rpa  = $('#rpa').val();
    if(rpa == '')
    rpa = 0;
    if(pa == '')
    pa = 0;
    pa = parseInt(pa);
    rpa = parseInt(rpa);
    var total_sum = pa;
    var total_val = 0;
    var temp_val;
    while(rowCount > 0){
    temp_val = $('#amount_'+rowCount).val();
    temp_val = parseInt(temp_val);
    total_val = total_val + temp_val;
    rowCount--;
    }
    if(total_sum < total_val){
        return false;
    }
    else{
        return true;
    }
    }
    //..........check estimated cost validation
    function checkFEval(){
      
    var total= $('#total').val();
    var gob= $('#gob').val();
    var pa_t_check  = $('#pa').val();
    total = parseInt(total);
    gob = parseInt(gob);
    pa_t_check_get = parseInt(pa_t_check);
    check=gob+pa_t_check_get;
  
    if(check > total) {
        
       alert("the sum of gob and pa should less or equal to Total!!");
         $('#savebasic').attr("disabled", "disabled");
         
//         $('#total').addClass("borderClass");
         $('#total').css({"border-color": "#FF0000", 
             "border-width":"2px", 
             "border-style":"solid"});
//     
   }
    else
    {
        $('#savebasic').removeAttr("disabled");
        $('#total').removeAttr('style');

    }
//    var pa  = $('#pa').val();
//    var rpa  = $('#rpa').val();
//    if(pa=='' || rpa == ''||  fe=='')
//    {
//    return false;
//    }
//    if(fe == '')
//    fe = 0;
//    if(rpa == '')
//    rpa = 0;
//    if(pa == '')
//    pa = 0;
//    fe = parseInt(fe);
//    pa = parseInt(pa);
//    rpa = parseInt(rpa);
//    var total_sum;
//    total_sum = pa + rpa;
//    if(fe < total_sum){
//        alert("Sumation of PA and RPA is not greater than FE.");
//    $('#savebasic').attr("disabled", "disabled");
//        return false;
//    }
//    else
//    {
//    $('#savebasic').removeAttr("disabled");
//    }
    }
    //..........................................remove****row..........................//
    function remove_row_source(i) {

    var rowCount = $('#table_body tr').length;
    if (rowCount != 1)
    {
        $("#table_body tr:last").remove();
    }
    }
    </script>
    {{--//.............................add*Location*Row.........................................//--}}
    <script  type="text/javascript">
    function add_row_location(i)
    {
    var rowCount = $('#table_body_location tr').length;
    // rowCount++;
    if ($('#division_id_' + rowCount).val() == "")
    {
        alert('Division Field Can not be empty.');
    $('#division_id_' + rowCount).focus();
    }
    else if ($('#amountlocation_' + rowCount).val() == "")
    {
        alert('Amount Field Can not be empty.');
    $('#amount_' + rowCount).focus();
    }
    else
    {
    var $x = rowCount++;
    $('#location_table').append(
    '<tr id="tr_' + rowCount + '">'
    + '<td>' + $x + '</td>'
    + '<td><select name="division[]" id="division_id_' + rowCount + '" >'
    + '<option></option>'
    + '</select></td>'
//    + '<td><select name="rmo[]" id="rmo_id_' + rowCount + '" >'
//    + '<option></option>'
//    + '</select></td>'
    + '<td><select name="district[]" id="district_id__' + rowCount + '" onchange="get_selected_upazila(this,'+rowCount+')">'
    + '<option></option>'
    {{--+ '<option value="1"> @lang('Kushtia') </option>'--}}
    + '</select></td>'
    + '<td><select name="upazila[]" id="upazila_id_' + rowCount + '" >'
    + '<option></option>'
    + '</select></td>'
    {{--+ '<td><input type="number" name="amount[]" id="amountlocation_' + rowCount + '" class="span11" placeholder="@lang('Amount')"  /></td>'--}}
    + '<td>\n\
    <a class="btn btn-success" id="add_' + rowCount + '" title="@lang('Add')" onclick="add_row_location(' + rowCount + ');"><i class="icon-plus" ></i></a>\n\
    <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_location(' + rowCount + ');"><i class="icon-minus" ></i> </a>\n\
    </td>'
    + '</tr>'
    );
    get_division_data(rowCount);
    $("select").select2({
    placeholder: "Select One",
    allowClear: true
    });
    get_upazila_data(rowCount);
    $("select").select2({
    placeholder: "Select One",
    allowClear: true
    });
    get_rmo_data(rowCount);
    $("select").select2({
    placeholder: "Select One",
    allowClear: true
    });
    get_district_data(rowCount);
    $("select").select2({
    placeholder: "Select One",
    allowClear: true
    });
    }
    }
    //..........................................remove****row..........................//
    function remove_row_location(i) {
    alert("Delete Successfully");
    var rowCount = $('#table_body_location tr').length;
    if (rowCount != 1)
    {
    $("#table_body_location tr:last").remove();
    }
    }
    //..........................................getdivision*******data.....................................//
    function get_division_data(rowCount)
    {
    $.ajax({
    url: "{{ route('division_data') }}",
    type: "get",
    success: function (data)
    {
        console.log('success');
        $('#division_id_' + rowCount).html("");
        $('#division_id_' + rowCount).html(data);
    },
    });
    }
    function get_upazila_data(rowCount)
    {
    $.ajax({
    url: "{{ route('get_upazila_data') }}",
    type: "get",
    success: function (data)
    {
        console.log('success');
        $('#upazila_id_' + rowCount).html("");
        $('#upazila_id_' + rowCount).html(data);
    },
    });
    }
    function get_rmo_data(rowCount)
    {
    $.ajax({
    url: "{{ route('get_rmo_data') }}",
    type: "get",
    success: function (data)
    {
        console.log('success');
        $('#rmo_id_' + rowCount).html("");
        $('#rmo_id_' + rowCount).html(data);
    },
    });
    }

    function get_district_data(rowCount)
    {
    $.ajax({
    url: "{{ route('get_district_data') }}",
    type: "get",
    success: function (data)
    {
        console.log('success');
        $('#district_id__' + rowCount).html("");
        $('#district_id__' + rowCount).html(data);
    },
    });
    }
    </script>



    {{--//...................................................pass**cart*data**by**ajax..........................//--}}



    <script type="text/javascript">
    $(document).ready(function () {
    $('#btnSendData').click(function () {
    var sno = document.getElementById('sno').value;
    var c_name = document.getElementById('c_name').value;
    var qty = document.getElementById('qty').value;
    var u_cost = document.getElementById('u_cost').value;
    var e_cost = document.getElementById('estimate_cost').value;
    $.ajax({
    url: "{{ route('send_component_data') }}",
    type: 'get',
    data: 'a=' + sno + '&b=' + c_name + '&c=' + qty + '&d=' + u_cost + '&e=' + e_cost,
    success: function (result) {

    console.log(result);
            $('#component_id_').html("");
            $('#component_id_').html(result);
    }

    });
    });
    });    </script>


    {{--//..............................................send commments data by ajax,,,,,,,,,,,,,,,,,,,,,,,,,,,//--}}

    <script>
    $(document).ready(function () {
    $('#addcomment').click(function () {

    var comment = document.getElementById('cmt').value;
    if(comment=='')
    {
        alert('please add the comment')
        return false;
    }
    $.ajax({
    url: "{{ route('send_comment_data') }}",
    type: 'get',
    data: {
    cmt: comment,
    },
    success: function (result) {

    console.log(result);
            //
            $('#comment_id').html("");
            $('#comment_id').html(result);
    }

    });
    });
    });    </script>


    {{--//.............................sum*component**value..........................//--}}

    <script>

    function sum_val() {

    var num1 = document.getElementById('qty').value;
    var num2 = document.getElementById('u_cost').value;
    var result = parseInt(num1) * parseInt(num2);
    if (!isNaN(result)) {
    document.getElementById('estimate_cost').value = result;
    }
    }

    </script>

    <script>

    $('#showgoal').hide();
    $('#show_poverty').hide();
    $('#show_ppp').hide();
    $('#showgoalclimategoal').hide();
    function sdgs_relation(id)
    {
    if (id.value == 1)
    {
    $('#showgoal').show();
    }
    else
    {
    $('#showgoal').hide();
    }
    }


    function poverty_relationn(id)
    {
    if (id.value == 1)
    {
    $('#show_poverty').show();
    }
    else
    {
    $('#show_poverty').hide();
    }
    }

    function ppp_relation(id)
    {
    if (id.value == 1)
    {
    $('#show_ppp').show();
    }
    else
    {
    $('#show_ppp').hide();
    }
    }
    function climate_relationn(id)
{
    if(id.value==1)
    {
        $('#showgoalclimategoal').show();  
    }
    else
    {
        $('#showgoalclimategoal').hide();    
    }

}
    </script>

    <script>
    $(document).ready(function() {
    if (location.hash) {
    $("a[href='" + location.hash + "']").tab("show");
    }
    $(document.body).on("click", "a[data-toggle]", function(event) {
    location.hash = this.getAttribute("href");
    });
    });
    $(window).on("popstate", function() {
    var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
    $("a[href='" + anchor + "']").tab("show");
    });


    </script>

    @endsection