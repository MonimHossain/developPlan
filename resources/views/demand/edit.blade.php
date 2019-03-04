@extends('layouts.adminLayout.admin_design')

@section('content')
<style>
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
            <form action="{{route('demand.store')}}" method="post" class="form-horizontal">
                @csrf
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <div class="row-fluid">

                  <div  class="span11">
                    <label class="control-label"> @lang("Allocation For") :</label>
                    <div class="controls">
                      <select name="allocation_type" class="span5">
                        <option value="1">ADP</option>
                        <option value="2">RADP</option>
                      </select>
                    </div>
                  </div>


                </div>
                <div class="row-fluid">

                  <div  class="span6 m-wrap text-center">
                    <label class="control-label"> @lang("Sector") :</label>
                    <div class="controls">
                      <input type="text" value="{{$project->sectors->sector_name ?? null}}" class="span12" disabled="">
                    </div>
                  </div>
                  <div  class="span6 m-wrap text-center">
                    <label class="control-label"> @lang("Subsector") :</label>
                    <div class="controls">
                      <input type="text" value="{{$project->sub_sectors->sub_sector_name ?? null}}" class="span11" disabled="">
                    </div>
                  </div>


                </div>
                <div class="row-fluid">

                  <div  class="span6 m-wrap text-center">
                    <label class="control-label"> @lang("Ministry/Division") :</label>
                    <div class="controls">
                     <input type="text" value="{{$project->ministries->ministry_name ?? null}}"class="span12" disabled="">
                    </div>
                  </div>
                  <div  class="span6 m-wrap text-center">
                    <label class="control-label"> @lang("Agency") :</label>
                    <div class="controls">
                     <input type="text" class="span11" value="{{$project->agencies->agency_name ?? null}}" disabled="">
                    </div>
                  </div>


                </div>
                <div class="row-fluid">

                  <div  class="span4 m-wrap">
                    <label class="control-label"> @lang("Impletentation Period") :</label>
                    <div class="controls">
                      <input type="text" name='from_date' class="datepicker span11">
                    </div>
                  </div>
                  <div  class="span4 m-wrap">
                    <label class="control-label"> @lang("To") :</label>
                    <div class="controls">
                      <input type="text" name="to_date" class="datepicker span11">
                    </div>
                  </div>
                  <div  class="span4">
                    <label class="control-label"> @lang("Project Code"){{required()}}:</label>
                    <div class="controls">
                      <input type="text"  required value="{{$project->project_code}}" name='project_code' class="span11">
                    </div>
                  </div>


                </div>
                <div class="row-fluid">

                  <div  class="span4 m-wrap">
                    <label class="control-label"> @lang("Project Name") :</label>
                    <div class="controls">
                      <input type="text" name='project_name' required value="{{$project->project_title}}" class="span11">
                    </div>
                  </div>
                  <div  class="span4 m-wrap">
                    <label class="control-label"> @lang("Project Status"){{required()}}:</label>
                    <div class="controls">
                      <select name="project_status" required  class="span11 text-center">
                        <option value="1">New</option>
                        <option value="2">Old</option>
                      </select>
                    </div>
                  </div>
                  <div  class="span4">
                    <label class="control-label"> @lang("Approaval Status"){{required()}}:</label>
                    <div class="controls">
                      <select name="approved_status" required class="span11 text-center">
                        <option value="1">Approaved</option>
                        <option value="0">Not Approaved</option>
                      </select>
                    </div>
                  </div>



                </div>

                <fieldset>
                  <legend>Project Cost</legend>
                  <label for="">Total{{required()}}: </label><input type="number" name="project_cost_total" required class="span2">
                  <label for="">(FE){{required()}}: </label><input type="number" name="project_fe" required class="span2">
                  <label for="">Project Aid{{required()}}: </label><input type="number" required name="project_aid" class="span2">
                  <label for="">RPA{{required()}}: </label><input type="number" required name="project_rpa" class="span2">
                  <label for="">SF{{required()}}: </label><input type="number" required name="project_sf" class="span2">
                </fieldset>
                <br>
                <fieldset>
                  <legend>RADP Allocation For</legend>
                  <div class="span7">
                    <label for="">FE year:</label>

                    <select name="original_fiscal_year" id="" required>
                      @forelse($financial_year as $fn)

                      <option value="{{$fn->id}}">{{$commonclass->dateToView($fn->start_date)}}-{{$commonclass->dateToView($fn->end_date)}}</option>
                      @empty
                      @endforelse
                    </select>
                  </div>
                  <label for="">Total{{required()}}: </label><input type="number" required  name="original_total" class="span2">
                  <label for="">Taka{{required()}}: </label><input type="number" required  name="original_taka" class="span2">

                </fieldset>
                <br>
                <fieldset>
                  <legend>Actual Exp. During(July-February)</legend>
                  <label for="">Total{{required()}}: </label><input type="number"  required name="actual_total" class="span4">
                  <label for="">Total(FE){{required()}}: </label><input type="number" required  name="actual_total_fe" class="span4">


                  <label for="">Taka{{required()}}: </label><input type="number" required name="actual_taka" class="span2">

                </fieldset>
                <br>
                <fieldset>
                  <legend>Cumulative Expenditure</legend>
                  <label for="">Total{{required()}}: </label><input type="number" required name="cumulative_total" class="span5">



                  <label for="">Taka{{required()}}: </label><input type="number" required name="cumulative_taka" class="span6">

                </fieldset>
                <br>
                <fieldset>
                  <legend>ADP Allocation for 2019-2020</legend>
                  <div class="row-fluid">
                    <label for="">Total{{required()}}: </label><input type="number" required  name="allocation_total"class="span3">



                    <label for="">Taka{{required()}}: </label><input type="number" required name="allocation_taka" class="span3">
                    <label for="">Reveneu{{required()}}: </label><input type="number" required name="allocation_revenue" class="span3">
                  </div> 
                  <h5>Heads of Expenditure</h5> 
                  <div class="row-fluid">
                    <label for="">Capital{{required()}}: </label><input type="number" required name="capital" class="span3">



                    <label for="">RPA{{required()}}: </label><input type="number" required name="capital_rpa" class="span3">
                    <label for="">Reveneu{{required()}}: </label><input type="number" required name="capital_revenue" class="span3">
                  </div>
                  <br>
                  <div class="row-fluid">
                    <label for="">CDVAT{{required()}}: </label><input type="number" required name="cdvat" class="span2">



                    <label for="">PA{{required()}}: </label><input type="number" required name="cdvat_pa" class="span2">
                    <label for="">RPA{{required()}}: </label><input type="number" required name="cdvat_rpa" class="span2">
                    <label for="">DPA{{required()}}: </label><input type="number" required name="cdvat_dpa" class="span2">
                    <label for="">Others{{required()}}: </label><input type="number" required name="allocation_others" class="span2">
                  </div> 
                  <br>


                  <div class="row-fluid">
                    <div class="span6 m-wrap">

                      <table id="source_table" class="table table-striped table-bordered dt-responsive table-hover" >

                        <thead>
                          <tr>
                            <th style=" width: 30%; ">@lang('Source of Project Aid') </th>
                            <th>@lang('Amount') </th>

                           {{--  <th>@lang('Action')</th> --}}
                          </tr>
                        </thead>

                        <tbody id="table_body">
                          <tr id="tr_1">

                            <td>
                              <select name="source_of_project_aid" id="source_id_1" required>
                                <option> @lang('Select One')</option>

                                @foreach($source as $asource)

                                <option value="{{$asource->id}}"> {{$asource->source_name}}</option>

                                @endforeach
                              </select>
                            </td>

                            <td>
                              <input type="number" name="source_amount" required class="span11"  placeholder=" @lang("Amount")">
                            </td>

                            {{-- <td>
                              <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row(1);"><i class="icon-plus" ></i></a>
                              <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row(1);"><i class="icon-minus" ></i> </a>
                            </td> --}}


                          </tr>
                        </tbody>


                      </table>


                    </div>

                    <div class="span3 m-wrap ">                     
                      <label for="">Self finance{{required()}} : </label><input type="number" name="self_finance" required> 
                    </div>                        


                  </div> 
                  {{-- df sdfs             --}}

                 

                 

                  

                   

                  </fieldset>
                     <div class="row-fluid">
                      <div class="span12">
                        <h5 style="">Location Wise Cost Allocation</h5>

                      </div>
                    </div>
