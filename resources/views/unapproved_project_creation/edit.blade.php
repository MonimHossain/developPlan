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
                    <li id="showcomment" onclick="showcoment_on_Edit(this)" value="{{$project->id}}" class=""><a data-toggle="tab" href="#tab4">@lang('Comments')</a></li>
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
              <form action="{{route('newproject.update',$project->id)}}" method="post" class="form-horizontal">
                    @method('patch')
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
                                    <option value="0">@lang('Select One')</option>
                                    @foreach($projecttype as $a_projecttype)
                                        <option value="{{$a_projecttype->id}}" @if($a_projecttype->id==$project->project_type ) selected @endif> {{$a_projecttype->project_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div  class="span6 m-wrap">
                            <label class="control-label"> @lang("Project Code(PD)") :</label>
                            <div class="controls">
                                <input type="text" name="project_code_pd" value="{{$project->project_code_pd}}" class="span11"  placeholder=" @lang("Project Code(PD)")" readonly/>
                            </div>
                        </div>
                    </div>
<!--                    <div class="row-fluid">
                        <div  class="span6 m-wrap">
                            <input type="hidden">
                        </div>
                        <div  class="span6 m-wrap">
                            <label class="control-label"> @lang("Project Code(FD)") : {{required()}}</label>
                            <div class="controls">
                                <input type="text" name="project_code_fd"  class="span11" value="{{$project->project_code_fd}}"  placeholder="@lang("Project Code(FD)")" />
                            </div>
                        </div>
                    </div>-->

                    <div class="row-fluid">
                        <div  class="span6 m-wrap">
                            <label class="control-label"> @lang("Project Title(English)") : {{required()}}</label>
                            <div class="controls">
                                <input type="text" name="project_title" value="{{$project->project_title}}" class="span11" placeholder=" @lang("Project Title")" />
                            </div>
                        </div>
                        <div  class="span6 m-wrap">
                            <label class="control-label"> @lang("Project Title(Bangla)") : {{required()}}</label>
                            <div class="controls">
                                <input type="text" name="project_tiltle_bn" value="{{$project->project_tiltle_bn}}" class="span11"  placeholder=" @lang("Project Title Bangla")" />
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div  class="span6 m-wrap">
                            <label  class="control-label">@lang('Ministry/Division') :</label>
                            <div class="controls">
                                <select name="ministry">
                                    <option> @lang('Select One')</option>
                                    @foreach($ministry as $aministry)
                                        <option value="{{$aministry->id}}" @if($aministry->id==$project->ministry ) selected @endif> {{$aministry->ministry_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div  class="span6 m-wrap">
                            <label  class="control-label">@lang('Agency') :</label>
                            <div class="controls">
                                <select name="agency">
                                    <option> @lang('Select One')</option>
                                    @foreach($agency as $a_agency)
                                        <option value="{{$a_agency->id}}" @if($a_agency->id==$project->agency ) selected @endif> {{$a_agency->agency_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div  class="span6 m-wrap">
                            <label  class="control-label">@lang('Sector') :</label>
                            <div class="controls">
                                <select name="sector">
                                    <option> @lang('Select One')</option>
                                    @foreach($sector as $asector)
                                        <option value="{{$asector->id}}" @if($asector->id==$project->sector ) selected @endif> {{$asector->sector_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div  class="span6 m-wrap">
                            <label  class="control-label">@lang('Sub Sector') :</label>
                            <div class="controls">
                                <select name="sub_sector">
                                    <option> @lang('Select One')</option>
                                    @foreach($subsector as $a_subsector)
                                        <option value="{{$a_subsector->id}}" @if($a_subsector->id==$project->sub_sector) selected @endif> {{$a_subsector->sub_sector_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div  class="span6 m-wrap">
                            <label class="control-label"> @lang("Objectives(English)") : {{required()}}</label>
                            <div class="controls">
                                <textarea type="text" name="objectives"  class="span11" placeholder=" @lang("Objectives(English)")">{{$project->objectives}} </textarea>
                            </div>
                        </div>
                        <div  class="span6 m-wrap">
                            <label class="control-label"> @lang("Objectives(Bangla)") : {{required()}} </label>
                            <div class="controls">
                                <textarea type="text" name="objectives_bn" class="span11" placeholder=" @lang("Objectives(Bangla)")">{{$project->objectives_bn}}</textarea>
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
                                    <input type="number" value="{{$project->total}}" name="total"  placeholder=" @lang("Total")" />
                                </div>
                            </div>
                            <div  class="span4 m-wrap">
                                <label class="control-label"> @lang("GOB") : {{required()}}</label>
                                <div class="controls">
                                    <input type="number" value="{{$project->gob}}" name="gob"  placeholder=" @lang("GOB")" />
                                </div>
                            </div>
                            <div  class="span4 m-wrap">
                                <label class="control-label"> @lang("FE") : {{required()}}</label>
                                <div class="controls">
                                    <input type="number" value="{{$project->fe}}" name="fe" class="span11" placeholder=" @lang("FE")"> </input>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div  class="span4 m-wrap">
                                <label class="control-label"> @lang("PA") : {{required()}}</label>
                                <div class="controls">
                                    <input value="{{$project->pa}}" type="number" name="pa"  placeholder=" @lang("PA")" />
                                </div>
                            </div>
                            <div  class="span4 m-wrap">
                                <label class="control-label"> @lang("RPA") : {{required()}}</label>
                                <div class="controls">
                                    <input value="{{$project->rpa}}" type="number" name="rpa"  placeholder=" @lang("RPA")" />
                                </div>
                            </div>
                            <div  class="span4 m-wrap">
                                <label class="control-label"> @lang("Own Fund") : {{required()}}</label>
                                <div class="controls">
                                    <input value="{{$project->own_fund}}" type="number" name="own_fund" class="span11"  placeholder=" @lang("Own Fund")">
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div  class="span4 m-wrap">
                                <label class="control-label"> @lang("Exchange Currency") : {{required()}}</label>
                                <div class="controls  ">
                                    {{--<input type="number" name="exchange_currency"  placeholder="@lang("Exchange Currency")" />--}}
                                    <select name="exchange_currency" class="span12">
                                        <option > @lang('Select One')</option>
                                        <option value="1" @if($project->exchange_currency==1 ) selected @endif>USD</option>
                                        <option value="2" @if($project->exchange_currency==2 ) selected @endif>BDT</option>
                                    </select>
                                </div>
                            </div>
                            <div  class="span4 m-wrap">
                                <label class="control-label"> @lang("Exchange Rate") : {{required()}}</label>
                                <div class="controls">
                                   <input type="number" value="{{$project->exchange_rate}}" name="exchange_rate"  placeholder=" @lang("Exchange Rate")" />
                                </div>
                            </div>
                            <div  class="span4 m-wrap">
                                <label class="control-label"> @lang("Exchange Date") : {{required()}}</label>
                                <div class="controls">
                                    <input type="text" value="{{$project->exchange_date}}" id="datepicker" name="exchange_date" class="span11 datepicker"  placeholder=" @lang("Exchange Date")"  >
                                </div>
                            </div>
                        </div>
                            {{--//.............................................................source_start....................................................//--}}
                            <hr/>
                <div class="span7 m-wrap">
                    <table id="source_table" class="table table-striped table-bordered dt-responsive table-hover" >
                        <thead>
                        <tr>
                            <th style=" width: 30%; ">@lang('PA Source') </th>
                            <th>@lang('Amount') </th>
                            <th>@lang('Action')</th>
                        </tr>
                        </thead>
                        <tbody id="table_body">
                        @foreach($edit_source as $a_edit_source)
                        <tr id="tr_1">
                            <td>
                                <select name="source[]" id="source_id_1" >
                                    <option></option>
                                   @foreach($source as $asource)
                                        <option value="{{$asource->id}}"  @if($asource->id==$a_edit_source->finanacing_source) selected @endif > {{$asource->source_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="amount[]" value="{{$a_edit_source->amount}}" class="span11"  placeholder=" @lang("Amount")">
                            </td>
                            <td>
                                <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row_source(1);"><i class="icon-plus" ></i></a>

                                <a class="btn btn-danger" href="{{route('delete_source',$project->id . '/' .$a_edit_source->id)}}"  title="@lang('Delete')"  onclick="remove_row(1);"><i class="icon-minus" ></i> </a>
                            </td>
                        </tr>
                            @endforeach
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
                </div>
                {{--//....................................................cart*start........................................................--}}

                <div class="widget-box">
                    <div class="widget-content nopadding">
                        @if(count($editcomponent)==0 )
                            <table id="component_table" class="table table-bordered data-table" >
                                <thead>
                                <tr id="component_id_">
                                    <th>@lang("Component Name")</th>
                                    <th>@lang('Quantity')</th>
                                    <th>@lang('Unit Cost')</th>
                                    <th>@lang('Estimated Cost')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                                </thead>
                                <tbody id="component_tabel_body">
                                <tr>
                                    <td> <input id="c_name" type="text" name="components_name[]" placeholder=" @lang("Component Name")" /></td>
                                    <td>  <input type="number" id="qty"  class="span11"  onkeyup="sum_val();" name="quantity[]"  placeholder=" @lang("Quantity")" /></td>
                                    <td> <input type="number" id="u_cost" onkeyup="sum_val();"  name="unit_cost[]"  placeholder=" @lang("Unit Cost")" /></td>
                                    <td> <input type="number" id="estimate_cost" name="estimated_cost[]"  placeholder=" @lang("Estimated Cost")" /></td>
                                    <td>
                                        <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row_component(1);"><i class="icon-plus" ></i></a>
                                        <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_component(1);"><i class="icon-minus" ></i> </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        @else
                            <table id="component_table" class="table table-bordered data-table" >
                                <thead>
                                <tr id="component_id_">

                                    <th>@lang("Component Name")</th>
                                    <th>@lang('Quantity')</th>
                                    <th>@lang('Unit Cost')</th>
                                    <th>@lang('Estimated Cost')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                                </thead>
                                <tbody id="component_tabel_body">
                                @foreach($editcomponent as $a_editcomponent)
                                    <tr>
                                        <td> <input id="c_name" type="text" name="components_name[]" value="{{$a_editcomponent->components_name}}" placeholder=" @lang("Component Name")" /></td>
                                        <td>  <input type="number" id="qty"  class="span11"  value="{{$a_editcomponent->quantity}}" onkeyup="sum_val();" name="quantity[]"  placeholder=" @lang("Quantity")" /></td>
                                        <td> <input type="number" id="u_cost" onkeyup="sum_val();"  value="{{$a_editcomponent->unit_cost}}"  name="unit_cost[]"  placeholder=" @lang("Unit Cost")" /></td>
                                        <td> <input type="number" id="estimate_cost" name="estimated_cost[]"  value="{{$a_editcomponent->estimated_cost}}" placeholder=" @lang("Estimated Cost")" /></td>
                                        <td>
                                            <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row_component(1);"><i class="icon-plus" ></i></a>
                                            <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_component(1);"><i class="icon-minus" ></i> </a>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        @endif
                        {{--<div id="component_id_">--}}
                        {{--</div>--}}
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
                        <label class="control-label"> @lang("Date OF Commencement") : {{required()}}</label>
                        <div class="controls">
                            <input type="text" id="datepicker" class="span11 datepicker" value="{{$project->date_of_commencement}}"  name="date_of_commencement"   />
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div  class="span6 m-wrap">
                        <label class="control-label"> @lang("Date OF Completion") : {{required()}}</label>
                        <div class="controls">
                            <input type="text" id="datepicker"  value="{{$project->date_of_commencement}}"  class="span11 datepicker"  name="date_of_completion"  />
                        </div>
                    </div>
                </div>
                <div class="row-fluid" >
                   <div  class="span12 m-wrap" >
                        <label style="text-align: center" class="control-label "> @lang("Availability of Foreign Aid") : </label>
                        <div class="controls ">
                            <textarea  type="text"  class="span11" placeholder="@lang("Availability of Foreign Aid")" name="availability_of_foreign_aid">{{$project->availability_of_foreign_aid}} </textarea>
                        </div>
                    </div>
                </div>
        <div class="row-fluid" >
            <hr/>
            <div  class="span5 m-wrap" >
                <label style="text-align: center" class="control-label "> @lang("Approval Status") : {{required()}}</label>
                <div class="controls">
                    <select name="approval_status">
                        @if(empty($project->approval_status))
                              <option></option>
                              <option value="1">DPP Not Found</option>
                              <option value="2">DPP Found</option>
                              <option value="3">PEC Done</option>
                            @else
                              <option></option>
                              <option value="1" @if($project->approval_status==1) selected @endif>DPP Not Found</option>
                              <option value="2" @if($project->approval_status==2) selected @endif>DPP Found</option>
                              <option value="3" @if($project->approval_status==3) selected @endif>PEC Done</option>
                              @endif
                    </select>
                </div>
            </div>
        </div>
                <div style="float: right" class="form-actions">
                    <button type="submit" class="btn btn-success btnNext" name="updatebasic" value="1">@lang("Update & Next")</button>
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
            <form action="{{route('newproject.update',$project->id)}}" method="post" class="form-horizontal">
                @csrf
                @method('patch')
                <div class="row-fluid">
                    <div class="span12">
                        <h4 style="">@lang('Location Wise Cost Breakdown')</h4>
                        <hr/>
                        <hr/>
                    </div>
                </div>
                @if(count($edit_location)==0 )
                    <table id="location_table" class="table table-striped table-bordered dt-responsive table-hover" >
                        <thead>
                        <tr>
                            <th> @lang('SL NO') </th>
                            <th  style=" width: 20%;">@lang('Division') </th>

                            <th>@lang('Rmo')</th>

                            <th>@lang('City Corp./District')</th>

                            <th>@lang('Upazila/Thana')</th>
                            {{--<th>@lang('Amount')</th>--}}
                            <th>@lang('Action')</th>
                        </tr>
                        </thead>

                        <tbody id="table_body_location">
                        <tr id="tr_1">
                            <div class="row-fluid">
                                <td>
                                    1
                                </td>
                                <td>
                                    <select name="division[]" id="division_id_1">
                                        <option></option>
                                        @foreach($divison as $a_divison)
                                            <option value="{{$a_divison->id}}"> {{$a_divison->division_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="rmo[]">
                                        <option></option>
                                        @foreach($rmo as $a_rmo)
                                            <option value="{{$a_rmo->id}}"> {{$a_rmo->rmo_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="district[]">
                                        <option></option>
                                        @foreach($district as $a_district)
                                        <option value="{{$a_district->id}}">{{$a_district->district_name}} </option>
                                    @endforeach
                                    </select>
                                </td>
                            </div>
                            {{--<div class="row-fluid">--}}
                            <td>
                                <select name="upazila[]">
                                    <option></option>
                                    @foreach($upazila as $a_upazila)

                                        <option value="{{$a_upazila->id}}"> {{$a_upazila->upazila_location_name}}</option>
                                    @endforeach
                                </select>

                            </td>
                            {{--<td>--}}
                                {{--<input type="number" class="span11" name="amount[]"  placeholder=" @lang("Amount")" />--}}


                            {{--</td>--}}
                            <td>
                                <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row_location(1);"><i class="icon-plus" ></i></a>
                                <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_location(1);"><i class="icon-minus" ></i> </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                @else
                <table id="location_table" class="table table-striped table-bordered dt-responsive table-hover" >

                    <thead>
                    <tr>
                        <th> @lang('SL NO') </th>
                        <th  style=" width: 20%;">@lang('Division') {{required()}} </th>
                        <th>@lang('Rmo') {{required()}}</th>
                        <th>@lang('City Corp./District') {{required()}}</th>
                        <th>@lang('Upazila/Thana') {{required()}}</th>
                        {{--<th>@lang('Amount') {{required()}}</th>--}}
                        <th>@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody id="table_body_location">
                    @foreach($edit_location as $a_edit_location)
                    <tr id="tr_1">
                        <div class="row-fluid">
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                <select name="division[]" id="division_id_1">
                                    <option></option>
                                    @foreach($divison as $a_divison)
                                        <option value="{{$a_divison->id}}" @if($a_divison->id==$a_edit_location->division ) selected @endif> {{$a_divison->division_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="rmo[]">
                                    <option></option>
                                    @foreach($rmo as $a_rmo)
                                        <option value="{{$a_rmo->id}}" @if($a_rmo->id==$a_edit_location->rmo ) selected @endif> {{$a_rmo->rmo_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="district[]">
                                    <option></option>
                                    @foreach($district as $a_district)
                                        <option value="{{$a_district->id}}" @if($a_district->id==$a_edit_location->district ) selected @endif> {{$a_district->district_name}} </option>
                                    @endforeach
                                </select>
                            </td>
                        </div>
                        {{--<div class="row-fluid">--}}
                        <td>
                            <select name="upazila[]">
                                <option></option>
                                @foreach($upazila as $a_upazila)
                                    <option value="{{$a_upazila->id}}" @if($a_upazila->id==$a_edit_location->upazila ) selected @endif > {{$a_upazila->upazila_location_name}}</option>
                                @endforeach
                            </select>
                        </td>
                        {{--<td>--}}
                            {{--<input type="number" value="{{$a_edit_location->amount}}" class="span11" name="amount[]"  placeholder=" @lang("Amount")" />--}}
                        {{--</td>--}}
                        <td>
                            <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row_location(1);"><i class="icon-plus" ></i></a>
                            <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_location(1);"><i class="icon-minus" ></i> </a>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                <div class="form-actions">
                    <button style="float: right" type="submit" class="btn btn-success">@lang("Update & Next")</button>
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
            <form action="{{route('newproject.update',$project->id)}}" method="post" class="form-horizontal">
                @csrf
                @method('patch')
                <div class="row-fluid">
                    <div class="span12">
                        <hr/>
                    </div>
                </div>
<!--                //multiYearplan-->
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
                             <option value="0" selected> @lang('NO')</option>
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
</div>
            {{--//..................................................Tab4........................................................//                         --}}

<div id="tab4" class="tab-pane">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>@lang("Comments")  </h5>
        </div>
        <div class="widget-content nopadding">
            <form action="{{route('newproject.update',$project->id)}}" method="post" class="form-horizontal">
                @csrf
                @method('patch')

                <div class="row-fluid">
                    <div class="span12">
                        <h4 style="text-align: center">@lang('Comments')</h4>
                        <hr/>
                        <hr/>
                    </div>
                </div>
                <div class="row-fluid">
                    {{--<div  class="span6 m-wrap">--}}
                    {{--<label  class="control-label">@lang('Comments Level') :</label>--}}
                    {{--<div class="controls">--}}
                    {{--<select name="comment_level	">--}}
                    {{--<option> @lang('Select One')</option>--}}
                    {{--<option value=""> Demo</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="row-fluid">
                    <div  class="span10 m-wrap">
                        <label  class="control-label">@lang('Comments') : {{required()}}</label>
                        <div class="controls">
                            <textarea type="text" name="comment" id="cmt" class="span11" placeholder=" @lang("Comments")"></textarea>
                        </div>
                    </div>
                    <div>
                        <div class="controls">
                            <input type="button" onclick="addcommentonedit('{{$project->id}}')" class="btn btn-success"  value="@lang('Add')">
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
                            <!--<input  class="btn btn-success " name="savebtn"  type="submit" value="@lang('UPDATE')">-->
                        </div>
                    </div>
                    <div  class="span1 m-wrap">
                        <div class="controls">
                            <input href="newproject" name="savebtn"   class="btn btn-success "  type="submit" value="@lang('FINAL SUBMIT')">
                        </div>
                    </div>
                    {{--<div style="text-align: center" class="controls span6 ">--}}
                    {{--<input  class="btn btn-danger "  type="submit" value="submit">--}}
                    {{--</div>--}}
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
        });
    </script>

    {{--//.....................................source*cart***here.........................//--}}
    <script  type="text/javascript">
        function add_row_source(i)
        {
            var rowCount = $('#table_body tr').length;
            rowCount++;
            if ($('#source_id_' + rowCount).val() == "")
            {
            }
            else
            {
                rowCount++;
                $('#source_table').append(
                    '<tr id="tr_' + rowCount + '">'
                    + '<td><select name="source[]" id="source_id_' + rowCount + '" >'
                    + '<option></option>'
                    +'</select></td>'
                    + '<td><input type="number" name="amount[]" class="span11" placeholder="@lang('amount')"  /></td>'
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
                })

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
                    $('#source_id_'+rowCount).html("");
                    $('#source_id_'+rowCount).html(data);
                },
            });
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
            else
            {
                var $x= rowCount++;

                $('#location_table').append(
                    '<tr id="tr_' + rowCount + '">'
                    + '<td>' +  $x + '</td>'

                    + '<td><select name="division[]" id="division_id_' + rowCount + '" >'

                    + '<option></option>'
                    +'</select></td>'
                    + '<td><select name="rmo[]" id="rmo_id_' + rowCount + '" >'
                    + '<option></option>'
                    +'</select></td>'
                    + '<td><select name="district[]" id="district_id_' + rowCount + '" >'
                    + '<option></option>'
                    // + '<option value="1" > Kushtia </option>'
                    +'</select></td>'
                    + '<td><select name="upazila[]" id="upazila_id_' + rowCount + '" >'
                    + '<option></option>'
                    +'</select></td>'
                    {{--+ '<td><input type="number" name="amount[]" class="span11" placeholder="@lang('Amount')"  /></td>'--}}
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
                })

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

                    $('#division_id_'+rowCount).html("");
                    $('#division_id_'+rowCount).html(data);
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

                    $('#upazila_id_'+rowCount).html("");
                    $('#upazila_id_'+rowCount).html(data);
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
                    $('#district_id_' + rowCount).html("");
                    $('#district_id_' + rowCount).html(data);
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
                    data: 'a='+sno +'&b='+c_name +'&c='+qty +'&d='+u_cost +'&e='+e_cost,
                    success: function (result) {
                        console.log(result);
                        $('#component_id_').html("");
                        $('#component_id_').html(result);
                    }

                });
            });

        });
    </script>



    {{--//..............................................send commments data by ajax to add on edit,,,,,,,,,,,,,,,,,,,,,,,,,,,//--}}
    <script>
            function addcommentonedit(id)
            {
                var comment = document.getElementById('cmt').value;
                $.ajax({
                    url: "{{ route('send_edit_comment_data') }}",
                    type: 'get',
                    data: 'id='+id +'&cmt='+comment,
                    success: function (result) {
                        console.log(result);
                        //
                        $('#comment_id').html("");
                        $('#comment_id').html(result);
                    }
                });
            }
            function delcomment(id) {
                console.log(id);
                // var rowid = document.getElementById('getrowid').value;
                // var dataId = $('#btnDeleteProduct').attr('data-id');
                // var rowid = $(this).attr("name");
                alert("delete succesfully!");
                $.ajax({
                    url: "{{ route('delcomment') }}",
                    type: 'get',

                    data: {
                        id: id,
                    },
                    success: function (result) {
                        // console.log(result);
                        //
                        // $('#comment_id').html("");
                        // $('#comment_id').html(result);
                        showcoment_on_Edit(result)
                    }
                });
            }
            function updates_comments(id) {
                var cmt=$("#cmt"+id).html();
                console.log(name);
                $.ajax({
                    url: "{{ route('commentupdate') }}",
                    type: 'get',
                    data: 'id='+id +'&cmt='+cmt ,
                    success: function (result) {
                        // console.log(result);
                        // $('#comment_id').html("");
                        // $('#comment_id').html(result);

                        showcoment_on_Edit(result)
                    }
                });

            }
    </script>
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

    {{--//..........................................getting sdgs goal targets.....................................//--}}
    <script>
        function showsdgsgoalstarget(val)
        {
            var goal = val.value;
            alert(goal);
            $.ajax({
                url: "{{ route('getting_the_target') }}",
                type: 'get',
                data: {
                    goal_id: goal,
                },
                success: function (data) {
                    console.log(data);
                    $('#targets').html("");

                    $('#targets').html(data);

                }
            });
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