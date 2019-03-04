@extends('layouts.adminLayout.admin_design')

@section('content')
<style>
  /* .btn{
    border-radius:4px;
    letter-spacing: 2px;
    line-height: 25px;
  } */
    fieldset {
        display: block;
        margin-inline-start: 2px;
        margin-inline-end: 2px;
        border: 1px solid #2E363F;
        padding-block-start: 0.35em;
        padding-inline-end: 0.75em;
        padding-block-end: 0.625em;
        padding-inline-start: 0.75em;
        min-inline-size: min-content;


    }

    .margin-bottom{

        margin-bottom: 20px;
    }
    .inline{
        display:inline !important;
    }
    .width{
        width:75%;
    }
    .margin-right{
        margin-right:6px;
    }
    .padding-left{
        padding-left:-2px;
    }

    legend {
        padding-inline-start: 2px; padding-inline-end: 2px;
        color:#B27D66;
        font-weight: lighter;
        font-size: 18px;
        border-bottom: 0px !important
    }
    fieldset input {
        margin-right: 0.20em;
    }
    fieldset label{
        display:inline;
    }fieldset div{
        display:inline;
    }
    select {
        all:none;
    }



</style>
<div id="content" class="">

    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a></div>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid">

        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">

                    <div class="widget-content">
                        <form action="{{route('allocated_project.update',$project->id)}}" method="post" class="form-horizontal">
                            @csrf
                             @method('patch')
                            <input type="hidden" name="project_id" value="{{$project->project_id}}">
                            <div class="span12">
                                <div class="span12">
                                    <div class="span2">

                                    </div>
                                    <div  class="span6">
                                        <div class="span12">
                                            <label class="control-label"> @lang("Allocation For") :</label>
                                            <div class="controls">
                                                <select name="demand_type" id="" class="span9">
                                                    <option selected value="1">ADP</option>
                                                    <option value="2">RADP</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="span12">
                                    <div class="span2">

                                    </div>
                                    <div  class="span6">
                                        <div class="span12" style="margin-left:-32px">
                                            <label class="control-label"> @lang("Notice") :</label>
                                            <div class="controls" >
                                                <select name="call_notice_type" id="" class="span9">
                                                    <option selected value="1">Call notice 1</option>
                                                    <option  value="2">Call notice 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="span12">
                                  <div class="span6">
                                    <label class="control-label"> @lang("Project Name") :</label>
                                    <div class="controls">
                                        <input type="text" name='project_name' required value="{{$project->project_name->project_title}}" class="span10">
                                    </div>
                                  </div>
                                  <div class="span6">
                                    <div class="span12">
                                        <label class="control-label"> @lang("Project Code"){{required()}}:</label>
                                        <div class="controls">
                                            <input type="text"  required value="{{$project->project_code}}" name='project_code' class="span10">
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                {{-- end notice --}}
                                <div class="span12">
                                    <div class="span6">
                                        <label class="control-label"> @lang("Sector") :</label>
                                        <div class="controls">
                                            <input type="text" value="{{$project->sector_name ?? null}}" class="span10" disabled="">
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <label class="control-label"> @lang("Subsector") :</label>
                                        <div class="controls">
                                            <input type="text" value="{{$project->sub_sector_name ?? null}}" class="span10" disabled="">
                                        </div>
                                    </div>
                                </div>

                                {{-- end sector and subsector --}}
                                <div class="span12">
                                    <div class="span6">
                                        <label class="control-label"> @lang("Ministry/Division") :</label>
                                        <div class="controls">
                                            <input type="text" value="{{$project->ministry_name ?? null}}"class="span10" disabled="">
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <label class="control-label"> @lang("Agency") :</label>
                                        <div class="controls">
                                            <input type="text" class="span10" value="{{$project->agency_name ?? null}}" disabled="">
                                        </div>
                                    </div>
                                </div>

                                {{-- end of ministry agency --}}
                                <hr/>
                                <div class="span12">
                                    <div class="span6">
                                        <div class="span12">
                                            <label class="control-label"> @lang("Impletentation Period") :</label>
                                            <div class="controls">
                                                <input type="text" name='from_date' class="span10" value="{{$commonclass->dateToview($project->project_name->date_of_commencement)}}" disabled="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="span6">
                                        <div class="span12">
                                            <label class="control-label "> @lang("To") :</label>
                                            <div class="controls">
                                                <input class="span10" type="text" name="to_date" class="span8" value="{{$commonclass->dateToview($project->project_name->date_of_completion)}}" disabled="">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                {{-- end of project to --}}

                                <div class="span12">

                                    <div class="span6">

                                            <label class="control-label"> @lang("Project Status"){{required()}}:</label>

                                            <div class="controls">
                                              <select name="project_status" required  class="span10" >

                                                  <option selected value="2">Ongoing</option>
                                              </select>
                                            </div>



                                    </div>
                                    <div class="span6">


                                            <label class="control-label"> @lang("Approaval Status"){{required()}}:</label>

                                            <div class="controls">
                                              <select name="approved_status" required class="span10" readonly>
                                                  <option selected value="1">Approaved</option>

                                              </select>
                                            </div>


                                    </div>
                                    <div class="span1">

                                    </div>
                                </div>


                            </div>

                            <hr/>

                            <fieldset>



                                <legend>@lang('Project Cost')</legend>

                                <div class="span12">
                                    <div class="span4">
                                        <div class="span12">
                                            <label for="" class="span4 margin-right">@lang('Total'){{required()}}: </label>
                                            <input type="text" name="project_cost_total" required class="span6" value="{{$project->project_cost_total}}" readonly="">

                                        </div>

                                        <div class="span12">
                                            <label for="" class="span4">(@lang('FE')){{required()}}: </label>
                                            <input type="text" name="project_fe" required class="span6"  value="{{$project->project_fe}}" readonly="">

                                        </div>
                                    </div>

                                    <div class="span4">
                                        <div class="span12">
                                            <label for="" class="span4 margin-right">@lang('Project Aid'){{required()}}: </label>
                                            <input type="text" required name="project_aid" class="span6" value="{{$project->project_aid}}" readonly="">
                                        </div>

                                        <div class="span12">
                                            <label for="" class="span4">@lang('RPA'){{required()}}: </label>
                                            <input type="text" required name="project_rpa" class="span6" value="{{$project->project_rpa}}" readonly="">
                                        </div>
                                    </div>
                                    <div class="span4">
                                        <label for="" class="span4">@lang('Own found'){{required()}}: </label>
                                        <input type="text" required name="project_sf" class="span6" value="{{$project->project_sf}}" readonly="">
                                    </div>
                                </div>

                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>@lang('RADP Allocation For')</legend>
                                <div class="span12">
                                    <div class="span5 margin-bottom" >
                                        <div class="span6">
                                            <label for="" class="span4" >@lang('FE year'):</label>
                                            <select class="span8" name="original_fiscal_year" id="" readonly >
                                              @if(!empty($project->fiscal_years))
                                              <option value="{{$project->fiscal_years->id}}">{{$commonclass->datetoyear($project->fiscal_years->start_date)}}-{{$commonclass->datetoyear($project->fiscal_years->end_date)}}</option>
                                              @endif
                                            </select>
                                        </div>
                                        <div class="span6">
                                            <div class="span12">
                                                <label for="" class="span3 ">@lang('Total'): </label><input type="text"   style="margin-left:4px" name="original_total" value="{{$project->original_total}}" class="span8" readonly>
                                            </div>
                                            <div class="span12">
                                                <label for="" class="span3">@lang('Taka'): </label><input type="text" readonly  name="original_taka" value="{{$project->original_taka}}" class="span8 padding-left">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span7">

                                        {{-- <h5 style="margin-top:-5px">Head of Expenditure</h5> --}}
                                        <div class="span12" style="margin-top:-12px">
                                            <h5>@lang('Head of Expenditure')</h5>
                                        </div>
                                        <div class="span12">
                                            <div class="span5">
                                                <div class="span12">
                                                    <label for=""class="span4" style="margin-left:4px">@lang('Capital'):</label>
                                                    <input type="text" name="original_capital" class="span6" value="" disabled>
                                                </div>
                                                <div class="span12">
                                                    <label for=""class="span4">@lang('(RPA)'):</label>
                                                    <input type="text" name="original_capital_rpa" class="span6" value="" disabled>
                                                </div>
                                                <div class="span12">
                                                    <label for=""class="span4">@lang('Revenue'):</label>
                                                    <input type="text" name="original_capital_revenue" class="span6" value="" disabled>
                                                </div>
                                            </div>
                                            <div class="span7">
                                                <div class="span12">
                                                    <div class="span12">
                                                        <label for=""class="span4" style="margin-left:8px">@lang('CD/VAT'):</label>
                                                        <input type="text" name="original_cdvat" class="span6" value="" disabled>
                                                    </div>
                                                    <div class="span12">
                                                        <label for=""class="span4">@lang('PA'):</label>
                                                        <input type="text" name="original_cdvat_pa" class="span6" value="" disabled>
                                                    </div>
                                                    <div class="span12">
                                                        <label for=""class="span4">@lang('(RPA)'):</label>
                                                        <input type="text" name="original_cdvat_rpa" class="span6" value="" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>@lang('Actual Exp. During(July-February)')</legend>
                                <div class="span12">

                                    <div class="span10">
                                        <div class="span5">
                                            <div class="span6">
                                                <div class="span12">
                                                    <label for="" class="span4">@lang('Total'){{required()}}: </label><input type="text" class="span8"  required name="actual_total" value="{{$project->actual_total}}">
                                                </div>

                                                <div class="span12" style="margin-left:-1px">
                                                    <label for="" class="span4">(@lang('FE')){{required()}}: </label><input type="text" required class="span8" name="actual_total_fe" value="{{$project->actual_total_fe}}">
                                                </div>

                                            </div>

                                            <div class="span6">
                                                <div class="span12">
                                                    <label  for="" class="span4">@lang('Taka'){{required()}}: </label><input type="text" class="span8" required name="actual_taka" value="{{$project->actual_taka}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span7">
                                            <div class="span12" style="margin-top:-12px">
                                                <h5>@lang('Head of Expenditure')</h5>
                                            </div>
                                            <div class="span12">
                                                <div class="span5">
                                                    <div class="span12">
                                                        <label for=""class="span4" style="margin-left:4px">@lang('Capital'):</label>
                                                        <input type="text" name="actual_capital" class="span6" value="{{$project->actual_capital}}">
                                                    </div>
                                                    <div class="span12">
                                                        <label for=""class="span4">@lang('(RPA)'):</label>
                                                        <input type="text" name="actual_capital_rpa" class="span6" value="{{$project->actual_capital_rpa}}">
                                                    </div>
                                                    <div class="span12">
                                                        <label for=""class="span4">@lang('Revenue'):</label>
                                                        <input type="text" name="actual_capital_revenue" class="span6" value="{{$project->actual_capital_revenue}}">
                                                    </div>


                                                </div>
                                                <div class="span7">
                                                    <div class="span12">
                                                        <div class="span12">
                                                            <label for=""class="span4" style="margin-left:8px">@lang('CD/VAT'):</label>
                                                            <input type="text" name="actual_cdvat" class="span6" value="{{$project->actual_cdvat}}">
                                                        </div>
                                                        <div class="span12">
                                                            <label for=""class="span4">@lang('PA'):</label>
                                                            <input type="text" name="actual_cdvat_pa" class="span6" value="{{$project->actual_cdvat_pa}}">
                                                        </div>
                                                        <div class="span12">
                                                            <label for=""class="span4">@lang('(RPA)'):</label>
                                                            <input type="text" name="actual_cdvat_rpa" class="span6" value="{{$project->actual_cdvat_rpa}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="span2">
                                        <div class="span12" style="margin-bottom:4px ;margin-left:4px;margin-top:50px">
                                            <a href="#" class="btn btn-default " >@lang('iBASS')++</a>

                                        </div>
                                        <div class="span12">
                                            <a href="#" class="btn btn-default ">@lang('PMIS')</a>
                                        </div>

                                    </div>


                                </div>


                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>@lang('Cumulative Expenditure')</legend>
                                <div class="span12">
                                    <div class="span3">
                                        <div class="span12">
                                            <label for="" class="span3">@lang('Total') : </label><input type="text" readonly name="cumulative_total" class="span6" value="{{$project->actual_taka}}">
                                        </div>
                                        <div class="span12" style="margin-left:-1px">
                                            <label for="" class="span3">@lang('Taka') : </label><input type="text" readonly name="cumulative_taka" class="span6" value="{{$project->cumulative_taka}}">
                                        </div>
                                    </div>
                                    <div class="span9">
                                        {{-- <h5 style="margin-top:-5px">Head of Expenditure</h5> --}}
                                        <div class="span12" style="margin-top:-12px">
                                            <h5>@lang("Head of Expenditure")</h5>
                                        </div>
                                        <div class="span12">
                                            <div class="span5">
                                                <div class="span12"style="margin-left:5px">
                                                    <label for=""class="span3">@lang('Capital'):</label>
                                                    <input type="text" name="cumulative_capital" class="span6" value="" disabled>
                                                </div>
                                                <div class="span12">
                                                    <label for=""class="span3">@lang('(RPA)'):</label>
                                                    <input type="text" name="cumulative_capital_rpa" class="span6" value="" disabled>
                                                </div>
                                                <div class="span12">
                                                    <label for=""class="span3">@lang('Revenue'):</label>
                                                    <input type="text" name="cumulative_capital_revenue" class="span6" value="" disabled>
                                                </div>
                                            </div>
                                            <div class="span7">
                                                <div class="span12">
                                                    <div class="span12">
                                                        <label for=""class="span2" style="margin-left:8px">@lang('CD/VAT'):</label>
                                                        <input type="text" name="cumulative_cdvat" class="span5" value="" disabled>
                                                    </div>
                                                    <div class="span12" >
                                                        <label for=""class="span2">@lang('PA'):</label>
                                                        <input type="text" name="cumulative_cdvat_pa" class="span5" value="" disabled>
                                                    </div>
                                                    <div class="span12">
                                                        <label for=""class="span2">@lang('(RPA)'):</label>
                                                        <input type="text" name="cumulative_cdvat_rpa" class="span5" value="" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </fieldset>
                            <br>
                            <fieldset class="allocation">
                                <legend>@lang('ADP Allocation for')  @if(!empty($project->fiscal_years)) {{$commonclass->datetoyear($project->fiscal_years->start_date)}}-{{$commonclass->datetoyear($project->fiscal_years->end_date)}} @endif</legend>
                                <div class="span12">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="span1">

                                            </div>
                                            <div class="span3">
                                                <div class="span12">
                                                    <label for=""class="span3">@lang('Total'){{required()}}: </label><input type="text" required  name="allocation_total"class="span6" value="{{$project->allocation_total}}">
                                                </div>

                                            </div>
                                            <div class="span8">

                                                <div class="span12" style="margin-left:16px">
                                                    <label for="" class="span2">@lang('Taka'){{required()}}: </label><input type="text" required name="allocation_taka" class="span3" value="{{$project->allocation_taka}}">
                                                </div>
                                                <div class="span12">
                                                    <label for="" class="span2" >(@lang('Revenue')){{required()}}: </label><input type="text" required name="allocation_revenue" class="span3" value="{{$project->allocation_revenue}}">
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="span12">
                                        <div class="span12">
                                            <h5>@lang('Head of Expenditure')</h5>
                                        </div>
                                        <div class="span12">
                                            <div class="span4">
                                                <div class="span12">
                                                    <div class="span6">
                                                        <div class="span12">
                                                            <label for="" class="span4">@lang('Capital'):</label>
                                                            <input type="text" name="capital"  class="span6" value="{{$project->capital}}" style="margin-left:4px">
                                                        </div>

                                                        <div class="span12">
                                                            <label for="" class="span4">(@lang('RPA')):</label>
                                                            <input type="text" name="capital_rpa"  class="span6" value="{{$project->capital_rpa}}">
                                                        </div>
                                                    </div>
                                                    <div class="span6">
                                                        <div class="span12">
                                                            <label for="" class="span5">@lang('Revenue'):</label>
                                                            <input type="text" name="capital_revenue"  class="span7" value="{{$project->capital_revenue}}">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="span5">
                                                <div class="span12">
                                                    <div class="span6">
                                                        <div class="span12" style="margin-left:9px">
                                                            <label for="" class="span4">@lang('CD/VAT'):</label>
                                                            <input type="text" name="cdvat"  class="span7" value="{{$project->cdvat}}">
                                                        </div>
                                                    </div>
                                                    <div class="span6">
                                                        <div class="span12" style="margin-left:4px">
                                                            <label for="" class="span4">@lang('PA'):</label>
                                                            <input type="text" name="cdvat_pa"  class="span6" value="{{$project->cdvat_pa}}">
                                                        </div>

                                                        <div class="span12">
                                                            <label for="" class="span4">(@lang('RPA')):</label>
                                                            <input type="text" name="cdvat_rpa"  class="span6" value="{{$project->cdvat_rpa}}">
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="span3">
                                                <div class="span12">
                                                    <label  class="span3" for="">DPA{{required()}}: </label><input type="text" required name="cdvat_dpa" class="span5" value="{{$project->cdvat_dpa}}">
                                                </div>


                                            </div>

                                        </div>
                                        <div class="span12" style="margin-top:20px">
                                            <div class="span4">
                                                <div class="span12">
                                                    <label for="" class="span3">@lang('Others'):</label>
                                                    <input type="text" name="allocation_others" class="span4"  value="{{$project->allocation_others}}" style="margin-left:-25px">
                                                </div>

                                            </div>
                                            <div class="span4">
                                                <div class="span12">
                                                    <label for="" class="span3">@lang('Own found'):</label>
                                                    <input type="text" name="self_finance" class="span5" value="{{$project->self_finance}}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <br>

                            </fieldset>

                            {{-- section and location --}}
                            <div class="row-fluid">
                              <div class="span12">
                                <h5 style="">@lang('Source of Project Aid')</h5>

                              </div>
                            </div>
                             <div class="row-fluid">
                            <div class="span12 m-wrap">
                              <div class="widget-box">
                  <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseS3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
                    <h5>@lang('Source of Project Aid')</h5>
                  </div>
                  <div class="widget-content nopadding updates collapse" id="collapseS3">
                              <table id="source_table" class="table table-striped table-bordered dt-responsive table-hover" >

                                <thead>
                                  <tr>
                                    <th style=" width: 30%; ">@lang('Source of Project Aid') </th>
                                    <th>@lang('Amount') </th>

                                   {{--  <th>@lang('Action')</th> --}}
                                  </tr>
                                </thead>

                                <tbody id="table_body">
                                  @forelse($project->demand_source as $pa)
                                  <tr id="tr_{{$loop->iteration}}">

                                    <td>
                                      <select name="financing_source[]" id="source_id_1" required>
                                        <option> @lang('Select One')</option>

                                        @foreach($source as $asource)

                                        <option @if($pa->financing_source==$asource->id) selected @endif value="{{$asource->id}}"> {{$asource->source_name}}</option>

                                        @endforeach
                                      </select>
                                    </td>

                                    <td>
                                      <input type="text" name="source_amount[]" required value="{{$pa->amount}}" class="span11"  placeholder=" @lang("Amount")">
                                    </td>

                                    {{-- <td>
                                      <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row(1);"><i class="icon-plus" ></i></a>
                                      <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row(1);"><i class="icon-minus" ></i> </a>
                                    </td> --}}


                                  </tr>
                                  @empty
                                  @endforelse
                                </tbody>


                              </table>
        </div>
        </div>

                            </div>
                           <div class="row-fluid">
                              <div class="span12">
                                <h5 style="">@lang('Location Wise Cost Allocation')</h5>

                              </div>
                            </div>
        <div class="widget-box">
                  <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
                    <h5>@lang('Location Wise Cost Allocation')</h5>
                  </div>
                  <div class="widget-content nopadding updates collapse" id="collapseG3">
                        <table id="location_table" class="table table-striped table-bordered dt-responsive table-hover" >

                              <thead>
                                <tr>
                                  <th> SL NO </th>
                                  <th  style=" width: 20%;">@lang('Division') </th>

                                  <th>@lang('RMO')</th>

                                  <th>@lang('City Corp./District')</th>

                                  <th>@lang('Upazila/Thana')</th>
                                  <th>@lang('Amount')</th>

                                </tr>
                              </thead>




                              <tbody id="table_body_location">
                                @forelse($project->demand_details as $pa)
                                <tr id="tr_{{$loop->iteration}}">
                                  <div class="row-fluid">


                                    <td>
                                      1
                                    </td>


                                    <td>
                                      <select name="division[]" id="division_id_{{$loop->iteration}}">
                                        <option> @lang('Select One')</option>

                                        @foreach($divison as $a_divison)

                                        <option @if($pa->division == $a_divison->id) selected @endif value="{{$a_divison->id}}"> {{$a_divison->division_name}}</option>
                                        @endforeach
                                      </select>

                                    </td>


                                    <td>


                                      <select name="rmo[]">
                                        <option value="0"> @lang('Select One')</option>
                                        <option value="1"> Demo</option>
                                      </select>
                                    </td>

                                    <td>


                                      <select name="district[]">
                                        <option value="0"> @lang('Select One')</option>
                                        <option value="1"> Demo</option>
                                      </select>
                                    </td>

                                  </div>

                                  {{--<div class="row-fluid">--}}

                                    <td>

                                      <select name="upazila[]">
                                        <option> @lang('Select One')</option>
                                        @foreach($upazila as $a_upazila)

                                        <option @if($a_upazila->id==$pa->upazila_location) selected @endif value="{{$a_upazila->id}}"> {{$a_upazila->upazila_location_name}}</option>
                                        @endforeach
                                      </select>


                                    </td>
                                    <td>


                                      <input type="number" class="span11" value="{{$pa->amount}}" name="amount[]"  placeholder=" @lang("Amount")" />


                                    </td>
                                  </tr>
                                  @empty
                                  @endforelse
                                </tbody>
                              </table>

                  </div>
                </div>

                  {{-- mypipe table start --}}
                  <div class="span12">
                    <div class="span3">

                    </div>
                    <div class="span6">



                         <table class="table table-responsive table-bordered data-table">
                                           <thead>
                                             <tr>

                                               <th colspan="5" >MYPIP</th>

                                             </tr>
                                               <tr>
                                                   @php

                                                   $callNoticeYear=$commonclass->datetoyear($project->fiscal_years->start_date ?? null);

                                                   if(!is_null($callNoticeYear))
                                                       {
                                                       $nextYear= $callNoticeYear+1;
                                                       $afterNextYear=$nextYear+1;
                                                       }
                                                       else
                                                       {
                                                         $nextYear= 1970;
                                                         $afterNextYear=$nextYear+1;
                                                       }

                                                   @endphp
                                                   <th colspan="2">{{ $nextYear.'-'.$afterNextYear }}</th>
                                                   <th colspan="2">{{ $afterNextYear.'-'.($afterNextYear+1) }}</th>
                                               </tr>

                                           </thead>
                                           <tbody>
                                               <tr>
                                                <input type="hidden" name="nextYear" value="{{$nextYear}}">
                                                @php



                                                      $GOB= $project->demand_pip[0]->gob ?? null;
                                                      $pa= $project->demand_pip[0]->pa ?? null;



                                                      $GOBSecond= $project->demand_pip[1]->gob ?? null;
                                                      $paSecond= $project->demand_pip[1]->pa ?? null;

                                                @endphp
                                                <td>@lang('GOB')</td> <td> <input type="text" name="nextYearGob" value="{{$GOB}}">  </td>
                                                <td>@lang('GOB')</td> <td> <input type="text"  name ="afterNextYearGob" value="{{$pa}}"> </td>

                                               </tr>
                                               <tr>
                                                   <input type="hidden" name="afterNextYear" value="{{$afterNextYear}}">
                                                   <td>@lang('PA')</td> <td> <input type="text" name="nextYearPa" value="{{$GOBSecond}}"> </td>
                                                   <td>@lang('PA')</td> <td> <input type="text" name="afterNextYearPa" value="{{$paSecond}}"> </td>

                                               </tr>
                                           </tbody>
                                       </table>




                    </div>
                    <div class="span3">

                    </div>
                  </div>


                  {{-- mypipe end --}}


                          <div class="form-actions">
                            <button type="submit" class="btn btn-success">@lang("Update")</button>
                            {{--  <a href="{{route('agency.index')}} " class="btn btn-danger">@lang("Close")</a> --}}
                          </div>
                   </form>

                    </div>


                            {{-- end section and location_table --}}

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