<div class="widget-box">
          <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
            <h5>Location Wise Cost Allocation</h5>
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
                        @forelse($project->unapproved_location as $pr)
                        <tr id="tr_{{$loop->iteration}}">
                          <div class="row-fluid">


                            <td>
                              1
                            </td>


                            <td>
                              <select name="division[]" id="division_id_1">
                                <option> @lang('Select One')</option>

                                @foreach($divison as $a_divison)

                                <option @if($a_divison->id==$pr->division) selected="" @endif value="{{$a_divison->id}}"> {{$a_divison->division_name}}</option>
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

                                <option @if($a_upazila->id==$pr->upazila) selected="" @endif value="{{$a_upazila->id}}"> {{$a_upazila->upazila_location_name}}</option>
                                @endforeach
                              </select>


                            </td>
                            <td>


                              <input type="number" class="span11" name="amount[]" value="{{$pr->amount}}" placeholder=" @lang("Amount")" />


                            </td>

                          </tr>
                          @empty
                          @endforelse
                        </tbody>
                      </table>
           
          </div>
        </div>

                  <div class="form-actions">
                    <button type="submit" class="btn btn-success">@lang("Save")</button>
                    {{--  <a href="{{route('agency.index')}} " class="btn btn-danger">@lang("Close")</a> --}}
                  </div>
           </form>

            </div>
          </div>   </div>
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





@endsection