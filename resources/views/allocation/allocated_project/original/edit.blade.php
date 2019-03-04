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
            <form action="{{route('allocated_project.update',$project->id)}}" method="post" class="form-horizontal">
               @csrf
               @method('patch')
                <input type="hidden" name="project_id" value="{{$project->project_id}}">
                 <div class="row-fluid">

                  <div  class="span6">
                    <label class="control-label"> @lang("Allocation For") :</label>
                    <div class="controls">
                      <select name="demand_type" id="" class="span12">
                        <option selected value="1">Adp</option>
                      </select>
                    </div>
                  </div>
                   <div  class="span6 m-wrap text-center" >
                    <label class="control-label"> @lang("Notice") :</label>
                    <div class="controls">
                     <input type="text" value="Call notice 1" disabled="" class="span11">
                    </div>
                  </div>


                </div>
                <div class="row-fluid">

                  <div  class="span6 m-wrap text-center">
                    <label class="control-label"> @lang("Sector") :</label>
                    <div class="controls">
                      <input type="text" value="{{$project->sector_name ?? null}}" class="span12" disabled="">
                    </div>
                  </div>
                  <div  class="span6 m-wrap text-center">
                    <label class="control-label"> @lang("Subsector") :</label>
                    <div class="controls">
                      <input type="text" value="{{$project->sub_sector_name ?? null}}" class="span11" disabled="">
                    </div>
                  </div>


                </div>
                <div class="row-fluid">

                  <div  class="span6 m-wrap text-center">
                    <label class="control-label"> @lang("Ministry/Division") :</label>
                    <div class="controls">
                     <input type="text" value="{{$project->ministry_name ?? null}}"class="span12" disabled="">
                    </div>
                  </div>
                  <div  class="span6 m-wrap text-center">
                    <label class="control-label"> @lang("Agency") :</label>
                    <div class="controls">
                     <input type="text" class="span11" value="{{$project->agency_name ?? null}}" disabled="">
                    </div>
                  </div>


                </div>
                <hr/>
               <div class="row-fluid">

                  <div  class="span4 m-wrap">
                    <label class="control-label"> @lang("Impletentation Period") :</label>
                    <div class="controls">
                      <input type="text" name='from_date' class="span11" value="{{$commonclass->dateToview($project->project_name->date_of_commencement)}}" disabled="">
                    </div>
                  </div>
                  <div  class="span4 m-wrap">
                    <label class="control-label"> @lang("To") :</label>
                    <div class="controls">
                      <input type="text" name="to_date" class="span11" value="{{$commonclass->dateToview($project->project_name->date_of_completion)}}" disabled="">
                    </div>
                  </div>
                  <div  class="span4">
                    <label class="control-label"> @lang("Project Code"){{required()}}:</label>
                    <div class="controls">
                      <input type="text"  required value="{{$project->project_code}}" name='project_code' class="span12">
                    </div>
                  </div>


                </div>
                 <div class="row-fluid">

                  <div  class="span12 m-wrap">
                    <label class="control-label"> @lang("Project Name") :</label>
                    <div class="controls">
                      <input type="text" name='project_name' required value="{{$project->project_name->project_title}}" class="span12">
                    </div>
                  </div>
                </div>
                <div class="row-fluid">
                  <div  class="span6 m-wrap">
                    <label class="control-label"> @lang("Project Status"){{required()}}:</label>
                    <div class="controls">
                      <select name="project_status" required  class="span11" readonly>

                        <option selected value="2">Ongoing</option>
                      </select>
                    </div>
                  </div>
                  <div  class="span6">
                    <label class="control-label"> @lang("Approaval Status"){{required()}}:</label>
                    <div class="controls">
                      <select name="approved_status" required class="span12" readonly>
                        <option selected value="1">Approaved</option>

                      </select>
                    </div>
                  </div>



                </div>
                <hr/>

                <fieldset>
                  <legend>@lang('Project Cost')</legend>
                  <label for="">@lang('Total'){{required()}}: </label><input type="text" name="project_cost_total" value="{{$project->project_cost_total}}" required class="span2"  readonly>

                  <label for="">@lang('(FE)'){{required()}}: </label><input type="text" name="project_fe" required class="span2" value="{{$project->project_fe}}"  readonly>

                  <label for="">@lang('Project Aid'){{required()}}: </label><input type="text" required name="project_aid" class="span2" value="{{$project->project_aid}}" readonly>
                  <label for="">@lang('RPA'){{required()}}: </label><input type="text" required name="project_rpa" class="span2"  value="{{$project->project_rpa}}" readonly>
                  <label for="">@lang('SF'){{required()}}: </label><input type="text" required name="project_sf" class="span2"  value="{{$project->project_sf}}" readonly>
                </fieldset>
                <br>
                <fieldset>
                  <legend>@lang('ADP Allocation for')</legend>
                  <div class="span7">
                    <label for="">@lang('FE year'):</label>

                    <select name="original_fiscal_year" id="" required>
                      @if(!empty($project->fiscal_years))
                      <option value="{{$project->fiscal_years->id}}">{{$commonclass->datetoyear($project->fiscal_years->start_date)}}-{{$commonclass->datetoyear($project->fiscal_years->end_date)}}</option>
                      @endif
                    </select>
                  </div>
                  <label for="">@lang('Total'){{required()}}: </label><input type="text" required  name="original_total" class="span2" value="{{$project->original_total}}">
                  <label for="">@lang('Taka'){{required()}}: </label><input type="text" required  name="original_taka" class="span2" value="{{$project->original_taka}}">

                </fieldset>
                <br>
                <fieldset>
                  <legend>@lang('Actual Exp. During(July-February)')</legend>
                  <label for="">@lang('Total'){{required()}}: </label><input type="text"  required name="actual_total" class="span4"  value="{{$project->actual_total}}">
                  <label for="">@lang('Total')@lang('(FE)'){{required()}}: </label><input type="text" required  name="actual_total_fe" class="span4"  value="{{$project->actual_total_fe}}">


                  <label style="text-align:right;margin-left: 3vw" for="">@lang('Taka'){{required()}}: </label><input type="text" required name="actual_taka" class="span2" value="{{$project->actual_taka}}">

                </fieldset>
                <br>
                <fieldset>
                  <legend>@lang('Cumulative Expenditure')</legend>
                  <label for="">@lang('Total'){{required()}}: </label><input type="text" required name="cumulative_total" class="span5" value="{{$project->actual_taka}}">



                  <label for="">@lang('Taka'){{required()}}: </label><input type="text" required name="cumulative_taka" class="span6" value="{{$project->cumulative_taka}}">

                </fieldset>
                <br>
                <fieldset>
                  <legend>@lang('ADP Allocation for') @if(!empty($project->fiscal_years)) {{$commonclass->datetoyear($project->fiscal_years->start_date)}}-{{$commonclass->datetoyear($project->fiscal_years->end_date)}} @endif</legend>
                  <div class="row-fluid">
                    <label style="text-align:right;margin-left: 3vw" for="">@lang('Total'){{required()}}: </label><input type="text" required  name="allocation_total"class="span3" value="{{$project->allocation_total}}">



                    <label style="text-align:right;margin-left: 3vw" for="">@lang('Taka'){{required()}}: </label><input type="text" required name="allocation_taka" class="span3" value="{{$project->allocation_taka}}">
                    <label style="text-align:right;margin-left: 3vw" for="">@lang('Reveneu'){{required()}}: </label><input type="text" required name="allocation_revenue" class="span3" value="{{$project->allocation_revenue}}">
                  </div>
                  <h5>@lang('Heads of Expenditure')</h5>
                  <div class="row-fluid">
                    <label style="text-align:right;margin-left: 2vw" for="">@lang('Capital'){{required()}}: </label><input type="text" required name="capital" class="span3"  value="{{$project->allocation_revenue}}">



                    <label  style="text-align:right;margin-left: 3.5vw" for="">@lang('RPA'){{required()}}: </label><input type="text" required name="capital_rpa" class="span3"  value="{{$project->allocation_revenue}}">
                    <label  style="text-align:right;margin-left: 3vw" for="">@lang('Reveneu'){{required()}}: </label><input type="text" required name="capital_revenue" class="span3"  value="{{$project->allocation_revenue}}">
                  </div>
                  <br>
                  <div class="row-fluid">
                    <label  style="text-align:right;margin-left: 2vw" for="">@lang('CDVAT'){{required()}}: </label><input type="text" required name="cdvat" class="span3"  value="{{$project->cdvat}}">



                    <label  style="text-align:right;margin-left: 4vw" for="">@lang('PA'){{required()}}: </label><input type="text" required name="cdvat_pa" class="span3"  value="{{$project->cdvat_pa}}">
                    <label style="text-align:right;margin-left: 5.5vw" for="">@lang('RPA'){{required()}}: </label><input type="text" required name="cdvat_rpa" class="span3" value="{{$project->cdvat_rpa}}">
                  </div>
                  <br>
                  <div class="row-fluid">
                    <label style="text-align:right;margin-left: 3vw" for="">@lang('DPA'){{required()}}: </label><input type="text" required name="cdvat_dpa" class="span3" value="{{$project->cdvat_dpa}}">
                    <label style="text-align:right;margin-left: 2.2vw" for="">@lang('Others'){{required()}}: </label><input type="text" required name="allocation_others" class="span3"  value="{{$project->allocation_others}}">
                     <label style="text-align:right;margin-left: 1.7vw" for="">@lang('Self finance'){{required()}} : </label><input type="text" value="{{$project->self_finance}}" name="self_finance" required class="span3">
                  </div>

                  <br>









                  {{-- df sdfs             --}}










                  </fieldset>
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
                  <div class="form-actions">
                    <button type="submit" class="btn btn-success">@lang("Update")</button>
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
