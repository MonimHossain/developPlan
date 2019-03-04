@extends('layouts.adminLayout.admin_design')

@section('content')

<style>
    input[type=checkbox]{
        opacity:1 !important;
    }
    .trbgcolor{
        //background-color: #dbc59e !important;
        color: #FFA500 !important;
    }
    table {
        display: block;
        overflow-x: auto !important;


    }
    table th,td{
        vertical-align: middle !important;
    }
    .allocation_form{
        padding: 20px;
    }
</style>
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a>
            </div>
        </div>
        <!--End-breadcrumbs-->

        <div class="container-fluid">
            <div class="dynamic_view" style="width: 100%"> </div>

            <div class="row-fluid">
                <div class="span12">

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5> </h5>
                        </div>
                        <div class="widget-content nopadding">

             <form method="get" action="{{route('allocated_project.index')}}" class="allocation_form">
               
                <div class="controls controls-row">
                <div  class="span2 m-wrap">
                        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;" class="control-label">@lang('Select Ministry') </label>
                        <div class="controls">
                             @php
                            if($user_group == 13 || $user_group == 15)
                            {
                                  $agency_id=auth()->user()->department_id;
                            }
                            elseif($user_group == 12 || $user_group == 14 ) {
                                 $ministry_id=auth()->user()->department_id;
                              
                                }
    
                           @endphp
                            <select name="min">
                                <option></option>
                                @foreach($ministry as $a_ministry)
                                    <option {{selected($a_ministry->id,$_GET['min'] ?? $ministry_id ?? 0)}} value="{{$a_ministry->id}}">{{$a_ministry->ministry_name}}</option>
                                @endforeach
                          
                        </select>   
                        </div>
                    </div>
                    <div  class="span2 m-wrap">
                        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;"  class="control-label">@lang('Select Agency') </label>
                        <div class="controls">
                            <select name="agen">
                                <option></option>
                                @foreach($agency as $a_agency)
                                    <option {{selected($a_agency->id,$_GET['agen'] ??$agency_id ?? 0)}} value="{{$a_agency->id}}"> {{$a_agency->agency_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div  class="span2 m-wrap">
                        <label style="color:#4D739D; font-family: Verdana,Arial, Helvetica, sans-serif;"   class="control-label">@lang('Select Sector') </label>
                        <div class="controls">
                            <select name="sec" onchange="sector_to_subsector(this)">
                                <option></option>
                                @foreach($sector as $a_sector)
                                    <option {{selected($a_sector->id,$_GET['sec'] ?? 0)}} value="{{$a_sector->id}}">{{$a_sector->sector_name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>              
                    <div  class="span2 m-wrap">
                        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;"  class="control-label">@lang('Select SubSector')</label>
                        <div class="controls">
                            <select id='sub_sector' name="sub_sec">
                                <option></option>
                                @foreach($subsector as $a_subsector)
                                    <option {{selected($a_subsector->id,$_GET['sub_sec'] ?? 0)}} value="{{$a_subsector->id}}">{{$a_subsector->sub_sector_name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
<!--                 style="float:right"-->
                    <div  class="span2 m-wrap">
                        <label style=" padding-top: 20px" class="control-label"> </label>
                        <div class="controls">
                            <button name="search" value="search" type="submit" class="btn btn-warning"><i class="icon-search icon-white"></i></button>
                        </div>
                    </div>




                </div>
            </form>
            <hr/>
                            @php

                            $fiscal_y= $commonclass->datetoyear($financial_year->start_date).'-'.$commonclass->datetoyear($financial_year->end_date);
                            $fiscal_y_start=$commonclass->datetoyear($financial_year->start_date);
                            $previousYear=$commonclass->datetoyear($financial_year->start_date)-1;
                           
                            @endphp
                             <form action="{{url('adpsendtochecker')}}" method="POST" class="form-horizontal">
                                @csrf
                                <table class="table table-bordered with-check table-responsive" id="">
                                <thead>
                                    <tr>
                                        <th v-align="middle" rowspan="3"><input type="checkbox" name="chkprojectall" value=""></th>
                                        <th rowspan="3">@lang('Project Code')</th>
                                        <th rowspan="3">@lang('Sl No')</th>
                                        <th rowspan="3">@lang('Project Name') (@lang('Implementation Period'))</th>
                                        <th rowspan="3">@lang('Approval Stage')</th>
                                        <th colspan="2">@lang("Project Cost")</th>
                                        <th colspan="2">{{__("Revised Allocation of $previousYear-$fiscal_y_start")}}</th>
                                        <th colspan="2">{{__("Actual Cost of  $previousYear-$fiscal_y_start (July-February)")}}</th>
                                        <th colspan="2">{{__("Corted Cost of upto February,$fiscal_y_start")}}</th>
                                        <th colspan="7">{{__("Annual Development Programe Allocated for $fiscal_y")}}</th>
                                        <th rowspan="3">@lang("Project Aid Source")</th>

                                       
                                        <th rowspan="3">@lang('Action')</th>
                                    </tr>
                                      <tr>

                                        <th rowspan="2">@lang('Total') @lang('(FE)')</th>
                                        <th rowspan="2">@lang('PA')
                                        (@lang('Cash'))</th>
                                        <th rowspan="2">@lang('Total')</th>
                                        <th rowspan="2">@lang('Tk')</th>
                                        <th rowspan="2">@lang('Total') @lang('(FE)')</th>
                                        <th rowspan="2">@lang('Tk')</th>
                                        <th rowspan="2">@lang('Total')</th>
                                        <th rowspan="2">@lang('Tk')</th>
                                        <th rowspan="2">@lang('Total')</th>
                                        <th rowspan="2">@lang('Tk') (@lang('Revenue'))</th>
                                        <th colspan="2">@lang('Expense')</th>
                                        <th rowspan="2">@lang('Allocated VAT & Import duty')</th>
                                        <th rowspan="2">@lang('Project Aid') (@lang('Cash'))</th>
                                        <th rowspan="2">@lang('Others')</th>

                                    </tr>
                                     <tr>
                                      <th>@lang('Capital') (@lang('Cash'))</th>
                                      <th>@lang('Revenue')</th>
                                    </tr>

                                </thead>
                                <tbody>
                                     @forelse($projectList as $pr)
                                     <?php
                                        if (in_array($pr->project_name->unapprove_project_id, $backproj)) {
                                            $backtrbgclass = "trbgcolor";
                                        } else {
                                            $backtrbgclass = "";
                                        }

                                        if (in_array($pr->project_name->unapprove_project_id, $checkerbackproj)) {
                                            $trbgclass = "trbgcolor";
                                        } else {
                                            $trbgclass = "";
                                        }
                                    ?>
                                     <tr class="<?php echo $trbgclass; ?> <?php echo $backtrbgclass; ?>">
                                         <td>
                                            <input type="checkbox"  name="chkproject[]" value="{{$pr->project_name->unapprove_project_id}}">
                                        </td>




                                        <td> {{$pr->project_code ?? null}}</td>
                                        <td> {{$loop->iteration}}</td>
                                        <td> {{$pr->project_name->project_title ?? null}}</td>
                                        <td> {{$pr->project_name->unapprove_project_id ?? null}}</td>
                                        <td> {{$pr->project_cost_total ?? null}} <br/>({{$pr->project_fe ?? null}}) </td>
                                        <td>{{$pr->project_aid ?? null}} <br/>({{$pr->project_rpa ?? null}})    </td>
                                        <td>    </td>
                                        <td>    </td>
                                        <td>    </td>
                                        <td>    </td>
                                        <td>    </td>
                                        <td>    </td>
                                        <td>{{$pr->allocation_total ?? null}}  </td>
                                        <td>  {{$pr->allocation_taka ?? null}} <br/>({{$pr->allocation_revenue ?? null}}) </td>
                                        <td>    {{$pr->capital ?? null}} <br/>({{$pr->capital_rpa ?? null}})</td>
                                        <td>   {{$pr->capital_revenue ?? null}}  </td>
                                        <td>   {{$pr->cdvat ?? null}} </td>
                                        <td> {{$pr->cdvat_pa ?? null}} <br/>({{$pr->cdvat_rpa ?? null}}) </td>
                                        <td>  {{$pr->allocation_others}}  </td>
                                        
                                        <td>
                                        @forelse($pr->demand_source as $ds)
                                         {{$commonclass->getvalue($ds->financing_source,'ProjectSource','source_name')}}<br>
                                         @empty
                                         @endforelse
                                          </td>


                                       
                                        <td>
                                           {{$commonclass->access_button('1','',route('allocated_project.edit',$pr->id))}}
                                           <!--{{$commonclass->access_button('2',__('Delete'),route('allocated_project.destroy',$pr->id))}}-->
                                           <!--<button value="{{route('allocated_project.show',$pr->id)}}"class="btn btn-success pull-left allocated_view"><i class="icon-eye-open"></i>View </button>-->
                                           <button value="{{url('adp_allocation_view',$pr->id)}}" class="btn btn-success pull-left allocated_view" title="View"><i class="icon-eye-open"></i> </button>

                                        </td>
                                     </tr>
                                     @empty

                                     @endforelse

                                </tbody>
                            </table>
                            <div class="form-actions pull-right">
                                <button type="submit" name="submitbutton" value="send" class="btn btn-success"> @lang("Send to Mediator") </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection


@section('additionalJS')

<script src="{{asset('js/backend_js/matrix.tables.js')}}"></script>

<script type="text/javascript">
$('.allocated_view').click(function (e) {

    e.preventDefault();
    $.ajax({
        url: $(this).val(),
    })
            .done(function (d) {

                $('.dynamic_view').html(d);
                $('#allocation_modal').modal('show');
            })
            .fail(function () {
                console.log("error");
            })
            .always(function () {
                console.log("complete");
            });
})


</script>
@endsection