{{--//.....................................cart***here.........................//--}}
<script  type="text/javascript">
  function add_row(i)
  {
    var rowCount = $('#table_body tr').length;
    rowCount++;

    if ($('#source_id_' + rowCount).val() == "")
    {
      alert('Candidate Field Can not be empty.');
      $('#source_id_' + rowCount).focus();

    }
    else
    {
      rowCount++;
      $('#source_table').append(

        '<tr id="tr_' + rowCount + '">'
        + '<td><select name="source[]" id="source_id_' + rowCount + '" >'

        + '<option> @lang('Select One') </option>'
        +'</select></td>'

        + '<td><input type="number" name="amount[]" class="span11" placeholder="@lang('amount')"  /></td>'

        + '<td>\n\
        <a class="btn btn-success" id="add_' + rowCount + '" title="@lang('Add')" onclick="add_row(' + rowCount + ');"><i class="icon-plus" ></i></a>\n\
        <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row(' + rowCount + ');"><i class="icon-minus" ></i> </a>\n\
        </td>'
        + '</tr>'

        );

      get_source_data(rowCount);
      $('select').select2();

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
 function remove_row(i) {

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

                + '<option> @lang('Select One') </option>'
                +'</select></td>'


                + '<td><select name="rmo[]" id="rmo_id_' + rowCount + '" >'

                + '<option> @lang('Select One') </option>'
                +'</select></td>'


                + '<td><select name="district[]" id="district_id_' + rowCount + '" >'

                + '<option> @lang('Select One') </option>'
                +'</select></td>'

                + '<td><select name="upazila[]" id="upazila_id_' + rowCount + '" >'

                + '<option> @lang('Select One') </option>'
                +'</select></td>'

                + '<td><input type="number" name="amount[]" class="span11" placeholder="@lang('Amount')"  /></td>'

                + '<td>\n\
                <a class="btn btn-success" id="add_' + rowCount + '" title="@lang('Add')" onclick="add_row_location(' + rowCount + ');"><i class="icon-plus" ></i></a>\n\
                <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_location(' + rowCount + ');"><i class="icon-minus" ></i> </a>\n\
                </td>'
                + '</tr>'

                );

              get_division_data(rowCount);
              $('select').select2();
              get_upazila_data(rowCount);
              $('select').select2();

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






    </script>



@endsection
